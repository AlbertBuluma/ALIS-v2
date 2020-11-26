<style type="text/css">
	 table {
	 	padding: 2px;
	 }
</style>
<br>
<br>
<table style="padding: 2px">
	<tr>
		<td colspan="9">
			<b>Lab No: </b>{{ $patient->ulin }}
		</td>
		<td colspan="7">
			<b>OPD/IPD No: </b> {{ $patient->patient_number }}
		</td>
		<td colspan="4"><b>Report No: </b>
			@if(isset($tests))
				@if(!is_null($tests->first()))
					{{ $tests->first()->visit->id }}
				@endif
			@endif
		</td>
	</tr>
</table>
<table style="border-bottom: 1px solid #cecfd5;">
	<tr>
		<td colspan="9"><strong>Patient Name: </strong>
		@if(Entrust::can('view_names'))
			{{ $patient->name }}</td>
		@else
			N/A</td>
		@endif
		<td colspan="2"><strong>{{ trans('messages.gender')}}</strong></td>
		<td colspan="2">{{ $patient->getGender(false) }}</td>
		<td colspan="1"><strong>{{ trans('messages.age')}}</strong></td>
		<td colspan="2">{{ $patient->getAge()}}</td>
		<td colspan="2"><strong>Address</strong></td>
		<td colspan="2">{{ $patient->village_residence}}</td>
	</tr>
</table>
<table style="border-bottom: 1px solid #cecfd5;">
	<tr>
		<td colspan="4"><strong>Unit: </strong>
		@if(isset($tests))
			@if(!is_null($tests->first()))
				@if(is_null($tests->first()->visit->ward))
					@if($tests->first()->visit->visit_type == 'Out-patient')
						{{ 'OPD' }}
					@endif
				@else
					{{ $tests->first()->visit->ward->name }}
				@endif
			@endif
		@endif
		</td>
		<td colspan="7"><strong>Requesting Officer: </strong>
		@if(isset($tests))
			{{ is_null($tests->first()) ? '':$tests->first()->requested_by }}
		@endif
		</td>
		<td colspan="6"><strong>Contact: </strong>
		@if(isset($tests))
			{{ is_null($tests->first()) ? '':$tests->first()->requested_by }}
		@endif
		</td>
	</tr>
</table>
<br>
<br>
<table style="border-bottom: 1px solid #cecfd5;">
		<tr>
			<th colspan="6"><b>Lab Reception</b></th>
		</tr>
</table>
<table style="border-bottom: 1px solid #cecfd5;">
		<tr>
			<td colspan="2"><b>Specimen Type</b></td>
			<td colspan="2"><b>Received By</b></td>
			<td colspan="2"><b>Date Collected</b></td>
			<td colspan="2"><b>Date Received</b></td>
			<!-- <td colspan="2"><b>{{ trans('messages.specimen-status')}}</b></td> -->
			<td colspan="3"><b>{{ Lang::choice('messages.test-category', 2)}}</b></td>
			<td colspan="2"><b>Tests Requested</b></td>
		</tr>
</table>
<table style="border-bottom: 1px solid #cecfd5;">
		@forelse($tests as $test)
				<tr>
					<td colspan="2">{{ $test->specimen->specimenType->name }}</td>
					@if($test->specimen->specimen_status_id == UnhlsSpecimen::NOT_COLLECTED)
						<td colspan="2"></td>
						<td colspan="2"></td>
						<td colspan="2"></td>
						<!-- <td colspan="2">{{trans('messages.specimen-not-collected')}}</td> -->
					@elseif($test->specimen->specimen_status_id == UnhlsSpecimen::ACCEPTED)
						<td colspan="2">{{$test->specimen->acceptedBy->name}}</td>
						<td colspan="2">{{$test->specimen->time_collected}}</td>
						<td colspan="2">{{$test->specimen->time_accepted}}</td>
						<!-- <td colspan="2">{{trans('messages.specimen-accepted')}}</td> -->
					@elseif($test->test_status_id == UnhlsTest::REJECTED)
						<td colspan="2">{{$test->specimen->rejectedBy->name}}</td>
						<td colspan="2">{{$test->specimen->time_collected}}</td>
						<td colspan="2">{{$test->specimen->time_rejected}}</td>
						<!-- <td colspan="2">{{trans('messages.specimen-rejected')}}</td> -->
					@endif
					<td colspan="3">{{ $test->testType->testCategory->name }}</td>
					<td colspan="2">{{ $test->testType->name }}</td>
				</tr>
		@empty
			<tr>
				<td colspan="6">{{trans("messages.no-records-found")}}</td>
			</tr>
		@endforelse
</table>

<br>
<br>
<table  style="border-bottom: 1px solid #cecfd5;">
	<tr>
		<th colspan="6"><b>{{trans('messages.test-results')}}</b></th>
	</tr>
</table>
<table  style="border-bottom: 1px solid #cecfd5;">
	<tr>
		<td colspan="2"><b>{{Lang::choice('messages.test-type', 1)}}</b></td>
		<td colspan="8"><b>{{trans('messages.test-results-values')}}</b></td>
		<td colspan="2"><b>{{trans('messages.tested-by')}}</b></td>
		<td colspan="2"><b>Report Date</b></td>
	</tr>
</table>
@forelse($tests as $test)
	@if(!$test->testType->isCulture() && ($test->isCompleted() || $test->isVerified()))
	<table  style="border-bottom: 1px solid #cecfd5;">
		<tr>
			<td colspan="2">{{ $test->testType->name }}</td>
			<td colspan="8">
				<table style="padding: 1px;">
				@foreach($test->testResults as $result)
					<!-- show only parameters with values -->
					@if($result->result != '')
					<tr>
						@if($test->testType->measures->count() > 1)
						<td>
							{{ App\Models\Measure::find($result->measure_id)->name }}:
						</td>
						@endif
						<td>
						{{ $result->result }}
						</td>
						<td>
							{{ App\Models\Measure::getRange($test->visit->patient, $result->measure_id) }}
						</td>
						<td>
							{{ App\Models\Measure::find($result->measure_id)->unit }}
						</td>
					</tr>
					@endif
				@endforeach
				@if($test->testType->name == 'HIV')
					<tr>
						<td>
							<b>Interpretaion:</b>{{$test->interpreteHIVResults()}}
						</td>
					</tr>
				@else
					<tr>
						<td colspan="4">
							<b>Comments/Interpretation:</b> {{ $test->interpretation == '' ? 'N/A' : $test->interpretation }}
						</td>
					</tr>
				@endif
				</table>
			</td>
			<td colspan="2">{{ $test->isCompleted()?$test->testedBy->name:'Pending'}}</td>
			<td colspan="2">{{ $test->time_completed }}</td>
		</tr>
	</table>
	@elseif($test->testType->isCulture())
        <!-- Culture and Sensitivity analysis -->
        @if(count($test->isolated_organisms)>0)<!-- if there are any isolated organisms -->
        <table style="border-bottom: 1px solid #cecfd5;">
            <tr>
              <td colspan="3"></td>
            </tr>
            <tr>
              <td colspan="3">Antimicrobial Susceptibility Testing(AST)</td>
            </tr>
            <tr>
                <th><b>Organism(s)</b></th>
                <th><b>Antibiotic(s)</b></th>
                <th><b>Result(s)</b></th>
            </tr>
        </table>
        @foreach($test->isolated_organisms as $isolated_organism)
        <table style="border-bottom: 1px solid #cecfd5;">
          <tr>
            <td rowspan="{{$isolated_organism->drug_susceptibilities->count()}}" class="organism">{{$isolated_organism->organism->name}}</td>
              <?php $i = 1; ?>
            @if($isolated_organism->drug_susceptibilities->count() == 0)
              </tr>
            @else
              @foreach($isolated_organism->drug_susceptibilities as $drug_susceptibility)
                @if ($i > 1)
                <tr>
                @endif
                <?php $i++; ?>
                <td class="antibiotic">{{$drug_susceptibility->drug->name}}</td>
                <td class="result">{{$drug_susceptibility->drug_susceptibility_measure->symbol}}</td>
              </tr>
              @endforeach
            @endif
        </table>
        @endforeach

        <table style="border-bottom: 1px solid #cecfd5;">
            <tr>
              <td>Comment(s)</td>
              <td colspan="2">
              {{$test->interpretation}}
              </td>
            </tr>
        </table>

        </hr>
        <table style="border-bottom: 1px solid #cecfd5;">
            <tr>
              <td><b>Analysis Performed by:</b></td>
              <td>{{ $test->isCompleted()?$test->testedBy->name:'Pending' }}</td>
              <!-- <td><b>Verified by:</b></td>
              <td>{{ $test->isVerified()?$test->verifiedBy->name:'Pending' }}</td> -->
            </tr>
        </table>

        <table style="border-bottom: 1px solid #cecfd5;">
            <tr>
               <td colspan="2">Result Guide</td>
               <td colspan="4" style="text-align:left;">S-Sensitive | R-Resistant | I-Intermediate</td>
            </tr>
        </table>
        @else<!-- if there are no isolated organisms -->
            @if($test->culture_observation)<!-- if there are comments -->
            <table>
                  <tr>
                    <td>{{ $test->culture_observation->observation }}</td>
                  </tr>
            </table>
            @endif<!--./ if there are comments -->
        @endif<!--./ if there are no isolated organisms -->
	@endif
@empty
<table  style="border-bottom: 1px solid #cecfd5;">
	<tr>
		<td colspan="6">{{trans("messages.no-records-found")}}</td>
	</tr>
</table>
@endforelse

<hr>
<table>
	<tr><td></td><td></td></tr>
	<tr>
		<td>
			<strong>Reviewed By : </strong>
			{{ trans('messages.signature-holder') }}
		</td>
		<td style="text-align: right">
			<strong>Authorised By : </strong>
			{{ trans('messages.signature-holder') }}
		</td>
	</tr>
</table>
