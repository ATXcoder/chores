@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 col-md-offset-3">
                    {!! Form::open(['url' => url('reward/create'), 'method' => 'post']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Chore Name', ['class' => 'control-label']) !!}
                        {!! Form::text('name', '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                        {!! Form::textarea('description', '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group" style="width: 150px;">
                        {!! Form::label('token_cost', 'Token Cost', ['class' => 'control-label']) !!}
                        {!! Form::text('token_cost', '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Save', ['class' => 'form-control btn btn-primary', 'style'=>'width: 250px;']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection