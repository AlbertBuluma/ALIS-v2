@extends("layout")
@section("content")
    <div>
        <ol class="breadcrumb">
          <li><a href="{{ route('user.home') }}">{{trans('messages.home')}}</a></li>
          <li class="active">Visits</li>
        </ol>
    </div>
    @if (Session::has('message'))
        <div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
    @endif

    <div class='container-fluid'>
        {{ Form::open(array('route' => array('visit.index'))) }}
            <div class='row'>
                <div class='col-md-3'>
                    <div class='col-md-2'>
                        {{ Form::label('date_from', trans('messages.from')) }}
                    </div>
                    <div class='col-md-10'>
                        {{ Form::text('date_from', $dateFrom,
                            array('class' => 'form-control standard-datepicker')) }}
                    </div>
                </div>
                <div class='col-md-3'>
                    <div class='col-md-2'>
                        {{ Form::label('date_to', trans('messages.to')) }}
                    </div>
                    <div class='col-md-10'>
                        {{ Form::text('date_to', $dateTo,
                            array('class' => 'form-control standard-datepicker')) }}
                    </div>
                </div>
                <div class='col-md-3'>
                    @can('manage_visits')
                         <div class='col-md-5'>
                            {{ Form::label('visit_status', trans('messages.visit-status')) }}
                        </div>
                        <div class='col-md-7'>
                            {{ Form::select('visit_status', $visitStatus,
                                Illuminate\Support\Facades\Request::get('visit_status'), array('class' => 'form-control')) }}
                        </div>
                    @endcan
                 </div>
                <div class='col-md-2'>
                        {{ Form::label('search', trans('messages.search'), array('class' => 'sr-only')) }}
                        {{ Form::text('search', Illuminate\Support\Facades\Request::get('search'),
                            array('class' => 'form-control', 'placeholder' => 'Search')) }}
                </div>
                <div class='col-md-1'>
                        {{ Form::submit(trans('messages.search'), array('class'=>'btn btn-primary')) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>

    <br>
    <div class="panel panel-primary tests-log">
        <div class="panel-heading ">
            <div class="container-fluid">
                <div class="row less-gutter">
                    <span class="glyphicon glyphicon-filter"></span>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Date</th>
                        <!-- <th>{{trans('messages.visit-number')}}</th> -->
                        <th>{{trans('messages.patient-number')}}</th>
                        <th>{{trans('messages.ulin')}}</th>
                        <th>{{trans('messages.patient-name')}}</th>
                        <th>{{trans('messages.visit-type')}}</th>
                        <th>{{trans('messages.test-request-status')}}</th>
                        <!-- <th>Status</th> --><!-- speciemen recieved has an issue there may be several - when someone has registered % -->
                    </tr>
                </thead>
                <tbody>
                @foreach($visits as $key => $visit)
                    <tr>
                        <td>
                            {{ $visit->created_at }}</td>
                        <!--visit date -->
                        <!-- <td>
                            {{ empty($visit->visit_number)?
                                $visit->id:
                                $visit->visit_number
                            }}
                        </td> -->
                        <!--Visit Number -->
                        <td>{{ empty($visit->patient->external_patient_number)?
                                $visit->patient->patient_number:
                                $visit->patient->external_patient_number
                            }}</td> <!--Patient Number -->
                        <td>{{$visit->patient->ulin}}</td> <!--unhls terminology -->
                        <td>{{ $visit->patient->name.' ('.($visit->patient->getGender(true)).',
                            '.$visit->patient->getAge('Y'). ')'}}</td> <!--Patient Name -->
                        <td>{{ $visit->visit_type }}</td> <!--Visit Type -->
                        <td>
                            @if($clinicianUI)<!-- for clinician -->
                                @if($visit->isAppointment() && Illuminate\Support\Facades\Auth::user()->can('make_labrequests'))<!-- for clinician -->
                                <a class="btn btn-sm btn-info" href="{{ route('visit.edit',[$visit->id]) }}" >
                                    <span class="glyphicon glyphicon-edit"></span>Make Tests Request
                                </a>
                                @endif
                                @if($visit->isRequest() && Illuminate\Support\Facades\Auth::user()->can('accept_test_specimen'))<!-- for phlebotomist -->
                                <a class="btn btn-sm btn-info" href="{{ route('visit.edit',[$visit->id]) }}" >
                                    <span class="glyphicon glyphicon-edit"></span>Recieve Specimen
                                </a>
                                @endif
                                @if(Illuminate\Support\Facades\Auth::user()->can('manage_appointments') && $visit->isAppointment())
                                    <button class="btn btn-sm btn-danger delete-item-link"
                                        data-toggle="modal" data-target=".confirm-delete-modal"
                                        data-id="{{ route('visit.destroy',[$visit->id])}}">
                                        <span class="glyphicon glyphicon-trash"></span>
                                        Delete Appointment
                                    </button>
                                @endif
                            @endif
                            <!-- restrictions are in the view -->
                            <a class="btn btn-sm btn-success" href="{{ route('visit.show',[$visit->id]) }}">
                                <span class="glyphicon glyphicon-eye-open"></span>
                                Tests
                            </a>
                        </td><!-- ACTION BUTTONS -->
                        <!-- Visit Statuses -->
                        <!-- <td class='test-status'>

                            @if($visit->isAppointment())
                                <span class='label label-success'>Clinician Appointment Made</span>
                            @elseif($visit->isRequest())
                                <span class='label label-info'>Test Requests Made</span>
                            @elseif($visit->hasSpecimenReceived())
                                <span class='label label-warning'>Specimen(s) Received</span>
                            @elseif($visit->hasBeenCompleted())
                                <span class='label label-primary'>Tests Completed</span>
                            @endif

                        </td> -->
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $visits->links() }}
        {{ Session::put('SOURCE_URL', URL::full()) }}
        {{ Session::put('TESTS_FILTER_INPUT', Illuminate\Support\Facades\Request::except('_token')) }}

        </div>
    </div>
    <!-- jQuery barcode script -->
    <script type="text/javascript" src="{{ asset('js/barcode.js') }} "></script>
@stop
