@extends("layout")
@section("content")
    <div>
    	<ol class="breadcrumb">
    	  <li><a href="{{ route('user.home')}}">{{trans('messages.home')}}</a></li>
          <li><a href="{{ route('commodity.index') }}">{{trans('messages.commodityList')}}</a></li>
    	 	<li class="active">{{ Lang::choice('messages.editCommodities',2) }}</li>
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
		<span class="glyphicon glyphicon-user"></span>
		{{ Lang::choice('messages.commodities',2) }}
	</div>
	<div class="panel-body">
		  {{ Form::model($commodity, array('route' => array('commodity.update', $commodity->id), 'method' => 'PUT',
               'id' => 'form-edit-commodity')) }}
            <div class="form-group">
                {{ Form::label('name', Lang::choice('messages.name', 2)) }}
                {{ Form::text('name', old('name'), array('class' => 'form-control', 'rows' => '2')) }}
            </div>
             <div class="form-group">
                {{ Form::label('description', trans('messages.description')) }}
                {{ Form::textarea('description', old('description'),array('class' => 'form-control', 'rows' => '2')) }}
            </div>
             <div class="form-group">
                {{ Form::label('unit_of_issue', trans('messages.unit-of-issue')) }}
                {{ Form::select('unit_of_issue', array(null => '')+$metrics, $commodity->metric_id ,
                    array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('unit_price', trans('messages.unit-price')) }}
                {{ Form::text('unit_price', old('unit_price'),array('class' => 'form-control', 'rows' => '2')) }}
            </div>
            <div class="form-group">
                {{ Form::label('item_code', trans('messages.item-code')) }}
                {{ Form::text('item_code', old('item_code'),array('class' => 'form-control', 'rows' => '2')) }}
            </div>
            <div class="form-group">
                {{ Form::label('storage_req', trans('messages.storage-req')) }}
                {{ Form::textarea('storage_req', old('storage_req'),array('class' => 'form-control', 'rows' => '2')) }}
            </div>
            <div class="form-group">
                {{ Form::label('min_level ', trans('messages.min-level')) }}
                {{ Form::text('min_level', old('min_level'),array('class' => 'form-control', 'rows' => '2')) }}
            </div>
            <div class="form-group">
                {{ Form::label('max_level ', trans('messages.max-level')) }}
                {{ Form::text('max_level', old('max_level'),array('class' => 'form-control', 'rows' => '2')) }}
            </div>

            <div class="form-group actions-row">
                    {{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'),
                        array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
            </div>
        {{ Form::close() }}

		<?php Session::put('SOURCE_URL', URL::full());?>
	</div>
</div>
@stop
