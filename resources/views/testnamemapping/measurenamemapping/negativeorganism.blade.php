@extends("layout")
@section("content")

	<div>
		<ol class="breadcrumb">
			<li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
			<li><a href="{{ route('testnamemapping.index') }}">Test Name Mappings</a></li>
			<li><a href="{{ route('testnamemapping.show',[$test_name_mapping_id]) }}">
				Measure Name Mappings</a></li>
			<li class="active"><a href="{{ route('testnamemapping.show',[$test_name_mapping_id]) }}">Negative Organisms</a></li>
			<li class="active">Measure Range</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-adjust"></span>
			Add Negative Organisms
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			{{ Form::open(array('route' => array('measureranges.postnegativeorganism',$test_name_mapping_id), 'id' => 'form-issues', 'method' => 'POST')) }}
				<div class="form-group">
					{{ Form::label('organism_id', 'Negative Organisms') }}
					{{ Form::select('organism_id', $organisms,
						old('organism_id'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group actions-row">
					{{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'),
						array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>
@stop
