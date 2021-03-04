@extends("layout")
@section("content")

	<div>
		<ol class="breadcrumb">
		  <li><a href="{{ route('user.home') }}">{{trans('messages.home')}}</a></li>
		  <li class="active"><a href="{{ route('adhocconfig.index') }}">Adhoc Configurations</a></li>
		  <li class="active">Edit Adhoc Configurations</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-adjust"></span>
			Edit Adhoc Configurations
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif

			{{ Form::model($adhocConfig, array('route' => ['adhocconfig.update', $adhocConfig->id],
				'method' => 'PUT', 'id' => 'form-edit-adhocconfig')) }}
				<div class="form-group">
					{{ Form::label('name', 'Name') }}
					{{ Form::text('name', old('name'),
						array('class' => 'form-control', 'readonly')) }}
				</div>
				<div class="form-group">
					{{ Form::label('option', 'Option') }}
	                <select class="form-control" id="option" name="option">
	                    @foreach ($constants[$adhocConfig->name] as $key => $constant)
	                        <option value="{{$constant}}"
	                        {{($adhocConfig->option == $constant) ? 'selected="selected"' : '' }}>{{$key}}</option>
	                    @endforeach
	                </select>
				</div>
				<div class="form-group actions-row">
					{{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'),
						array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>
@stop
