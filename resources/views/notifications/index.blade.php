@extends('app')

@section('css')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover">
                    <thead>
                    <td></td>
                    <td>Title</td>
                    <td>Created At</td>
                    </thead>
                    @foreach($notifications as $notification)
                        <tr>

                            @if($notification->read_at == " " || $notification->read_at == null)
                                <td style="width: 100px;"><i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i></td>
                            @else
                                <td style="width: 100px;"><i class="fa fa-envelope-open-o fa-2x" aria-hidden="true"></i></td>
                            @endif
                            <td><a href="{{url('/notification/')."/".$notification->id}}">{{$notification->data['title']}}</a></td>
                            <td>{{$notification->created_at}}</td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection