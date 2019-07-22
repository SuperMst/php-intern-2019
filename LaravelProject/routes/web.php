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

Route::get('/about', 'AboutController@index');

Route::get('/employees', 'EmployeesController@show');
Route::post('/employeeCreate', 'EmployeesController@create');
Route::delete('/employeeDelete/{id}', 'EmployeesController@delete')
        ->name('employee.delete');
Route::get('/employeeEdit/{id}', 'EmployeesController@edit')
        ->name('employee.edit');
Route::put('/employeeEdit/{id}/submit', 'EmployeesController@update')
        ->name('employee.submit');

Route::resource('companies', 'CompaniesController');