<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;

class EmployeesController extends Controller
{
    public function show(){
        $employees = Employee::join('companies','employees.company_id', '=', 'companies.id')
                                ->select('employees.*', 'companies.name AS company_name')
                                ->get();

        $companies = Company::all();

        return view('business.employees',compact('employees','companies'));
    }

    public function create(Request $request){
        $requestData = $request->all();
        
        $employee = new Employee();
        $employee->name = $requestData['name'];
        $employee->company_id = $requestData['company_id'];
        
        $employee->save();
        return back();
    }
}
