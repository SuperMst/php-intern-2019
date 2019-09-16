<?php

namespace App\Http\Controllers;

use App\Car;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Illuminate\Http\Request;
use App\RentLog;
use DateInterval;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return view('admin.cars.index',compact('cars'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $cars = Car::all()->where('manufacturer', 'like', $search);

        return view('admin.cars.index',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'manufacturer' => 'required|min:2',
            'model' => 'required|min:2',
            'year' => 'required|numeric|min:1900|max:2020',
            'rent_price' => 'required|numeric|min:1|max:100',
        ]); 

        $car = Car::create(['manufacturer' => $request->manufacturer, 
                            'model' => $request->model, 
                            'year' => $request->year, 
                            'rent_price' => $request->rent_price
                            ]);
        return redirect('cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        $rents = RentLog::all()->where('car_id', $car->id);
        $rent_list = [];
        foreach($rents as $rent){
            $rent_list[] = Calendar::event(
                'Rented',
                false,
                date('Y-m-d H:i:s',strtotime('+8 hour',strtotime($rent->start_date))),
                date('Y-m-d H:i:s',strtotime('+23 hour',strtotime($rent->end_date))),
            ); 
        }

        $calendar = Calendar::addEvents($rent_list);
         
        return view('admin.cars.show', compact('car', 'calendar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car', $car));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'manufacturer' => 'required|min:2',
            'model' => 'required|min:2',
            'year' => 'required|numeric|min:1900|max:2020',
            'rent_price' => 'required|numeric|min:1|max:100',
            'in_service' => 'required|numeric|min:0|max:1',
        ]); 

        $car->manufacturer = $request->manufacturer;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->rent_price = $request->rent_price;
        $car->in_service = $request->in_service;
      
        $car->save();
        $request->session()->flash('message', 'Updated successfully!');
        return redirect('cars'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Car $car)
    {
        $car->delete();
        $request->session()->flash('message', 'Car was successfully removed!');
        return redirect('cars');
    }
}
