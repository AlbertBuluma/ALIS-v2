@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{route('user.home')}}}">{{trans('messages.home')}}</a></li>
		  <li><a href="{{ route('specimentype.index') }}">Test purpose</a></li>
		  <li class="active">Test Purpose Details</li>
		</ol>
	</div>
	<div class="panel panel-primary testpurpose-create">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-user"></span>
			Test Purpose Details
			<div class="panel-btn">
				<a class="btn btn-sm btn-info" href="{{ URL::to("testpurpose/". $purpose->id ."/edit") }}">
					<span class="glyphicon glyphicon-edit"></span>
					{{trans('messages.edit')}}
				</a>
			</div>
		</div>
		<div class="panel-body">
			<div class="display-details">
				<h3 class="view"><strong>{{ Lang::choice('messages.name',1) }}</strong>{{ $purpose->name }} </h3>
				<p class="view-striped"><strong>{{trans('messages.description')}}</strong>
					{{ $purpose->description }}</p>
				<p class="view"><strong>{{trans('messages.date-created')}}</strong>{{ $purpose->created_at }}</p>
			</div>
		</div>
	</div>
@stop
