@extends('layouts.master')

@section('content')

<div id="content2">
    <div class="float-left">
        <ul>
            <li>Brand: {{$car->brand}}</li>
            <li>Model: {{$car->model}}</li>
            <li>Year: {{$car->year}}</li>
            <li>Availability: {{$car->availability}}</li>
        </ul>
    </div>

    <div class="float-right">
    <img src="/storage/images/{{$car->filename}}" alt="Your browser doesn't support this awesome image">
    </div>

    <div class="clearfix"></div>
    <p>{{$car->description}}</p>
</div>
@endsection