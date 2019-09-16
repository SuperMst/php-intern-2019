<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\RentLog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cars = Car::all();
        return view('home', compact('cars'));
    }
}
