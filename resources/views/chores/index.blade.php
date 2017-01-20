@extends('app')

@section('script')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <thead>
                    <td></td>
                    <td>Chore</td>
                    <td>Due Date</td>
                    </thead>
                    @foreach($chores as $chore)
                    <tr>
                        @if($chore->status == "Active")
                        <td style="width: 220px;" class="text-center">
                            {!! Form::open(['url' => url('/user/chore/')."/".$chore->id, 'method' => 'post']) !!}

                            {!! Form::hidden('id', $chore->id, ['id' => 'id']) !!}
                            {!! Form::hidden('newStatus', 2, ['id' => 'newStatus']) !!}

                            {!! Form::submit('Finish Chore', ['class' => 'form-control btn', 'style' =>"background-color: #20895e; color:#ffffff; font-weight: bold; width: 120px;"]) !!}
                            {!! Form::close() !!}
                        </td>
                        @elseif($chore->status == "Complete")
                        <td class="text-center" style="background-color: #20895e; font-weight: bold; color: #ffffff;">
                            {{$chore->status}}
                        </td>
                        @else
                        <td class="text-center" style="background-color: #ffff00; font-weight: bold; color: #000000;">
                            {{$chore->status}}
                        </td>
                        @endif
                        <td>{{$chore->name}}</td>
                        <td>{{$chore->due_date}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection