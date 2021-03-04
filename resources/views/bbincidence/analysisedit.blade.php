	@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{ route('user.home') }}">{{trans('messages.home')}}</a></li>
		  <li><a href="{{ route('bbincidence.index') }}">BB Incidents</a></li>
		  <li class="active">Updating BB Incident Analysis</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-edit"></span>
			Updating Incident Analysis for {{$bbincidence->serial_no}}
		</div>
		<div class="panel-body">
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
{{ Form::model($bbincidence, array('route' => array('bbincidence.analysisupdate', $bbincidence->id), 'method' => 'PUT',
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


<div class="panel panel-info"> <!-- Incident Analysis -->
	<div class="panel-heading"><strong>Incident Analysis (<i>to be completed by facility bio-safety officer</i>)</strong></div>
	<div class="panel-body">
				<div class="form-group">
					{{ Form::label('cause', 'Cause of Incident', array('class' => 'col-sm-2')) }}

				<div class="form-pane panel panel-default">
					<div class="container-fluid">
						<?php
							$cnt = 0;
							$zebra = "";
						?>
						@foreach($causes as $key=>$value)
							<!-- {{ ($cnt%4==0)?"<div class='row $zebra'>":"" }}
							<?php
								$cnt++;
								$zebra = (((int)$cnt/4)%2==1?"row-striped":"");
							?> -->
							<div class="col-md-3">
								<label  class="checkbox">
								<input type="checkbox" name="cause[]" value="{{ $value->id}}" title=""
								{{ in_array($value->id, $bbincidence->bbcause->pluck('id')->toArray())?"checked":"" }} />
								{{$value->causename}}
								</label>
							</div>
						@endforeach
					</div>
				</div>

				</div>



				<div class="form-group">
					{{ Form::label('corrective_action', 'Corrective Action', array('class' => 'col-sm-2')) }}

				<div class="form-pane panel panel-default">
					<div class="container-fluid">
						@foreach($actions as $key=>$value)
							<div class="col-md-3">
								<label  class="checkbox">
								<input type="checkbox" name="corrective_action[]" value="{{ $value->id}}" title=""
								{{ in_array($value->id, $bbincidence->bbaction->pluck('id')->toArray())?"checked":"" }} />
								{{$value->actionname}}
								</label>
							</div>
						@endforeach
					</div>
				</div>

				</div>

				<div class="form-group">
					{{ Form::label('referral_status', 'Referral Status', array('class' => 'col-sm-2')) }}
					{{ Form::select('referral_status', [
					'' => '--- select ---',
					'Ressolved and not referred' => 'Ressolved and not referred',
					'Referred to District Level' => 'Referred to District Level',
					'Referred to Regional Level' => 'Referred to Regional Level',
					'Referred to National Level' => 'Referred to National Level'],
					old('referral_status'), array('class' => 'form-control')) }}

					{{ Form::label('status', 'Completion Status', array('class' => 'col-sm-2')) }}
					{{ Form::select('status', [
					'Ongoing' => 'Ongoing',
					'Completed' => 'Completed'],
					old('status'), array('class' => 'form-control')) }}
				</div>

				<div class="form-group">
					{{ Form::label('analysis_date', 'Analysis Date', array('class' => 'col-sm-2')) }}
					{{ Form::text('analysis_date', old('analysis_date'), array('class' => 'form-control standard-datepicker col-sm-4')) }}

					{{ Form::label('analysis_time', 'Analysis Time', array('class' => 'col-sm-2', 'placeholder' => 'hh:mm (24hr Format)')) }}
					{{ Form::text('analysis_time', old('analysis_time'), array('class' => 'form-control col-sm-4',
					'placeholder' => 'hh:mm (24hr Format)')) }}
				</div>

				<span style="font-weight: bold;">Bio-Safety Officer</span>
				<div class="form-group">
					{{ Form::label('bo_fname', 'First Name', array('class' => 'col-sm-2')) }}
					{{ Form::text('bo_fname', old('bo_fname'), array('class' => 'form-control col-sm-4')) }}

					{{ Form::label('bo_lname', 'Last Name', array('class' => 'col-sm-2')) }}
					{{ Form::text('bo_lname', old('bo_lname'), array('class' => 'form-control col-sm-4')) }}
				</div>

				<div class="form-group">
					{{ Form::label('bo_designation', 'Designation', array('class' => 'col-sm-2')) }}
					{{ Form::text('bo_designation', old('bo_designation'), array('class' => 'form-control col-sm-4')) }}

					{{ Form::label('bo_telephone', 'Telephone', array('class' => 'col-sm-2')) }}
					{{ Form::text('bo_telephone', old('bo_telephone'), array('class' => 'form-control col-sm-4')) }}
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
