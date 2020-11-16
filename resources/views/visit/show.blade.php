@extends("layout")
@section("content")
    <div>
        <ol class="breadcrumb">
          <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
          <li><a href="{{ URL::route('visit.index') }}">Visits</a></li>
          <li class="active">Show</li>
        </ol>
    </div>
    @if (Session::has('message'))
        <div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
    @endif
    <div class="panel panel-primary tests-log">
        <div class="panel-heading ">
            <div class="container-fluid">
                <div class="row less-gutter">
                        <span class="glyphicon glyphicon-filter"></span>
                        Patient Visit
                        @if(Auth::user()->can('request_test'))
                        <div class="panel-btn">
                            <a class="btn btn-sm btn-info"
                                href="{{ URL::route('visit.addtest', [$visit->id]) }}">
                                <span class="glyphicon glyphicon-plus-sign"></span>
                                Add New Test
                            </a>
                            <a class="btn btn-sm btn-default" href="{{ URL::to('patientreport/'.$visit->patient->id.'/'.$visit->id ) }}"
                                target="_blank">
                                <span class="glyphicon glyphicon-eye-open"></span>
                                View Visit Report
                            </a>
                        </div>
                        @endif
                </div>
            </div>
        </div>
        <div class="panel-body">

        <div class="panel-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="panel panel-info"><!-- Patient Details -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Patient Details</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th class="col-md-3">
                                        Patient Number
                                        </th>
                                        <th class="col-md-3">
                                        Patient Name
                                        </th>
                                        <th class="col-md-3">
                                        {{trans("messages.age")}}
                                        </th>
                                        <th class="col-md-3">
                                        {{trans("messages.gender")}}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                        {{$visit->patient->patient_number}}    
                                        </td>
                                        <td>
                                        {{$visit->patient->name}}
                                        </td>
                                        <td>
                                        {{$visit->patient->getAge()}}   
                                        </td>
                                        <td>
                                        {{$visit->patient->gender==0?trans("messages.male"):trans("messages.female")}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!-- ./ panel-body -->
                    </div> <!-- ./ panel -->
                </div>
            </div>
        </div>

            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th>{{trans('messages.date-ordered')}}</th>
                        <th>Specimen ID</th>
                        <th>{{ Lang::choice('messages.test',1) }}</th>
                        <!-- <th>Actions</th> -->
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($visit->tests as $key => $test)
                    <tr>
                        <td>{{ date('d-m-Y H:i', strtotime($test->time_created));}}</td>  <!--Date Ordered-->
                        <td>
                            @if(!$test->isNotReceived())
                                {{ $test->getSpecimenId() }}
                            @endif
                        </td> <!--Specimen ID if specimen received, show when specimen is shared  -->
                        <td>{{ $test->testType->name }}</td> <!--Test-->
                        <!-- ACTION BUTTONS -->
                        <td>
                            <a class="btn btn-sm btn-danger"
                                href="{{ URL::route('unhls_test.delete', $test->id) }}"
                                id="view-details-{{$test->id}}-link" 
                                title="Delete Test">
                                <span class="glyphicon glyphicon-eye-open"></span>
                                Delete
                            </a>
                        </td>
                        <td>
                            @if($test->isNotReceived())
                                <span class='label label-default'>
                                    Specimen Not Received</span>
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
                            @endif

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop