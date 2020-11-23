@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{ route('user.home') }}">{{trans('messages.home')}}</a></li>

	  <li class="active">{{ Lang::choice('messages.stock-list',2) }}</li>
	</ol>
</div>
@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-user"></span>
		{{trans('messages.stock-list')}}
		<div class="panel-btn">

			<a class="btn btn-sm btn-info" href="javascript:void(0)"
                                data-toggle="modal" data-target="#new-stock-modal">
                                <span class="glyphicon glyphicon-plus-sign"></span>
                                {{trans('messages.add-stock')}}
                            </a>

		</div>
	</div>


	<div class="panel-body">
	<div class="table-responsive">
  	<table class="table table-striped search-table">
			<thead>
				<tr>
					<th>Date</th>
					<th>Item</th>
					<th>To/From</th>
					<th>Voucher number</th>
					<th>Quantity</th>
					<th>Type</th>
					<th>Expiry date</th>
					<th>Batch Number</th>
					<th>Balance</th>
					<th>Initials</th>
				</tr>
			</thead>
			<tbody>
				@foreach($stock as $row)
				<tr>
				<td class="text-left">{{ date('d M Y', strtotime($row->issue_date)) }}</td>
				<td class="text-left">{{ $row->commodity->name }}  </td>
				@if($row->action==config('constants.INCOMING_STOCK_FLAG'))
				<td class="text-left">
					{{ $row->sourceOfStock($row->to_from_type,$row->to_from)->name }}
				</td>
				@endif
				@if($row->action==config('constants.OUTGOING_STOCK_FLAG'))
				<td class="text-left">
					{{ $row->destinationOfStock($row->to_from_type,$row->to_from)->firstName}} {{$row->destinationOfStock($row->to_from_type,$row->to_from)->lastName }}
				</td>
				@endif
				@if($row->action==config('constants.LOSSES_ADJUSTMENTS_STOCK_FLAG'))
				<td class="text-left">
					N/A
				</td>
				@endif

				<td class="text-right">{{ $row->voucher_number }}</td>
				<td class="text-right">{{ ($row->action=='I'?$row->quantity_in:($row->action=='O'?$row->quantity_out:$row->quantity) )}}</td>
				<td class="text-center">{{ $row->action }}</td>
				<td class="text-center">{{ date('d M Y', strtotime($row->expiry_date)) }}</td>
				<td class="text-right">{{$row->batch_number}}</td>
				<td class="text-right">{{ $row->balance}}</td>
				<td class="text-center">{{$row->initials}}</td>
				</tr>
				@endforeach
			</tbody>
  </table>
</div>



<div class="modal fade" tabindex="-1" role="dialog" id="new-stock-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Parameters</h4>
      </div>
      <div class="modal-body">
    	{{ Form::open(array('url' => 'stockcard/create')) }}

    	<div class="form-group">
			{{ Form::label('item', 'Item', array('class'=>'control-label')) }}
		    {{ Form::select('item', array(null => '')+ $items,
                    old('item'), array('class' => 'form-control', 'id' => 'item-id')) }}
    	</div>

    	<div class="row">
    		<div class="col-sm-4">
				 <label for="recipient-name" class="control-label">Action</label>
			</div>


			<div class="col-sm-8">
            	<label  class="radio-inline">
					{{ Form::radio('optAction', 'I', (old('optAction') == 'I'), array('id'=>'stock-in', 'class'=>'radio')) }}
            		Stock in
            	</label>
        	</div>
		</div>
		<div class="row">
    		<div class="col-sm-offset-4 col-sm-8">
				<label  class="radio-inline">
					{{ Form::radio('optAction', 'O', (old('optAction') == 'O'), array('id'=>'stock-out', 'class'=>'radio')) }}
            		Stock out
            	</label>
			</div>
		</div>
		<div class="row">
    		<div class="col-sm-offset-4 col-sm-8">
				<label  class="radio-inline">
					{{ Form::radio('optAction', 'A', (old('optAction') == 'A'), array('id'=>'loss-adjustment', 'class'=>'radio')) }}
            		Losses / Adjustments
            	</label>
			</div>
		</div>


    	<div id="inbound_options" class="form-group hidden">
<hr>
				<div class="row">
		    		<div class="col-sm-4">
						 <label class="control-label">From</label>
					</div>


					<div class="col-sm-8">
		            	<label  class="radio-inline">
							{{ Form::radio('inboundOption', '1', (old('inboundOption') == '1'), array('id'=>'from_warehouse', 'class'=>'radio')) }}
		            		Facility
		            	</label>
		        	</div>
				</div>
				<div class="row">
		    		<div class="col-sm-offset-4 col-sm-8">
						<label  class="radio-inline">
							{{ Form::radio('inboundOption', '2', (old('inboundOption') == '2'), array('id'=>'from_facility', 'class'=>'radio')) }}
		            		Warehouse
		            	</label>
					</div>
				</div>
		</div>

    	<div id="outbound_options" class="hidden form-group">
<hr>
				<div class="row">
		    		<div class="col-sm-4">
						 <label class="control-label">To</label>
					</div>


					<div class="col-sm-8">
		            	<label  class="radio-inline">
							{{ Form::radio('outboundOption', '3', (old('outboundOption') == '3'), array('id'=>'to_person', 'class'=>'radio')) }}
		            		Facility
		            	</label>
		        	</div>
				</div>
				<div class="row">
		    		<div class="col-sm-offset-4 col-sm-8">
						<label  class="radio-inline">
							{{ Form::radio('outboundOption', '4', (old('outboundOption') == '4'), array('id'=>'to_facility', 'class'=>'radio')) }}
		            		Person
		            	</label>
					</div>
				</div>
		</div>




		            <div class="form-group">
                {{ Form::label('redirect', 'Redirect',array('class'=>'hidden')) }}
                {{ Form::hidden('redirect', 0 ,old('redirect'), array('class' => 'form-control')) }}
            </div>

		<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Continue</a>
      </div>
		{{ Form::close() }}

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


		<?php Session::put('SOURCE_URL', URL::full());?>
	</div>

</div>


<script type="text/javascript">
  $(document).ready(function($){
   $('#district-id').change(function(e){

            var data = {
                districtId: e.target.value
            };


        $.ajax({
            type: 'POST',
            url: '/apite/facility',
            data: data
        }).done(function(response) {
        	$('#div-facility').removeClass('hidden');
        	$('#facility').remove();
        	var sel = $('<select>').appendTo('#facility-id');
        		sel.attr('id', 'facility').attr('name', 'facility').addClass('form-control');
           		$.each(response, function(index,value) {

        	console.log(value.id);
     			sel.append($('<option>', { value : value.id }).text(value.name));
			});
        }).fail(function (jqXHR, textStatus, errorThrown) {
            //TODO handle fails on note post backs.
            console.log(textStatus + ' : ' + errorThrown);
        });

  });
});
</script>
@stop
