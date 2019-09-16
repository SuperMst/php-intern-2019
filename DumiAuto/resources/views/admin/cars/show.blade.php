@extends('layout')

@section('title')
Car Info
@endsection

@section('head')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" />
<link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-info">
                <h4 class="card-title ">{{$car->manufacturer}}</h4>
                <p class="card-category">{{$car->model}}</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 pl-5">
                        <h5>Car ID</h5>
                    </div>
                    <div class="col">
                        <p>{{$car->id}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pl-5">
                        <h5>Manufacturing Year</h5>
                    </div>
                    <div class="col">
                        <p>{{$car->year}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pl-5">
                        <h5>VIN</h5>
                    </div>
                    <div class="col">
                        <p>{{$car->vin}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pl-5">
                        <h5>Registration Number</h5>
                    </div>
                    <div class="col">
                        <p>{{$car->registration_number}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pl-5">
                        <h5>Fuel Type</h5>
                    </div>
                    <div class="col">
                        <p class="text-capitalize">{{$car->fuel_type}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pl-5">
                        <h5>Body Style</h5>
                    </div>
                    <div class="col">
                        <p class="text-capitalize">{{$car->body_style}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pl-5">
                        <h5>Gearbox Type</h5>
                    </div>
                    <div class="col">
                        <p class="text-capitalize">{{$car->gearbox_type}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pl-5">
                        <h5>Times Rented</h5>
                    </div>
                    <div class="col">
                        <p>{{$car->times_rented}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pl-5">
                        <h5>In Service</h5>
                    </div>
                    <div class="col">
                        @if($car->in_service)
                        <p class="text-danger">Yes</p>
                        @else
                        <p>No</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pl-5">
                        <h5>Rent Price</h5>
                    </div>
                    <div class="col">
                        <p>{{$car->rent_price}} &euro;/day</p>
                    </div>
                </div>
                <div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-info">
                <h4 class="card-title">Calendar</h4>
                <p class="card-category">When is the car reserved for renting</p>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col col-lg-9">
                    {!! $calendar->calendar() !!}
                    {!! $calendar->script() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('footer')
<!--   Core JS Files   -->

<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap-material-design.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
@endsection