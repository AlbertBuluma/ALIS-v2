@extends("layout")
@section("content")
    <div>
        <ol class="breadcrumb">
          <li><a href="{{{route('user.home')}}}">{{trans('messages.home')}}</a></li>
          <li><a href="#">Reports</a></li>
          <li><a href="#">Visit(s)</a></li>
          <li class="active">Test(s) to recall in Visit</li>
        </ol>
    </div>
    @if (Session::has('message'))
        <div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
    @endif



    <div class="panel panel-primary tests-log">
        <div class="panel-heading ">
            <div class="container-fluid">
                <div class="row less-gutter">

                    <div class="col-md-12">
                        {{ $visit->patient->name.' ('.($visit->patient->getGender(true)).',
                            '.$visit->getAge('Y'). ')'}}


                        |

                        {{ is_null($visit->ward) ? 'N/A':$visit->ward->name }} <!--Unit -->



                        <a class="btn btn-sm btn-primary pull-right" href="#" onclick="window.history.back();return false;"
                            alt="{{trans('messages.back')}}" title="{{trans('messages.back')}}">
                            <span class="glyphicon glyphicon-backward"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th>{{trans('messages.date-ordered')}}</th>
                        <th>{{trans('messages.patient-number')}}</th>
                        <th>Lab Number</th>
                        <!-- <th>{{trans('messages.visit-number')}}</th> -->
                        <th class="col-md-2">{{trans('messages.patient-name')}}</th>
                        <th class="col-md-1">{{trans('messages.specimen-id')}}</th>
                        <th>{{ Lang::choice('messages.test',1) }}</th>
                        <th class="col-md-1">{{trans('messages.visit-type')}}</th>
                        <th class="col-md-1">Unit</th>
                        <th>{{trans('messages.test-request-status')}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($testSet as $key => $test)
                    <!-- todo: revise:for now excluding tests without specimens -->
                    @if(!$test->isNotReceived())
                    <tr
                        @if(Session::has('activeTest'))
                            {{ in_array($test->id, Session::get('activeTest'))?"class='info'":""}}
                        @endif
                        >
                        <td>{{ date('d-m-Y H:i', strtotime($test->time_created));}}</td>  <!--Date Ordered-->
                        <td>{{ empty($test->visit->patient->external_patient_number)?
                                $test->visit->patient->patient_number:
                                $test->visit->patient->external_patient_number
                            }}</td> <!--Patient Number -->
                        <td>{{$test->visit->patient->ulin}}</td> <!--unhls terminology -->
                        <!-- issue: this is confusing people as they may mistake it as ULIN -->
                        <!-- <td>
                            {{ empty($test->visit->visit_number)?
                                $test->visit->id:
                                $test->visit->visit_number
                            }}</td> -->
                        <!--Visit Number -->
                        <td>{{ $test->visit->patient->name.' ('.($test->visit->patient->getGender(true)).',
                            '.$test->visit->getAge('Y'). ')'}}</td> <!--Patient Name -->
                        <td>{{ $test->getSpecimenId() }}</td> <!--Specimen ID -->
                        <td>{{ $test->testType->name }}</td> <!--Test-->
                        <td>{{ $test->visit->visit_type }}</td> <!--Visit Type -->
                        <td>{{ is_null($test->visit->ward) ? 'N/A':$test->visit->ward->name }}</td> <!--Unit -->
                        <!-- ACTION BUTTONS -->
                        <td>



                            @if($test->isApproved())
                                @if(Auth::user()->can('recall_report'))
                                    <a class="btn btn-sm btn-danger" id="recall-{{$test->id}}-link"
                                        href="{{ URL::route('reports.patient.visit.report.recall.test', array($test->id)) }}"
                                        title="{{trans('messages.recall-test-results')}}">
                                        <span class="glyphicon glyphicon-edit"></span>
                                        {{trans('messages.recall-test')}}
                                    </a>
                                @endif

                            @endif



                        </td>


                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        {{ Session::put('SOURCE_URL', URL::full()) }}
        {{ Session::put('TESTS_FILTER_INPUT', Input::except('_token')); }}

        </div>
    </div>








    <!-- jQuery barcode script -->
    <script type="text/javascript" src="{{ asset('js/barcode.js') }} "></script>
@stop
