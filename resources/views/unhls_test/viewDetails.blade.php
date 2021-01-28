@extends("layout")
@section("content")
    <div>
        <ol class="breadcrumb">
            <li><a href="{{{route('user.home')}}}">{{trans('messages.home')}}</a></li>
            <li><a href="{{ route('unhls_test.index') }}">{{ Lang::choice('messages.test',2) }}</a></li>
            <li class="active">{{trans('messages.test-details')}}</li>
        </ol>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading ">
            <div class="container-fluid">
                <div class="row less-gutter">
                    <div class="col-md-11">
                        <span class="glyphicon glyphicon-cog"></span>{{trans('messages.test-details')}}

                        @if($test->isCompletedVerifiedorApproved() && $test->specimen->isAccepted())
                            <div class="panel-btn">
                                @if(Auth::user()->can('edit_test_results'))
                                    <a class="btn btn-sm btn-info" href="{{ URL::to('unhls_test/'.$test->id.'/edit') }}">
                                        <span class="glyphicon glyphicon-edit"></span>
                                        {{trans('messages.edit-test-results')}}
                                    </a>
                                @endif

                                @if(Auth::user()->can('verify_test_results'))
                                    @if(!$test->isVerified() && !$test->isApproved())
                                        <a class="btn btn-sm btn-success" href="{{ route('test.verify', array($test->id)) }}">
                                            <span class="glyphicon glyphicon-thumbs-up"></span>
                                            {{trans('messages.verify')}}
                                        </a>
                                    @endif
                                @endif

                                @if(Auth::user()->can('approve_test_results'))
                                    @if($test->isVerified() && Auth::user()->id != $test->tested_by)

                                        <a class="btn btn-sm btn-success" href="{{ route('test.approve', array($test->id)) }}">
                                            <span class="glyphicon glyphicon-thumbs-up"></span>
                                            {{trans('messages.approve')}}
                                        </a>
                                    @endif
                                @endif
                            </div>
                        @endif
                        <div class="panel-btn">
                            @if(Auth::user()->can('view_reports'))
                                @if($test->isApproved() || $test->specimenIsRejected())
                                    <a class="btn btn-sm btn-default"
                                       href="{{ URL::to('patient_final_report/'.$test->visit->patient->id.'/'.$test->visit->id ) }}" target="_blank"
                                    >
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                        {{trans('messages.view-final-report')}}
                                    </a>
                                    <a class="btn btn-sm btn-default" href="{{ URL::to('patientrequestform/' . $test->visit->id) }}"  target="_blank" >
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                        Request Form
                                    </a>

                                @elseif( $test->isVerified() && Auth::user()->can('verify_test_results') || $test->specimenIsRejected())
                                    <a class="btn btn-sm btn-default" href="{{ URL::to('patient_interim_report/'.$test->visit->patient->id.'/'.$test->visit->id ) }}"  target="_blank">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                        {{trans('messages.view-interim-report')}}
                                    </a>
                                    <a class="btn btn-sm btn-default" href="{{ URL::to('patientrequestform/' . $test->visit->id) }}"  target="_blank">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                        Request Form
                                    </a>
                                @endif
                            @endif
                        </div>
                        <div class="panel-btn">
                            @if(Auth::user()->can('accept_test_specimen'))
                                @if($test->isNotStarted)
                                    <a class="btn btn-sm btn-default" href="{{ URL::to('unhls_test/'.$test->id.'/collectsample') }}">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                        {{trans('Collect Sample')}}
                                    </a>
                                @endif
                            @endif

                        </div>

                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-sm btn-primary pull-right" href="#" onclick="window.history.back();return false;"
                           alt="{{trans('messages.back')}}" title="{{trans('messages.back')}}">
                            <span class="glyphicon glyphicon-backward"></span></a>
                    </div>
                </div>
            </div>
        </div> <!-- ./ panel-heading -->
        <div class="panel-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="display-details">
                            <h3 class="view"><strong>{{ Lang::choice('messages.test-type',1) }}</strong>
                                {{ $test->testType->name }}</h3>
                            <p class="view"><strong>{{trans('messages.visit-number')}}</strong>
                                {{$test->visit->id }}</p>
                            <p class="view"><strong>{{trans('messages.date-ordered')}}</strong>
                                {{ $test->isExternal()?$test->external()->request_date:$test->time_created }}</p>
                            <p class="view"><strong>{{trans('messages.lab-receipt-date')}}</strong>
                                {{$test->time_created}}</p>
                            <p class="view"><strong>{{trans('messages.test-status')}}</strong>
                                {{trans('messages.'.$test->testStatus->name)}}</p>
                            <p class="view-striped"><strong>{{trans('messages.physician')}}</strong>

                                {{$test->clinician->name or trans('messages.unknown') }}</p>
                            @if($test->testType->name = 'HIV' || $test->testType->name = 'H.I.V' )
                                <p class="view-striped"><strong>{{trans('messages.purpose')}}</strong>
                                    {{$test->purpose or trans('messages.unknown') }}</p>
                            @endif
                            <p class="view-striped"><strong>{{trans('messages.request-origin')}}</strong>
                                @if($test->specimen->isReferred() && $test->specimen->referral->status == App\Models\Referral::REFERRED_IN)
                                    {{ trans("messages.in") }}
                                @else
                                    {{ $test->visit->visit_type }}
                                @endif</p>
                            <p class="view-striped"><strong>{{trans('messages.registered-by')}}</strong>
                                {{$test->specimen->acceptedBy->name }}</p>
                            @if($test->isCompleted())
                                <p class="view"><strong>{{trans('messages.tested-by')}}</strong>
                                    {{$test->testedBy->name}}</p>
                            @endif
                            @if($test->isApproved())
                                <p class="view"><strong>{{'Approved by'}}</strong>
                                    {{$test->approvedBy->name}}</p>
                            @endif
                            @if($test->isVerified())
                                <p class="view"><strong>{{trans('messages.verified-by')}}</strong>
                                    {{$test->verifiedBy->name}}</p>
                        @endif
                        @if((!$test->specimen->isRejected()) && ($test->isCompleted() || $test->isVerified()))

                            <!-- Not Rejected and (Verified or Completed)-->
                                <p class="view-striped"><strong>{{trans('messages.turnaround-time')}}</strong>
                                    {{$test->getFormattedTurnaroundTime()}}</p>
                        @endif
                        <!-- Not Rejected and (Verified or Completed)-->
                            <p class="view-striped"><strong>{{trans('messages.turnaround-time')}}</strong>
                            <?php
                            $date1 = date_create($test->time_started);
                            $date2 = date_create($test->time_verified);
                            $date3 = new DateTime();
                            //difference between two dates
                            $diff = date_diff($date1,$date2);
                            $diff2 = date_diff($date1,$date3);

                            //count days
                            if ($test->time_verified != 'NULL') {
                                echo ' '.$diff->format("%h")." "."Hours"." ".$diff->format("%i")." "."Minutes"." ".$diff->format("%s")." "."Seconds";
                            }
                            else
                                echo ' '.$diff2->format("%h")." "."Hours"." ".$diff2->format("%i")." "."Minutes"." ".$diff2->format("%s")." "."Seconds";
                            ?>
                            <!-- Previous therapy-->
                            <p class="view-striped"><strong>Previous Therapy</strong>
                                @if(!empty($test->therapy->previous_therapy))
                                    {{$test->therapy->previous_therapy}}
                                @else
                                @endif
                            </p>
                            <!-- Current therapy-->
                            <p class="view-striped"><strong>Current Therapy</strong>

                                @if(!empty($test->therapy->current_therapy))
                                    {{$test->therapy->current_therapy}}
                                @else

                                @endif
                            </p>

                            <!-- Clinical notes-->
                            <p class="view-striped"><strong>Clinical notes</strong>

                                @if(!empty($test->therapy->clinical_notes))
                                    {{$test->therapy->clinical_notes}}
                                @else

                                @endif

                            </p>
                            <!-- Test Requested by -->
                            <p class="view-striped"><strong>Test requested by</strong>
                                @if(isset($test))
                                    {{$test->createdBy->name}}
                                @endif
                            </p>
                            <!-- Requested by -->
                            <p class="view-striped"><strong>Phone contact of clinician</strong>

                            @if(!empty($test->therapy->clinician))
                                {{$test->therapy->contact}}
                            @elseif(!empty($test->clinician->phone))
                                {{$test->clinician->phone }}
                            @endif

                            <!--  -->
                        </div>
                    </div>
                    <div class="col-md-6">
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
                                            {{$test->visit->exactAge('M')}}</div></div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p><strong>{{trans("messages.gender")}}</strong></p></div>
                                        <div class="col-md-9">
                                            {{$test->visit->patient->gender==0?trans("messages.male"):trans("messages.female")}}
                                        </div></div>
                                </div>
                            </div> <!-- ./ panel-body -->
                        </div> <!-- ./ panel -->
                        <div class="panel panel-info"> <!-- Specimen Details -->
                            <div class="panel-heading">
                                <h3 class="panel-title">{{trans("messages.specimen-details")}}</h3>
                            </div>
                            <div class="panel-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><strong>Specimen Type</strong></p>
                                        </div>
                                        <div class="col-md-8">
                                            {{$test->specimen->specimenType->name }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><strong>{{trans('messages.specimen-number')}}</strong></p>
                                        </div>
                                        <div class="col-md-8">
                                            {{$test->getSpecimenId() }}
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
                                                {{$test->specimen->referral->facility->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong>@if($test->specimen->referral->status == App\Models\Referral::REFERRED_IN)
                                                            {{ trans("messages.originating-from") }}
                                                        @elseif($test->specimen->referral->status == App\Models\Referral::REFERRED_OUT)
                                                            {{ trans("messages.intended-reciepient") }}
                                                        @endif</strong></p>
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
                                                <p><strong>@if($test->specimen->referral->status == App\Models\Referral::REFERRED_IN)
                                                            {{ trans("messages.recieved-by") }}
                                                        @elseif($test->specimen->referral->status == App\Models\Referral::REFERRED_OUT)
                                                            {{ trans("messages.referred-by") }}
                                                        @endif</strong></p>
                                            </div>
                                            <div class="col-md-8">
                                                {{ $test->specimen->referral->user->name }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div> <!-- ./ panel -->
                        <div class="panel panel-info">  <!-- Test Results -->
                            <div class="panel-heading">
                                <h3 class="panel-title">{{trans("messages.test-results")}}</h3>
                            </div>
                            <div class="panel-body">
                                <div class="container-fluid">
                                    @foreach($test->testResults as $result)
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong>{{ Measure::find($result->measure_id)->name }}</strong></p>
                                            </div>
                                            <div class="col-md-3">
                                                @if($result->revised_result!=null)
                                                    {{$result->revised_result}} (Revised result)
                                                @else
                                                    {{$result->result}}
                                                @endif
                                            </div>
                                            <div class="col-md-5">

                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="row">
                                        <div class="col-md-2">
                                            <p><strong>{{trans('messages.test-remarks')}}</strong></p>
                                        </div>
                                        <div class="col-md-10">
                                            {{$test->interpretation}}
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- ./ panel-body -->
                        </div>  <!-- ./ panel -->
                    </div>
                </div>
            </div> <!-- ./ container-fluid -->
            @if(count($test->testType->organisms)>0)
                <div class="panel panel-success">  <!-- Patient Details -->
                    <div class="panel-heading">
                        <h3 class="panel-title">{{trans("messages.culture-worksheet")}}</h3>
                    </div>
                    <div class="panel-body">
                        <p><strong>{{trans("messages.culture-work-up")}}</strong></p>
                        <table class="table table-bordered">
                            <thead>

                            </thead>
                            <tbody id="tbbody">
                            <tr>
                                <th width="15%">{{ trans('messages.date')}}</th>
                                <th width="10%">{{ trans('messages.tech-initials')}}</th>
                                <th>{{ trans('messages.observations-and-work-up')}}</th>
                            </tr>
                            @if(($observations = $test->culture) != null)
                                @foreach($observations as $observation)
                                    <tr>
                                        <td>{{ $observation->created_at }}</td>
                                        <td>{{ App\Models\User::find($observation->user_id)->name }}</td>
                                        <td>{{ $observation->observation }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">{{ trans('messages.no-data-found') }}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <p><strong>{{trans("messages.susceptibility-test-results")}}</strong></p>
                        <div class="row">
                            @if(count($test->susceptibility)>0)
                                @foreach($test->testType->organisms as $organism)
                                    <div class="col-md-6">
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <th colspan="3">{{ $organism->name }}</th>
                                            </tr>
                                            <tr>
                                                <th width="50%">{{ Lang::choice('messages.drug',1) }}</th>
                                                <th>{{ trans('messages.zone-size')}}</th>
                                                <th>{{ trans('messages.interp')}}</th>
                                            </tr>
                                            @foreach($organism->drugs as $drug)
                                                @if($drugSusceptibility = App\Models\Susceptibility::getDrugSusceptibility($test->id, $organism->id, $drug->id))
                                                    @if($drugSusceptibility->interpretation)
                                                        <tr>
                                                            <td>{{ $drug->name }}</td>
                                                            <td>{{ $drugSusceptibility->zone!=null?$drugSusceptibility->zone:'' }}</td>
                                                            <td>{{ $drugSusceptibility->interpretation!=null?$drugSusceptibility->interpretation:'' }}</td>
                                                        </tr>
                                                    @endif
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div> <!-- ./ panel-body -->
            @endif
        </div> <!-- ./ panel-body -->
    </div> <!-- ./ panel -->
@stop
