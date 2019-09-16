@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Our Cars</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                    @foreach($cars as $car)
                    <div class="col-4">
                        <div class="card text-center">
                            <div class="card-header card-header-info">
                                <h5 class="card-title">{{$car->manufacturer}} {{$car->model}} / {{$car->year}}</h5>
                            </div>
                            <div class="card-body">
                                <p>Fuel Type - {{$car->fuel_type}}</p>
                                <p>Gearbox - {{$car->gearbox_type}}</p>
                                <p>Renting Price - {{$car->rent_price}} &euro;/day</p>
                            </div>
                            <div class="card-footer">
                                <a 
                                    href="#" 
                                    data-toggle="modal" 
                                    data-target="#exampleModalCenter"
                                    class="card-link"
                                    data-car="{{ $car }}"
                                >    
                                    Info
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="carId"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection


