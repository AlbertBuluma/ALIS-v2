@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li class="active"><a href="{{ route('testnamemapping.index') }}">Test Name Mappings</a></li>
	  <li class="active">Measure Name Mappings</li>
	</ol>
</div>
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-adjust"></span>
		List of Measure Name Mappings
		<div class="panel-btn">
			<a class="btn btn-sm btn-info" href="{{ URL::to("measurenamemapping/create/".$testNameMapping->id) }}" >
				<span class="glyphicon glyphicon-plus-sign"></span>
				Add Measure Name Mapping
			</a>
		</div>
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>Site Name</th>
					<th>Standard Name</th>
					<th>System Name</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@foreach($testNameMapping->measureNameMappings as $measureNameMapping)
				<tr>
					<td>{{ ($measureNameMapping->measure!='')?$measureNameMapping->measure->name:'' }}</td>
					<td>{{ $measureNameMapping->standard_name }}</td>
					<td>{{ $measureNameMapping->system_name }}</td>
					<td>
						<a class="btn btn-sm btn-info" href="{{ URL::to("measurenamemapping/" . $measureNameMapping->id . "/edit") }}" >
							<span class="glyphicon glyphicon-edit"></span>
							{{ trans('messages.edit') }}
						</a>
						<button class="btn btn-sm btn-danger delete-item-link"
							data-toggle="modal" data-target=".confirm-delete-modal"
							data-id='{{ URL::to("measurenamemapping/" . $measureNameMapping->id . "/delete") }}'>
							<span class="glyphicon glyphicon-trash"></span>
							{{ trans('messages.delete') }}
						</button>
						@if($measureNameMapping->measure!='')
						<a class="btn btn-sm btn-info" href="{{ URL::to("measureranges/" . $measureNameMapping->measure->id . "/ranges") }}" >
							<span class="glyphicon glyphicon-eye-open"></span>
							Measure Ranges
						</a>
						@endif
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{{ Session::put('SOURCE_URL', URL::full()) }}
	</div>
</div>
@stop
