<style type="text/css">
    table {
        padding: 3px;
    }
    th{
        text-align: left;
    }
    .pagenum:before {
        content: counter(page);
    }
    footer{
        position: fixed;
        bottom: -60px;
        left: 0px;
        right: 0px;
        height: 50px;

        /** Extra personal styles **/
        /*background-color: #03a9f4;*/
        color: black;
        text-align: center;
        line-height: 35px;
    }
</style>
    <table style="text-align:center; margin-top: -20px;" >

        <tr>
            <td colspan="12" style="text-align:center;">
            {{ @HTML::image(config('kblis.organization-logo'),  config('kblis.country') . trans('messages.court-of-arms'), array('width' => '90px')) }}
            </td>
        </tr>
        <tr>

            <td colspan="12" style="text-align:center;"><b>
                    {{ strtoupper(config('constants.MINISTRY')) }}<br>
                    <span style="font-size:14px">
                        {{ strtoupper(config('constants.FACILITY_NAME')) }}<br>
                    </span>

                    {{config('kblis.address-info')}}<br>
                    {{config('kblis.telephone-number')}}<br>
                    {{config('kblis.email-address')}}<br></b>
                @if(isset($tests))
                    @if(!empty($tests->first()->approved_by))
                        {{config('kblis.final-report-name')}}
                    @else
                        {{config('kblis.interim-report-name')}}
                    @endif
                @endif
            </td>
        </tr>

    </table>

<table style="border-bottom: 1px solid #cecfd5; font-size:8px; width: 100%;
 font-family: 'Courier New',Courier;">
    <tr>
        <td width="15%"><strong>Patient ID</strong>:</td>
        <td width="55%" style="text-align:left; ">{{ $patient->ulin}}</td>

        <td width="15%"><strong>{{ trans('messages.report-date')}}</strong>:</td>
        <td width="15%" style="text-align:left;">{{ date('d-m-Y') }}</td>

    </tr>
</table>
<br>
<table style="border-bottom: 1px solid #cecfd5; font-size:8px; width: 100%;
 font-family: 'Courier New',Courier;">
    <tr>
        <td width="13%"><strong>{{ trans('messages.patient-name')}}</strong>:</td>
        @can('view_names')
            <td width="28%" style="text-align:left;">{{ $patient->name }}</td>
        @else
            <td width="28%" style="text-align:left;">N/A</td>
        @endcan
        <td width="8%"><strong>{{ trans('messages.gender')}}</strong>:</td>
        <td width="8%" style="text-align:left;">{{ $patient->getGender(false) }}</td>

        <td width="5%"><strong>{{ trans('messages.age')}}</strong>:</td>
        <td width="8%" style="text-align:left;">{{ $patient->getAge()}}</td>

        <td width="15%"><strong>{{ trans('messages.patient-contact')}}</strong>:</td>
        <td width="15%" style="text-align:left;">{{ $patient->phone_number}}</td>

    </tr>
</table>

<table style="border-bottom: 1px solid #cecfd5; font-size:8px; width: 100%;
 font-family: 'Courier New',Courier;">
    <tr>
        <td width="20%"><strong>Requesting Officer</strong>:</td>
        <td width="30%">
            @if(isset($tests))
                @if(!empty($tests->first()))
                    @if(!empty($tests->first()->requested_by))
                        {{$tests->first()->clinician->name}}
                    @elseif(!empty($tests->first()->clinician_id))
                        {{$tests->first()->clinicians->name}}
                    @endif
                @endif
            @endif
        </td>
        <td width="20%"><strong>Officer's Contact</strong>:</td>
        <td width="30%">
            @if(isset($tests))
                @if(!empty($tests->first()))
                    @if(!empty($tests->first()->therapy->contact))
                        {{$tests->first()->therapy->contact}}
                    @elseif(!empty($tests->first()->clinician_id))
                        {{$tests->first()->clinicians->phone}}
                    @endif
                @endif
            @endif
        </td>



    </tr>
    <tr>
        <td width="20%"><strong>Facility/Dept</strong>:</td>
        <td width="30%">
            @if(isset($tests))
                @if(!is_null($tests->first()))
                    {{ is_null($tests->first()->visit->ward) ? '':$tests->first()->visit->ward->name }}
                @else
                    {{ is_null($tests->first()->visit->facility) ? '':$tests->first()->visit->facility->name }}
                @endif
            @endif
        </td>

        <td width="25%"><strong>Patient Facility/Dept ID</strong>:</td>
        <td width="25%">

            @if(isset($tests))
                @if(!is_null($tests->first()))
                    {{is_null( $patient->patient_number)?'': $patient->patient_number}}
                @else
                    {{ is_null($tests->first()->visit) ? '':$tests->first()->visit->facility_lab_number }}
                @endif
            @endif


        </td>
    </tr>
</table>
<br>
<br>

<table style="border-bottom: 1px solid #cecfd5; font-size:8px; width: 100%;
 font-family: 'Courier New',Courier;">
    <thead>
    <tr>
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
                <td>{{ isset($test->specimen->specimen_type_id)?$test->specimen->specimenType->name:'' }}</td>

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

                <td >{{ isset($test->testType->test_category_id)?$test->testType->testCategory->name:'' }}</td>
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


<br>
<br>
<table style="border-bottom: 1px solid #cecfd5; font-size:8px;font-family: 'Courier New',Courier; width: 100%;">
    <tr>
        <td colspan="2"><b>{{Lang::choice('messages.test-type', 1)}}</b></td>

        <td colspan="2"><b>TEST RESULTS</b></td>

    </tr>
</table>

@forelse($tests as $test)
    @if( $test->testStatus->name == 'approved')
        <table  id="results_content_id" style="border-bottom: 1px solid #cecfd5; font-size:8px;font-family: 'Courier New',Courier; width: 100%;">
            <tr>
                <td width="20%">{{ $test->testType->name }}</td>
                <td width="80%">
                    <table style="padding: 1px; width: 100%;">
                        <thead>

                        <tr>
                            <th width="15%"><b>Parameter</b></th>
                            <th width="15%"><b>Result</b></th>
                            <th width="15%"><b>Reference Interval</b></th>
                            <th width="16%"><b>SI units</b></th>
                            <th width="7%"><b>Diagnostic Flag</b></th><!-- Diagnostic Flag column for results-->
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($test->testResults as $result)
                            <!-- show only parameters with values -->
                            @if($result->result != '')
                                <tr>
                                    <td>@if($test->testType->measures->count() > 1)

                                            {{ App\Models\Measure::find($result->measure_id)->name }}:

                                        @endif</td>
                                    <td>
                                        @if($result->revised_result!=null)
                                            {{$result->revised_result}} (Revised result)
                                        @else
                                            {{$result->result}}
                                        @endif
                                    </td>
                                    <td>
                                        {{ App\Models\Measure::getRange($test->visit->patient, $result->measure_id) }}
                                    </td>
                                    <td>
                                        {{ App\Models\Measure::find($result->measure_id)->unit }}
                                    </td>
                                    <td>@if(!is_null(App\Models\Measure::getRange($test->visit->patient, $result->measure_id)))
                                            {{App\Models\Measure::measureFlag($test->visit->patient, $result->measure_id, $result->result) }}
                                        @endif
                                    </td><!-- Diagnostic Flag column for results-->
                                </tr>
                            @endif
                        @endforeach
                        @if($test->testType->name == 'HIV')
                            <tr>
                                <td><b>Interpretation:</b></td> <td>{{$test->interpreteHIVResults()}}</td>
                            </tr>
                        @endif
                        <tr>
                            <td width="100%"><br><br>
                                <b>{{trans('messages.comments')}}:</b> {{ $test->interpretation == '' ? 'Suitable for the test' : $test->interpretation }}
                            </td>
                        </tr>
                        <tr>
                            <td width="100%">
                                <b>Equipment/Technique used:</b>
                                @if(is_null($test->instrument_id) || $test->instrument_id == '0')
                                    {{$test->method_used}}
                                @elseif(is_null($test->method_used))
                                    {{$test->equipment->name}}
                                @else
                                @endif
                            </td>

                        </tr>
                        <tr>
                            <td width="50%" style="font-size:8px">
                                @if($test->time_revised!=null)
                                    <b>Results Revision Date</b>:{{$test->time_revised}}
                                @else
                                    <b>Results Entry Date</b>:{{ $test->time_completed }}
                                @endif
                            </td>
                            <td width="50%">
                                <b>{{trans('messages.tested-by')}}</b>:
                                {{ $test->testedBy->name}}
                            </td>
                        </tr>
                        <tr>
                            @if($test->time_revised!=null)
                                <td></td>
                                <td></td>
                            @else
                                <td width="50%"><b>Reviewed by</b>:{{$test->verifiedBy->name}}</td>
                                <td width="50%"><b>Date Reviewed</b>:{{$test->time_verified}}</td>
                            @endif
                        </tr>

                        </tbody>
                    </table>
                </td>


            </tr>

        </table>
    @elseif($test->testType->isCulture())
        <!-- Culture and Sensitivity analysis -->
        @if(count($test->isolated_organisms)>0)<!-- if there are any isolated organisms -->
        <table style="border-bottom: 1px solid #cecfd5; font-size:8px;font-family: 'Courier New',Courier; width: 100%;">
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

        <table style="border-bottom: 1px solid #cecfd5; width: 100%;">
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
                <td>{{ isset($test->tested_by)?$test->testedBy->name:'' }}</td>
            <!-- <td><b>Verified by:</b></td>
              <td>{{ $test->isVerified()?$test->verifiedBy->name:'Pending' }}</td> -->
            </tr>
        </table>

        <table style="border-bottom: 1px solid #cecfd5; width: 100%;">
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
    <table  style="border-bottom: 1px solid #cecfd5; width: 100%;">
        <tr>
            <td colspan="6">{{trans("messages.no-records-found")}}</td>
        </tr>
    </table>
@endforelse

<hr>

<table style="border-bottom: 1px solid #cecfd5; font-size:8px;font-family: 'Courier New',Courier; width: 100%;">
    <tr><td></td></tr>
    <tr>
        <td>
            <strong>Approved By :{{isset($tests->first()->approvedBy->name)? $tests->first()->approvedBy->name:''}}</strong>

        </td>
    </tr>
    <!-- <tr><td><u><strong></strong></u></td></tr> -->
</table>
{{--<footer>--}}
{{--    <div>Page<span class="pagenum"></span></div>--}}
{{--    <script type="text/php">--}}
{{--            if ( isset($pdf) ) {--}}
{{--                $font = Font_Metrics::get_font("helvetica", "bold");--}}
{{--                $pdf->page_text(490, 800, "Page: {PAGE_NUM} of {PAGE_COUNT}", $font, 7, array(0,0,0));--}}
{{--            }--}}
{{--          </script>--}}
{{--</footer>--}}

