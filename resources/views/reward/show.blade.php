@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-3">
                @if($reward->image_uri != nullOrEmptyString())
                    <!--<img src="{{asset($reward->image_uri)}}">-->
                        <img src="{{asset("/img/reward.png")}}">
                    @else
                        <img src="{{asset("/img/reward.png")}}">
                    @endif
                </div>
                <div class="col-md-8">
                    <h1>{{$reward->name}}</h1>
                    <hr/>
                    <h3>Token Cost: <span style="font-size: 1.5em">{{$reward->token_cost}}</span></h3>
                    <div class="row">
                        <div class="col-md-8">
                            <p>{{$reward->description}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            @if($tokens[0]['tokens'] > $reward->token_cost)
                                {!! Form::open(['url' => url('user/reward'), 'method' => 'post']) !!}
                                {!! Form::hidden('reward_id', $reward->id, ['id' => 'reward_id']) !!}
                                {!! Form::submit('Buy', ['class' => 'form-control btn btn-success', 'style'=>'width: 150px;']) !!}
                                {!! Form::close() !!}
                            @else
                                <input style="width: 150px;" type="button" class="btn btn-danger" disabled="true" value="Not Enough Tokens">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection