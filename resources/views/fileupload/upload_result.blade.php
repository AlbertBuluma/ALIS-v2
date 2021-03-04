@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <!-- <li><a href="{{ route('fileupload.index') }}">HPV list</a></li> -->
		</ol>
	</div>

	@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
	@endif

	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-user"></span>
			Result Upload window
		</div>
		<div class="panel-body">

			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif

			{{ Form::model('', array('files'=>true,'route' => array('fileupload.updateupload'), 'method' => 'POST', 'enctype'=> "multipart/form-data",
				'id' => 'form-edit-eventreport')) }}



			<div class="form-group row">
				{{ Form::label('report', 'Select file to upload', array('class' => 'col-sm-2')) }}
				<div class="panel panel-default col-md-4">
				{{ Form::file('report', '', array('size' => '10x1','class' => 'form-control col-sm-10')) }}
				</div>
			</div>

			<div class="form-group actions-row" style="text-align:centre;">
				{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'UPLOAD',
				['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
			</div>

{{ Form::close() }}

@stop
