<table class="table table-hover">
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
                     <span class="av">Available </span>
                    @else
                     <span class="uv">Unavailable </span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $cars->appends(\Request::except('_token'))->render() }}