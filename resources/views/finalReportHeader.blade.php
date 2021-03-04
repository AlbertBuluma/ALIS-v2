@section ("interimReportHeader")
<style type="text/css">
     table {
        padding: 2px;
     }
     TD{font-family: Bookman Old Style; font-size: 9pt; font-variant: normal;}
</style>

    <table style="padding: 0px;" >
        <thead>
            <tr>
                <td colspan="12"></td>
            </tr>
    </table>
    <table style="text-align:center;" >
            <tr>
                <td colspan="12" style="text-align:center;">
                    {{ @HTML::image(config('kblis.organization-logo'),  config('kblis.country') . trans('messages.court-of-arms'), array('width' => '70px')) }}
                </td>
            </tr>
            <tr>
                <td colspan="12" style="text-align:center;"><b>
                    <span style="font-size:12px">
                        {{ strtoupper(config('constants.FACILITY_NAME')) }}<br>
                    </span>
                     {{config('kblis.address-info')}}
                    </b>
                     {{config('kblis.final-report-name')}}
                </td>
            </tr>
        </thead>
    </table>
<br>
<!-- <table  border="0" width="100%"; style="border-bottom: 1px solid #cecfd5">
    <tr>
        <td width="20%"><b>Patient Name</b></td>
        <td width="30%">{{ $patient->name }}</td>
        <td width="20%"><b>Patient ID</b></td>
        <td width="30%">{{ $patient->ulin }}</td>
    </tr>
    <tr>
        <td width="20%"><b>{{ trans('messages.gender')}} & {{ trans('messages.age')}}</b></td>
        <td width="30%">{{ $patient->getGender(false) }} | {{ $patient->getAge()}}</td>
        <td width="20%"><strong>Patient's Contact</strong>:</td>
        <td width="30%">{{ $patient->phone_number}}</td>
    </tr>
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

        <td width="20%"><strong>Officer's Contact</strong>:{{ is_null($tests->first()->therapy->contact)? '': $tests->first()->therapy->contact}}</td>
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
</table> -->
@show
