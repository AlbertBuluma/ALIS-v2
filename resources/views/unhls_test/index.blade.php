@extends("layout")
@section("content")

    <style>

        .highliht{
            color: red;
        }

        .highlightedGreen{
            color: green;
        }

    </style>
    <div>
        <ol class="breadcrumb">
            <li><a href="{{{route('user.home')}}}">{{trans('messages.home')}}</a></li>
            <li class="active">{{ Lang::choice('messages.test',2) }}</li>
        </ol>
    </div>
    @if (Session::has('message'))
        <div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
    @endif

    <div class='container-fluid'>
        {{ Form::open(array('route' => array('unhls_test.index'))) }}
        <div class='row'>
            <div class='col-md-2'>
                <div class='col-md-2'>
                    {{ Form::label('date_from', trans('messages.from')) }}
                </div>
                <div class='col-md-10'>
                    {{ Form::text('date_from', $dateFrom,
                        array('class' => 'form-control standard-datepicker')) }}
                </div>
            </div>
            <div class='col-md-2'>
                <div class='col-md-2'>
                    {{ Form::label('date_to', trans('messages.to')) }}
                </div>
                <div class='col-md-10'>
                    {{ Form::text('date_to', $dateTo,
                        array('class' => 'form-control standard-datepicker')) }}
                </div>
            </div>
            <div class='col-md-2'>
                <div class='col-md-5'>
                    {{ Form::label('test_status', trans('messages.test-status')) }}
                </div>
                <div class='col-md-7'>
                    {{ Form::select('test_status', $testStatus,
                        Illuminate\Support\Facades\Request::get('test_status'), array('class' => 'form-control')) }}
                </div>
            </div>
            <div class='col-md-3'>
                <div class='col-md-5'>
                    {{ Form::label('test_category', trans('messages.list-test-categories')) }}
                </div>
                <div class='col-md-7'>
                    {{ Form::select('test_category', $testCategories,
                        Illuminate\Support\Facades\Request::get('test_category'), array('class' => 'form-control','id'=> $selectedTestCategoryId)) }}
                </div>
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
    <div class='container-fluid'>

        <ul class="nav navbar-nav navbar-left">

            <li><a href="{{ route('unhls_test.pending')}}">
                <span class="ion-planet">
                    <font size="3">  Pending <span class="badge badge-danger"> {{ $count = App\Models\UnhlsTest::where('test_status_id', '=', '2')->count()}}</span></font>
                </span>
                </a>
            </li>

            <li><a href="{{ route('unhls_test.started')}}">
                <span class="ion-chatbubbles">
                    <font size="3">  Started Tests <span class="badge badge-success"> {{ $count = App\Models\UnhlsTest::where('test_status_id', '=', '3')->count()}}</font></span>
                    </span>
                </a>
            </li>
            <li><a href="{{ route('unhls_test.completed')}}">
                <span class="ion-chatbubbles">
                    <font size="3">  Completed Tests <span class="badge badge-success"> {{ $count = App\Models\UnhlsTest::where('test_status_id', '=', '4')->count()}}</font></span>
                    </span>
                </a>
            </li>
            <li><a href="{{ route('unhls_test.verified')}}">
                <span class="ion-chatbubbles">
                    <font size="3">Reviewed<span class="badge badge-info"> {{ $count = App\Models\UnhlsTest::where('test_status_id', '=', '5')->count()}}</font></span>
                    </span>
                </a>
            </li>
        </ul>

    </div>



    <div class="panel panel-primary tests-log">
        <div class="panel-heading ">
            <div class="container-fluid">
                <div class="row less-gutter">
                    <div class="col-md-11">
                        <span class="glyphicon glyphicon-filter"></span>{{trans('messages.list-tests')}}
                        @can('request_test')
                            <div class="panel-btn">
                                <a class="btn btn-sm btn-info" href="javascript:void(0)"
                                   data-toggle="modal" data-target="#new-test-modal-unhls">
                                    <span class="glyphicon glyphicon-plus-sign"></span>
                                    {{trans('messages.new-test')}}
                                </a>
                            </div>
                        @endcan
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-sm btn-primary pull-right" href="#" onclick="window.history.back();return false;"
                           alt="{{trans('messages.back')}}" title="{{trans('messages.back')}}">
                            <span class="glyphicon glyphicon-backward"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table id="" class="row-border hover table table-bordered table-condensed table-striped">
                <thead>
                <tr>
                    <th class="col-md-1">{{trans('messages.date-ordered')}}</th>
                    <th class="col-md-1">{{trans('messages.patient-number')}}</th>
                    <th>Lab Number</th>
                <!-- <th>{{trans('messages.visit-number')}}</th> -->
                    <th class="col-md-2">{{trans('messages.patient-name')}}</th>
                <!--  <th class="col-md-1">{{trans('messages.specimen-id')}}</th> -->
                    <th class="col-md-2">{{ Lang::choice('messages.test',1) }}</th>
                    <th class="col-md-1">{{trans('messages.visit-type')}}</th>
                    <th class="col-md-1">Unit</th>
                    <th class="col-md-3">{{trans('messages.test-request-status')}}</th>
                    <th class="col-md-3">{{trans('messages.test-status')}}</th>
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
                            <td>{{ date('d-m-Y H:i', strtotime($test->time_created))}}</td>  <!--Date Ordered-->
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
                            '.$test->visit->exactAge('M'). ')'}}</td> <!--Patient Name -->
                        <!-- <td>{{ $test->getSpecimenId() }}</td>  --><!--Specimen ID -->
                            <td>{{ $test->testType->name }}</td> <!--Test-->
                            <td class="<?php if($test->visit->urgency == 1) echo 'highliht';?>">{{ $test->visit->visit_type }}</td> <!--Visit Type -->
                            <td>{{ is_null($test->visit->ward) ? '':$test->visit->ward->name }}</td> <!--Unit -->
                            <!-- ACTION BUTTONS -->
                            <td>
                                <a class="btn btn-sm btn-success"
                                   href="{{ route('unhls_test.viewDetails', $test->id) }}"
                                   id="view-details-{{$test->id}}-link"
                                   title="{{trans('messages.view-details-title')}}">
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                    {{trans('messages.view-details')}}
                                </a>
                                @if ($test->specimen->isNotCollected())
                                    @can('accept_test_specimen')
                                        <a class="btn btn-sm btn-success"
                                           href="#collect-sample-modal"
                                           data-toggle="modal" data-url="{{ route('unhls_test.collectSampleModal') }}" data-sample-id="{{$test->specimen->id}}"
                                           data-target="#collect-sample-modal"
                                           title="Collect Sample">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                            {{trans('Collect Sample')}}
                                        </a>
                                    @endcan
                                @endif
                                @if ($test->isNotReceived())
                                    @can('accept_test_specimen')
                                    <!-- todo: udate this to operate as that on the queue, if possible -->
                                    <!--
                                <a class="btn btn-sm btn-default receive-test" href="javascript:void(0)"
                                    data-test-id="{{$test->id}}"
                                    title="{{trans('messages.receive-test-title')}}">
                                    <span class="glyphicon glyphicon-thumbs-up"></span>
                                    {{trans('messages.receive-test')}}
                                        </a> -->
                                    @endcan
                                @elseif ($test->specimen->isNotCollected())
                                    @can('accept_test_specimen')
                                        <a class="btn btn-sm btn-info" href="#accept-specimen-modal"
                                           data-toggle="modal" data-url="{{ route('unhls_test.collectSpecimen') }}" data-specimen-id="{{$test->specimen->id}}" data-target="#accept-specimen-modal"
                                           title="{{trans('messages.accept-specimen-title')}}">
                                            <span class="glyphicon glyphicon-thumbs-up"></span>
                                            {{trans('messages.accept-specimen')}}
                                        </a>

                                    @endcan
                                @endif
                                @if (!$test->isNotReceived() && $test->specimen->isAccepted() && !($test->isVerified()))
                                    @if(Illuminate\Support\Facades\Auth::user()->can('reject_test_specimen') && !($test->specimen->isReferred()))
                                        @if(!($test->specimenIsRejected()))
                                        <!-- <a class="btn btn-sm btn-danger" id="reject-{{$test->id}}-link"
                                    href="{{route('unhls_test.reject', array($test->id))}}"
                                    title="{{trans('messages.reject-title')}}">
                                    <span class="glyphicon glyphicon-thumbs-down"></span>
                                    {{trans('messages.reject')}}
                                            </a> -->
                                        @endif
                                        <a class="btn btn-sm btn-midnight-blue barcode-button" onclick="print_barcode({{ "'".$test->specimen->id."'".', '."'".$barcode->encoding_format."'".', '."'".$barcode->barcode_width."'".', '."'".$barcode->barcode_height."'".', '."'".$barcode->text_size."'" }})" title="{{trans('messages.barcode')}}">
                                            <span class="glyphicon glyphicon-barcode"></span>
                                            {{trans('messages.barcode')}}
                                        </a>
                                    @endif
                                    @if ($test->isPending())
                                        @can('start_test')
                                            <a class="btn btn-sm btn-warning start-test" href="javascript:void(0)"
                                               data-test-id="{{$test->id}}" data-url="{{ route('unhls_test.start') }}"
                                               title="{{trans('messages.start-test-title')}}">
                                                <span class="glyphicon glyphicon-play"></span>
                                                {{trans('messages.start-test')}}
                                            </a>
                                            <a class="btn btn-sm btn-danger" id="reject-{{$test->id}}-link"
                                               href="{{route('unhls_test.reject', array($test->id))}}"
                                               title="{{trans('messages.reject-title')}}">
                                                <span class="glyphicon glyphicon-thumbs-down"></span>
                                                {{trans('messages.reject')}}
                                            </a>
                                        @endcan
                                        @if(Illuminate\Support\Facades\Auth::user()->can('refer_specimens') && !($test->isExternal()) && !($test->specimen->isReferred()))
                                            <a class="btn btn-sm btn-info" href="{{ route('unhls_test.refer', array($test->id)) }}">
                                                <span class="glyphicon glyphicon-edit"></span>
                                                {{trans('messages.refer-sample')}}
                                            </a>
                                        @endif
                                    @elseif ($test->isStarted())
                                        @can('enter_test_results')
                                            <a class="btn btn-sm btn-info" id="enter-results-{{$test->id}}-link"
                                               href="{{ route('unhls_test.enterResults', array($test->id)) }}"
                                               title="{{trans('messages.enter-results-title')}}">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                                {{trans('messages.enter-results')}}
                                            </a>
                                        @endcan
                                    @elseif ($test->isCompleted())
                                        @can('edit_test_results')
                                            <a class="btn btn-sm btn-info" id="edit-{{$test->id}}-link"
                                               href="{{ route('unhls_test.edit', array($test->id)) }}"
                                               title="{{trans('messages.edit-test-results')}}">
                                                <span class="glyphicon glyphicon-edit"></span>
                                                {{trans('messages.edit')}}
                                            </a>
                                        @endcan
                                        @if(Illuminate\Support\Facades\Auth::user()->can('verify_test_results') && Illuminate\Support\Facades\Auth::user()->id != $test->tested_by)
                                            <a class="btn btn-sm btn-success" id="verify-{{$test->id}}-link"
                                               href="{{ route('unhls_test.viewDetails', array($test->id)) }}"
                                               title="{{trans('messages.verify-title')}}">
                                                <span class="glyphicon glyphicon-thumbs-up"></span>
                                                {{trans('messages.verify')}}
                                            </a>
                                        @endcan
                                    @elseif ($test->specimenIsRejected())
                                        <a class="btn btn-sm btn-info" id="edit-{{$test->id}}-link"
                                           href="{{ URL::to('rejection/'.$test->visit->patient->id.'/'.$test->visit->id.'/'.$test->id ) }}"
                                           title="{{trans('Print Rejection Report')}}" target="blank">
                                            <span class="glyphicon glyphicon-print"></span>
                                            {{trans('Rejection Report')}}
                                        </a>

                                    @endif
                                @endif
                            </td>

                            <td id="test-status-{{$test->id}}" class='test-status'>
                                <!-- Test Statuses -->
                                <div class="container-fluid">

                                    <div class="row">

                                        <div class="col-md-12">
                                        @if($test->isNotReceived())
                                            <!--
                                        <span class='label label-default'>
                                            {{trans('messages.not-received')}}</span> -->
                                            @elseif($test->isPending())
                                                <span class='label label-info'>
                                                {{trans('messages.pending')}}</span>
                                            @elseif($test->isStarted())
                                                <span class='label label-warning'>
                                                {{trans('messages.started')}}</span>
                                            @elseif($test->isCompleted())
                                                <span class='label label-primary'>
                                                {{trans('messages.completed')}}</span>
                                            @elseif($test->isVerified())
                                                <span class='label label-success'>
                                                {{trans('messages.verified')}}</span>
                                            @elseif($test->isApproved())
                                                <span class='label label-default'>
                                                Approved</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Specimen statuses -->
                                            @if($test->isNotReceived())

                                                <span class='label label-default'>
                                                {{trans('messages.specimen-not-received-label')}}</span>
                                            @elseif($test->specimen->isReferred())
                                                <span class='label label-primary'>
                                                {{trans('messages.specimen-referred-label') }}
                                                    @if($test->specimen->referral->status == App\Models\Referral::REFERRED_IN)
                                                        {{ trans("messages.in") }}
                                                    @elseif($test->specimen->referral->status == App\Models\Referral::REFERRED_OUT)
                                                        {{ trans("messages.out") }}
                                                    @endif
                                            </span>
                                            @elseif($test->specimenIsRejected())
                                                <span class='label label-danger'>
                                                {{trans('messages.specimen-rejected-label')}}</span>
                                            @elseif($test->specimen->isAccepted())
                                                <span class='label label-success'>
                                                {{trans('messages.specimen-accepted-label')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            {{ $testSet->links() }}
            {{ Session::put('SOURCE_URL', URL::full()) }}
            {{ Session::put('TESTS_FILTER_INPUT', Illuminate\Support\Facades\Request::except('_token')) }}

        </div>
    </div>

    <!-- MODALS -->
    <div class="modal fade" id="new-test-modal-unhls">
        <div class="modal-dialog">
            <div class="modal-content">
                {{ Form::open(array('route' => 'unhls_test.create')) }}
                <input type="hidden" id="patient_id" name="patient_id" value="0" />
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">{{trans('messages.close')}}</span>
                    </button>
                    <h4 class="modal-title">{{trans('messages.create-new-test')}}</h4>
                </div>
                <div class="modal-body">
                    <h4>{{ trans('messages.first-select-patient') }}</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="input-group">
                                <input type="text" class="form-control search-text"
                                       placeholder="{{ trans('messages.search-patient-placeholder') }}">
                                <span class="input-group-btn">
                    <button class="btn btn-default search-patient" type="button">
                        {{ trans('messages.patient-search-button') }}</button>
                  </span>
                            </div><!-- /input-group -->
                            <div class="patient-search-result form-group">
                                <table class="table table-condensed table-striped table-bordered table-hover hide">
                                    <thead>
                                    <th> </th>
                                    <th>{{ trans('messages.patient-id') }}</th>
                                    <th>{{ Lang::choice('messages.name',2) }}</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- /.col-lg-12 -->
                    </div><!-- /.row -->          </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        {{trans('messages.close')}}</button>
                    <button type="button" class="btn btn-primary next" onclick="submit();" disabled>
                        {{trans('messages.next')}}</button>
                </div>
                {{ Form::close() }}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="accept-specimen-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                {{ Form::open(array('route' => 'unhls_test.acceptSpecimen')) }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">{{trans('messages.close')}}</span>
                    </button>
                    <h4 class="modal-title">
                        <span class="glyphicon glyphicon-ok-circle"></span>
                        {{trans('messages.accept-specimen-title')}}</h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    {{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.submit'),
                        array('class' => 'btn btn-primary', 'data-dismiss' => 'modal', 'onclick' => 'submit()')) }}
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        {{trans('messages.cancel')}}</button>
                </div>
                {{ Form::close() }}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal /#accept-specimen-modal-->

    <div class="modal fade" id="collect-sample-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                {{ Form::open(array('route' => 'unhls_test.collectSpecimenAction')) }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">{{trans('messages.close')}}</span>
                    </button>
                    <h4 class="modal-title">
                        <span class="glyphicon glyphicon-ok-circle"></span>
                        {{'Collect Sample'}}</h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    {{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.submit'),
                        array('class' => 'btn btn-primary', 'data-dismiss' => 'modal', 'onclick' => 'submit()')) }}
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        {{trans('messages.cancel')}}</button>
                </div>
                {{ Form::close() }}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal /#collect-specimen-modal-->

    <!-- OTHER UI COMPONENTS -->
    <div class="hidden pending-test-not-collected-specimen">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <span class='label label-info'>
                        {{trans('messages.pending')}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span class='label label-default'>
                        {{trans('messages.specimen-not-received-label')}}</span>
                </div>
            </div>
        </div>
    </div> <!-- /. pending-test-not-received-specimen -->

    <div class="hidden pending-test-accepted-specimen">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <span class='label label-info'>
                        {{trans('messages.pending')}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span class='label label-success'>
                        {{trans('messages.specimen-accepted-label')}}</span>
                </div>
            </div>
        </div>
    </div> <!-- /. pending-test-accepted-specimen -->

    <div class="hidden started-test-accepted-specimen">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <span class='label label-warning'>
                        {{trans('messages.started')}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span class='label label-success'>
                        {{trans('messages.specimen-accepted-label')}}</span>
                </div>
            </div>
        </div>
    </div> <!-- /. started-test-accepted-specimen -->

    <div class=" hidden collect-specimen-button">
        <a class="btn btn-sm btn-info collect-specimen" href="javascript:void(0)"
           title="{{trans('messages.collect-specimen-title')}}"
           data-url="{{ route('unhls_test.collectSpecimen')}}">
            <span class="glyphicon glyphicon-ambulance"></span>
            {{trans('messages.collect-specimen')}}
        </a>
    </div><!-- /. colllect-specimen button -->

    <div class="hidden accept-button">
        <a class="btn btn-sm btn-info accept-specimen" href="javascript:void(0)"
           title="{{trans('messages.accept-specimen-title')}}"
           data-url="{{ route('unhls_test.acceptSpecimen') }}">
            <span class="glyphicon glyphicon-thumbs-up"></span>
            {{trans('messages.accept-specimen')}}
        </a>
    </div> <!-- /. accept-button -->

    <div class="hidden reject-start-buttons">
        <a class="btn btn-sm btn-danger reject-specimen" href="#" title="{{trans('messages.reject-title')}}">
            <span class="glyphicon glyphicon-thumbs-down"></span>
            {{trans('messages.reject')}}</a>
        <a class="btn btn-sm btn-warning start-test" href="javascript:void(0)"
           data-url="{{ route('unhls_test.start') }}" title="{{trans('messages.start-test-title')}}">
            <span class="glyphicon glyphicon-play"></span>
            {{trans('messages.start-test')}}</a>
    </div> <!-- /. reject-start-buttons -->

    <div class="hidden enter-result-buttons">
        <a class="btn btn-sm btn-info enter-result">
            <span class="glyphicon glyphicon-pencil"></span>
            {{trans('messages.enter-results')}}</a>
    </div> <!-- /. enter-result-buttons -->

    <div class="hidden start-refer-button">
        <a class="btn btn-sm btn-info refer-button" href="#">
            <span class="glyphicon glyphicon-edit"></span>
            {{trans('messages.refer-sample')}}
        </a>
    </div> <!-- /. referral-button -->
    <!-- Barcode begins -->

    <div id="count" style='display:none;'>0</div>
    <div id ="barcodeList" style="display:none;"></div>

    <!-- jQuery barcode script -->
    <script type="text/javascript" src="{{ asset('js/barcode.js') }} "></script>
@stop
