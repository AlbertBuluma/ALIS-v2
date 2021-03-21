<style type="text/css">
	 table {
	 	padding: 2px;
	 }
</style>
<table style="border-bottom: 1px solid #cecfd5; font-size:9px; font-family: Bookman Old Style; width: 100%; text-align: left">
	<thead>
	    <tr align="left">
	            <th width="20%"><strong>Sample Type</strong></th>
	            <th width="20%"><strong>Date Collected</strong></th>

	            <th width="20%"><strong>Date Received</strong></th>

	            <th width="20%"><strong>{{ Lang::choice('messages.test-category', 1)}}</strong></th>
	            <th width="20%"><strong>Tests Requested</strong></th>
	        </tr>
	</thead>
	<tbody>
	    @if(isset($tests))
	        @forelse($tests as $test)
	                <tr>
	                    <td>{{getSpecimenName($test->specimen->id)}}</td>

	                    @if($test->specimen->specimen_status_id == App\Models\UnhlsSpecimen::NOT_COLLECTED)

	                        <td>{{trans('messages.specimen-not-collected')}}</td>
	                        <td>not received</td>
	                    @elseif($test->specimen->specimen_status_id == App\Models\UnhlsSpecimen::ACCEPTED)
	                        <td >{{ ($test->specimen->time_collected)?$test->specimen->time_collected:'' }}</td>
	                        <td >{{isset($test->specimen->time_accepted)?$test->specimen->time_accepted : ''}}</td>

	                    @elseif($test->test_status_id == App\Models\UnhlsTest::REJECTED)
	                        <td >{{trans('messages.specimen-not-collected')}}</td>
	                        <td >{{isset($test->specimen->time_rejected)?$test->specimen->time_rejected:''}}</td>

	                    @endif

	                    <td >{{getLabSection($test->testType->id)}}</td>
	                    <td >{{ isset($test->testType->name)?$test->testType->name:'' }}</td>
	                </tr>
	        @empty
	            <tr>
	                <td colspan="5">{{trans("messages.no-records-found")}}</td>
	            </tr>
	        @endforelse
	    @endif
	</tbody>
</table>


<table width="100%">
	<thead>
		<tr>
			<th width="20%"><strong>Test Status :</strong></th>
			 <td width="30%"><u>{{trans('messages.specimen-rejected')}}</u></td>
		</tr>
	</thead>
</table>

<br>
<br>
<table style="border-bottom: 1px solid #cecfd5; font-size:9px;font-family: Bookman Old Style;">
	<tr>


		<td colspan="5" align="center"><b>REJECTION REASONS</b></td>

	</tr>
</table>
@forelse($tests as $test)
	@if($test->specimenIsRejected())
	<table style="border-bottom: 1px solid #cecfd5; font-size:10px;font-family: 'Bookman Old Style;">
		<tr>
			<td>
				<table style="padding: 1px;">

					<tr>
						<td width="100%">
							<ul>
								@foreach(getRejectionReasons($test->id) as $reason)
								<li>{{ $reason->reason }}</li>
								@endforeach
								</ul></td>

					</tr>
				</table>
			</td>
		</tr>
	</table>
	<table style="border-bottom: 1px solid #cecfd5; font-size:10px;font-family: 'Courier New',Courier;">
        <tr>
            <td><b>Rejected By:</b></td>
             <td colspan="2">
              {{$test->analyticSpecimenRejections->rejectedBy->name}}
            </td>
        </tr>
        <tr>
			<td width="50%" style="font-size:9px">
				<b>Rejected Date & Time</b>:{{ $test->analyticSpecimenRejections->time_rejected }}
			</td>
		</tr>
    </table>


	@elseif($test->testType->isCulture())
        <!-- Culture and Sensitivity analysis -->
        @if(count($test->isolated_organisms)>0)<!-- if there are any isolated organisms -->
        <table style="border-bottom: 1px solid #cecfd5; font-size:9px;font-family: 'Courier New',Courier;">
            <tr>
              <td colspan="3"></td>
            </tr>
            <tr>
              <td colspan="6">Antimicrobial Susceptibility Testing(AST)</td>
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
            <td rowspan="{{$isolated_organism->drug_susceptibilities->count()}}" class="organism"><i><b>{{$isolated_organism->organism->name}}</b></i></td>
              <?php $i = 1; ?>
            @if($isolated_organism->drug_susceptibilities->count() == 0)
          </tr>
            @else
              @foreach($isolated_organism->drug_susceptibilities as $drug_susceptibility)
                @if ($i > 1)
                <tr>
	                @endif
	                <?php $i++; ?>
	                <td style="font-size:10px;" class="antibiotic">{{$drug_susceptibility->drug->name}}</td>
	                <td style="font-size:10px;" class="result">{{$drug_susceptibility->drug_susceptibility_measure->symbol}}</td>
              	</tr>
              @endforeach
            @endif

        </table>
        @endforeach

        <table style="border-bottom: 1px solid #cecfd5; font-size:10px;font-family: 'Courier New',Courier;">
            <tr>
              <td><b>Comment(s)</b></td>
              <td colspan="2">
              {{$test->interpretation}}
              </td>
            </tr>
             <tr>
				<td width="50%" style="font-size:9px">
					<b>Results Entry Date</b>:{{ $test->time_completed }}
				</td>
			</tr>
        </table>

        <table style="border-bottom: 1px solid #cecfd5; font-size:10px;font-family: 'Courier New',Courier;">
            <tr>
              <td colspan="2"><b>Analysis Performed by:</b></td>
              <td colspan="4">{{ $test->testedBy->name }}</td>
              <!-- <td><b>Verified by:</b></td>
              <td>{{ $test->isVerified()?$test->verifiedBy->name:'Pending' }}</td> -->
            </tr>
        </table>

        <table style="border-bottom: 1px solid #cecfd5; font-size:10px;font-family: Bookman Old Style;">
            <tr>
               <td colspan="2"><b>Results Guide</b></td>
               <td colspan="4"><b>S-Sensitive | R-Resistant | I-Intermediate</b></td>
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
	<tr><td></td></tr>
	<tr>
		<td>
			<strong>Approved By :

			  @if(isset($tests))
                @if(!empty($tests->first()))
                    @if(!empty($tests->first()->isApproved()))

                        {{$tests->first()->approvedBy->name}}
                    @else

                    @endif

                @endif
            @endif
            </strong>
		</td>
	</tr>
	<!-- <tr><td><u><strong></strong></u></td></tr> -->
</table>
