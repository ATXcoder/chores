@extends('app')

@section('css')
    <link href="{{asset('css/home.css')}}" type="text/css" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default">
                <a href="{{url('/admin/chore/new')}}">
                    <div class="panel-body">
                        <img src="{{asset('img/new_chore.png')}}" class="center-block">
                        <h2 class="text-center">Create New Chore</h2>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <a href="{{url('/admin/chore/assign')}}">
                    <div class="panel-body">
                        <img src="{{asset('img/assign_chore.png')}}" class="center-block">
                        <h2 class="text-center">Assign Chore</h2>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <a href="{{url('/admin/user')}}">
                    <div class="panel-body">
                        <img src="{{asset('img/users.png')}}" class="center-block">
                        <h2 class="text-center">Manage Accounts</h2>
                    </div>
                </a>
            </div>
        </div>
    </div>
    </div>
@endsection