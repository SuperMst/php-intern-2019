@extends('layout')

@section('title')
Edit Rent Info
@endsection

@section('head')
<link href="../../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-5 col-md-12">
        <div class="card">
            <div class="card-header card-header-info">
                <h4 class="card-title">Edit Rent Info</h4>
                <p class="card-category">Edit details about a rent</p>
            </div>
            <div class="card-body table-responsive">
                <form action="{{url('rents', [$rent->id])}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="person_name">Person Renting</label>
                            <select class="selectpicker" data-live-search="true" name="person_name" id="person_name">
                                @foreach ($users as $person)
                                    @if ($person->id === $rent->user_id)
                                    <option value="{{$person->id}}" selected>{{$person->name}}</option>
                                    @else
                                    <option value="{{$person->id}}">{{$person->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="car_selected">Car Rented</label>
                            <select class="selectpicker" data-live-search="true" name="car_selected" id="car_selected">
                                @foreach ($cars as $car)
                                    @if ($car->id === $rent->car_id)
                                    <option value="{{$car->id}}" selected>{{$car->manufacturer}} {{$car->model}}</option>
                                    @else
                                    <option value="{{$car->id}}">{{$car->manufacturer}} {{$car->model}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            {!! Form::label('start_date', 'Start Date') !!}
                            {!! Form::date('start_date', $rent->start_date, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-12 col-md-6">
                            {!! Form::label('end_date', 'End Date') !!}
                            {!! Form::date('end_date', $rent->end_date, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="float-right">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
<!--   Core JS Files   -->
<script src="../../assets/js/core/jquery.min.js"></script>
<script src="../../assets/js/core/popper.min.js"></script>
<script src="../../assets/js/core/bootstrap-material-design.min.js"></script>
<script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../../assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>
@endsection