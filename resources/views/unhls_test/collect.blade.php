@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{route('user.home')}}}">{{trans('messages.home')}}</a></li>
		  <li><a href="{{ route('unhls_test.index') }}">{{ Lang::choice('messages.test',2) }}</a></li>
		  <li class="active">{{trans('messages.collect-specimen')}}</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
            <div class="container-fluid">
                <div class="row less-gutter">
                    <div class="col-md-11">
						<span class="glyphicon glyphicon-filter"></span>{{trans('messages.specimen-collected-by')}}
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-sm btn-primary pull-right" href="#" onclick="window.history.back();return false;"
                            alt="{{trans('messages.back')}}" title="{{trans('messages.back')}}">
                            <span class="glyphicon glyphicon-backward"></span></a>
                    </div>
                </div>
            </div>
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
		@if($errors->all())
			<div class="alert alert-danger">
				{{ HTML::ul($errors->all()) }}
			</div>
		@endif
		{{ Form::open(array('route' => 'unhls_test.collectSpecimenAction')) }}

			<div class="panel-body">
				<div class="form-group">
					{{ Form::label('collection_date', 'Date of Sample Collection') }}
					{{Form::text('collection_date', old('collection_date'), array('class' => 'form-control standard-datepicker'))}}
					{{ Form::label('sample_time', 'Time of Sample Collection') }}
					{{Form::text('sample_time', old('sample_time'), array('class' => 'form-control', 'placeholder' => 'HH:MM'))}}
				</div>
				<div class="form-group">
					{{ Form::label('sample_obtainer', 'Sample Collected by') }}
					{{Form::text('sample_obtainer', old('sample_obtainer'), array('class' => 'form-control'))}}
					{{ Form::label('cadre_obtainer', 'Cadre') }}
					{{Form::text('cadre_obtainer', old('cadre_obtainer'), array('class' => 'form-control'))}}
				</div>
				<div class="form-group">
					{{ Form::label('recieved_date', 'Date sample recieved in Lab') }}
					{{Form::text('recieved_date', old('recieved_date'), array('class' => 'form-control standard-datepicker'))}}
					{{ Form::label('sample_time', 'Time Sample Recieved in Lab') }}
					{{Form::text('sample_time', old('sample_time'), array('class' => 'form-control', 'placeholder' => 'HH:MM'))}}
				</div>
				<div class="form-group">
					{{ Form::label('sample_reciever', 'Sample Recieved by') }}
					{{Form::text('sample_reciever', old('sample_reciever'), array('class' => 'form-control'))}}
					{{ Form::label('cadre_reciever', 'Cadre') }}
					{{Form::text('cadre_reciever', old('cadre_reciever'), array('class' => 'form-control'))}}
				</div>
				<div class="form-group actions-row">
					{{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'),
						['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
				</div>
			</div>
		{{ Form::close() }}
		</div>
	</div>
@stop
