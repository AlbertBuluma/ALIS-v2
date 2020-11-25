@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{route('user.home')}}}">{{trans('messages.home')}}</a></li>
		<li><a href="{{{route('bbincidence.create')}}}">{{trans('Register New BB Incident')}}</a></li>
		<li><a href="{{ route('bbincidence.bbfacilityreport') }}">Facility Report</a></li>
	  <li class="active">BB Incidents</li>
	</ol>
</div>

<div class='container-fluid'>
	<div class='row'>
		<div class='col-md-4'>
			{{ Form::open(array('route' => array('bbincidence.index'), 'class'=>'form-inline',
				'role'=>'form', 'method'=>'GET')) }}
				<div class="form-group">

				    {{ Form::label('search', "search", array('class' => 'sr-only')) }}
		            {{ Form::text('search', old('search'), array('class' => 'form-control test-search', 'placeholder' => 'Serial No, Description')) }}
				</div>
				<div class="form-group">
					{{ Form::button("<span class='glyphicon glyphicon-search'></span> ".trans('messages.search'),
				        array('class' => 'btn btn-primary', 'type' => 'submit')) }}
				</div>
			{{ Form::close() }}
		</div>

		<div class='col-md-8'>
			{{ Form::open(array('route' => array('bbincidence.index'), 'class'=>'form-inline',
				'role'=>'form', 'method'=>'GET')) }}
				<div class="form-group">
				    {{ Form::label('datefrom', "Date From") }}
		            {{ Form::text('datefrom', old('datefrom'), array('class' => 'form-control test-search standard-datepicker', 'required' => 'required')) }}
				</div>
				<div class="form-group">
					{{ Form::label('dateto', "Date To") }}
		            {{ Form::text('dateto', old('dateto'), array('class' => 'form-control test-search standard-datepicker', 'required' => 'required')) }}
				</div>
				<div class="form-group">
					</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

	<br>

@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-book"></span>
		List of BB Incidents  ({{ count($bbincidences) }})
{{--		@if(Entrust::can('create_bbincidences'))--}}
		@if(\Illuminate\Support\Facades\Auth::user()->can('create_bbincidences'))
		<div class="panel-btn">
			<a class="btn btn-sm btn-info" href="{{ route('bbincidence.create') }}">
				<span class="glyphicon glyphicon-plus-sign"></span>
				{{ trans('messages.new-bbincidence') }}
			</a>

			<a class="btn btn-sm btn-info" href="{{ route('bbincidence.index') }}"> Clear Filters </a>
		</div>
		@endif
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>#</th>
					<th>BB incident No.</th>
					<th>Date / Time Of Ocuurence</th>
					<th>Description</th>
					<!--<th>Victim Details</th>-->
					<th>Cause of Incident</th>
					<th>Nature of Incident</th>

					<th>Actions</th>

				</tr>
			</thead>
			<tbody>
			@foreach($bbincidences as $key => $bbincidence)
				<tr  @if(Session::has('activebbincidence'))
						{{(Session::get('activebbincidence') == $bbincidence->id)?"class='info'":""}}
					@endif>

					<td class="text-left">{{ $bbincidence->id }}</td>
					<td class="text-left">{{ $bbincidence->serial_no }}</td>
					<td>{{ date('d M Y', strtotime($bbincidence->occurrence_date)) }}<br>{{ $bbincidence->occurrence_time }}
					</td>

				<!--	<td class="text-left"> {{$bbincidence->personnel_surname}} {{$bbincidence->personnel_othername}}<br>{{$bbincidence->personnel_gender}}</td>-->

					<td>
						@foreach ($bbincidence->bbnature as $nature)
							<span title="{{$nature->name}}">{{$nature->priority}}/{{$nature->class}};</span>
						@endforeach
					</td>

					<td>
						@foreach ($bbincidence->bbcause as $cause)
							{{$cause->causename}}
						@endforeach
					</td>

					<td>'{{ $bbincidence->description }}'</td>

					<td>
					<a class="btn btn-sm btn-success" href="{{ route('bbincidence.show', array($bbincidence->id)) }}" >
							<span class="glyphicon glyphicon-eye-open"></span>
							<!--{{trans('messages.edit')}}-->
							View
						</a>
						<a class="btn btn-sm btn-info" href="{{ route('bbincidence.edit', array($bbincidence->id)) }}" >
							<span class="glyphicon glyphicon-edit"></span>
							Edit
							<!--{{trans('messages.edit')}}-->
						</a>
						<a class="btn btn-sm btn-info" href="{{ route('bbincidence.clinicaledit', array($bbincidence->id)) }}" >
							<span class="glyphicon glyphicon-list-alt"></span>
							Clinical Intervention
						</a>
						<a class="btn btn-sm btn-info" href="{{ route('bbincidence.analysisedit', array($bbincidence->id)) }}" >
							<span class="glyphicon glyphicon-th-list"></span>
							Incident Analysis
						</a>
						<a class="btn btn-sm btn-warning" href="{{ route('bbincidence.responseedit', array($bbincidence->id)) }}" >
							<span class="glyphicon glyphicon-th"></span>
							Emergency Incident Response
						</a>

						<!--<div class="dropdown">
							 <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Action
							 <span class="caret"></span></button>
							 <ul class="dropdown-menu">
								 <li><a href="{{ route('bbincidence.show', array($bbincidence->id)) }}">{{trans('messages.view')}}</a></li>
								 <li><a href="{{ route('bbincidence.edit', array($bbincidence->id)) }}">Update Incident Information</a></li>
								 <li><a href="{{ route('bbincidence.clinicaledit', array($bbincidence->id)) }}">Update Clinical Intervention</a></li>
								 <li><a href="{{ route('bbincidence.analysisedit', array($bbincidence->id)) }}">Update Incident Analysis</a></li>
								 <li><a href="{{ route('bbincidence.responseedit', array($bbincidence->id)) }}">Update BRM Response</a></li>
							 </ul>
					 </div>-->

					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		<?php echo $bbincidences->links();
		Session::put('SOURCE_URL', URL::full());?>
	</div>
</div>
@stop
