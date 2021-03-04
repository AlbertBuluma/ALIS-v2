@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{ route('user.home') }}">{{ trans('messages.home') }}</a></li>
	  <li class="active"><a href="{{ route('reports.patient.index') }}">{{ Lang::choice('messages.report', 2) }}</a></li>
	  <li class="active">{{ trans('messages.patient-report') }}</li>
	</ol>
</div>
<div class="panel panel-primary" id="patientReport">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-user"></span>
		{{ trans('messages.patient-report') }}
	</div>
	<div class="panel-body">
		@if($error!='')
		<!-- if there are search errors, they will show here -->
			<div class="alert alert-info">{{ $error }}</div>
		@else

		<div id="report_content">
		@include("reportHeader")
		<strong>
			<p>
				{{trans('messages.patient-report').' - '.date('d-m-Y')}}
			</p>
		</strong>
		<table class="table table-bordered">
			<tbody>
				<tr>
					<th>{{ trans('messages.patient-name')}}</th>
					@can('view_names')
						<td>{{ $visit->patient->name }}</td>
					@else
						<td>N/A</td>
					@endcan
					<th>{{ trans('messages.gender')}}</th>
					<td>{{ $visit->patient->getGender(false) }}</td>
				</tr>
				<tr>
					<th>{{ trans('messages.patient-id')}}</th>
					<td>{{ $visit->patient->patient_number}}</td>
					<th>{{ trans('messages.age')}}</th>
					<td>{{ $visit->patient->getAge()}}</td>
				</tr>
				<tr>
					<th>{{ trans('messages.patient-lab-number')}}</th>
					<td>{{ $visit->patient->external_patient_number }}</td>
					<th>{{ trans('messages.requesting-facility-department')}}</th>
					<td>{{ config('kblis.organization') }}</td>
				</tr>
			</tbody>
		</table>
		<table class="table table-bordered">
			<tbody>
				<tr>
					<th colspan="7">{{trans('messages.specimen')}}</th>
				</tr>
				<tr>
					<th>{{ Lang::choice('messages.specimen-type', 1)}}</th>
					<th>{{ Lang::choice('messages.test', 2)}}</th>
					<th>{{ trans('messages.specimen-status')}}</th>
					<th>{{ trans('messages.collected-by')."/".trans('messages.rejected-by')}}</th>
					<th>Date</th>
				</tr>
				@forelse($visit->tests as $test)
						<tr>
							<td>{{ $test->specimen->specimenType->name }}</td>
							<td>{{ $test->testType->name }}</td>
							@if($test->specimen->specimen_status_id == App\Models\Specimen::NOT_COLLECTED)
								<td>{{trans('messages.specimen-not-collected')}}</td>
								<td></td>
								<td></td>
							@elseif($test->specimen->specimen_status_id == App\Models\Specimen::ACCEPTED)
								<td>{{trans('messages.specimen-accepted')}}</td>
								<td>{{$test->specimen->acceptedBy->name}}</td>
								<td>{{$test->specimen->time_accepted}}</td>
							@elseif($test->specimen->specimen_status_id == App\Models\Specimen::REJECTED)
								<td>{{trans('messages.specimen-rejected')}}</td>
								<td>{{$test->specimen->rejectedBy->name}}</td>
								<td>{{$test->specimen->time_rejected}}</td>
							@endif
						</tr>
				@empty
					<tr>
						<td colspan="7">{{trans("messages.no-records-found")}}</td>
					</tr>
				@endforelse

			</tbody>
		</table>
		<table class="table table-bordered">
			<tbody>
				<tr>
					<th colspan="8">{{trans('messages.test-results')}}</th>
				</tr>
				<tr>
					<th>{{Lang::choice('messages.test-type', 1)}}</th>
					<th>{{trans('messages.test-results-values')}}</th>
					<th>{{trans('messages.test-remarks')}}</th>
					<th>{{trans('messages.tested-by')}}</th>
					<th>{{trans('messages.results-entry-date')}}</th>
					<th>{{trans('messages.date-tested')}}</th>
					<th>{{trans('messages.verified-by')}}</th>
					<th>{{trans('messages.date-verified')}}</th>
				</tr>
				@forelse($visit->tests as $test)
						<tr>
							<td>{{ $test->testType->name }}</td>
							<td>
								@foreach($test->testResults as $result)
									<p>
										{{ App\Models\Measure::find($result->measure_id)->name }}: {{ $result->result }}
										{{ App\Models\Measure::getRange($test->visit->patient, $result->measure_id) }}
										{{ App\Models\Measure::find($result->measure_id)->unit }}
									</p>
								@endforeach</td>
							<td>{{ $test->interpretation == '' ? 'N/A' : $test->interpretation }}</td>
							<td>{{ $test->testedBy->name or trans('messages.pending')}}</td>
							<td>{{ $test->testResults->last()->time_entered }}</td>
							<td>{{ $test->time_completed }}</td>
							<td>{{ $test->verifiedBy->name or trans('messages.verification-pending')}}</td>
							<td>{{ $test->time_verified }}</td>
						</tr>
				@empty
					<tr>
						<td colspan="8">{{trans("messages.no-records-found")}}</td>
					</tr>
				@endforelse
			</tbody>
		</table></div>
		@endif
		</div>
	</div>

</div>
@stop
