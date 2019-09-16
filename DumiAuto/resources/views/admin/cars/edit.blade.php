@extends('layout')

@section('title')
Edit Car
@endsection

@section('head')
<link href="../../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-5 col-md-12">
        <div class="card">
            <div class="card-header card-header-info">
                <h4 class="card-title">Edit Car</h4>
                <p class="card-category">Edit details about an already existing car</p>
            </div>
            <div class="card-body table-responsive">
                <form action="{{url('cars', [$car->id])}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group col-12">
                        <label for="manufacturer">Car Manufacturer</label>
                        <input type="text" value="{{$car->manufacturer}}" class="form-control" id="manufacturer" name="manufacturer">
                    </div>
                    <div class="form-group col-12">
                        <label for="model">Car Model</label>
                        <input type="text" value="{{$car->model}}" class="form-control" id="model" name="model">
                    </div>
                    <div class="form-group col-12">
                        <label for="year">Year</label>
                        <input type="text" value="{{$car->year}}" class="form-control" id="year" name="year">
                    </div>
                    <div class="form-group col-12">
                        <label for="rent_price">Rent Price</label>
                        <input type="text" value="{{$car->rent_price}}" class="form-control" id="rent_price" name="rent_price">
                    </div>
                    
                        <div class="form-group col-12">
                            <label for="in_service">In Service</label>
                            <input type="text" value="{{$car->in_service}}" class="form-control" id="in_service" name="in_service">
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
@endsection