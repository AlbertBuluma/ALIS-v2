@extends("layout")
@section("content")

	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{route('user.home')}}}">{{trans('messages.home')}}</a></li>
		  <li class="active"><a href="{{ route('testnamemapping.index') }}">Test Name Mappings</a></li>
		  <li class="active">Edit Test Name Mapping</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-adjust"></span>
			Edit Test Name Mapping
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif

			{{ Form::model($testNameMapping, array('route' => ['testnamemapping.update', $testNameMapping->id],
				'method' => 'PUT', 'id' => 'form-add-testnamemapping')) }}
				<div class="form-group">
					{{ Form::label('test_type_id', 'Test Type') }}
					{{ Form::select('test_type_id', $testTypes,
						old('test_type_id'), array('class' => 'form-control')) }}
				</div>

				<div class="form-group">
					{{ Form::label('standard_name', 'Standard Name') }}
					{{ Form::text('standard_name', old('standard_name'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('system_name', 'System Name') }}
					{{ Form::text('system_name', old('system_name'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group actions-row">
					{{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'),
						array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>
@stop
