@extends("layout")
@section("content")

	@if (Session::has('message'))
		<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
	@endif
	<div>
		<ol class="breadcrumb">
			<li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
			<li>
				<a href="{{ route('organism.index') }}">{{ Lang::choice('messages.organism',1) }}</a>
			</li>
			<li class="active">Edit Antibiotic</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-edit"></span>
			Edit Antibiotic | {{$zoneDiameter->organism->name}}
		</div>
		<div class="panel-body">
			{{ Form::model($zoneDiameter, array(
				'route' => array('organismantibiotic.update', $zoneDiameter->id), 'method' => 'PUT',
				'id' => 'form-edit-organism'
			)) }}

				@if($errors->all())
					<div class="alert alert-danger">
						{{ HTML::ul($errors->all()) }}
					</div>
				@endif
				<div class="form-group">
					{{ Form::label('antibiotic_id', 'Antibiotic') }}
					{{ Form::select('antibiotic_id', $antibiotics, old('antibiotic_id'),
					['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('resistant_max', 'Resistant Max') }}
					{{ Form::text('resistant_max', old('resistant_max'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('intermediate_min', 'Intermediate Min') }}
					{{ Form::text('intermediate_min', old('intermediate_min'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('intermediate_max', 'Intermediate Max') }}
					{{ Form::text('intermediate_max', old('intermediate_max'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('sensitive_min', 'Sensitive Min') }}
					{{ Form::text('sensitive_min', old('sensitive_min'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group actions-row">
					{{ Form::button('<span class="glyphicon glyphicon-save"></span> '. trans('messages.save'),
						['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
					{{ Form::button(trans('messages.cancel'),
						['class' => 'btn btn-default', 'onclick' => 'javascript:history.go(-1)']
					) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>
@stop
