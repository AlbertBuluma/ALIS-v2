@extends("layout")
@section("content")
<style>

    .highlight{
   color: red;

}
.highlightedGreen{
    color: green;
}
/*
.hide{
   display: none;
}*/
</style>
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li class="active">{{ Lang::choice('messages.report', 2) }}</li>
		</ol>
	</div>
	{{ Form::open(array('route' => array('reports.patient.merged'), 'class'=>'form-inline', 'role'=>'form', 'method'=>'POST')) }}
		<div class="form-group">

		    {{ Form::label('search', "search", array('class' => 'sr-only')) }}
            {{ Form::text('search', Illuminate\Support\Facades\Request::get('search'), array('class' => 'form-control test-search')) }}
		</div>
		<div class="form-group">
			{{ Form::button("<span class='glyphicon glyphicon-search'></span> ".trans('messages.search'),
		        array('class' => 'btn btn-primary', 'id' => 'filter', 'type' => 'submit')) }}
		</div>
	{{ Form::close() }}
	<br>
<div class="panel panel-primary visit-log">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-user"></span>
		{{ trans('messages.patient-report') }}
	</div>
	<div class="panel-body">

	    @if(Session::has('message'))
			<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
		@endif
	    <table class="table table-striped table-hover table-condensed">
			<thead>
				<tr>
					<th class="hide">#</th>
					<th>Date of visit</th>
					@can('view_names')
						<th>{{trans('messages.full-name')}}</th>
					@endcan
					<th>Tests requested</th>
					<th>Test status</th>
					<th>{{trans('messages.gender')}}</th>
					<th>{{trans('messages.age')}}</th>
					<th>{{trans('messages.actions')}}</th>
					<th>Form</th>
					<th>Printed by</th>
				</tr>
			</thead>
			<tbody>
			@forelse($visits as $key => $visit)
				<tr class="<?php if($visit->is_printed == 1) echo 'highlightedGreen';?>">
					<td class="hide">{{ $visit->id }}</td>
					<td>{{ date_format(date_create($visit->created_at), 'd-m-Y H:i:s') }}</td>
					<td>{{ $visit->patient->name }}</td>
					<td>@foreach($visit->tests as $visit_tests)
						{{ $visit_tests->testType->name }} |
					@endforeach</td>
					<td>@foreach($visit->tests as $visit_tests)
						@if($visit_tests->test_status_id == 7)
						<b style="color: green">*</b>
						@else
						<b style="color: red">x</b>
						@endif
					@endforeach</td>
					<td>{{ $visit->patient->getGender() }}</td>
					<td>{{ $visit->exactAge() }}</td>
					<td>
					<!-- show the patient report(uses the show method found at GET /patient/{id} -->

					@if($visit->is_printed == 0)
					<a class="btn btn-sm btn-warning view-visit" href="{{ URL::to('print/' . $visit->id) }}">
                        <span class="glyphicon glyphicon-play"></span>
                        {{trans('messages.view-report')}}
                    </a>
					@else
						<a class="btn btn-sm btn-default" href="{{ URL::to('patientvisitreport/' . $visit->id) }}" target="_blank" >
							<span class="glyphicon glyphicon-eye-open"></span>
							Result
						</a>
					@endif
					</td>
					<td><a class="btn btn-sm btn-info" href="{{ URL::to('patientrequestform/' . $visit->id) }}" target="_blank" >
								<span class="glyphicon glyphicon-eye-open"></span>
								Request Form
							</a></td>
					<td>{{ isset($visit->printed_by) ? $visit->printBy->name:'' }}<br>{{ $visit->time_printed }}</td>
				</tr>
			@empty
				<tr>
					<td colspan="5">{{trans('messages.no-records-found')}}</td>
				</tr>
			@endforelse
			</tbody>
		</table>
		{{$visits->links()}}
	</div>

</div>

@stop
