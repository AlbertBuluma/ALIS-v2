@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
		  <li><a href="{{ URL::route('unhls_patient.index') }}">{{ Lang::choice('messages.patient',2)}}</a></li>
		  <li class="active">{{trans('messages.edit-patient')}}</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-edit"></span>
			{{trans('messages.edit-patient-details')}}
		</div>
		<div class="panel-body">
        	@if(count($errors->all()))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
			
			{{ Form::model($patient, array('route' => array('unhls_patient.update', $patient->id), 'method' => 'PUT',
				'id' => 'form-edit-patient')) }}

				<div class="form-group">
					{{ Form::label('patient_number', trans('messages.patient-number')) }}
					{{ Form::text('patient_number', old('patient_number'), 
						array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('nin', trans('messages.national-id')) }}
					{{ Form::text('nin', old('nin'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('ulin', 'Lab No.') }}
					{{ Form::text('ulin', old('ulin'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('name', Lang::choice('messages.name',1)) }}
					{{ Form::text('name', old('name'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('dob', trans('messages.date-of-birth'), ['class' => 'required']) }}
					{{ Form::text('dob', old('dob'), array('class' => 'form-control  input-sm', 'size' => '11')) }}
				</div>
				<div class="form-group">
					<label class='required' for="age">Age</label>
					<input type="text" name="age" id="age" class="form-control input-sm" size="11">
					<select name="age_units" id="id_age_units" class="form-control input-sm">
						<option value="Y">Years</option>
						<option value="M">Months</option>
						<option value="D">Days</option>
					</select>
				</div>


                <div class="form-group">
                    {{ Form::label('gender', trans('messages.gender')) }}
                    <div>{{ Form::radio('gender', '0', true) }}
                    	<span class="input-tag">{{trans('messages.male')}}</span></div>
                    <div>{{ Form::radio("gender", '1', false) }}
                    	<span class="input-tag">{{trans('messages.female')}}</span></div>
                </div>
				<div class="form-group">
					{{ Form::label('address', trans('messages.physical-address')) }}
					{{ Form::text('address', old('address'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('village_residence', trans('messages.residence-village'), array('class' => 'required')) }}
					{{ Form::text('village_residence', old('village_residence'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('village_workplace', trans('messages.workplace-village')) }}
					{{ Form::text('village_workplace', old('village_workplace'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('occupation', trans('messages.occupation')) }}
					{{ Form::text('occupation', old('occupation'), array('class' => 'form-control')) }}
				<div class="form-group">
					{{ Form::label('phone_number', trans('messages.phone-number'), array('class' => 'required')) }}
					{{ Form::text('phone_number', old('phone_number'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('email', trans('messages.email-address')) }}
					{{ Form::email('email', old('email'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group actions-row">
					{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.trans('messages.save'),
						 array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>
@stop	



