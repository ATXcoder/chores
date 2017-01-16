@extends('app')

@section('css')
    <link href="{{asset('css/home.css')}}" type="text/css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                <div class="panel panel-default">
                    <a href="#">
                        <div class="panel-body">
                            <img src="{{asset('img/chore_list.png')}}" class="center-block">
                            <h2 class="text-center">My Chores</h2>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <a href="#">
                        <div class="panel-body">
                            <img src="{{asset('img/bank.png')}}" class="center-block">
                            <h2 class="text-center">My Bank</h2>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <a href="#">
                        <div class="panel-body">
                            <img src="{{asset('img/store.png')}}" class="center-block">
                            <h2 class="text-center">Reward Store</h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                <div class="panel panel-default">
                    <a href="#">
                        <div class="panel-body">
                            <img src="{{asset('img/leader_board.png')}}" class="center-block">
                            <h2 class="text-center">Score Board</h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection