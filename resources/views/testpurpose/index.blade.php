@extends("layout")
@section("content")
<div>

	<ol class="breadcrumb">
	  <li><a href="{{{route('user.home')}}}">{{trans('messages.home')}}</a></li>
	  <li class="active">Test purpose</li>
	</ol>
</div>
	@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-user"></span>
		Test Purposes
		<div class="panel-btn">
			<a class="btn btn-sm btn-info" href="{{ URL::to("testpurpose/create") }}" >
				<span class="glyphicon glyphicon-plus-sign"></span>
				New test purpose
			</a>
		</div>
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>{{ Lang::choice('messages.name',2) }}</th>
					<th>{{trans('messages.description')}}</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($purpose as $key => $value)
				<tr @if(Session::has('activetestpurpose'))
                            {{(Session::get('activetestpurpose') == $value->id)?"class='info'":""}}
                        @endif
                        >

					<td>{{ $value->name }}</td>
					<td>{{ $value->description }}</td>

					<td>
						<!-- show the testpurpose (uses the show method found at GET /specimentype/{id} -->
						<a class="btn btn-sm btn-success" href="{{ URL::to("testpurpose/" . $value->id) }}" >
							<span class="glyphicon glyphicon-eye-open"></span>
							{{trans('messages.view')}}
						</a>

					<!-- edit this testpurpose (uses the edit method found at GET /specimentype/{id}/edit -->
						<a class="btn btn-sm btn-info" href="{{ URL::to("testpurpose/" . $value->id . "/edit") }}" >
							<span class="glyphicon glyphicon-edit"></span>

							{{trans('messages.edit')}}

						</a>
					<!-- delete this specimentype (uses delete method found at GET /testpurpose/{id}/delete -->
						<button class="btn btn-sm btn-danger delete-item-link"
							data-toggle="modal" data-target=".confirm-delete-modal"
							data-id='{{ URL::to("testpurpose/" . $value->id . "/delete") }}'>
							<span class="glyphicon glyphicon-trash"></span>
							{{trans('messages.delete')}}
						</button>

					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop
