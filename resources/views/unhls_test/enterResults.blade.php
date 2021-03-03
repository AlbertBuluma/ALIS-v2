@extends("layout")
@section("content")
    <div>
        <ol class="breadcrumb">
          <li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
          <li><a href="{{ route('unhls_test.index') }}">{{ Lang::choice('messages.test',2) }}</a></li>
          <li class="active">{{ trans('messages.enter-test-results') }}</li>
        </ol>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading ">
            <div class="container-fluid">
                <div class="row less-gutter">
                    <div class="col-md-11">
                        <span class="glyphicon glyphicon-user"></span> {{ trans('messages.test-results') }}
{{--                        @if($test->testType->instruments->count() > 0)--}}
                        @if(count($test->testType->instruments) > 0)
                        <div class="panel-btn">
                            <a class="btn btn-sm btn-info fetch-test-data" href="javascript:void(0)"
                                title="{{trans('messages.fetch-test-data-title')}}"
                                data-test-type-id="{{$test->testType->id}}"
                                data-url="{{route('instrument.getResult')}}"
                                data-instrument-count="{{$test->testType->instruments->count()}}">
                                <span class="glyphicon glyphicon-plus-sign"></span>
                                {{trans('messages.fetch-test-data')}}
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-sm btn-primary pull-right"  href="#" onclick="window.history.back();return false;"
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
            <div class="container-fluid">
                <div class="row">
                            <div class="panel panel-info">  <!-- Patient Details -->
                                <div class="panel-heading">
                                    <h3 class="panel-title">{{trans("messages.patient-details")}}</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p><strong>{{trans("messages.patient-number")}}</strong></p></div>
                                            <div class="col-md-9">
                                                {{$test->visit->patient->patient_number}}</div></div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p><strong>{{ Lang::choice('messages.name',1) }}</strong></p></div>
                                            <div class="col-md-9">
                                                {{$test->visit->patient->name}}</div></div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p><strong>{{trans("messages.age")}}</strong></p></div>
                                            <div class="col-md-9">
                                                {{$test->visit->patient->getAge()}}</div></div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p><strong>{{trans("messages.gender")}}</strong></p></div>
                                            <div class="col-md-9">
                                                {{$test->visit->patient->gender==0?trans("messages.male"):trans("messages.female")}}
                                            </div></div>
                                    </div>
                                </div> <!-- ./ panel-body -->
                            </div> <!-- ./ panel -->
                </div>
                <div class="row">
                    <div class="panel panel-info"> <!-- Specimen Details -->
                                <div class="panel-heading">
                                    <h3 class="panel-title">{{trans("messages.specimen-details")}}</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong>{{ Lang::choice('messages.specimen-type',1) }}</strong></p>
                                            </div>
                                            <div class="col-md-8">
                                                {{$test->specimen->specimenType->name or trans('messages.pending') }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong>{{trans('messages.specimen-number')}}</strong></p>
                                            </div>
                                            <div class="col-md-8">
                                                {{$test->specimen->id or trans('messages.pending') }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong>{{trans('messages.specimen-status')}}</strong></p>
                                            </div>
                                            <div class="col-md-8">
                                                {{trans('messages.'.$test->specimen->specimenStatus->name) }}
                                            </div>
                                        </div>
                                    @if($test->specimen->isRejected())
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong>{{trans('messages.rejection-reason-title')}}</strong></p>
                                            </div>
                                            <div class="col-md-8">
                                                {{$test->specimen->rejectionReason->reason or trans('messages.pending') }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong>{{trans('messages.reject-explained-to')}}</strong></p>
                                            </div>
                                            <div class="col-md-8">
                                                {{$test->specimen->reject_explained_to or trans('messages.pending') }}
                                            </div>
                                        </div>
                                    @endif
                                    @if($test->specimen->isReferred())
                                    <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong>{{trans("messages.specimen-referred-label")}}</strong></p>
                                            </div>
                                            <div class="col-md-8">
                                                @if($test->specimen->referral->status == App\Models\Referral::REFERRED_IN)
                                                    {{ trans("messages.in") }}
                                                @elseif($test->specimen->referral->status == App\Models\Referral::REFERRED_OUT)
                                                    {{ trans("messages.out") }}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong>{{Lang::choice("messages.facility", 1)}}</strong></p>
                                            </div>
                                            <div class="col-md-8">
                                                {{$test->specimen->referral->getFacilityName() }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong>{{trans("messages.person-involved")}}</strong></p>
                                            </div>
                                            <div class="col-md-8">
                                                {{$test->specimen->referral->person }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong>{{trans("messages.contacts")}}</strong></p>
                                            </div>
                                            <div class="col-md-8">
                                                {{$test->specimen->referral->contacts }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong>{{trans("messages.referred-by")}}</strong></p>
                                            </div>
                                            <div class="col-md-8">
                                                {{ $test->specimen->referral->user->name }}
                                            </div>
                                        </div>
                                    @endif
                                    </div>
                                </div>
                            </div> <!-- ./ panel -->
                </div>
            </div> <!--ends container fluid -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                    {{ Form::open(array('route' => array('unhls_test.saveResults',$test->id), 'method' => 'POST',
                        'id' => 'form-enter-results')) }}
                        @foreach($test->testType->measures as $measure)
                            <div class="form-group">
                                <?php
                                $ans = "";
                                foreach ($test->testResults as $res) {
                                    if($res->measure_id == $measure->id)$ans = $res->result;
                                }
                                $fieldName = "m_".$measure->id;
                                ?>
                                @if ( $measure->isNumeric() )
                                    {{ Form::label($fieldName , $measure->name) }}
                                    {{ Form::text($fieldName, $ans, array(
                                        'class' => 'form-control result-interpretation-trigger',
                                        'data-url' => route('unhls_test.resultinterpretation'),
                                        'data-age' => $test->visit->patient->dob,
                                        'data-gender' => $test->visit->patient->gender,
                                        'data-measureid' => $measure->id
                                        ))
                                    }}
                                    <span class='units'>

                                        {{App\Models\Measure::getRange($test->visit->patient, $measure->id)}}
                                        {{$measure->unit}}
                                    </span>
                                @elseif ( $measure->isAlphanumeric() || $measure->isAutocomplete() )
                                    <?php
                                    $measure_values = array();
                                    $measure_values[] = '';
                                    foreach ($measure->measureRanges as $range) {
                                        $measure_values[$range->alphanumeric] = $range->alphanumeric;
                                    }
                                    ?>
                                    {{ Form::label($fieldName , $measure->name) }}
                                    {{ Form::select($fieldName, $measure_values, array_search($ans, $measure_values),
                                        array('class' => 'form-control result-interpretation-trigger',
                                        'data-url' => route('unhls_test.resultinterpretation'),
                                        'data-measureid' => $measure->id
                                        ))
                                    }}
                                @elseif ( $measure->isFreeText() )
                                    {{ Form::label($fieldName, $measure->name) }}
                                    <?php
                                        $sense = '';
                                        if($measure->name=="Sensitivity"||$measure->name=="sensitivity")
                                            $sense = ' sense'.$test->id;
                                    ?>
                                    {{Form::text($fieldName, $ans, array('class' => 'form-control'.$sense))}}
                                @endif
                            </div>
                        @endforeach
                        <div class="form-group">
                            {{  Form::label('equipment_id', 'Equipment used', array('class'=>'control-label')) }}
                            {{ Form::select('equipment_id', $equipment_list, old('equipment_id'), array('class' => 'form-control', 'id' => 'equipment_id')) }}
                        </div>
                           <div class="form-group">
                            {{  Form::label('method_used', 'Method used', array('class'=>'control-label')) }}
                            {{ Form::text('method_used', old('method_used'), array('class' => 'form-control', 'id' => 'method_used')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('comment', trans('messages.comments')) }}
                            {{ Form::textarea('interpretation', $test->interpretation,
                                array('class' => 'form-control result-interpretation', 'rows' => '2')) }}
                        </div>
                        <div class="form-group actions-row">
                            {{ Form::button('<span class="glyphicon glyphicon-save">
                                </span> '.trans('messages.save-test-results'),
                                array('class' => 'btn btn-default', 'onclick' => 'submit()')) }}
                        </div>
                    {{ Form::close() }}

                        <div class="col-md-6">
                        <!--this was the original holder for Patient details, specimen details and test results -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
