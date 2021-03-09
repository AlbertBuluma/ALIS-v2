@extends("layout")
@section("content")

    <div>
        <ol class="breadcrumb">
          <li><a href="{{ route('user.home') }}">{{trans('messages.home')}}</a></li>
          <li>
            <a href="{{ route('clinicians.index') }}">Clinicians</a>
          </li>
          <li class="active">Create Clinician</li>
        </ol>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading ">
            <span class="glyphicon glyphicon-adjust"></span>
            Create Clinician
        </div>
        <div class="panel-body">
        <!-- if there are creation errors, they will show here -->
            @if($errors->all())
                <div class="alert alert-danger">
                    {{ HTML::ul($errors->all()) }}
                </div>
            @endif

            {{ Form::open(array('route' => 'clinicians.store', 'id' => 'form-create-clinician')) }}

                <div class="form-group">
                    {{ Form::label('name', Lang::choice('messages.name',1)) }}
                    {{ Form::text('name', old('name'), array('class' => 'form-control')) }}
                    @if ($errors->has('name'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('cadre', "Cadre"), array('class' => 'required') }}</label>
                    {{ Form::text('cadre', old('cadre'),
                        array('class' => 'form-control', 'required' => 'required')) }}
                    @if ($errors->has('cadre'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('cadre') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('phone', "Phone") }}</label>
                    {{ Form::text('phone', old('phone'),
                        array('class' => 'form-control')) }}
                    @if ($errors->has('phone'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('email', "Email") }}</label>
                    {{ Form::text('email', old('email'),
                        array('class' => 'form-control')) }}
                </div>
                <div class="form-group actions-row">
                    {{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'),
                        array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
                </div>

            {{ Form::close() }}
        </div>
    </div>
@stop
