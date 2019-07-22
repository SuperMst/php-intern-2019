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

    public function delete($id){
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('/employees');
    }

    public function edit($id){
        
        $employee = Employee::find($id);
        $companies = Company::all();

        return view('business.edit',compact('employee','companies'));
    }

    public function update(Request $request, $id){
        $employee = Employee::find($id);
        $request->validate([
            'updatedName' => 'required|min:3',
        ]);
        $employee->name = $request->updatedName;
        $employee->company_id = $request->updatedCompany; 
        $employee->save(); 
        return redirect('employees'); 
    }
}
