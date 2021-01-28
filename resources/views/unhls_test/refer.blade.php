@extends("layout")
@section("content")
    <div>
        <ol class="breadcrumb">
            <li><a href="{{{route('user.home')}}}">{{trans('messages.home')}}</a></li>
            <li><a href="{{ route('unhls_test.index') }}">{{ Lang::choice('messages.test', 2) }}</a></li>
            <li class="active">{{trans('messages.referrals')}}</li>
        </ol>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading ">
            <div class="container-fluid">
                <div class="row less-gutter">
                    <div class="col-md-11">
                        <span class="glyphicon glyphicon-filter"></span> {{trans('messages.referrals')}}
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
            <!-- if there are creation errors, they will show here -->
            @if($errors->all())
                <div class="alert alert-danger">
                    {{ HTML::ul($errors->all()) }}
                </div>
            @endif
            {{ Form::open(array('route' => 'refer_action')) }}
            {{ Form::hidden('specimen_id', $test->specimen->id) }}
            {{ Form::hidden('test_id', $test->id) }}
            <div class="panel-body">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{trans("messages.specimen-information")}}</h3>
                    </div>
                    <div class="panel-body inline-display-details">
                        <span><strong>{{trans("messages.national-id")}}</strong> </span>
                        <span><strong>{{trans("messages.ulin")}}</strong>{{$test->visit->patient->ulin}} </span>
                        <span><strong>{{trans("messages.specimen-id")}}</strong> {{$test->specimen->id}}</span>
                        <span><strong>{{trans("messages.specimen-type-title")}}</strong> {{$test->specimen->specimenType->name}}</span>
                        <span><strong>{{ Lang::choice('messages.date-specimen-collected',1) }}</strong> </span>

                        <span><strong>{{trans("messages.time-specimen-collected")}}</strong>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('person', trans("messages.referring-health-worker")) }}
                    {{Form::text('person', old('person'),
                        array('class' => 'form-control'))}}
                </div>
                <div class="form-group">
                    {{ Form::label('sample_obtainer', 'Sample Collected by') }}
                    {{Form::text('sample-obtainer', old('sample_obtainer'), array('class' => 'form-control'))}}
                    {{ Form::label('cadre-obtainer', 'Cadre') }}
                    {{Form::text('cadre-obtainer', old('cadre_obtainer'), array('class' => 'form-control'))}}
                </div>
                <div class="form-group">
                    {{ Form::label('sample-date', 'Date sample recieved in Lab') }}
                    {{Form::text('sample-date', old('sample_date'), array('class' => 'form-control standard-datepicker'))}}
                    {{ Form::label('sample-time', 'Time Sample Recieved in Lab') }}
                    {{Form::text('sample-time', old('sample_time'), array('class' => 'form-control', 'placeholder' => 'HH:MM'))}}
                </div>
                <div class="form-group">
                    {{ Form::label('time-dispatch', trans('messages.time-dispatch')) }}
                    {{Form::text('time-dispatch', old('time-dispatch'), array('class' => 'form-control', 'placeholder' => 'HH:MM'))}}
                </div>
                <div class="form-group">
                    {{ Form::label('storage-condition', trans("messages.storage-condition")) }}
                    {{ Form::select('storage-condition', [' ' => '--- Select storage type ---','1' => 'Cold Chain','2' => 'Room Temp', '3' => 'Other'], null,
                                 array('class' => 'form-control')) }}
                </div>
                <div class = "form-group" id ="other_storage" style="display:none"> <!--TODO avoid the inline css -->
                    {{Form::text('storage-condition', old('storage_condition'), array('class' => 'form-control', 'placeholder' => 'Other (Specify)'))}}
                </div>
                <div class="form-group">
                    {{ Form::label('transport-type', trans("messages.transport-type")) }}
                    {{ Form::select('transport-type', [' ' => '--- Select storage type ---',
                    '1' => 'Hub System (hub rider and poster)','2' => 'Private means', '3' => 'Arrangement with Public means',
                    '4' => 'Other'], null,
                                 array('class' => 'form-control')) }}
                </div>
                <div class = "form-group" id ="other_transport" style="display:none"> <!--TODO avoid the inline css -->
                    {{Form::text('transport-type', old('transport_type'), array('class' => 'form-control', 'placeholder' => 'Other (Specify)'))}}
                </div>
                <div class="display-details">
                    <p><strong>{{ Lang::choice('messages.test-type',1) }}</strong>
                        {{$test->testType->name}}</p>

                </div>
                <br>
            <!--div class="form-group">
                    {{ Form::label('referral-type', trans('messages.referral-type')) }}
                <div>{{ Form::radio('referral-status', '0', true) }}<span class='input-tag'>
                        {{trans('messages.vertical')}}</span></div>
                    <div>{{ Form::radio('referral-status', '1', false) }}<span class='input-tag'>
                        {{trans('messages.horizontal')}}</span></div>
                </div-->
                <div class="form-group">
                    {{ Form::label('refer-reason', trans('messages.reasons-for-referral')) }}
                    {{ Form::select('referral-reason', array(0 => '')+$referralReason->lists('reason', 'id'),
                        old('referral-reason'), array('class' => 'form-control')) }}
                    {{ Form::label('priority-specimen', trans("messages.priority-of-specimen")) }}
                    {{Form::text('priority-specimen', old('prioritySpecimen'),
                        array('class' => 'form-control'))}}
                </div>
                <div class="form-group">
                    {{ Form::label('facility', Lang::choice("messages.destination-facility",1)) }}
                    {{ Form::select('facility_id', array(0 => '')+$facilities->lists('name', 'id'), old('facility_id'),
                        array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('contacts', trans("messages.contacts")) }}
                    {{Form::textarea('contacts', old('contacts'),
                        array('class' => 'form-control'))}}
                </div>
                <div class="form-group actions-row">
                    {{ Form::button("<span class='glyphicon glyphicon-thumbs-up'></span> ".trans('messages.refer'),
                        ['class' => 'btn btn-danger', 'onclick' => 'submit()']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop
