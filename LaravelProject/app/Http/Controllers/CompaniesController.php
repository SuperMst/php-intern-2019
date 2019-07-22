<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;

class CompaniesController extends Controller
{
    public function index(){
        $companies = Company::all();
        return view('business.companies.companies', compact('companies', $companies));
    }
    public function create(){
        return view('business.companies.create');
    }
    public function store(Request $request){
        $request->validate([
            'companyName' => 'required|min:3',
            'companyDescription' => 'required',
        ]);

        $company = Company::create(['name' => $request->companyName, 'description' => $request->companyDescription]);
        return redirect('/companies');
    }
    public function edit(Company $company){
        return view('business.companies.edit',compact('company',$company));
    }
    public function update(Request $request, Company $company){
        $request->validate([
            'companyName' => 'required|min:3',
            'companyDescription' => 'required',
        ]);

        $company->name = $request->companyName;
        $company->description = $request->companyDescription;
        $company->save();
        return redirect('companies');
    }
    public function destroy(Request $request, Company $company){
        $company->delete();
        return redirect('companies');
    }
}
