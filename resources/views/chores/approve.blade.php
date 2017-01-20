@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @if(Session::has('choreData'))
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">×</a>
                    <i class="fa fa-2x fa-check" style="color: #2ca02c" aria-hidden="true"></i>
                    <strong style="color: #2a88bd">{!! Session::get('choreData')['user'] !!}'s</strong> chore <strong>{!! Session::get('choreData')['chore'] !!}</strong>
                    has been <strong>{!! Session::get('choreData')['status'] !!}</strong>
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                <td>Chore</td>
                <td>User</td>
                <td>Status</td>
                <td>Date Completed</td>
                </thead>
                @foreach($chores as $chore)
                    <tr>
                        <td>{{$chore->name}}</td>
                        <td>{{$chore->user_name}}</td>
                        <td>{{$chore->status}}</td>
                        <td style="width: 180px;">{{$chore->completed_at}}</td>
                        <td style="width: 120px;">
                            {!! Form::open(['url' => url('/admin/chore/approval'), 'method' => 'post']) !!}
                            {!! Form::hidden('chore_id', $chore->id, ['id' => 'chore_id']) !!}
                            {!! Form::hidden('chore_status', 3, ['id' => 'chore_status']) !!}
                            {!! Form::hidden('status', 'APPROVED', ['id' => 'status']) !!}
                            {!! Form::submit('Approve', ['class' => 'form-control btn btn-success']) !!}
                            {!! Form::close() !!}
                        </td>
                        <td style="width: 120px;">
                            {!! Form::open(['url' => url('/admin/chore/approval'), 'method' => 'post']) !!}
                            {!! Form::hidden('chore_id', $chore->id, ['id' => 'chore_id']) !!}
                            {!! Form::hidden('chore_status', 1, ['id' => 'chore_status']) !!}
                            {!! Form::hidden('status', 'REJECTED', ['id' => 'status']) !!}
                            {!! Form::submit('Reject', ['class' => 'form-control btn btn-warning']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
            @if($chores->count() == 0)
                <h2>No Chores to Approve</h2>
            @endif
        </div>
    </div>
@endsection