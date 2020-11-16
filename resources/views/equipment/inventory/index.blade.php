@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
	 
	  <li class="active">{{ Lang::choice('messages.equipment-list',2) }}</li>
	</ol>
</div>
@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="ion-gear-a"></span>
		{{trans('messages.equipment-list')}}
		<div class="panel-btn">

			<a href="{{ URL::route("equipmentinventory.create")}}" class="btn btn-sm btn-info">
                                <span class="glyphicon glyphicon-plus-sign"></span>
                                {{trans('messages.add')}}
                            </a>
			
		</div>
	</div>


	<div class="panel-body">
	<div class="table-responsive">
  		<table class="table table-striped search-table small-font">
			<thead>
				<tr>

					<th>Name</th>
					<th>Model</th>
					<th>Serial number</th>
					<th>Location</th>
					<th>Procurement type</th>
					<th>Purchase date</th>
					<th>Delivery date</th>
					<th>Verification date</th>
					<th>Installation date</th>
					<th>Spare parts</th>
					<th>Warranty period</th>
					<th>Lifetime</th>
					<th>Service frequency</th>						
					<th>Service contract</th>																				
				</tr>
			</thead>			
			<tbody>
			@foreach($items as $item)
				<tr>

				<td> {{ $item->name }} </td>
				<td> {{ $item->model }} </td>
				<td> {{ $item->serial_number }}  </td>
				<td> {{ $location[$item->location] }}</td>
				<td> {{ $procurement_type[$item->procurement_type] }}</td>

				<td>  {{ date('d M Y', strtotime($item->purchase_date)) }}</td>
				<td>  {{ date('d M Y', strtotime($item->delivery_date)) }}</td>
				<td>  {{ date('d M Y', strtotime($item->verification_date)) }}</td>
				<td>  {{ date('d M Y', strtotime($item->installation_date)) }}</td>

				<td class="text-center">  {{ $yes_no[$item->spare_parts]  }}</td>
				<td>  {{ $item->warranty. ' years' }}</td>
				<td>  {{ $item->life_span . ' years'}}</td>
				<td>  {{ $service_frequency[$item->service_frequency] }}</td>
				<td class="text-center">  {{ $yes_no[$item->service_contract] }}</td>
							
				</tr>
			@endforeach	
			</tbody>
  		</table>
	</div>

		<?php Session::put('SOURCE_URL', URL::full());?>
	</div>
	
</div>


@stop