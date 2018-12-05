@extends('layouts.master')

@section('content')
<div id="content">
    <div id="srch_form">
       @include('inc.search')
    </div>

    <div id="car_table">
        @if(count($cars) > 0)
        <table class="table table-striped">
            <thead class="thead-dark">
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Availability</th>
            </thead>

            <tbody>
                @foreach($cars as $car)
                    <tr data-id="{{$car->id}}">
                        <td>{{$car->brand}}</td>
                        <td>{{$car->model}}</td>
                        <td>{{$car->year}}</td>
                        <td>
                            @if($car->availability == 1)
                            <span class="av"> Available </span>
                            @else
                            <span class="uv"> Unavailable </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$cars->links()}}
        @endif
    </div>
</div>

@endsection