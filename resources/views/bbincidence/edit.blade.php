
	@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{route('user.home')}}}">{{trans('messages.home')}}</a></li>
		  <li><a href="{{ route('bbincidence.index') }}">BB Incidents</a></li>
		  <li class="active">Editing BB Incident</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-edit"></span>
			Editing BB Incident

			<a class="btn btn-sm btn-info" href="{{ route('bbincidence.edit', array($previousbbincidence)) }}" >
				<span class="glyphicon glyphicon-backward"></span> Previous
			</a>

			<a class="btn btn-sm btn-info" href="{{ route('bbincidence.edit', array($nextbbincidence)) }}" >
				Next <span class="glyphicon glyphicon-forward"></span>
			</a>
		</div>
		<div class="panel-body">
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
	{{ Form::model($bbincidence, array('route' => array('bbincidence.update', $bbincidence->id), 'method' => 'PUT',
				'id' => 'form-edit-bbincidence')) }}

		<div class="form-group actions-row" style="text-align:right;">
			{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.trans('messages.save'),
				array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
		</div>


	<div class="panel panel-info"> <!-- Health Facility Information -->
	<div class="panel-heading"><strong>Bio-safety and Bio-security Incident/Occurrence Details (<i>to be completed by the person affected or his/her supervisor</i>)</strong></div>
	<div class="panel-body">
		<div class="form-group">
			{{ Form::hidden('facility_id', $bbincidence->facility->id) }}
			{{ Form::label('facility_id', 'Facility', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('', $bbincidence->facility->code.' - '.$bbincidence->facility->name.' - '.$bbincidence->facility->district->name, array('size' => '10x2','class' => 'form-control col-sm-4','readonly' => 'readonly')) }}

			{{ Form::label('occurrence_date', 'Occurence Date', array('class' => 'col-sm-2')) }}
			{{ Form::text('occurrence_date', old('occurrence_date'), array('class' => 'form-control standard-datepicker col-sm-4')) }}

			{{ Form::label('occurrence_time', 'Occurence Time', array('class' => 'col-sm-2', 'placeholder' => 'hh:mm (24hr Format)')) }}
			{{ Form::text('occurrence_time', old('occurrence_time'), array('class' => 'form-control col-sm-4',
			'placeholder' => 'hh:mm (24hr Format)')) }}
		</div>

		<div class="form-group">
			{{ Form::label('serial_no', 'Identification No', array('class' => 'col-sm-2')) }}
			{{ Form::text('serial_no', $bbincidence->serial_no, array('class' => 'form-control col-sm-4','readonly' => 'readonly',
			'placeholder' => 'To be generated automatically', 'style' => 'color:red')) }}

			{{ Form::label('lab_section', 'Location', array('class' => 'col-sm-2')) }}
			{{ Form::text('lab_section', old('lab_section'), array('class' => 'form-control col-sm-4')) }}
		</div>

		<div class="form-group">
			{{ Form::label('description', 'Description', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('description', old('description'), array('size' => '10x2', 'class' => 'form-control col-sm-4')) }}

			{{ Form::label('firstaid', 'First Aid / Immediate Actions', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('firstaid', old('firstaid'), array('size' => '10x2', 'class' => 'form-control col-sm-4')) }}
		</div>

		<div class="form-group">
			<b>Nature of Incident/Occurrence</b>

			<div class="form-pane panel panel-default">
				<div class="container-fluid">
					<?php
						$cnt = 0;
						$zebra = "";
					?>
					@foreach($natures as $key=>$value)
						{{ ($cnt%4==0)?"<div class='row $zebra'>":"" }}
						<?php
							$cnt++;
							$zebra = (((int)$cnt/4)%2==1?"row-striped":"");
						?>
						<div class="col-md-3">
							<label  class="checkbox" title="{{ $value->priority}}/{{ $value->class}}">
													{{ Form::checkbox('nature[]',$value->id,old($value->id),array('title'=>$value->priority.'/'.$value->class)) }}
													{{$value->name}}
												</label>
						</div>
						{{ ($cnt%4==0)?"</div>":"" }}
					@endforeach
						{{ ($cnt%4!=0)?"</div>":"" }}
				</div>
			</div>
		</div>

	</div>
</div>

<div class="panel panel-info"> <!-- Victim Details -->
	<div class="panel-heading"><strong>Victim Details (<i>to be completed by the person affected or his/her supervisor</i>)</strong></div>
	<div class="panel-body">
				<div class="form-group">
					{{ Form::label('personnel_id', 'Victim ID', array('class' => 'col-sm-2')) }}
					{{ Form::text('personnel_id', old('personnel_id'), array('class' => 'form-control col-sm-4')) }}

					{{ Form::label('personnel_gender', 'Gender', array('class' => 'col-sm-1')) }}
					<div class="radio-inline">{{ Form::radio('personnel_gender', 'Not Applicable', true) }} <span class="input-tag">Not Applicable</span></div>
					<div class="radio-inline">{{ Form::radio('personnel_gender', 'Male', false) }} <span class="input-tag">Male</span></div>
					<div class="radio-inline">{{ Form::radio("personnel_gender", 'Female', false) }} <span class="input-tag">Female</span></div>

				</div>

				<div class="form-group">
					{{ Form::label('personnel_surname', 'Surname', array('class' => 'col-sm-2')) }}
					{{ Form::text('personnel_surname', old('personnel_surname'), array('class' => 'form-control col-sm-4')) }}

					{{ Form::label('personnel_othername', 'Other Name', array('class' => 'col-sm-2')) }}
					{{ Form::text('personnel_othername', old('personnel_othername'), array('class' => 'form-control col-sm-4')) }}
				</div>

				<div class="form-group">
					{{ Form::label('personnel_dob', 'Date of Birth', array('class' => 'col-sm-2')) }}
					{{ Form::text('personnel_dob', old('personnel_dob'), array('class' => 'form-control standard-datepicker col-sm-4')) }}

					{{ Form::label('personnel_age', 'Age', array('class' => 'col-sm-2')) }}
					{{ Form::text('personnel_age', old('personnel_age'), array('class' => 'form-control col-sm-4', 'placeholder' => 'If DOB is not known')) }}
				</div>

				<div class="form-group">
					<!--{{ Form::label('personnel_category', 'Victim Category', array('class' => 'col-sm-2')) }}
					{{ Form::text('personnel_category', old('personnel_category'), array('class' => 'form-control col-sm-4')) }}-->

					{{ Form::label('personnel_category', 'Victim Category', array('class' => 'col-sm-2')) }}
					<input list="personnel_category" name="personnel_category" class="form-control col-sm-4" placeholder="Double click for Options or write">
					<datalist id="personnel_category">
						<option value="Laboratory Staff">
						<option value="Clinician">
						<option value="Support Staff">
						<option value="Patient">
						<option value="Visitor">
						<option value="Bike Rider">
					</datalist>

					{{ Form::label('personnel_telephone', 'Telephone', array('class' => 'col-sm-2')) }}
					{{ Form::text('personnel_telephone', old('personnel_telephone'), array('class' => 'form-control col-sm-4')) }}
				</div>

				<div class="form-group">
					{{ Form::label('personnel_email', 'Email', array('class' => 'col-sm-2')) }}
					{{ Form::text('personnel_email', old('personnel_email'), array('class' => 'form-control col-sm-4')) }}

					{{ Form::label('nok_email', 'NOK Email', array('class' => 'col-sm-2')) }}
					{{ Form::text('nok_email', old('nok_email'), array('class' => 'form-control col-sm-4')) }}
				</div>

				<div class="form-group">
					{{ Form::label('nok_name', 'NOK name', array('class' => 'col-sm-2')) }}
					{{ Form::text('nok_name', old('nok_name'), array('class' => 'form-control col-sm-4')) }}

					{{ Form::label('nok_telephone', 'NOK Telephone', array('class' => 'col-sm-2')) }}
					{{ Form::text('nok_telephone', old('nok_telephone'), array('class' => 'form-control col-sm-4')) }}
				</div>
	</div>
</div>

<div class="panel panel-info"> <!-- Extra details about the Incident -->
	<div class="panel-heading"><strong>Extra details about the Incident (<i>to be completed by the person affected or his/her supervisor</i>)</strong></div>
	<div class="panel-body">
				<div class="form-group">
					{{ Form::label('task', 'Activity/Procedure/task being performed', array('class' => 'col-sm-2')) }}
					{{ Form::text('task', old('task'), array('class' => 'form-control col-sm-4')) }}

					{{ Form::label('ulin', 'Patient ULIN', array('class' => 'col-sm-2')) }}
					{{ Form::text('ulin', old('ulin'), array('class' => 'form-control col-sm-4','placeholder' => 'If contact with suspected VHF patient')) }}
				</div>

				<div class="form-group">
					{{ Form::label('equip_code', 'Equipment Code', array('class' => 'col-sm-2')) }}
					{{ Form::text('equip_code', old('equip_code'), array('class' => 'form-control col-sm-4')) }}

					{{ Form::label('equip_name', 'Equipment Name', array('class' => 'col-sm-2')) }}
					{{ Form::text('equip_name', old('equip_name'), array('class' => 'form-control col-sm-4')) }}
				</div>

				<span style="font-weight: bold;">Reporting Officer</span>
				<div class="form-group">
					{{ Form::label('officer_fname', 'First Name', array('class' => 'col-sm-2')) }}
					{{ Form::text('officer_fname', old('officer_fname'), array('class' => 'form-control col-sm-4')) }}

					{{ Form::label('officer_lname', 'Last Name', array('class' => 'col-sm-2')) }}
					{{ Form::text('officer_lname', old('officer_lname'), array('class' => 'form-control col-sm-4')) }}
				</div>

				<div class="form-group">
					{{ Form::label('officer_cadre', 'Designation', array('class' => 'col-sm-2')) }}
					{{ Form::text('officer_cadre', old('officer_cadre'), array('class' => 'form-control col-sm-4')) }}

					{{ Form::label('officer_telephone', 'Telephone', array('class' => 'col-sm-2')) }}
					{{ Form::text('officer_telephone', old('officer_telephone'), array('class' => 'form-control col-sm-4')) }}
				</div>
	</div>
	</div>

		<div class="form-group actions-row" style="text-align:right;">
			{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.trans('messages.save'),
				array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
		</div>

		{{ Form::close() }}
		</div>
	</div>
@stop
