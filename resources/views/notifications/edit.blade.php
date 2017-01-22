@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel">
                    <div class="panel-title">
                        <h2>{{$notification->data['title']}}</h2>
                        <hr/>
                    </div>
                    <div class="panel-body">
                        <p style="font-size:1.3em;">{{$notification->data['msg']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection