@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @foreach($rewards as $reward)
                    <div class="col-md-3 text-center" style="margin-bottom: 45px;">
                        <a href="{{asset('reward/')."/".$reward->id}}">
                            <img src="{{asset('img/reward.png')}}" width="120px" height="120px">
                            <br/>
                            <h3>{{$reward->name}}</h3>
                            <p style="font-size: 1.3em;">Tokens: {{$reward->token_cost}}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection