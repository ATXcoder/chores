@extends('app')

@section('ontent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                {!! Form::open(['url' => '/admin/user/new', 'method' => 'post']) !!}
                	
                {!! Form::close() !!}
            </div>
        </div>
    </div>    
@endsection