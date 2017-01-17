@extends('app')

@section('script')
    <script src="{{asset('js/user.js')}}"></script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @if(Session::has('user'))
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">×</a>
                    <i class="fa fa-2x fa-check" style="color: #2ca02c" aria-hidden="true"></i>
                    <strong style="color: #2a88bd">{!!Session::get('user')!!}'s</strong> profile has been updated
                </div>
            @endif
            <div class="col-md-3">
                {!! Form::open(['url' => url('admin/user/')."/".$data->id , 'method' => 'post', 'files' => true]) !!}
                <img data-src="holder.js/140x140"
                     @if($data->avatar_uri != null)
                     src="{{asset($data->avatar_uri)}}"
                     @else
                     src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTlhOWZmYzIzOSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1OWE5ZmZjMjM5Ij48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1LjUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4="
                     @endif
                     class="center-block img-circle"
                     width="140px"
                     height="140px">
                {!! Form::file('image') !!}
            </div>

            <div class="col-md-5">
                {!! Form::hidden('userID', $data->id, ['id' => 'id']) !!}
                <div class="form-group">
                    {!! Form::label('Name', 'Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name', $data->name, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Username', 'Username', ['class' => 'control-label']) !!}
                    {!! Form::text('username', $data->username, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                    {!! Form::text('email', $data->email, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Admin', 'Admin', ['class' => 'control-label']) !!}
                    <label>
                        {!! Form::checkbox('is_admin', '0', $data->is_admin,  ['id' => 'is_admin']) !!}
                    </label>
                </div>
                <div class="form-group">
                    {!! Form::submit('Update', ['class' => 'form-control btn btn-success', 'style'=>'width: 300px;']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection