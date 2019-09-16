<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Car;
use App\RentLog;
use App\Employee;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        $rents = RentLog::all();
        $revenue = 0;
        $cars_in_use = $rents->where('start_date', '<=', now())->where('end_date', '>=', now());
        $cars_in_service = $cars->where('in_service', '1')->count();
        $cars_revenue = $rents->where('start_date', '<=', now())->where('start_date', '>=', now()->subDays(30));
        foreach($cars_revenue as $rent){
            $start = Carbon::parse($rent->start_date);
            $end = Carbon::parse($rent->end_date);
            $days = $end->diffInDays($start);
            $revenue += $rent->car->rent_price*$days;
        }
        $cars_most_wanted = $cars->map->only(['id','manufacturer','model', 'year','times_rented', 'in_service'])->sortByDesc('times_rented')->forPage(0,4);
        $employees = Employee::all();
        $employees_top = $employees->except(['email'])->sortByDesc('salary')->forPage(0,4);
        $updated = Carbon::now()->format('H:i:s');
        $day = Carbon::now()->format('l');

        $rents_last_week = $rents->where('created_at', '<=', now())->where('created_at', '>=', now()->subDays(7))->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('d-M-y');
        });

        for($i = 0; $i <= 6; $i++){
            if(!(array_key_exists(now()->subDays($i)->format('d-M-y'), $rents_last_week->toArray())))
            {
                $rent_day[$i] = 0;
            }
            else
            {
                $rent_day[$i] = $rents_last_week[now()->subDays($i)->format('d-M-y')]->count();
            }
        }
        
        return view('admin.dashboard', compact('cars_in_use', 'cars_in_service', 'revenue', 'cars_most_wanted', 'employees', 'employees_top', 'updated', 'day', 'rent_day'));
    }
}