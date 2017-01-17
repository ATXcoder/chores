<!-- Assign Chores view -->
@extends('app')

@section('css')
    <link href="{{asset('css/home.css')}}" type="text/css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @if(Session::has('chore'))
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">×</a>
                    <i class="fa fa-2x fa-check" style="color: #2ca02c" aria-hidden="true"></i>
                    <strong style="color: #2a88bd">{!!Session::get('chore.user')!!}</strong> has been assigned the chore
                    <strong style="color: #2a88bd">{!!Session::get('chore.chore')!!}</strong>
                </div>
            @endif
            <div class="col-md-5">
                <h2>Assign Chore</h2>
                {!! Form::open(['url' => 'admin/chore/assign', 'method' => 'post']) !!}
                <div class="form-group">
                    {!! Form::label('assignee', 'Assign chore to', ['class' => 'control-label']) !!}
                    {!! Form::select('assignee', $data['users'], null , ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('chore', 'Chore', ['class' => 'control-label']) !!} 
                    {!! Form::select('chore', $data['chores'] , null , ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('due', 'Complete chore by', ['class' => 'control-label']) !!}
                    {!! Form::date('due', \Carbon\Carbon::now()) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Assign Chore', ['class' => 'form-control btn btn-success', 'style'=>'width: 250px;']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
