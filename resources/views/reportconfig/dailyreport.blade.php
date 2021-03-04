@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
		<li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		<li class="active">Reported Dates</li>
	</ol>
</div>
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class='container-fluid'>
	{{ Form::open(array('route' => array('reportconfig.dailyreport'), 'class' => 'form-inline')) }}
	<div class='row'>
		<div class="col-sm-4">
			<div class="row">
				<div class="col-sm-2">
					{{ Form::label('month', 'Month') }}
				</div>
				<div class="col-sm-2">
					{{ Form::text('month', isset($month)?$month:date('Y-m-d'),
							array('class' => 'form-control month-datepicker')) }}
				</div>
			</div>
		</div>
	</div>
	{{ Form::close() }}
</div>
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-adjust"></span>
		List of reported dates for ({{$month}}). The generate actions may take a while, please be patient
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed">
			<thead>
				<tr>
					<th>Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($expectedDates as $expectedDate)
				<tr {{(!in_array($expectedDate,$dailyreports))?'class="danger"':''}} >
					<td>{{ $expectedDate }}</td>
					<td>
						@if(in_array($expectedDate,$dailyreports))
						<!--
						<a class="btn btn-sm btn-danger delete-item-link"
							href='{{ URL::to("reportconfig/" . $expectedDate . "/delete") }}'>
							<span class="glyphicon glyphicon-trash"></span>
							Delete
						</a>
						-->
						@else
						<a class="btn btn-sm btn-info" href="{{ URL::to("reportconfig/" . $expectedDate . "/store") }}" >
							<span class="glyphicon glyphicon-edit"></span>
							Generate
						</a>
						@endif
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop
