@extends("layout")
@section("content")

	<div>
		<ol class="breadcrumb">
			<li><a href="{{{route('user.home')}}}">{{trans('messages.home')}}</a></li>
			<li>
				<a href="{{ route('organism.index') }}">{{ Lang::choice('messages.organism',1) }}</a>
			</li>
			<li class="active">{{trans('messages.create-organism')}}</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-adjust"></span>
			{{trans('messages.create-organism')}}
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif

			{{ Form::open(array('route' => 'organism.store', 'id' => 'form-create-organism')) }}

				<div class="form-group">
					{{ Form::label('name', Lang::choice('messages.name',1)) }}
					{{ Form::text('name', old('name'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('description', trans("messages.description")) }}</label>
					{{ Form::textarea('description', old('description'),
						array('class' => 'form-control', 'rows' => '2')) }}
				</div>
				<div class="form-group actions-row">
					{{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'),
						array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>
@stop
