@extends("layout")
@section("content")

	<div>
		<ol class="breadcrumb">
			<li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
			<li><a href="{{ route('testnamemapping.index') }}">Test Name Mappings</a></li>
			<li><a href="{{ route('testnamemapping.show',[$measureRange->measure->measureNameMapping->test_name_mapping_id]) }}">
				Measure Name Mappings</a></li>
			<li class="active"><a href="{{ route('measureranges.getranges',[$measureRange->measure->id]) }}">Measure Ranges</a></li>
			<li class="active">Measure Range</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-adjust"></span>
			Edit Interpretation of ({{ $measureRange->alphanumeric }})
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif

			{{ Form::model($measureRange, array('route' => ['measureranges.postrange', $measureRange->id],
				'method' => 'PUT', 'id' => 'form-add-measurerange')) }}
				<div class="form-group">
					{{ Form::label('result_interpretation_id', 'Result Interpretaion') }}
					{{ Form::select('result_interpretation_id', $resultInterpretations,
						old('result_interpretation_id'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group actions-row">
					{{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'),
						array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>
@stop
