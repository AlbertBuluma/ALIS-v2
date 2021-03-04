@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
	  <li class="active">Test Name Mappings</li>
	</ol>
</div>
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-adjust"></span>
		List of Test Name Mappings
		<div class="panel-btn">
			<a class="btn btn-sm btn-info" href="{{ URL::to("testnamemapping/create") }}" >
				<span class="glyphicon glyphicon-plus-sign"></span>
				Add Test Name Mapping
			</a>
		</div>
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>Site Name</th>
					<th>Standard Name</th>
					<th>Facility Name</th>
					<!-- <th>System name</th> -->
					<!-- <th></th> -->
				</tr>
			</thead>
			<tbody>
			@foreach($testNameMappings as $testNameMapping)
				<tr>
					<td>{{ $testNameMapping->standard_name }}</td>
					<td>{{ ($testNameMapping->testType!='')?$testNameMapping->testType->name:'' }}</td>
					<!-- <td>{{ $testNameMapping->system_name }}</td> -->
					<td>
						<a class="btn btn-sm btn-success" href="{{ URL::to("testnamemapping/" . $testNameMapping->id) }}">
							<span class="glyphicon glyphicon-edit"></span>
							Test Measures
						</a>
					<!-- edit this testNameMapping (uses edit method found at GET /testNameMapping/{id}/edit -->
						<a class="btn btn-sm btn-info" href="{{ URL::to("testnamemapping/" . $testNameMapping->id . "/edit") }}" >
							<span class="glyphicon glyphicon-edit"></span>
							{{ trans('messages.edit') }}
						</a>
					<!-- delete this testNameMapping (uses delete method found at GET /testNameMapping/{id}/delete -->
						<button class="btn btn-sm btn-danger delete-item-link"
							data-toggle="modal" data-target=".confirm-delete-modal"
							data-id='{{ URL::to("testnamemapping/" . $testNameMapping->id . "/delete") }}'>
							<span class="glyphicon glyphicon-trash"></span>
							{{ trans('messages.delete') }}
						</button>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{{ Session::put('SOURCE_URL', URL::full()) }}
	</div>
</div>
@stop
