@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover">
                    <thead>
                    <td></td>
                    <td>Reward</td>
                    <td></td>
                    </thead>
                    @foreach($userRewards as $reward)
                        <tr>
                            <td style="width: 150px;"><img src="{{asset('img/reward.png')}}" width="60px" height="60px"></td>
                            <td style="font-size: 1.8em; width: 300px;">
                                {{$reward->reward_name}}
                                <br/>
                                <span style="font-size: 0.6em;">{{$reward->reward_description}}</span>
                            </td>
                            <td>
                                {!! Form::open(['url' => url('user/reward/'.$reward->userReward_id), 'method' => 'post']) !!}
                                {!! Form::submit('Redeem', ['class' => 'form-control btn btn-success', 'style'=>'width: 150px;']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection