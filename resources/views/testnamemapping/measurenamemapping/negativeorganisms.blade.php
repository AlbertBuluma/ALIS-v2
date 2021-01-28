@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
		<li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		<li><a href="{{ route('testnamemapping.index') }}">Test Name Mappings</a></li>
		<li><a href="{{ route('testnamemapping.show',[$testNameMapping->id]) }}">Measure Name Mappings</a></li>
		<li class="active">Negative Organism</li>
	</ol>
</div>
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-adjust"></span>
		Negative Organisms
		<div class="panel-btn">
			<a class="btn btn-sm btn-info" href="{{ route('measureranges.getnegativeorganism',[$testNameMapping->id]) }}">
				<span class="glyphicon glyphicon-plus-sign"></span>
				Add Negative Organism
			</a>
		</div>
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>Negative Organism</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@foreach($negativeOrganisms as $organism)
				<tr>
					<td>{{ $organism->organism->name }}</td>
					<td>
						<a class="btn btn-sm btn-danger" href="{{ URL::to("measureranges/" . $organism->id ."/".$testNameMapping->id."/negativeorganismdelete") }}" >
							<span class="glyphicon glyphicon-delete"></span>
							{{ trans('messages.delete') }}
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
