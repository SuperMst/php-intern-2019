<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group( ['middleware' => ['auth', 'permissions']], function()
    {
        Route::get('/dashboard', 'DashController@index');
        Route::get('cars/search', 'CarController@search');
        Route::resource('cars', 'CarController');
        Route::resource('employees', 'EmployeeController');
        Route::get('rents/search', 'RentLogController@search');
        Route::resource('rents', 'RentLogController');
        Route::resource('/users', 'UserController');
    }
);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
