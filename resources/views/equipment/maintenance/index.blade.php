@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{ route('user.home') }}">{{trans('messages.home')}}</a></li>

	  <li class="active">{{ Lang::choice('messages.equipment-maintenance',2) }}</li>
	</ol>
</div>
@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="ion-gear-a"></span>
		{{trans('messages.equipment-maintenance')}}
		<div class="panel-btn">

			<a href="{{ route("equipmentmaintenance.create")}}" class="btn btn-sm btn-info">
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
					<th>Date</th>
					<th>Name</th>
					<th>Last Service</th>
					<th>Next Service</th>
					<th>Serviced by</th>
					<th>Contact</th>
					<th>Supplier</th>
					<th>Comment</th>
				</tr>
			</thead>
			<tbody>
			@foreach($list as $item)
				<tr>
					<td>  {{ date('d M Y', strtotime($item->created_at)) }} </td>
					<td>  {{ $item->equipment->name }}</td>
					<td>  {{ date('d M Y', strtotime($item->last_service_date)) }}</td>
					<td>  {{ date('d M Y', strtotime($item->next_service_date)) }}</td>
					<td>  {{ $item->serviced_by_name }}</td>
					<td>  {{ $item->serviced_by_contact }}</td>
					<td>  {{ $item->supplier->name }}</td>
					<td>  {{ $item->comment }}</td>
					<td>  </td>
				</tr>
			@endforeach
			</tbody>
  </table>
</div>

		<?php Session::put('SOURCE_URL', URL::full());?>
	</div>

</div>


@stop
