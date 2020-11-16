@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
		<li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
		<li><a href="{{{URL::route('equipmentsupplier.index')}}}">{{trans('messages.equipment-breakdown-list')}}</a></li>
		<li class="active">{{ Lang::choice('messages.equipment-breakdown',2) }}</li>
	</ol>

</div>
@if (Session::has('message'))
<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif
@if($errors->all())
<div class="alert alert-danger">
	{{ HTML::ul($errors->all()) }}
</div>
@endif


<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="ion-gear-a"></span>
		{{ Lang::choice('messages.equipment-breakdown',2) }}
	</div>
	<div class="panel-body">


		{{ Form::open(array('url' => 'equipmentbreakdown/store', 'autocomplete' => 'off', 'class' => 'form-horizontal', 'data-toggle' => 'validator')) }}

		<fieldset>
			<h1 class="panel-title" style="text-align:center">{{ HTML::image(Config::get('kblis.organization-logo'),  Config::get('kblis.country') . trans('messages.court-of-arms'), array('width' => '150px')) }}
				<br>
				<strong>{{ strtoupper(Config::get('constants.FACILITY_REQUEST_FORM_HEADER')) }}</strong></h1>
				<br>
				<br>
				1. Facility Information
				<div class="panel panel-warning">
					<div class="form-group">
						{{ Form::label('facility_id', 'Facility Name', ['class' => 'col-lg-2 control-label']) }}
						{{ Form::text('facility_id',Auth::user()->facility->name,['class' => 'form-control','rows'=>'5','readonly']) }}

						{{ Form::label('facility_code', 'Facility Code:', ['class' => 'col-lg-2 control-label']) }}
						{{ Form::text('facility_code',Auth::user()->facility->code,['class' => 'form-control','rows'=>'5','readonly']) }}

						{{ Form::label('facility_level', 'Facility Level:', ['class' => 'col-lg-2 control-label']) }}
						{{ Form::text('facility_level',Auth::user()->facility->level->level,['class' => 'form-control col-sm-4','rows'=>'5','readonly']) }}
					</div>

					<div class="form-group">
						{{ Form::label('district_id', 'District Name:', ['class' => 'col-lg-2 control-label']) }}
						{{ Form::text('district_id',Auth::user()->facility->district->name,['class' => 'form-control col-sm-4','rows'=>'5','readonly']) }}


						{{ Form::label('report_date', 'Date Of Report', ['class' => 'col-lg-2 control-label']) }}
						{{ Form::text('report_date', Input::old('report_date'), array('class' => 'form-control col-sm-4 standard-datepicker', 'id' => 'report_date','required'=>'required')) }}
					</div>
				</div>

				2. Equipment Information
				<div class="panel panel-warning">

					<div class="form-group">
						{{  Form::label('equipment_code', 'Equipment Code:',['class'=>'col-lg-2 control-label']) }}
						{{ Form::text('equipment_code',Input::old('equipment_id'), array('class' => 'form-control col-sm-4')) }}


						{{  Form::label('equipment_type', 'Equipment Type', array('class'=>'col-lg-2')) }}
						{{ Form::select('equipment_type', array(null => 'Select')+UNHLSEquipmentInventory::lists('name','id'), Input::old('equipment_id'), array('class' => 'form-control col-sm-4', 'id' => 'equipment_id', 'required'=>'required')) }}

						{{  Form::label('equipment_id', 'Equipment Name', array('class'=>'col-lg-2')) }}
						{{ Form::select('equipment_id', array(null => 'Select')+UNHLSEquipmentInventory::lists('name','id'), Input::old('equipment_id'), array('class' => 'form-control col-sm-4', 'id' => 'equipment_id', 'required'=>'required')) }}



						@if ($errors->has('equipment_id'))
						<span class="text-danger">
							<strong>{{ $errors->first('equipment_id') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						{{  Form::label('problem', 'Description of Problem:',['class'=>' col-lg-2 control-label']) }}
						{{ Form::textarea('problem',Input::old('problem'), array('class' => 'form-control col-sm-4','rows'=>'2')) }}
					</div>
					<br>
					<div class="form-inline">
						Reason for equipment failure<small><i>(select all that apply):</i></small>
						<br>
						<br>
						<div class="form-group">
							<div class="radio-inline">{{ Form::radio('equipment_failure[]', 'Equipment is overdue for service', false) }} <span class="input-tag">Equipment is overdue for service</span></div>
							<div class="radio-inline">{{ Form::radio("equipment_failure[]", 'Accident Occured', false) }} <span class="input-tag">Accident Occured</span></div>
							<div class="radio-inline">{{ Form::radio("equipment_failure[]", 'Missed Service Schedule', false) }} <span class="input-tag">Missed Service Schedule</span></div>
							<div class="radio-inline">{{ Form::radio("equipment_failure[]", 'Too old equipment', false) }} <span class="input-tag">Too old equipment</span></div>
							<div class="radio-inline">{{ Form::radio("equipment_failure[]", 'Poor maintained', false) }} <span class="input-tag">Poor maintained</span></div>
							<div class="radio-inline">{{ Form::radio("equipment_failure[]", 'Unkown reason for failure', false) }} <span class="input-tag">Unkown reason for failure</span></div>
						</div>
					</div>
					<br>
					<br>

					<div class="form-group">
						{{  Form::label('action_taken', 'Actions taken at facility lab:', ['class'=>' col-lg-2 control-label']) }}
						{{ Form::textarea('action_taken',Input::old('action_taken'), array('class' => 'form-control col-sm-4','rows'=>'2')) }}
					</div>
					<div class="form-group">
						{{  Form::label('reporting_office', 'Name of reporting Officer:',['class'=>' col-lg-2 control-label']) }}
						{{ Form::text('reporting_officer',Input::old('reporting_officer'), array('class' => 'form-control col-sm-4')) }}

						{{  Form::label('reporting_officer_contact', 'Mobile Telephone:',['class'=>' col-lg-2 control-label']) }}
						{{ Form::text('reporting_officer_contact',Input::old('reporting_officer_contact'), array('class' => 'form-control col-sm-4')) }}

						{{  Form::label('reporting_officer_email', 'Email Contact:',['class'=>' col-lg-2 control-label']) }}
						{{ Form::text('reporting_officer_email',Input::old('reporting_officer_email'), array('class' => 'form-control col-sm-4')) }}

					</div>
				</div>

				3. Information on Intervention from higher levels <small><i>(to be filled by intervening authority)</i></small>
				<div class="panel panel-warning">

					Specify Intervening Authority and date of intervention:
					<br>
					<br>
					<div class="form-inline">
						<br>

						<div class="form-group">
							{{ Form::label('intervention_authority', 'Specify intervening authority and date of intervention:', array('class' =>'col-sm-2 required')) }}
							<div class="radio-inline">{{ Form::radio('intervention_authority', 'Biomedical Engineer', false) }} <span class="input-tag">Biomedical Engineer</span></div>
							<div class="radio-inline">{{ Form::radio("intervention_authority", 'Supplier', false) }} <span class="input-tag">Supplier</span></div>
							<div class="radio-inline">{{ Form::radio("intervention_authority", 'Regional Workshop', false) }} <span class="input-tag">Regional Workshop</span></div>
							<div class="radio-inline">{{ Form::radio("intervention_authority", ' CPHL / UNHLS', false) }} <span class="input-tag"> CPHL / UNHLS</span></div>
						</div>
						<br>

						<div class="form-group">
							{{ Form::label('action_taken', 'Actions Taken:', ['class' => 'col-lg-2 control-label']) }}
							{{ Form::textarea('action_taken',Input::old('action_taken'), array('class' => 'form-control col-sm-4','rows'=>'2')) }}

							{{ Form::label('conclusion', 'Conclusion / Reccomendations:', ['class' => 'col-lg-2 control-label']) }}
							{{ Form::textarea('conclusion',Input::old('conclusion'), array('class' => 'form-control col-sm-4','rows'=>'2')) }}

						</div>
					</div>
				</div>

				4. Facility Verification Information <small><i>(to be filled by facility after equipment breakdown incident is rectified)</i></small>
				<div class="panel panel-warning">

					<div class="form-group">
						<br>

						{{ Form::label('verified_by', 'Verified By:', ['class' => 'col-lg-2 control-label']) }}
						{{ Form::text('verified_by',null,['class' => 'form-control','rows'=>'5']) }}

						{{ Form::label('verification_date', 'Verification Date:', ['class' => 'col-lg-2 control-label']) }}
						{{ Form::text('verification_date', Input::old('verification_date'), array('class' => 'form-control standard-datepicker', 'id' => 'report_date','required'=>'required')) }}
					</div>

				</div>


				<div class="form-group">
					<div class="col-lg-7 col-lg-offset-2">
						<a href="{{url('/equipmentbreakdown')}}" class="btn btn-default">Cancel</a>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</div>

		</fieldset>

		{{ Form::close() }}

		<?php
		Session::put('SOURCE_URL', URL::full());?>
	</div>

</div>
<script>
	$(".standard-datepicker").datepicker({
		maxDate: 0
	});
</script>
@stop
