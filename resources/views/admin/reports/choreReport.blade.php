@extends('app')

@section('content')
    <!-- Check to see if we have data to show -->
    @if(empty($data))
        <h1>No data</h1>
    @else
        <h1>{{$data[0]['user']->name}}</h1>
    @endif
@endsection