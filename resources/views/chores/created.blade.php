@extends('app')

@section('css')
    <link href="{{asset('/css/chore.css')}}" rel="stylesheet" type="text/css">

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default chore-card">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <h1 class="text-center">
                        <img src="{{asset('/img/chore_icon.png')}}" width="80px" height="80px">
                        Chore Created!</h1>
                </h3>
            </div>
            <div class="panel-body">
                <table>
                    <tr>

                        <td><img src="{{asset('img/chore_icons')."/".$data->icon_uri.".png"}}"></td>
                        <td><h3>{{$data->name}}</h3></td>
                        <td> has been created. Assign this chore in the <a href="#">Chore Manager</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection