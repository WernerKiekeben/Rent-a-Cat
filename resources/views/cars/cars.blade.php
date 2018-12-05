@extends('layouts.master')

@section('content')
<div id="content">
    <div id="srch_form">
       @include('inc.search')
    </div>

    <div id="car_table">
        @if(count($cars) > 0)
            @include('cars.table')
        @endif
    </div>
</div>

@endsection