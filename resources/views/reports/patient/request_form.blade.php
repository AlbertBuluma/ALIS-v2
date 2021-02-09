<style type="text/css">
	 table {
	 	padding: 2px;
	 }
</style>


<br>
<br>

<table style="border-bottom: 1px solid #cecfd5; font-size:8px; width: 100%;
 font-family: 'Courier New',Courier;">
	<thead>
		<tr>
		<td colspan="2"><b>Examination Requested</b></td>
		</tr>
	    <tr align="left">
	            <th width="20%"><strong>Tests</strong></th>
	            <th width="20%"><strong>Sample Type</strong></th>
	            <th width="20%"><strong>{{ Lang::choice('messages.test-category', 1)}}</strong></th>
	            <th width="20%"><strong>Date Collected</strong></th>
	            <th width="20%"><strong>Date Received</strong></th>

	        </tr>
	</thead>
	<tbody>
	    @if(isset($tests))
	        @forelse($tests as $test)
	                <tr>
	                    <td width="20%">{{ isset($test->testType->name)?$test->testType->name:'' }}</td>
	                    <td width="20%">{{ isset($test->specimen->id)? $test->specimen->specimenType->name : ''}}</td>
	                    <td width="20%">{{ isset($test->testType->id)?$test->testType->testCategory->name:'' }}</td>

	                    @if($test->specimen->specimen_status_id == App\Models\UnhlsSpecimen::NOT_COLLECTED)

	                        <td width="20%">{{trans('messages.specimen-not-collected')}}</td>
	                        <td width="20%">not received</td>
	                    @elseif($test->specimen->specimen_status_id == App\Models\UnhlsSpecimen::ACCEPTED)
	                        <td width="20%">{{ ($test->specimen->time_collected)?date_format(date_create($test->specimen->time_collected), 'd-M-Y H:i:s'):'' }}</td>
	                        <td width="20%">{{ ($test->time_started)?date_format(date_create($test->time_started), 'd-M-Y H:i:s'):'' }}</td>

	                    @elseif($test->test_status_id == App\Models\UnhlsTest::REJECTED)
	                        <td width="20%">{{trans('messages.specimen-not-collected')}}</td>
	                        <td width="20%">{{isset($test->specimen->time_rejected)?date_format(date_create($test->specimen->time_rejected), 'd-M-Y H:i:s'):''}}</td>

	                    @endif

	                </tr>
	        @empty
	            <tr>
	                <td colspan="5">{{trans("messages.no-records-found")}}</td>
	            </tr>
	        @endforelse
	    @endif
	</tbody>

</table>

<br>
<br>

<table style="border-bottom: 1px solid #cecfd5; font-size:8px; width: 100%;
 font-family: 'Courier New',Courier;">
	 @if(isset($tests))

		<tr>
		<td width="30%"><b>Type of Request</b></td>
		<td width="30%">
			@if($tests->first()->urgency_id == 1)
			<b><i>Emergency</i></b>
			@else
			<span><i>Normal</i></span>
			<span>Mob:: </span>
			@endif</td>
		</tr>
		@endif
</table>

<br>
<br>
<table style="border-bottom: 1px solid #cecfd5; font-size:8px; width: 100%;
 font-family: 'Courier New',Courier;">
	<thead>
		<tr>
		<td colspan="2"><b>Test Requested By</b></td>
		</tr>
	    <tr align="left">
	            <th width="30%"><strong>Name</strong></th>
	            <th width="30%"><strong>Cadre</strong></th>
	            <th width="30%"><strong>Mob:</strong></th>

	        </tr>
	</thead>
	<tbody>
	    @if(isset($tests))
	       <!--  @forelse($tests as $test) -->
	                <tr>
	                    <td width="30%">@if(isset($tests))
                @if(!empty($tests->first()->requested_by))
                    {{$tests->first()->clinician->name}}

                    @elseif($tests->first()->therapy->clinician_id)
                    {{$tests->first()->therapy->pickedBy->name}}
                    @else
                    N/A
                    @endif
             @endif</td>
	                    <td width="30%"></td>
	                    <td width="30%"></td>


	                </tr>
	       <!--  @empty
	            <tr>
	                <td colspan="5">{{trans("messages.no-records-found")}}</td>
	            </tr>
	        @endforelse -->
	    @endif
	</tbody>

</table>

<br>

<table style="border-bottom: 1px solid #cecfd5; font-size:8px; width: 100%;
 font-family: 'Courier New',Courier;">
	<thead>
		<tr>
		<td colspan="2"><b>Sample Collected By</b></td>
		</tr>
	    <tr align="left">
	            <th width="20%"><strong>Name</strong></th>
	            <th width="20%"><strong>Cadre</strong></th>
	            <th width="20%"><strong>{{ Lang::choice('messages.test-category', 1)}}</strong></th>
	            <th width="20%"><strong>Date Collected</strong></th>
	            <th width="20%"><strong>Time Collected</strong></th>

	        </tr>
	</thead>
	<tbody>
	    @if(isset($tests))
	       <!--  @forelse($tests as $test) -->
	                <tr>
	                    <td width="20%">{{ isset($test->specimen->accepted_by)?$test->specimen->acceptedBy->name :'' }}</td>
	                    <td width="20%">{{ isset($test->specimen->accepted_by)?$test->specimen->acceptedBy->designation :'' }}</td>
	                    <td width="20%">{{ isset($test->testType->id)?$test->testType->testCategory->name:'' }}</td>

	                    @if($test->specimen->specimen_status_id == App\Models\UnhlsSpecimen::NOT_COLLECTED)

	                        <td width="20%">{{trans('messages.specimen-not-collected')}}</td>
	                        <td width="20%">not received</td>
	                    @elseif($test->specimen->specimen_status_id == App\Models\UnhlsSpecimen::ACCEPTED)
	                        <td width="20%">{{ ($test->specimen->time_collected)?date_format(date_create($test->specimen->time_collected), 'd-M-Y'):'' }}</td>
	                        <td width="20%">{{isset($test->specimen->time_collected)?date_format(date_create($test->specimen->time_collected), 'H:i:s'): ''}}</td>

	                    @elseif($test->test_status_id == App\Models\UnhlsTest::REJECTED)
	                        <td width="20%">{{trans('messages.specimen-not-collected')}}</td>
	                        <td width="20%">{{isset($test->specimen->time_rejected)?date_format(date_create($test->specimen->time_rejected), 'd-M-Y H:i:s'):''}}</td>

	                    @endif

	                </tr>
	        <!-- @empty
	            <tr>
	                <td colspan="5">{{trans("messages.no-records-found")}}</td>
	            </tr>
	        @endforelse -->
	    @endif
	</tbody>

</table>

<br>

<table style="border-bottom: 1px solid #cecfd5; font-size:8px; width: 100%;
 font-family: 'Courier New',Courier;">
	<thead>
		<tr>
		<td colspan="2"><b>Sample Received By</b></td>
		</tr>
	    <tr align="left">
	            <th width="20%"><strong>Lab Section</strong></th>
	            <th width="15%"><strong>Date Received</strong></th>
	            <th width="15%"><strong>Time Received</strong></th>
	            <th width="20%"><strong>Sample Suitability</strong></th>
	            <th width="20%"><strong>Name</strong></th>
	            <th width="10%"><strong>Number</strong></th>

	        </tr>
	</thead>
	<tbody>
	    @if(isset($tests))
	        @forelse($tests as $test)
	                <tr>
	                    <td width="20%">{{ isset($test->testType->id)?$test->testType->testCategory->name:'' }}</td>

	                    @if($test->specimen->specimen_status_id == App\Models\UnhlsSpecimen::NOT_COLLECTED)

	                        <td width="15%">{{trans('messages.specimen-not-collected')}}</td>
	                        <td width="15%">not received</td>
	                    @elseif($test->specimen->specimen_status_id == App\Models\UnhlsSpecimen::ACCEPTED)
	                        <td width="15%">{{ ($test->time_started)?date_format(date_create($test->time_started), 'd-M-Y'):'' }}</td>
	                        <td width="15%">{{ ($test->time_started)?date_format(date_create($test->time_started), 'H:i:s'):'' }}</td>

	                    @elseif($test->test_status_id == App\Models\UnhlsTest::REJECTED)
	                        <td width="15%">{{trans('messages.specimen-not-collected')}}</td>
	                        <td width="15%">{{isset($test->specimen->time_rejected)?date_format(date_create($test->specimen->time_rejected), 'd-M-Y H:i:s'):''}}</td>

	                    @endif
	                    <td width="20%">
	                    	@if($test->specimen->specimen_status_id == App\Models\UnhlsSpecimen::ACCEPTED)
	                    	Acceptable
	                    @elseif($test->test_status_id == App\Models\UnhlsTest::REJECTED)
	                    Rejected
	                	@endif</td>
	                    <td width="20%">{{ isset($test->tested_by)?$test->testedBy->name :'' }}</td>
	                    <td width="10%"></td>

	                </tr>
	        @empty
	            <tr>
	                <td colspan="5">{{trans("messages.no-records-found")}}</td>
	            </tr>
	        @endforelse
	    @endif
	</tbody>

</table>

<br>

@forelse($tests as $test)
	@if( $test->testStatus->name == 'approved' || $test->testStatus->name == 'verified')
	<table>
		<tr>
			<td width="15%" style="display:none;">{{ $test->testType->name }}</td>
			<td width="85%">

			</td>


		</tr>

	</table>

	@endif
@empty
<table>
	<tr>
		<td colspan="6">{{trans("messages.no-records-found")}}</td>
	</tr>
</table>
@endforelse


