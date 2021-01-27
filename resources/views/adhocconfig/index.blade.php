@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{ route('user.home') }}">{{ trans('messages.home') }}</a></li>
	  <li class="active">Adhoc Configurations</li>
	</ol>
</div>
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-adjust"></span>
		List of Adhoc Configurations
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Option</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@foreach($adhocConfigs as $adhocConfig)
				<tr>
					<td>{{ $adhocConfig->name }}</td>
					<td>{{ array_search($adhocConfig->option, $constants[$adhocConfig->name]) }}</td>
					<td>
					<!-- edit this adhocConfig (uses edit method found at GET /adhocConfig/{id}/edit -->
						<a class="btn btn-sm btn-info" href="{{ URL::to("adhocconfig/" . $adhocConfig->id . "/edit") }}" >
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
