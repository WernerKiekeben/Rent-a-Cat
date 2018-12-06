@extends('layouts.master')

@section('content')

<div id="content2">
    <a class="btn btn-secondary" href="{{url()->previous()}}">Go Back</a>
    <hr>
    <div class="float-left">
        <ul>
            <li>Brand: {{$car->brand}}</li>
            <li>Model: {{$car->model}}</li>
            <li>Year: {{$car->year}}</li>
            <li>Available: 
                @if($car->availability == 1)
                    <span class="av"> Yes </span>
                @else
                    <span class="uv"> No </span>
                @endif
            </li>
        </ul>
    </div>

    <div class="float-right">
    <img src="/storage/images/{{$car->filename}}" alt="Your browser doesn't support this awesome image">
    </div>

    <div class="clearfix"></div>
    <p>{{$car->description}}</p>
</div>
@endsection