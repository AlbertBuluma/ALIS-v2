	@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{route('user.home')}}}">{{trans('messages.home')}}</a></li>
		  <li><a href="{{ route('bbincidence.index') }}">BB Incidents</a></li>
		  <li class="active">Updating Major Incident Response</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-edit"></span>
			Updating Major Incident Response for {{$bbincidence->serial_no}}
		</div>
		<div class="panel-body">
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
{{ Form::model($bbincidence, array('route' => array('bbincidence.responseupdate', $bbincidence->id), 'method' => 'PUT',
				'id' => 'form-edit-bbincidence')) }}

	<div class="panel panel-info">
			<!--<div class="panel-heading"><strong>Bio-safety and Bio-security Incident/Occurrence Details (<i>to be completed by the person affected or his/her supervisor</i>)</strong></div>
			--><div class="panel-body">

				<div class="row view-striped">
					<div class="col-sm-2"><strong>ID #</strong></div>
					<div class="col-sm-4" style="color:red;"><strong>{{ $bbincidence->serial_no }}</strong></div>

					<div class="col-sm-2"><strong>Facility</strong></div>
					<div class="col-sm-4">{{ $bbincidence->facility->name }}</div>
				</div>

				<div class="row">
					<div class="col-sm-2"><strong>Occurrence Time</strong></div>
					<div class="col-sm-4">{{ $bbincidence->occurrence_date }} {{ $bbincidence->occurrence_time }}</div>

					<div class="col-sm-2"><strong>Description</strong></div>
					<div class="col-sm-4">{{ $bbincidence->description }}</div>
				</div>

				<div class="row view-striped">
					<div class="col-sm-2"><strong>Laboratory Section</strong></div>
					<div class="col-sm-4">{{ $bbincidence->lab_section }}</div>

					<div class="col-sm-2"><strong>First Aid / Immediate Actions</strong></div>
					<div class="col-sm-4">{{ $bbincidence->firstaid }}</div>
				</div>

				<div class="row">
					<div class="col-sm-2"><strong>Nature of Incident/Occurrence</strong></div>
					<!--<div class="col-sm-4">{{ $bbincidence->occurrence }} </div>-->
					<div class="col-sm-4">
						@foreach ($bbincidence->bbnature as $nature)
							{{$nature->name}} ({{$nature->priority}}/{{$nature->class}})<br>
						@endforeach
					</div>

					<div class="col-sm-2"><strong>Completion Status</strong></div>
					<div class="col-sm-4">{{ $bbincidence->status }}</div>
				</div>

			</div>
			</div>


<div class="panel panel-info"> <!-- Major Incident Response -->
	<div class="panel-heading"><strong>Major Incident Response (<i>to be filled by National Bio Risk Management Office</i>)</strong></div>
	<div class="panel-body">
				<div class="form-group">
					{{ Form::label('findings', 'Investigation Findings', array('class' => 'col-sm-2')) }}
					{{ Form::textarea('findings', old('findings'), array('size' => '10x1', 'class' => 'form-control col-sm-4')) }}

					{{ Form::label('improvement_plan', 'Improvement Plan', array('class' => 'col-sm-2')) }}
					{{ Form::textarea('improvement_plan', old('improvement_plan'), array('size' => '10x1', 'class' => 'form-control col-sm-4')) }}
				</div>

				<div class="form-group">
					{{ Form::label('response_date', 'Response Date', array('class' => 'col-sm-2')) }}
					{{ Form::text('response_date', old('response_date'), array('class' => 'form-control standard-datepicker col-sm-4')) }}

					{{ Form::label('response_time', 'Response Time', array('class' => 'col-sm-2', 'placeholder' => 'hh:mm (24hr Format)')) }}
					{{ Form::text('response_time', old('response_time'), array('class' => 'form-control col-sm-4',
					'placeholder' => 'hh:mm (24hr Format)')) }}
				</div>

				<span style="font-weight: bold;">BRM representative</span>
				<div class="form-group">
					{{ Form::label('brm_fname', 'First Name', array('class' => 'col-sm-2')) }}
					{{ Form::text('brm_fname', old('brm_fname'), array('class' => 'form-control col-sm-4')) }}

					{{ Form::label('brm_lname', 'Last Name', array('class' => 'col-sm-2')) }}
					{{ Form::text('brm_lname', old('brm_lname'), array('class' => 'form-control col-sm-4')) }}
				</div>

				<div class="form-group">
					{{ Form::label('brm_designation', 'Designation', array('class' => 'col-sm-2')) }}
					{{ Form::text('brm_designation', old('brm_designation'), array('class' => 'form-control col-sm-4')) }}

					{{ Form::label('brm_telephone', 'Telephone', array('class' => 'col-sm-2')) }}
					{{ Form::text('brm_telephone', old('brm_telephone'), array('class' => 'form-control col-sm-4')) }}
				</div>

				<div class="form-group actions-row">
					{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE',
						['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
				</div>
	</div>
</div>


{{ Form::close() }}
		</div>
	</div>
@stop
