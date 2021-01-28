@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
		<li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		<li><a href="{{ route('poc.index') }}">EID Patient list</a></li>
		<!-- <li><a href="{{ route('bbincidence.bbfacilityreport') }}">Facility Report</a></li> -->
		<li class="active">Download</li>
	</ol>
</div>
<div class="panel panel-primary">
	<div class="panel-heading ">
		Generate CSV based on Test Date:
	</div>
	<div class="panel-body">
		<form method="get" action="/poc_download/">

			<div class="row">
				<div class="col-sm-3 ">
					<div class='form-group'>
						<label for="fro">From: </label>
						{{ Form::text('test_date_fro', old('test_date_fro'), array('class' => 'form-control input-sm standard-datepicker standard-datepicker-nofuture')) }}
					</div>
					<div class='form-group'>
						<label for="fro">To: </label>
						{{ Form::text('test_date_to', old('test_date_to'), array('class' => 'form-control input-sm standard-datepicker standard-datepicker-nofuture')) }}
					</div>
					<input type='submit' value='Generate CSV' class="btn btn-primary">
				</div>
			</div>
		</form>

	</div>
</div>
@stop
