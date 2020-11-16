@section ("interimReportHeader")
<style type="text/css">
     table {
        padding: 2px;
     }
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

                  <!-- {{ @HTML::image(Config::get('kblis.organization-logo'),  Config::get('kblis.country') . trans('messages.court-of-arms'), array('width' => '40px')) }} -->
                   </td>
            </tr>
            <tr>
               
                <td colspan="12" style="text-align:center;"><b>
                    {{ strtoupper(Config::get('constants.MINISTRY')) }}<br>
                    <span style="font-size:14px">
                        {{ strtoupper(Config::get('constants.FACILITY_NAME')) }}<br>
                    </span>
                    
                    {{Config::get('kblis.address-info')}}</b>
                     {{Config::get('kblis.interim-report-name')}}
                </td>
            </tr>
        </thead>
    </table>

     <br>
    <br>
    <table style="border-bottom: 1px solid #cecfd5; font-size:8px;font-family: 'Courier New',Courier;">
    <tr>
        <td width="15%"><strong>Patient ID</strong>:</td>
        <td width="55%" style="text-align:left; ">{{ $patient->ulin}}</td>

        <td width="15%"><strong>{{ trans('messages.report-date')}}</strong>:</td>
        <td width="15%" style="text-align:left;">{{ date('d-m-Y') }}</td>

    </tr>
</table>
<br>
<table style="border-bottom: 1px solid #cecfd5; font-size:8px;
 font-family: 'Courier New',Courier;">
    <tr>
        <td width="13%"><strong>{{ trans('messages.patient-name')}}</strong>:</td>
        @if(Entrust::can('view_names'))
            <td width="28%" style="text-align:left;">{{ $patient->name }}</td>
        @else
            <td width="28%" style="text-align:left;">N/A</td>
        @endif
        <td width="8%"><strong>{{ trans('messages.gender')}}</strong>:</td>
        <td width="8%" style="text-align:left;">{{ $patient->getGender(false) }}</td>

        <td width="5%"><strong>{{ trans('messages.age')}}</strong>:</td>
        <td width="8%" style="text-align:left;">{{ $patient->getAge()}}</td>

        <td width="15%"><strong>{{ trans('messages.patient-contact')}}</strong>:</td>
        <td width="15%" style="text-align:left;">{{ $patient->phone_number}}</td>
        
    </tr>
</table>

<table style="border-bottom: 1px solid #cecfd5; font-size:8px;
 font-family: 'Courier New',Courier;">
    <tr>
        <td width="20%"><strong>Requesting Officer</strong>:</td>
        <td width="30%">
        @if(isset($tests))
            @if(!empty($tests->first()))
                @if(!empty($tests->first()->requested_by))
                    {{$tests->first()->requested_by}}
                @elseif(!empty($tests->first()->clinician->name))
                    {{$tests->first()->clinician->name}}
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
                    @elseif(!empty($tests->first()->clinician->phone))
                        {{$tests->first()->clinician->phone}}
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
            @endif
        @endif


        </td>

        <td width="25%"><strong>Patient Facility/Dept ID</strong>:</td>
        <td width="25%">
        
            {{is_null( $patient->patient_number)?'': $patient->patient_number}}
            
    
        </td>
    </tr>
</table>

@show
