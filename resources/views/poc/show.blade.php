@extends("layout")
@section("content")
    <div>
        <ol class="breadcrumb">
          <li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
          <li><a href="{{ route('poc.index') }}">{{ Lang::choice('messages.patient',2) }}</a></li>
          <li class="active">{{ trans('messages.patient-details') }}</li>
        </ol>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <span class="glyphicon glyphicon-user"></span> <br>
          Full Infant Details
            <div class="panel-btn">
                <a class="btn btn-sm btn-info" href="{{ route('poc.edit', array($patient->id)) }}">
                    <span class="glyphicon glyphicon-edit"></span>
                    {{ trans('messages.edit') }}
                </a>
                @if(Auth::user()->can('request_test'))
                <a class="btn btn-sm btn-info"
                    href="{{ route('poc.create', array('patient_id' => $patient->id)) }}">
                    <span class="glyphicon glyphicon-edit"></span>
                    {{ trans('messages.new-test') }}
                </a>
                @endif
            </div>
        </div>
        <div class="panel-body">
            <div class="display-details">
                <h5 class="view" style = "color:green;"><strong>Infant Details:</strong>
                  <br>
                  <br>

                    Name: {{ $patient->infant_name }} | Sex: {{ $patient->gender}} | Age: {{ $patient->age}} <i>months</i> | EID Result: {{$patient->results}}
| Equipment Used: {{$patient->equipment_used}}
| Test Date: {{$patient->test_date}}
| Tested By: {{$patient->tested_by}}
</h5>
                    <p class="view-striped"><strong>Care Taker's Mobile No:</strong>{{ $patient->caretaker_number}}</p>
                    <p class="view-striped"><strong>Breastfeeding Child:</strong>{{ $patient->breastfeeding_status}}</p>
                    <p class="view-striped"><strong>Exp Number:</strong>{{ $patient->exp_no }}</p>

                    @if($patient->admission_date ==  '0000-00-00')
                    <p class="view-striped"><strong>Admission Date:</strong>-</p>

                    @else
                    <p class="view-striped"><strong>Admission Date:</strong>{{ $patient->admission_date }}</p>
                    @endif
                    <p class="view"><strong>Entry Point:</strong> {{$patient->entry_point}}
                    <p class="view"><strong>PCR Level:</strong> {{$patient->pcr_level}}
                    <p class="view"><strong>Infant's PMTCT ARVs:</strong> {{$patient->infant_pmtctarv}}
                    <p class="view-striped"><strong>Mother's Name:</strong>{{ $patient->mother_name }}</p>
                    <p class="view-striped"><strong>Mother's HIV Status:</strong>{{ $patient-> mother_hiv_status}}</p>
                    <p class="view-striped"><strong>Mother's PMTCTARV's <i>(If mother is HIV positive)</i>:</strong><i>Antenatal:: </i><strong>{{ $patient->pmtct_antenatal }} </strong> || <i>Delivery:: </i> <strong>{{ $patient->pmtct_delivery }} </strong> || <i>Postnantal:: </i> <strong> {{ $patient->pmtct_postnatal }} </strong></p>

                <p class="view"><strong>{{ trans('messages.date-created') }}</strong>
                    {{ $patient->created_at }}</p>
            </div>
        </div>
    </div>
@stop
