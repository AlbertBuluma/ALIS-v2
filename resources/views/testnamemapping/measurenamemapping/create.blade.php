@extends("layout")
@section("content")

	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
		  <li class="active"><a href="{{ URL::route('testnamemapping.index') }}">Test Name Mappings</a></li>
		  <li class="active"><a href="{{ URL::route('testnamemapping.show',[$testNameMapping->id]) }}">Measure Name Mapping</a></li>
		  <li class="active">Add Measure Name Mapping</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-adjust"></span>
			Add Measure Name Mapping
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			{{ Form::open(array('route' => 'measurenamemapping.store', 'id' => 'form-add-measurenamemapping')) }}
				{{ Form::hidden('test_name_mapping_id', $testNameMapping->id) }}
				<div class="form-group">
					{{ Form::label('measure_id', 'Measure') }}
					{{ Form::select('measure_id', $measures,
						Input::old('measure_id'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('standard_name', 'Standard Name') }}
					{{ Form::text('standard_name', Input::old('standard_name'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('system_name', 'System Name') }}
					{{ Form::text('system_name', Input::old('system_name'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group actions-row">
					{{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'), 
						array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>
@stop