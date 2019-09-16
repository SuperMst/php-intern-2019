@extends('layout')

@section('title')
Dashboard
@endsection

@section('head')
<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-info card-header-icon">
        <div class="card-icon">
          <i class="material-icons">directions_car</i>
        </div>
        <p class="card-category">Cars in Use</p>
        <h3 class="card-title">{{$cars_in_use->count()}}
          <small>Cars</small>
        </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <a href="{{ URL::to('cars/') }}">View More Info...</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-warning card-header-icon">
        <div class="card-icon">
          <i class="material-icons">people</i>
        </div>
        <p class="card-category">Number of Employees</p>
        <h3 class="card-title">{{$employees->count()}}</h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <a href="{{ URL::to('employees') }}">View More Info...</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i class="material-icons">info</i>
        </div>
        <p class="card-category">Cars in Service</p>
        <h3 class="card-title">{{$cars_in_service}}</h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <a href="{{ URL::to('cars/') }}">View More Info...</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-success card-header-icon">
        <div class="card-icon">
          <i class="material-icons">store</i>
        </div>
        <p class="card-category">Revenue</p>
        <h3 class="card-title">
          {{$revenue}}
          <small>&euro;</small>
        </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">date_range</i> Last 30 Days
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card card-chart">
      <div class="card-header card-header-success">
        <div class="ct-chart"></div>
      </div>
      <div class="card-body">
        <h4 class="card-title">Daily Rents</h4>
        <p class="card-category">
          @if( $rent_day[0] - $rent_day[1] < 0 )
            {{ abs($rent_day[0] - $rent_day[1]) }} less cars rented yesterday.
          @elseif( $rent_day[0] - $rent_day[1] > 0)
            {{ $rent_day[0] - $rent_day[1] }} more cars rented than yesterday.
          @else
            No changes in rent rates compared to yesterday.
          @endif
        </p>
      </div>  
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">access_time</i> Updated {{$updated}}
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-md-12">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title">Most Wanted Cars</h4>
        <p class="card-category">Cars that clients seek the most</p>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-hover">
          <thead class="text-info">
            <th>ID</th>
            <th>Manufacturer</th>
            <th>Model</th>
            <th>Year</th>
            <th class="text-right">Times Rented</th>
            <th class="text-right">In Service</th>
          </thead>
          <tbody>
            @foreach($cars_most_wanted as $car)
            <tr>
              <td>{{$car['id']}}</td>
              <td>{{$car['manufacturer']}}</td>
              <td>{{$car['model']}}</td>
              <td>{{$car['year']}}</td>
              <td class="text-right">{{$car['times_rented']}}</td>
              <td class="text-right">
                @if($car['in_service'])
                Yes
                @else
                No
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-md-12">
    <div class="card">
      <div class="card-header card-header-warning">
        <h4 class="card-title">Employee Stats</h4>
        <p class="card-category">List of most payed employees</p>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-hover">
          <thead class="text-warning">
            <th>ID</th>
            <th>Name</th>
            <th class="text-right">Salary</th>
            <th class="text-right">Job Position</th>
          </thead>
          <tbody>
            @foreach($employees_top as $employee)
            <tr>
              <td>{{$employee['id']}}</td>
              <td>{{$employee['name']}}</td>
              <td class="text-right">{{$employee['salary']}} &euro;/month</td>
              <td class="text-right">{{$employee['position']}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection

@section('footer')
<script>

@switch($day)
    @case("Monday")
      var data = {
          labels: [ 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su', 'Mo'],
          series: [
            [ 
              {{$rent_day[6]}}, 
              {{$rent_day[5]}}, 
              {{$rent_day[4]}}, 
              {{$rent_day[3]}}, 
              {{$rent_day[2]}}, 
              {{$rent_day[1]}}, 
              {{$rent_day[0]}}
            ]
          ]
        };
      @break

    @case("Tuesday")
      var data = {
          labels: [ 'We', 'Th', 'Fr', 'Sa', 'Su', 'Mo', 'Tu'],
          series: [
            [ 
              {{$rent_day[6]}}, 
              {{$rent_day[5]}}, 
              {{$rent_day[4]}}, 
              {{$rent_day[3]}}, 
              {{$rent_day[2]}}, 
              {{$rent_day[1]}}, 
              {{$rent_day[0]}}
            ]
          ]
        };
      @break
    
    @case("Wednesday")
      var data = {
          labels: [ 'Th', 'Fr', 'Sa', 'Su', 'Mo', 'Tu', 'We'],
          series: [
            [ 
              {{$rent_day[6]}}, 
              {{$rent_day[5]}}, 
              {{$rent_day[4]}}, 
              {{$rent_day[3]}}, 
              {{$rent_day[2]}}, 
              {{$rent_day[1]}}, 
              {{$rent_day[0]}}
            ]
          ]
        };
      @break

    @case("Thursday")
      var data = {
          labels: [ 'Fr', 'Sa', 'Su', 'Mo', 'Tu', 'We', 'Th'],
          series: [
            [ 
              {{$rent_day[6]}}, 
              {{$rent_day[5]}}, 
              {{$rent_day[4]}}, 
              {{$rent_day[3]}}, 
              {{$rent_day[2]}}, 
              {{$rent_day[1]}}, 
              {{$rent_day[0]}}
            ]
          ]
        };
      @break

    @case("Friday")
      var data = {
          labels: [ 'Sa', 'Su', 'Mo', 'Tu', 'We', 'Th', 'Fr'],
          series: [
            [ 
              {{$rent_day[6]}}, 
              {{$rent_day[5]}}, 
              {{$rent_day[4]}}, 
              {{$rent_day[3]}}, 
              {{$rent_day[2]}}, 
              {{$rent_day[1]}}, 
              {{$rent_day[0]}}
            ]
          ]
        };
      @break

    @case("Saturday")
      var data = {
          labels: [ 'Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
          series: [
            [ 
              {{$rent_day[6]}}, 
              {{$rent_day[5]}}, 
              {{$rent_day[4]}}, 
              {{$rent_day[3]}}, 
              {{$rent_day[2]}}, 
              {{$rent_day[1]}}, 
              {{$rent_day[0]}}
            ]
          ]
        };
      @break

    @case("Saturday")
      var data = {
          labels: [ 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
          series: [
            [ 
              {{$rent_day[6]}}, 
              {{$rent_day[5]}}, 
              {{$rent_day[4]}}, 
              {{$rent_day[3]}}, 
              {{$rent_day[2]}}, 
              {{$rent_day[1]}}, 
              {{$rent_day[0]}}
            ]
          ]
        };
      @break
    @default
      var data = {
          labels: [ '4 Days Ago', '3 Days Ago', '2 Days Ago', 'Yesterday', 'Today'],
          series: [
            [ 
              {{$rent_day[6]}}, 
              {{$rent_day[5]}}, 
              {{$rent_day[4]}}, 
              {{$rent_day[3]}}, 
              {{$rent_day[2]}}, 
              {{$rent_day[1]}}, 
              {{$rent_day[0]}}
            ]
          ]
        };

@endswitch


new Chartist.Line('.ct-chart', data);
</script>
@endsection
