@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
        <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
        <li><a href="{{{URL::route('stockrequisition.index')}}}">Inventory</a></li>
        <li class="active">Requisition and issue voucher</li>
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


<div class="row">
<div class="col-md-12">
<div class="table-responsive">
  <table class="table table-striped">
            <thead>
                <tr>                
                    <th>District</th>
                    <th>Facility</th>
                    <th>Financial Year</th>
                    <th>Item</th>
                    <th>Description</th>                    
                    <th>Unit of Issue</th>          
                    <th>Max Stock</th>    
                    <th>Min Stock</th>                                     
                </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $district->name }}</td>
                <td>{{ $facility->name }}</td>
                <td>{{ $year->year }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->metric->description }}</td>
                <td>{{ $item->max_level }}</td>
                <td>{{ $item->min_level }}</td>
            </tr>
                
            </tbody>
  </table>
</div>
</div>
</div>



<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-user"></span>
		Requisition and issue voucher
	</div>
	<div class="panel-body">


      {{ Form::open(array('url' => 'stockrequisition/store', 'data-toggle' => 'validator')) }}

        <div class="col-md-12">

            <div class="form-group">
                <label for="issue_date" class="control-label">Issue date</label>
                {{ Form::text('issue_date', Input::old('issue_date'),array('class' => 'form-control standard-datepicker','required'=>'required')) }}
            </div>


            <div class="form-group">
                <label for="issued_to" class="control-label">Issued To</label>
                {{ Form::text('issued_to', Input::old('issued_to'), array('class' => 'form-control','required'=>'required')) }}
            </div>

            <div class="form-group">
                <label for="voucher_no" class="control-label">Voucher number</label>
                {{ Form::text('voucher_no', Input::old('voucher_no'), array('class' => 'form-control','required'=>'required')) }}
            </div>

            <div class="form-group">
                <label for="current_balance" class="control-label">Current balance</label>
                {{ Form::text('current_balance', Input::old('current_balance'), array('class' => 'form-control', 'id'=>'current_balance','disabled'=>'disabled')) }}
            </div>

            <div class="form-group">
                <label for="quantity_required" class="control-label">Quantity required</label>
                {{ Form::text('quantity_required', Input::old('quantity_required'), array('class' => 'form-control','id'=>'quantity_required','required'=>'required')) }}
            </div>

            <div class="form-group">
                <label for="quantity_issued" class="control-label">Quantity issued</label>
                {{ Form::text('quantity_issued', Input::old('quantity_issued'), array('class' => 'form-control','id'=>'quantity_issued','required'=>'required')) }}
            </div>
            
            <div class="form-group">
                <label for="remarks" class="control-label">Remarks</label>
                {{ Form::textarea('remarks', Input::old('remarks'), array('class' => 'form-control', 'cols' => '4', 'rows'=>'2','id'=>'remarks')) }}
            </div>

            <div class="form-group">
                {{ Form::label('redirect', 'Redirect',array('class'=>'hidden')) }}
                {{ Form::hidden('redirect', 1 ,Input::old('redirect'), array('class' => 'form-control')) }}
            </div>  

            <div class="form-group actions-row">
                    {{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'), 
                        array('class' => 'btn btn-primary', 'type' => 'submit()')) }}
            </div>
        </div>
        
        {{ Form::close() }}

		<?php  
		Session::put('SOURCE_URL', URL::full());?>
	</div>
	
</div>
@stop