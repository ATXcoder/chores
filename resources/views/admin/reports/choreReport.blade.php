@extends('app')

@section('script')
    <!--
    <script type="text/javascript">
        $(document).ready(function () {
            $('#filter').change(function () {
                $('#filterForm').submit();
            });
        });
    </script>
    -->
@endsection

@section('css')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-heading">
                        <h2 class="panel-title">Report Filter</h2>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['url' => '/admin/chore/report', 'method' => 'post', 'id'=>'filterForm']) !!}

                        {!! Form::label('filterUsers', 'User', ['class' => 'control-label']) !!}
                        {!! Form::select('filterUsers', $filterUsers ,null, ['class' => 'form-control']) !!}

                        {!! Form::label('filter', 'Date', ['class' => 'control-label']) !!}
                        {!! Form::select('filter', $filter , $selected , ['class' => 'form-control','id'=>'filter']) !!}

                        {!! Form::submit('Submit', ['class' => 'form-control btn btn-primary', 'style'=>'width: 200px; margin-top: 10px;']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
            <div class="row">
                <!-- Check to see if we have data to show -->
                <div class="col-md-11">
                    @if(empty($data))
                        <h1>No data</h1>
                        <p>This filter contains no data. Please select another filter.</p>
                    @else
                        <table class="table table-striped table-hover">
                            <thead>
                            <td>User</td>
                            <td>Date Assigned</td>
                            <td>Chore</td>
                            <td>Due Date</td>
                            <td>Completed</td>
                            </thead>
                            @foreach($data as $d)

                                <tr>
                                    <td>{{$d['user']->name}}</td>
                                    <td>{{$d['date_assigned']}}</td>
                                    <td>{{$d['chore']->name}}</td>
                                    <td>{{$d['due_date']}}</td>
                                    @if($d['complete'] == 0)
                                        <td><i class="fa fa-times-circle fa-2x" aria-hidden="true" style="color: #ac2925"></i></td>
                                    @else
                                        <td><i class="fa fa-check-circle fa-2x" aria-hidden="true" style="color: #2ca02c"></i></td>
                                    @endif

                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection