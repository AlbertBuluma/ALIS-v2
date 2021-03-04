	@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{route('user.home')}}}">{{trans('messages.home')}}</a></li>
		  <li><a href="{{ route('bbincidence.index') }}">BB Incidents</a></li>
		  <li class="active">Updating BB Incident Clinical Intervention</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-edit"></span>
			Updating Clinical Intervention for {{$bbincidence->serial_no}}
		</div>
		<div class="panel-body">
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
{{ Form::model($bbincidence, array('route' => array('bbincidence.clinicalupdate', $bbincidence->id), 'method' => 'PUT',
				'id' => 'form-edit-bbincidence')) }}

	<div class="panel panel-info">
			<!--<div class="panel-heading"><strong>Bio-safety and Bio-security Incident/Occurrence Details (<i>to be completed by the person affected or his/her supervisor</i>)</strong></div>
			--><div class="panel-body">

				<div class="row view-striped">
					<div class="col-sm-2"><strong>ID #</strong></div>
					<div class="col-sm-4" style="color:red;"><strong>{{ $bbincidence->serial_no }}</strong></div>

					<div class="col-sm-2"><strong>Facility</strong></div>
					<div class="col-sm-4">{{ $bbincidence->facility->code }} - {{ $bbincidence->facility->name }}</div>
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
					<div class="col-sm-4">
						@foreach ($bbincidence->bbnature as $nature)
							{{$nature->name}} ({{$nature->priority}}/{{$nature->class}})<br>
						@endforeach
					</div>

					<div class="col-sm-2"><strong>Completion Status</strong></div>
					<div class="col-sm-4">{{ $bbincidence->status }}</div>
				</div>

				<div class="row">
					<div class="col-sm-12" style="text-align:right;"><b>**Record created by {{ $bbincidence->user->name }} at {{ $bbincidence->created_at }}</b></div>
				</div>

			</div>
			</div>

<div class="panel panel-info"> <!-- Clinical Intervention -->
	<div class="panel-heading"><strong>Clinical Intervention if applicable (<i>to be filled by the clinician</i>)</strong></div>
	<div class="panel-body">
				<div class="form-group">
					{{ Form::label('extent', 'Extent/Magnitude of injury', array('class' => 'col-sm-2')) }}
					{{ Form::text('extent', old('extent'), array('class' => 'form-control col-sm-4')) }}

					{{ Form::label('intervention', 'Clinical Intervention', array('class' => 'col-sm-2')) }}
					{{ Form::textarea('intervention', old('intervention'), array('size' => '10x2', 'class' => 'form-control col-sm-4')) }}
				</div>

				<div class="form-group">
					{{ Form::label('intervention_date', 'Date of Intervention', array('class' => 'col-sm-2')) }}
					{{ Form::text('intervention_date', old('intervention_date'), array('class' => 'form-control standard-datepicker col-sm-4')) }}

					{{ Form::label('intervention_time', 'Time of Intervention', array('class' => 'col-sm-2')) }}
					{{ Form::text('intervention_time', old('intervention_time'), array('class' => 'form-control col-sm-4',
					'placeholder' => 'hh:mm (24hr Format)'))}}
					<div class='input-group date' id='intervention_time'>
						<script type="text/javascript">
							$(function () {
								$('#intervention_time').datetimepicker({format:'LT'});
							});
						</script>
					</div>
				</div>

				<span style="font-weight: bold;">Medical Officer</span>
				<div class="form-group">
					{{ Form::label('mo_fname', 'First Name', array('class' => 'col-sm-2')) }}
					{{ Form::text('mo_fname', old('mo_fname'), array('class' => 'form-control col-sm-4')) }}

					{{ Form::label('mo_lname', 'Last Name', array('class' => 'col-sm-2')) }}
					{{ Form::text('mo_lname', old('mo_lname'), array('class' => 'form-control col-sm-4')) }}
				</div>

				<div class="form-group">
					{{ Form::label('mo_designation', 'Designation', array('class' => 'col-sm-2')) }}
					{{ Form::text('mo_designation', old('mo_designation'), array('class' => 'form-control col-sm-4')) }}

					{{ Form::label('mo_telephone', 'Telephone', array('class' => 'col-sm-2')) }}
					{{ Form::text('mo_telephone', old('mo_telephone'), array('class' => 'form-control col-sm-4')) }}
				</div>

				<div class="form-group">
					{{ Form::label('intervention_followup', 'Intervention Followup', array('class' => 'col-sm-2')) }}
					{{ Form::textarea('intervention_followup', old('intervention_followup'), array('size' => '10x2', 'class' => 'form-control col-sm-4')) }}

					{{ Form::label('', '', array('class' => 'col-sm-2')) }}
					{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.trans('messages.save'),
						array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
				</div>
	</div>
</div>


{{ Form::close() }}
		</div>
	</div>
@stop
