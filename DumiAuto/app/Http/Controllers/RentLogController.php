<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RentLog;
use Illuminate\Support\Carbon;
use App\User;
use App\Car;
use Illuminate\Support\Facades\Mail;
use App\Mail\RentRegistered;
use Exception;

class RentLogController extends Controller
{
    public function index()
    {
        $rents = RentLog::all();
        return view('admin.rents.index', compact('rents', $rents));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $users = User::select('id')->where('name', 'LIKE', "%$search%")->get();
        $rents = RentLog::where('user_id', '$search');
        if($users){
            foreach($users as $user){
                $rents = RentLog::all()->where('user_id', 'like', "$user->id");
            }
        }

        return view('admin.rents.index',compact('rents'));
    }

    public function create()
    {
        $cars = Car::all();
        $users = User::all();
        return view('admin.rents.create', compact('cars', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_selected' => 'required',
            'person_name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);


        $rents = RentLog::all()->where('car_id' === $request->car_selected);

        $rent = RentLog::create(['car_id' => $request->car_selected,
                                'user_id' => $request->person_name,
                                'start_date' => $request->start_date, 
                                'end_date' => $request->end_date]);

        Mail::to($rent->user->email)->send(
            new RentRegistered($rent)
        );

        return redirect('rents');
    }

    public function show(RentLog $rent)
    {
        $start = Carbon::parse($rent->start_date);
        $end = Carbon::parse($rent->end_date);
        if($difference = $end->diffInDays($start)){
            $days = $difference;
        }
        else{
            $days = 1;
        }
        return view('admin.rents.show', compact('rent', 'days'));
    }

    public function edit(RentLog $rent)
    {
        $cars = Car::all();
        $users = User::all();
        return view('admin.rents.edit', compact('rent', 'cars', 'users'));
    }

    public function update(Request $request, RentLog $rent)
    {
        $request->validate([
            'car_selected' => 'required',
            'person_name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $rent->car_id = $request->car_selected;
        $rent->user_id = $request->person_name;
        $rent->start_date = $request->start_date;
        $rent->end_date = $request->end_date;

        $rent->save();
        $request->session()->flash('message', 'Updated successfully!');
        return redirect('rents');
    }

    public function destroy(Request $request, RentLog $rent)
    {
        $rent->delete();
        $request->session()->flash('message', 'Successfully fired the employee!');
        return redirect('rents');
    }
}
