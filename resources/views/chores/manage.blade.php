<!--
Manage chores (Edit, Delete, etc)
Controller: ChoreController
-->
@extends('app')

@section('css')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <td style="border-top: hidden; border-left: hidden;"></td>
                    <td>Chore</td>
                    <td>Description</td>
                    <td>Token Value</td>
                    <td>Active</td>
                    </thead>
                    @foreach($chores as $chore)
                        <tr>
                            <td><a class="btn btn-primary" href="{{url('/admin/chore/edit/'.$chore->id)}}"/>Edit</td>
                            <td>{{$chore->name}}</td>
                            <td>{{$chore->description}}</td>
                            <td>{{$chore->token_value}}</td>
                            @if($chore['active'] == 0)
                                <td><i class="fa fa-times-circle fa-2x" aria-hidden="true" style="color: #ac2925"></i></td>
                            @else
                                <td><i class="fa fa-check-circle fa-2x" aria-hidden="true" style="color: #2ca02c"></i></td>
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection