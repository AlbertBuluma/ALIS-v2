@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{ route('user.home') }}">{{trans('messages.home')}}</a></li>

	  <li class="active">{{ Lang::choice('messages.equipment-breakdown',2) }}</li>
	</ol>
</div>
@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="ion-gear-a"></span>
		{{trans('messages.equipment-breakdown')}}
		<div class="panel-btn">

			<a href="{{ route("equipmentbreakdown.create")}}" class="btn btn-sm btn-info">
                                <span class="glyphicon glyphicon-plus-sign"></span>
                                {{trans('messages.add')}}
                            </a>

		</div>
	</div>


	<div class="panel-body">
	<div class="table-responsive">
  	<table class="table table-striped table-bordered search-table small-font">
			<thead>
				<tr>
					<th>Date</th>
					<th>Equipment Code</th>
					<th>Equipment Name</th>
					<th>Reason for failure or breakdown <br><small><i>(where possible:see codes below)</i></small></th>
					<th>Reported by</th>
					<th>Date when fault was reported</th>
					<th>Action taken on equipment <br><small><i>Actions taken at facility lab</i></small></th>
					<th>If equipment is referred for repair</th>
					<th>If equipment is repaired/restored <br><small><i>(restoration date)</i></small></th>
					<th>Equipment down time <br> <small><i>(time interval between reporting & restoration)</th>
						<th>Actions</th>

				</tr>
			</thead>
			<tbody>

			@foreach($items as $item)
				<tr>
				<td  class="col-sm-1">  {{ date('d M Y', strtotime($item->created_at)) }}</td>
				<td  class="col-sm-2">  {{$item->equipment_code }}</td>
				<td  class="col-sm-1">  {{$item->equipment->name }}</td>
				<td class="col-sm-1">  {{$item->equipment_failure }}</td>
				<td class="col-sm-1">  {{$item->reporting_officer }}</td>
				<td class="col-sm-1">  {{(date('d M Y', strtotime($item->report_date))) }}</td>
				<td  class="col-sm-2">  {{$item->action_taken }}</td>
				<td class="col-sm-1">  {{$item->intervention_authority }}</td>
				<td class="col-sm-1">  {{ $item->intervention_date }}</td>
				<td class="col-sm-1">   {{ $item->report_date!=null?(date('d M Y', strtotime($item->report_date))):'' }}</td>
				<!-- <td class="col-sm-1">   {{ $item->restore_date!=null?(date('d M Y', strtotime($item->restore_date))):'' }}</td> -->
				<!-- <td class="col-sm-1">  {{$item->restored_by!=null?($item->staff($item->restored_by)) :"" }}</td> -->
				<td>
				@if($item->restore_date==null)
					<a class="btn btn-sm btn-info" href="{{ route('equipmentbreakdown.restore', array($item->id)) }}" >
							<span class="glyphicon glyphicon-edit"></span>

					</a>
				@endif
                </td>
			@endforeach

				</tr>

			</tbody>
  </table>
</div>

		<?php Session::put('SOURCE_URL', URL::full());?>
	</div>

</div>


@stop
