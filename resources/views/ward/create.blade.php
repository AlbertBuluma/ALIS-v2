@extends("layout")
@section("content")

    <div>
        <ol class="breadcrumb">
          <li><a href="{{ route('user.home') }}">{{trans('messages.home')}}</a></li>
          <li>
            <a href="{{ route('ward.index') }}">Health Units</a>
          </li>
          <li class="active">Create Health Unit</li>
        </ol>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading ">
            <span class="glyphicon glyphicon-adjust"></span>
            Create Health Unit
        </div>
        <div class="panel-body">
        <!-- if there are creation errors, they will show here -->
            @if($errors->all())
                <div class="alert alert-danger">
                    {{ HTML::ul($errors->all()) }}
                </div>
            @endif

            {{ Form::open(array('route' => 'ward.store', 'id' => 'form-create-ward')) }}

                <div class="form-group">
                    {{ Form::label('name', Lang::choice('messages.name',1)) }}
                    {{ Form::text('name', old('name'), array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('description', trans("messages.description")) }}</label>
                    {{ Form::textarea('description', old('description'),
                        array('class' => 'form-control', 'rows' => '2')) }}
                </div>
{{--                <!-- <div class="form-group">--}}
{{--                    {{ Form::label('ward_type_id',trans("messages.ward-type")) }}--}}
{{--                    {{ Form::select('ward_type_id', $ward_types, null,--}}
{{--                                            array('class' => 'form-control')) }}--}}
{{--                </div> -->--}}
                <div class="form-group actions-row">
                    {{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'),
                        array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
                </div>

            {{ Form::close() }}
        </div>
    </div>
@stop
