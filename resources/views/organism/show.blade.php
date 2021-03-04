@extends("layout")
@section("content")

@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ route('organism.index') }}">{{ Lang::choice('messages.organism',1) }}</a></li>
		  <li class="active">{{ trans('messages.organism-details') }}</li>
		</ol>
	</div>
	<div class="panel panel-primary ">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-adjust"></span>
			{{ $organism->name }}
			<div class="panel-btn">
				<a class="btn btn-sm btn-info" href="{{ route('organism.edit', array($organism->id)) }}">
					<span class="glyphicon glyphicon-edit"></span>
					Edit Organism
				</a>
				<a class="btn btn-sm btn-info" href="{{ route('organismantibiotic.create', array($organism->id)) }}">
					<span class="glyphicon glyphicon-edit"></span>
					Add Antibiotic
					<!-- todo: Set Antiibiotic | should make more sense -->
				</a>
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover table-condensed search-table">
				<thead>
					<tr>
						<th>Antibiotic</th>
						<th>Resistant Max</th>
						<th>Intermediate Min</th>
						<th>Intermediate Max</th>
						<th>Sensitive Min</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($organism->zoneDiameters as $key => $value)
					<tr @if(Session::has('activedrug'))
	                            {{(Session::get('activedrug') == $value->id)?"class='info'":""}}
	                    @endif
	                    >
						<td>{{ $value->drug->name }}</td>
						<td>{{ $value->resistant_max }}</td>
						<td>{{ $value->intermediate_min }}</td>
						<td>{{ $value->intermediate_max }}</td>
						<td>{{ $value->sensitive_min }}</td>
						<td>
						<!-- edit this drug (uses edit method found at GET /organismantibiotic/{id}/edit -->
							<a class="btn btn-sm btn-info" href="{{ URL::to("organismantibiotic/" . $value->id . "/edit") }}" >
								<span class="glyphicon glyphicon-edit"></span>
								{{ trans('messages.edit') }}
							</a>
						<!-- delete this drug (uses delete method found at GET /organismantibiotic/{id}/destroy -->
						{{ Form::open(['route' => ['organismantibiotic.destroy', $value->id], 'method' => 'DELETE',
						'style' => 'display: inline-block;']) }}
							<button class="btn btn-sm btn-danger">
								<span class="glyphicon glyphicon-trash"></span>
								{{ trans('messages.delete') }}
							</button>
						{{ Form::close() }}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop
