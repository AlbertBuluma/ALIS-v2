@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
        <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
        <li><a href="{{{URL::route('equipmentinventory.index')}}}">{{trans('messages.equipment-list')}}</a></li>
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
		<span class="glyphicon glyphicon-plus"></span>
		{{ Lang::choice('messages.equipment',2) }}
	</div>
	<div class="panel-body">
	{{ Form::model($equipment, array('route' => array('equipmentinventory.update', $equipment->id), 'method' => 'PUT',
				'id' => 'form-edit-patient')) }}
                            <fieldset> 

								<div class="form-group">
                                {{  Form::label('name_id', 'Name', array('class'=>'control-label')) }}
                                  <div class="col-md-4">
                                        {{ Form::select('name_id', $equipment_names, Input::old('name_id'), array('class' => 'form-control', 'id' => 'name_id')) }}  
                                      
                                        @if ($errors->has('name_id'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('name_id') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div> 
                                <div class="form-group">
                                {{ Form::label('unique_number', 'Unique Number', ['class' => 'col-md-2 control-label']) }}
                                  <div class="col-md-3">
                                        {{ Form::text('unique_number',null,['class' => 'form-control','placeholder' => 'Unique Number', 'required' => 'true']) }}                                        @if ($errors->has('unique_number'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('unique_number') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>

                                <div class="form-group">
                                {{ Form::label('model', 'Model', ['class' => 'col-md-2 control-label']) }}
                                  <div class="col-md-3">
                                        {{ Form::text('model',null,['class' => 'form-control','placeholder' => 'Model', 'required' => 'true']) }}

                                        @if ($errors->has('model'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('model') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>

                                <div class="form-group">
                                {{ Form::label('serial_number', 'Serial number', ['class' => 'col-md-2 control-label']) }}
                                  <div class="col-md-4">
                                        {{ Form::text('serial_number',null,['class' => 'form-control','placeholder' => 'Serial number', 'required' => 'true']) }}

                                        @if ($errors->has('serial_number'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('serial_number') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>

                                <div class="form-group">
                                {{  Form::label('location', 'Location', array('class'=>'control-label')) }}
                                  <div class="col-md-4">
                                        {{ Form::select('location', array_merge(array(null => 'Select'), $location_list), Input::old('location'), array('class' => 'form-control', 'id' => 'location_id')) }}  
                                      
                                        @if ($errors->has('location'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('location') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>  

                                <div class="form-group">
                                {{  Form::label('procurement_type', 'Procurement type', array('class'=>'control-label')) }}
                                  <div class="col-md-4">
                                        {{ Form::select('procurement_type', array(null => 'Select')+ array('0' => 'Placement', '1' => 'Procured', '2' => 'Donation'), Input::old('procurement_type'), array('class' => 'form-control', 'id' => 'procurement_type_id')) }}  
                                      
                                        @if ($errors->has('procurement_type'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('procurement_type') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>  

                                <div class="form-group">
                                {{ Form::label('purchase_date', 'Purchase date', ['class' => 'col-md-2 control-label']) }}
                                  <div class="col-md-4">
                                        {{ Form::text('purchase_date', Input::old('purchase_date'),array('class' => 'form-control standard-datepicker purchase-date','required'=>'required')) }}

                                        @if ($errors->has('purchase_date'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('purchase_date') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>


                                <div class="form-group">
                                {{ Form::label('delivery_date', 'Delivery date', ['class' => 'col-md-2 control-label']) }}
                                  <div class="col-md-4">
                                        {{ Form::text('delivery_date', Input::old('delivery_date'),array('class' => 'form-control standard-datepicker delivery-date','required'=>'required')) }}

                                        @if ($errors->has('delivery_date'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('delivery_date') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>


                                <div class="form-group">
                                {{ Form::label('verification_date', 'Verification date', ['class' => 'col-md-2 control-label']) }}
                                  <div class="col-md-4">
                                        {{ Form::text('verification_date', Input::old('verification_date'),array('class' => 'form-control standard-datepicker verification-date','required'=>'required')) }}

                                        @if ($errors->has('verification_date'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('verification_date') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>


                                <div class="form-group">
                                {{ Form::label('installation_date', 'Installation date', ['class' => 'col-md-2 control-label']) }}
                                  <div class="col-md-4">
                                        {{ Form::text('installation_date', Input::old('installation_date'),array('class' => 'form-control standard-datepicker installation-date','required'=>'required')) }}

                                        @if ($errors->has('installation_date'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('installation_date') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>

                                <div class="form-group">
                                {{  Form::label('spare_parts', 'Spare parts', array('class'=>'control-label')) }}
                                  <div class="col-md-4">
                                        {{ Form::select('spare_parts', array(null => 'Select')+ $yes_no_list, Input::old('spare_parts'), array('class' => 'form-control', 'id' => 'spare_parts_id','required'=>'required')) }}  
                                      
                                        @if ($errors->has('spare_parts'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('spare_parts') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>                                  

                                <div class="form-group">
                                {{  Form::label('warranty', 'Warranty period', array('class'=>'control-label')) }}
                                  <div class="col-md-4">
                                        {{ Form::select('warranty', array(null => 'Select')+ $warranty_list, Input::old('warranty'), array('class' => 'form-control', 'id' => 'warranty_id','required'=>'required')) }}  
                                      
                                        @if ($errors->has('warranty'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('warranty') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div> 
                                <div class="form-group">
                                {{ Form::label('life_time', 'Lifetime', ['class' => 'col-md-2 control-label']) }}
                                  <div class="col-md-2">
                                        <div class="input-group">
               {{ Form::number('life_time',Input::old('life_span'),['class' => 'form-control','placeholder' => 'Lifetime', 'required' => 'true'])}}
                                              <span class="input-group-addon">Years</span>
                                        </div>
                                        @if ($errors->has('life_time'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('life_time') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>  

                                <div class="form-group">
                                {{  Form::label('service_frequency', 'Service frequency', array('class'=>'control-label')) }}
                                  <div class="col-md-4">
                                        {{ Form::select('service_frequency', array(null => 'Select')+ $service_frequency_list, Input::old('service_frequency'), array('class' => 'form-control', 'id' => 'service_frequency_id','required'=>'required')) }}  
                                      
                                        @if ($errors->has('service_frequency'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('service_frequency') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div> 

                                <div class="form-group">
                                {{  Form::label('service_contract', 'Service Contract', array('class'=>'control-label')) }}
                                  <div class="col-md-4">
                                        {{ Form::select('service_contract', array(null => 'Select')+ $yes_no_list, Input::old('service_contract'), array('class' => 'form-control', 'id' => 'service_contract_id','required'=>'required')) }}  
                                      
                                        @if ($errors->has('service_contract'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('service_contract') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>  
                                        

                                <div class="form-group">
                                {{  Form::label('supplier_id', 'Supplier', array('class'=>'control-label')) }}
                                  <div class="col-md-4">
                                        {{ Form::select('supplier_id', array(null => 'Select')+ $supplier_list, Input::old('supplier'), array('class' => 'form-control', 'id' => 'service_contract_id','required'=>'required')) }}  
                                      
                                        @if ($errors->has('supplier_id'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('supplier_id') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>                                                              

                                    <div class="form-group">
                                      <div class="col-lg-10 col-lg-offset-2">
                                        <a href="{{url('/equipmentinventory')}}" class="btn btn-default">Cancel</a>
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

<script>

$(".purchase-date").datepicker({
    maxDate: 0,
    dateFormat:"yy-mm-dd",
    onSelect: function(dateText, inst){
     $(".verification-date,.delivery-date").datepicker("option","minDate",
     $("#purchase_date").datepicker("getDate"));
  
  }
});


    $(".delivery-date").datepicker({
        maxDate: 0,
        dateFormat:"yy-mm-dd",
        onSelect: function(dateText, inst){
         $(".installation-date").datepicker("option","minDate",
         $("#delivery_date").datepicker("getDate"));    
      }

    });


$(".verification-date").datepicker({
    maxDate: 0,
    dateFormat:"yy-mm-dd",
});



$(".installation-date").datepicker({
    maxDate: 0,
    dateFormat:"yy-mm-dd",
});
</script>
@stop

