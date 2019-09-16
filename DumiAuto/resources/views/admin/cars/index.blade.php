@extends('layout')

@section('title')
Car List
@endsection

@section('head')
<link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
@endsection

@section('navbar')
<form class="navbar-form" action="{{ URL::to('cars/search') }}" method="GET">
    <div class="input-group no-border">
        <input type="search" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search...">
        <button type="submit" class="btn btn-white btn-round btn-just-icon">
            <i class="material-icons">search</i>
            <div class="ripple-container"></div>
        </button>
    </div>
</form>
<li class="nav-item">
    <a class="nav-link" href="{{ URL::to('cars/create') }}">
        <i class="material-icons">add_box</i> Add Car
    </a>
</li>
@endsection

@section('content')
<table class="table">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Manufacturer</th>
            <th>Model</th>
            <th>Year</th>
            <th class="text-right">Rent Price</th>
            <th class="text-right">Times Rented</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
        @if($car->in_service)
        <tr class="bg-warning">
            @elseif($car->in_use)
        <tr class="bg-info">
            @else
        <tr>
            @endif
            <td class="text-center">{{$car->id}}</td>
            <td>{{$car->manufacturer}}</td>
            <td>{{$car->model}}</td>
            <td>{{$car->year}}</td>
            <td class="text-right">{{$car->rent_price}} &euro;/day</td>
            <td class="text-right">{{$car->times_rented}}</td>
            <td class="td-actions text-right">
                <a href="{{ URL::to('cars/' . $car->id)}}">
                    <button type="button" rel="tooltip" class="btn btn-info btn-round">
                        <i class="material-icons">directions_car</i>
                    </button>
                </a>
                <a href="{{ URL::to('cars/' . $car->id . '/edit') }}">
                    <button type="button" rel="tooltip" class="btn btn-success btn-round">
                        <i class="material-icons">edit</i>
                    </button>
                </a>
                <form class="d-inline" action="{{url('cars', [$car->id])}}" method="POST">
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