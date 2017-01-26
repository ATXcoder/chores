@extends('app')

@section('css')
    <link href="{{asset('css/chore.css')}}" type="text/css" rel="stylesheet">
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            /**
             * Highlight icon when editing
             * a chore.
             */
            var icon = <?php echo $icon; ?>;
            if(icon) {
                $('#' + icon).addClass('chore_icon_active');
                $('#icon_uri').val(icon);
            }


            /**
             * Update icon background and
             * set icon_uri in form
             */
            $("#chore_icons div").click(function(){
                $("#chore_icons div").removeClass('chore_icon_active');
                $(this).addClass('chore_icon_active');
                $('#icon_uri').val(this.id);
            });
        });
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('chores.chore_icons')
            <div class="col-md-5">
                {!! Form::open(['url' => '/admin/chore/edit/'.$chore->id, 'method' => 'post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name', $chore->name, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::hidden('icon_uri', '', ['id' => 'icon_uri']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', $chore->description, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('token_value', 'Token Value', ['class' => 'control-label']) !!}
                    {!! Form::text('token_value', $chore->token_value, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>
                    	{!! Form::checkbox('active', $chore->active, $chore->active,  ['id' => 'active']) !!}
                    	Active
                    </label>
                </div>
                {!! Form::submit('Update', ['class' => 'form-control btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection