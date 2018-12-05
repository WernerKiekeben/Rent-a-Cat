@extends('layouts.master')

@section('content')
    <h1>Welcome to Rent-a-Car</h1>

    {{-- create new row every 4 cars --}}

<div class="row">
    @foreach($cars as $car)
        <div class="col-sm-6 col-lg-4-offset-1 col-xl-3">
            <div class="card">
                <div class="w">
                    <input type="hidden" name="brand" value="{{$car->brand}}">
                    <input type="hidden" name="model" value="{{$car->model}}">
                    <input type="hidden" name="year" value="{{$car->year}}">
                    <input type="hidden" name="availability" value="{{$car->availability}}">
                    <a data-toggle="modal" href="#modal">
                        <img class="card-img-top" src="/storage/images/{{$car->filename}}" alt="Card image cap">
                    </a>
                </div>
                <div class="card-body">
                    <p class="card-text"> {{$car->description}} </p>
                </div>
            </div>
        </div>
    @endforeach
</div>



<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Car info</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <ul id="list"></ul>
                    </div>
                    <div class="col">
                        <img id="image" src="">
                    </div>
                </div>
                <br>
                <p id="description"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>

@endsection