@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
        <li><a href="{{ route('user.home') }}">{{trans('messages.home')}}</a></li>
        <li><a href="{{ route('equipmentmaintenance.index') }}">{{trans('messages.equipment-maintenance')}}</a></li>
        <li class="active">{{ Lang::choice('messages.equipment',2) }}</li>
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
		{{ Lang::choice('messages.equipment-maintenance',2) }}
	</div>
	<div class="panel-body">


      {{ Form::open(array('url' => 'equipmentmaintenance/store', 'autocomplete' => 'off', 'class' => 'form-horizontal', 'data-toggle' => 'validator')) }}

                            <fieldset>


                                <div class="form-group">
                                {{ Form::label('equipment_id', 'Equipment', ['class' => 'col-lg-2 control-label']) }}
                                  <div class="col-md-4">
                                        {{ Form::select('equipment_id', array(null => 'Select')+ $equipment_list, old('equipment_id'), array('class' => 'form-control', 'id' => 'warranty_id','required'=>'required')) }}

                                        @if ($errors->has('equipment_id'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('equipment_id') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>


                                <div class="form-group">
                                {{ Form::label('service_date', 'Date of service', ['class' => 'col-md-2 control-label']) }}
                                  <div class="col-md-4">
                                        {{ Form::text('service_date', old('service_date'),array('placeholder' => 'Date of service','class' => 'form-control standard-datepicker','required'=>'required')) }}

                                        @if ($errors->has('service_date'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('service_date') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>


                                <div class="form-group">
                                {{ Form::label('next_service_date', 'Date of next service', ['class' => 'col-md-2 control-label']) }}
                                  <div class="col-md-4">
                                        {{ Form::text('next_service_date', old('next_service_date'),array('placeholder' => 'Date of next service','class' => 'form-control standard-datepicker','required'=>'required')) }}

                                        @if ($errors->has('next_service_date'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('next_service_date') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>

                                <div class="form-group">
                                {{ Form::label('serviced_by', 'Serviced by', ['class' => 'col-lg-2 control-label']) }}
                                  <div class="col-lg-7">
                                        {{ Form::text('serviced_by',null,['class' => 'form-control','placeholder' => 'Serviced by', 'required' => 'true']) }}

                                        @if ($errors->has('serviced_by'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('serviced_by') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>

                                <div class="form-group">
                                {{ Form::label('serviced_by_phone', 'Serviced by contact', ['class' => 'col-lg-2 control-label']) }}
                                  <div class="col-lg-7">
                                        {{ Form::text('serviced_by_phone',null,['class' => 'form-control','placeholder' => 'Serviced by contact', 'type'=>'number','required' => 'true']) }}

                                        @if ($errors->has('serviced_by_phone'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('serviced_by_phone') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>

                                <div class="form-group">
                                {{ Form::label('supplier', 'Supplier', ['class' => 'col-lg-2 control-label']) }}
                                  <div class="col-md-4">
                                        {{ Form::select('supplier_id', array(null => 'Select')+ App\Models\UNHLSEquipmentSupplier::pluck('name','id')->toArray(), old('supplier_id'), array('class' => 'form-control', 'id' => 'warranty_id','required'=>'required')) }}

                                        @if ($errors->has('supplier_id'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('supplier_id') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>

                                <div class="form-group">
                                {{ Form::label('comment', 'Comment', ['class' => 'col-lg-2 control-label']) }}
                                  <div class="col-lg-7">
                                        {{ Form::textarea('comment',null,['rows' => '3','class' => 'form-control','placeholder' => 'Comment']) }}

                                        @if ($errors->has('comment'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('comment') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>
                                    <div class="form-group">
                                      <div class="col-lg-10 col-lg-offset-2">
                                        <a href="{{url('/equipmentmaintenance')}}" class="btn btn-default">Cancel</a>
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
