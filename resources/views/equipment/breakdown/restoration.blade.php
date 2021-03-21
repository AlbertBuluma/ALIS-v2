@extends("layout")
@section("content")
<div>
    <ol class="breadcrumb">
        <li><a href="{{ route('user.home') }}">{{trans('messages.home')}}</a></li>
        <li><a href="{{ route('equipmentsupplier.index') }}">{{trans('messages.equipment-breakdown-list')}}</a></li>
        <li class="active">{{ Lang::choice('messages.equipment-breakdown',2) }}</li>
    </ol>

</div>
@if (Session::has('message'))
    <div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif
@if($errors->all())
                <div class="alert alert-danger">
                    {{ HTML::ul($errors->all()) }}
                </div>
@endif


<div class="panel panel-primary">
    <div class="panel-heading ">
        <span class="ion-gear-a"></span>
        {{ Lang::choice('messages.equipment-breakdown',2) }}
    </div>
    <div class="panel-body">


      {{ Form::open(array('url' => 'equipmentbreakdown/saveRestore', 'autocomplete' => 'off', 'class' => 'form-horizontal', 'data-toggle' => 'validator')) }}

                            <fieldset>



                                <div class="form-group">
                                {{  Form::label('equipment_id', 'Equipment', array('class'=>'control-label')) }}
                                  <div class="col-md-4">
                                        {{ Form::select('equipment_id', App\Models\UNHLSEquipmentInventory::pluck('name','id')->toArray(), $breakdown->equipment_id, array('class' => 'form-control', 'id' => 'equipment_id', 'disabled'=>'disabled')) }}

                                        @if ($errors->has('equipment_id'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('equipment_id') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>


                                <div class="form-group">
                                {{ Form::label('description_problem', 'Description of problem', ['class' => 'col-lg-2 control-label']) }}
                                  <div class="col-lg-7">
                                        {{ Form::textarea('description_problem',$breakdown->description,['class' => 'form-control','placeholder' => 'Description of problem', 'rows'=>'5','disabled' => 'disabled']) }}

                                        @if ($errors->has('description_problem'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('description_problem') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>


                                <div class="form-group">
                                {{ Form::label('action_taken', 'Actions taken', ['class' => 'col-lg-2 control-label']) }}
                                  <div class="col-lg-7">
                                        {{ Form::textarea('action_taken',$breakdown->action_taken,['class' => 'form-control','placeholder' => 'Actions taken', 'rows'=>'5','disabled' => 'disabled']) }}

                                        @if ($errors->has('action_taken'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('action_taken') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>


                                <div class="form-group">
                                {{ Form::label('request_hsd', 'Request of HSD', ['class' => 'col-lg-2 control-label']) }}
                                  <div class="col-lg-7">
                                        {{ Form::textarea('request_hsd',$breakdown->hsd_request,['class' => 'form-control','placeholder' => 'Request of HSD', 'rows'=>'5','disabled' => 'disabled']) }}

                                        @if ($errors->has('request_hsd'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('request_hsd') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>

                                <div class="form-group">
                                {{  Form::label('priority', 'Priority', array('class'=>'control-label')) }}
                                  <div class="col-md-4">
                                        {{ Form::select('priority', [''=>'Select','1'=>'High','2'=>'Moderate','3'=>'Low'], $breakdown->priority, array('class' => 'form-control', 'id' => 'priority', 'disabled'=>'disabled')) }}

                                        @if ($errors->has('priority'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('priority') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>



                                <div class="form-group">
                                {{  Form::label('in_charge', 'In - charge', array('class'=>'control-label')) }}
                                  <div class="col-md-4">
                                        {{ Form::select('in_charge', array('' => 'Select in charge') + App\Models\UNHLSStaff::select(DB::raw('concat (firstName," ",lastName) as full_name,id'))->pluck('full_name', 'id')->toArray(), $breakdown->in_charge_id, array('class' => 'form-control', 'id' => 'in_charge', 'disabled'=>'disabled')) }}

                                        @if ($errors->has('in_charge'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('in_charge') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>


                                <div class="form-group">
                                {{  Form::label('report_date', 'Date reported', array('class'=>'control-label col-lg-2')) }}
                                  <div class="col-lg-7">
                                        {{ Form::text('report_date',  $breakdown->report_date!=null?(date('d M Y', strtotime($breakdown->report_date))):'', array('class' => 'form-control standard-datepicker', 'id' => 'report_date','disabled'=>'disabled')) }}


                                        @if ($errors->has('report_date'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('report_date') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>

                             <div class="form-group">
                                {{ Form::label('review_comment', 'Comment', ['class' => 'col-lg-2 control-label']) }}
                                  <div class="col-lg-7">
                                        {{ Form::textarea('review_comment',null,['class' => 'form-control','placeholder' => 'Comment', 'rows'=>'5','required' => 'required']) }}

                                        @if ($errors->has('review_comment'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('review_comment') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>

                                <div class="form-group">
                                {{  Form::label('reviewed_by', 'Reviewed by', array('class'=>'control-label')) }}
                                  <div class="col-md-4">
{{--                                        {{ Form::select('reviewed_by', array('' => 'Select reviewed by') + App\Models\UNHLSStaff::select(DB::raw('concat (firstName," ",lastName) as full_name,id'))->pluck('full_name', 'id')->toArray(), old('reviewed_by'), array('class' => 'form-control', 'id' => 'reviewed_by', 'required'=>'required')) }}--}}
                                        {{ Form::select('reviewed_by', array('' => 'Select reviewed by') + App\Models\User::select('username')->pluck('username')->toArray(), old('reviewed_by'), array('class' => 'form-control', 'id' => 'reviewed_by', 'required'=>'required')) }}

                                        @if ($errors->has('reviewed_by'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('reviewed_by') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>


                                <div class="form-group">
                                {{  Form::label('review_date', 'Date reviewed', array('class'=>'control-label col-lg-2')) }}
                                  <div class="col-lg-7">
                                        {{ Form::text('review_date', old('review_date'), array('class' => 'form-control standard-datepicker', 'id' => 'review_date','required'=>'required')) }}


                                        @if ($errors->has('review_date'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('review_date') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>

                                <div class="form-group hidden">
                                {{  Form::label('breakdown_id', 'ID', array('class'=>'control-label col-lg-2')) }}
                                  <div class="col-lg-7">
                                        {{ Form::text('breakdown_id', $breakdown->id, array('class' => 'form-control standard-datepicker', 'id' => 'breakdown_id','required'=>'required')) }}


                                        @if ($errors->has('breakdown_id'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('breakdown_id') }}</strong>
                                            </span>
                                        @endif
                                  </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                      <div class="col-lg-7 col-lg-offset-2">
                                        <a href="{{url('/equipmentbreakdown')}}" class="btn btn-default">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                      </div>
                                    </div>
                                </div>

                            </fieldset>

        {{ Form::close() }}

        <?php
        Session::put('SOURCE_URL', URL::full());?>
    </div>

</div>
@stop
