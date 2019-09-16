@extends('layout')

@section('title')
Employee List
@endsection

@section('navbar')
<li class="nav-item">
    <a class="nav-link" href="{{ URL::to('employees/create') }}">
        <i class="material-icons">add_box</i> Add Employee
    </a>
</li>
@endsection

@section('content')
<table class="table">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Position</th>
            <th class="text-right">Salary</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td class="text-center">{{$employee->id}}</td>
            <td>{{$employee->name}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->position}}</td>
            <td class="text-right">{{$employee->salary}} &euro;/month</td>
            <td class="td-actions text-right">
                <a href="{{ URL::to('employees/' . $employee->id)}}">
                    <button type="button" rel="tooltip" class="btn btn-info btn-round">
                        <i class="material-icons">person</i>
                    </button>
                </a>
                <a href="{{ URL::to('employees/' . $employee->id . '/edit') }}">
                    <button type="button" rel="tooltip" class="btn btn-success btn-round">
                        <i class="material-icons">edit</i>
                    </button>
                </a>
                <form class="d-inline" action="{{url('employees', [$employee->id])}}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" rel="tooltip" class="btn btn-danger btn-round">
                        <i class="material-icons">close</i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection