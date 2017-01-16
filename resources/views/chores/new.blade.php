@extends('app')

@section('css')
    <link href="{{asset('css/chore.css')}}" type="text/css" rel="stylesheet">
@endsection

@section('script')
    <script src="{{asset('js/chore.js')}}" type="text/javascript"></script>
@endsection

@section('content')
    @include('chores.chore_icons')

    <!-- FORM -->
    <div class="col-md-6">
        {!! Form::open(['url' => 'chore/new']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Chore Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', "", ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::hidden('icon_uri', '', ['id' => 'icon_uri']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}

            {!! Form::textarea('description', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('token_value', 'Chore Token Value', ['class' => 'control-label']) !!}
            {!! Form::text('token_value', '', ['class' => 'form-control']) !!}
            <span id="helpBlock"
                  class="help-block">The amount of tokens a child receives for completing this chore</span>
        </div>
        <div class="form-group col-md-offset-3" style="width: 300px;">
            {!! Form::submit('Create Chore', ['class' => 'form-control btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>


@endsection