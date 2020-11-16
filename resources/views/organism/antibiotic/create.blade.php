@extends("layout")
@section("content")

	<div>
		<ol class="breadcrumb">
			<li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
			<li>
				<a href="{{ URL::route('organism.index') }}">{{ Lang::choice('messages.organism',1) }}</a>
			</li>
			<li class="active">Add Antibiotic</li>
		<!-- todo: Set Antiibiotic | should make more sense -->
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-adjust"></span>
			{{$organism->name}} | Add Antibiotic
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif

			{{ Form::open(array('route' => 'organismantibiotic.store', 'id' => 'form-create-organism')) }}
				{{ Form::hidden('organism_id', $organism->id) }}
				<div class="form-group">
					{{ Form::label('antibiotic_id', 'Antibiotic') }}
					{{ Form::select('antibiotic_id', $antibiotics, Input::old('antibiotic_id'), 
					['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('resistant_max', 'Resistant Max') }}
					{{ Form::text('resistant_max', Input::old('resistant_max'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('intermediate_min', 'Intermediate Min') }}
					{{ Form::text('intermediate_min', Input::old('intermediate_min'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('intermediate_max', 'Intermediate Max') }}
					{{ Form::text('intermediate_max', Input::old('intermediate_max'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('sensitive_min', 'Sensitive Min') }}
					{{ Form::text('sensitive_min', Input::old('sensitive_min'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group actions-row">
					{{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'),
						array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>
@stop