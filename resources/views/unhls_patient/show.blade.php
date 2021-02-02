@extends("layout")
@section("content")
    <div>
        <ol class="breadcrumb">
          <li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
          <li><a href="{{ route('unhls_patient.index') }}">{{ Lang::choice('messages.patient',2) }}</a></li>
          <li class="active">{{ trans('messages.patient-details') }}</li>
        </ol>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <span class="glyphicon glyphicon-user"></span>
            {{ trans('messages.patient-details') }}
            <div class="panel-btn">
                <a class="btn btn-sm btn-info" href="{{ route('unhls_patient.edit', array($patient->id)) }}">
                    <span class="glyphicon glyphicon-edit"></span>
                    {{ trans('messages.edit') }}
                </a>
                @can('request_test')
                <a class="btn btn-sm btn-info"
                    href="{{ route('unhls_test.create', array('patient_id' => $patient->id)) }}">
                    <span class="glyphicon glyphicon-edit"></span>
                    {{ trans('messages.new-test') }}
                </a>
                @endcan
            </div>
        </div>
        <div class="panel-body">
            <div class="display-details">
                <h3 class="view"><strong>{{ Lang::choice('messages.name',1) }}</strong>{{ $patient->name }} </h3>
                <p class="view-striped"><strong>{{ trans('messages.patient-number') }}</strong>
                    {{ $patient->patient_number }}</p>
                <p class="view-striped"><strong>NIN</strong>
                    {{ $patient->nin }}</p>
                <p class="view-striped"><strong>{{ trans('messages.ulin') }}</strong>
                    {{ $patient->ulin }}</p>
                <p class="view"><strong>{{ trans('messages.external-patient-number') }}</strong>
                    {{ $patient->external_patient_number }}</p>
                <p class="view-striped"><strong>{{ trans('messages.date-of-birth') }}</strong>
                    {{ $patient->dob }}</p>
                <p class="view"><strong>{{ trans('messages.gender') }}</strong>
                    {{ ($patient->gender==0?trans('messages.male'):trans('messages.female')) }}</p>
                <p class="view-striped"><strong>{{ trans('messages.physical-address') }}</strong>
                    {{ $patient->address }}</p>
                <p class="view-striped"><strong>{{ trans('messages.residence-village') }}</strong>
                    {{ $patient->village_residence }}</p>
                <p class="view-striped"><strong>{{ trans('messages.workplace-village') }}</strong>
                    {{ $patient->village_workplace }}</p>
                <p class="view-striped"><strong>{{ trans('messages.occupation') }}</strong>
                    {{ $patient->occupation }}</p>
                <p class="view"><strong>{{ trans('messages.phone-number') }}</strong>
                    {{ $patient->phone_number }}</p>
                <p class="view-striped"><strong>{{ trans('messages.email-address') }}</strong>
                    {{ $patient->email }}</p>
                <p class="view"><strong>{{ trans('messages.date-created') }}</strong>
                    {{ $patient->created_at }}</p>
            </div>
        </div>
    </div>
@stop

