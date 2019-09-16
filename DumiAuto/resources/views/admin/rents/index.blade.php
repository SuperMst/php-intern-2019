@extends('layout')

@section('title')
Rent List
@endsection

@section('head')
<link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
@endsection

@section('navbar')
<form class="navbar-form" action="{{ URL::to('rents/search') }}" method="GET">
    <div class="input-group no-border">
        <input type="search" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search...">
        <button type="submit" class="btn btn-white btn-round btn-just-icon">
            <i class="material-icons">search</i>
            <div class="ripple-container"></div>
        </button>
    </div>
</form>

<li class="nav-item">
    <a class="nav-link" href="{{ URL::to('rents/create') }}">
        <i class="material-icons">add_box</i> Add Rent
    </a>
</li>
@endsection

@section('content')
<table class="table">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Person Renting</th>
            <th>Car Rented</th>
            <th class="text-right">Start Date</th>
            <th class="text-right">End Date</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rents as $rent)
        <tr>
            <td class="text-center">{{$rent->id}}</td>
            <td>{{$rent->user->name}}</td>
            <td>{{$rent->car->manufacturer}} {{$rent->car->model}}</td>
            <td class="text-right">{{$rent->start_date}}</td>
            <td class="text-right">{{$rent->end_date}}</td>
            <td class="td-actions text-right">
                <a href="{{ URL::to('rents/' . $rent->id)}}">
                    <button type="button" rel="tooltip" class="btn btn-info btn-round">
                        <i class="material-icons">chrome_reader_mode</i>
                    </button>
                </a>
                <a href="{{ URL::to('rents/' . $rent->id . '/edit') }}">
                    <button type="button" rel="tooltip" class="btn btn-success btn-round">
                        <i class="material-icons">edit</i>
                    </button>
                </a>
                <form class="d-inline" action="{{url('rents', [$rent->id])}}" method="POST">
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

@section('footer')
<!--   Core JS Files   -->

<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap-material-design.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
@endsection