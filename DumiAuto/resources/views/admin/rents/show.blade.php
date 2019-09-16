@extends('layout')

@section('title')
Renting Info
@endsection

@section('head')
<link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-info">
                <h4 class="card-title ">{{$rent->user->name}}</h4>
                <p class="card-category">{{$rent->car->manufacturer}} {{$rent->car->model}} {{$rent->car->year}}</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 pl-5">
                        <h5>Renting ID</h5>
                    </div>
                    <div class="col">
                        <p>{{$rent->id}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pl-5">
                        <h5>Person Email</h5>
                    </div>
                    <div class="col">
                        <p>{{$rent->user->email}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pl-5">
                        <h5>Rent Duration</h5>
                    </div>
                    <div class="col">
                        <p>{{$days}} day(s)</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pl-5">
                        <h5>Car Times Rented</h5>
                    </div>
                    <div class="col">
                        <p>{{$rent->car->times_rented}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pl-5">
                        <h5>Rent Price</h5>
                    </div>
                    <div class="col">
                        <p>{{$rent->car->rent_price}} &euro;/day</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('footer')
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap-material-design.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
@endsection