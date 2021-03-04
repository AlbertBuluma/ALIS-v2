@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
		<li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		<li><a href="{{ route('testnamemapping.index') }}">Test Name Mappings</a></li>
		<li><a href="{{ route('testnamemapping.show',[$measure->measureNameMapping->test_name_mapping_id]) }}">Measure Name Mappings</a></li>
		<li class="active">Measure Ranges</li>
	</ol>
</div>
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-adjust"></span>
		List of Measure Name Mappings
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>Measure Range</th>
					<th>Result Interpretation</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@foreach($measure->measureRanges as $range)
				<tr>
					<td>{{ $range->alphanumeric }}</td>
					<td>{{ ($range->resultInterpretation!='')?$range->resultInterpretation->name:'' }}</td>
					<td>
						<a class="btn btn-sm btn-info" href="{{ URL::to("measureranges/" . $range->id . "/range") }}" >
							<span class="glyphicon glyphicon-edit"></span>
							{{ trans('messages.edit') }}
						</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{{ Session::put('SOURCE_URL', URL::full()) }}
	</div>
</div>
@stop
