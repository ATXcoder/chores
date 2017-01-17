@extends('app')

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#filter').change(function () {
                $('#filterForm').submit();
            });
        });
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                {!! Form::open(['url' => '/admin/chore/report', 'method' => 'post', 'id'=>'filterForm']) !!}
                {!! Form::label('filter', 'Filter', ['class' => 'control-label']) !!}
                {!! Form::select('filter', $filter , $selected , ['class' => 'form-control','id'=>'filter']) !!}
                {!! Form::close() !!}
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
                                        <td>NO</td>
                                    @else
                                        <td>YES</td>
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