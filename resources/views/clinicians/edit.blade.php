@extends("layout")
@section("content")

    @if (Session::has('message'))
        <div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
    @endif
    <div>
        <ol class="breadcrumb">
          <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
          <li>
            <a href="{{ URL::route('clinicians.index') }}">Clinicians</a>
          </li>
          <li class="active">Edit Clinician</li>
        </ol>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading ">
            <span class="glyphicon glyphicon-edit"></span>
            Edit Clinician
        </div>
        <div class="panel-body">
            @if($errors->all())
                <div class="alert alert-danger">
                    {{ HTML::ul($errors->all()) }}
                </div>
            @endif
            {{ Form::model($clinician, array('route' => array('clinicians.update', $clinician->id), 
                'method' => 'PUT', 'id' => 'form-edit-clinician')) }}
                <div class="form-group">
                    {{ Form::label('name', Lang::choice('messages.name',1)) }}
                    {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('cadre', "Cadre") }}</label>
                    {{ Form::text('cadre', Input::old('cadre'), 
                        array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('phone', "Phone") }}</label>
                    {{ Form::text('phone', Input::old('phone'), 
                        array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email', "Email") }}</label>
                    {{ Form::text('email', Input::old('email'), 
                        array('class' => 'form-control')) }}
                </div>
                <div class="form-group actions-row">
                    {{ Form::button('<span class="glyphicon glyphicon-save"></span> '. trans('messages.save'), 
                        ['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
                </div>

            {{ Form::close() }}
        </div>
    </div>
@stop
