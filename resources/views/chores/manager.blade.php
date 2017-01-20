<!-- Chore Management view -->
@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <a href="{{url('/admin/chore/report')}}">
                            <div class="panel-body">
                                <img src="{{asset('img/chore_report.png')}}" class="center-block">
                                <h2 class="text-center">Chore Report</h2>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-default">
                        <a href="{{url('/admin/chore/new')}}">
                            <div class="panel-body">
                                <img src="{{asset('img/new_chore.png')}}" class="center-block">
                                <h2 class="text-center">Create Chore</h2>
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
                        <a href="{{url('/admin/user/chore')}}">
                            <div class="panel-body">
                                <img src="{{asset('img/chore_manage.png')}}" class="center-block">
                                <h2 class="text-center">Assigned Chores</h2>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-default">
                        <a href="{{url('/admin/chore/edit')}}">
                            <div class="panel-body">
                                <img src="{{asset('img/settings.png')}}" class="center-block">
                                <h2 class="text-center">Edit Chores</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection