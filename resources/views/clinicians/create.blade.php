@extends("layout")
@section("content")

    <div>
        <ol class="breadcrumb">
          <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
          <li>
            <a href="{{ URL::route('clinicians.index') }}">Clinicians</a>
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
                    {{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'), 
                        array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
                </div>

            {{ Form::close() }}
        </div>
    </div>
@stop
