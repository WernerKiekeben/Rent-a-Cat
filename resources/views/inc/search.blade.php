{!!Form::open(['class' => 'form-inline form-group', 'method' => 'get', 'id' => '#form'])!!}
    <div class="form-group mx-2">
        {{Form::label('brand','Brand:', ['class' => 'form-label'])}}
        {{Form::text('brand', '', ['class' => 'form-control'])}}
    </div>

    <div class="form-group mx-2">
        {{Form::label('model', 'Model:', ['class' => 'form-label'])}}
        {{Form::text('model','', ['class' => 'form-control'])}}
    </div>

    <div class="form-group mx-2">
        {{Form::label('year', 'Year:', ['class' => 'form-label'])}}
        {{Form::number('year',2000 , ['class' => 'form-control'])}}
    </div>

    <div class="form-group mx-2">
        {{Form::label('available', 'Available:', ['class' => 'form-label', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Check to show only the cars that are available'])}}
        {{Form::checkbox('available','1', ['class' => 'form-control'])}}
    </div>

    {{Form::token()}}

    <div class="form-group mx-2">
        {{Form::submit('Search', ['class' => 'btn btn-primary', 'id' => 's-form'])}}
    </div>
{!!Form::close()!!}