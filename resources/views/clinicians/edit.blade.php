@extends("layout")
@section("content")

    @if (Session::has('message'))
        <div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
    @endif
    <div>
        <ol class="breadcrumb">
          <li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
          <li>
            <a href="{{ route('clinicians.index') }}">Clinicians</a>
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
                    {{ Form::text('name', old('name'), array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('cadre', "Cadre") }}</label>
                    {{ Form::text('cadre', old('cadre'),
                        array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('phone', "Phone") }}</label>
                    {{ Form::text('phone', old('phone'),
                        array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email', "Email") }}</label>
                    {{ Form::text('email', old('email'),
                        array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('active', "Activate/Deactivate") }}</label>
                   <div>{{ Form::radio('active', '0', true) }}
                    <span class="input-tag">Activate</span></div>
                    <div>{{ Form::radio("active", '1', false) }}
                    <span class="input-tag">Deactivate</span></div>
                </div>
                <div class="form-group actions-row">
                    {{ Form::button('<span class="glyphicon glyphicon-save"></span> '. trans('messages.save'),
                        ['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
                </div>

            {{ Form::close() }}
        </div>
    </div>
@stop
