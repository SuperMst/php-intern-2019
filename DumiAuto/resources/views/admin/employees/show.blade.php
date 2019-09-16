@extends('layout')

@section('title')
Employee Info
@endsection

@section('head')
<link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-info">
                <h4 class="card-title ">{{$employee->name}}</h4>
                <p class="card-category">{{$employee->position}}</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 pl-5">
                        <h5>Employee ID</h5>
                    </div>
                    <div class="col">
                        <p>{{$employee->id}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pl-5">
                        <h5>Email</h5>
                    </div>
                    <div class="col">
                        <p>{{$employee->email}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pl-5">
                        <h5>Position</h5>
                    </div>
                    <div class="col">
                        <p>{{$employee->position}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pl-5">
                        <h5>Salary</h5>
                    </div>
                    <div class="col">
                        <p>{{$employee->salary}} &euro;/month</p>
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