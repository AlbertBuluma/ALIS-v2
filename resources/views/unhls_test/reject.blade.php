@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
		  <li><a href="{{ URL::route('unhls_test.index') }}">{{ Lang::choice('messages.test',2) }}</a></li>
		  <li class="active">{{trans('messages.reject-title')}}</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
            <div class="container-fluid">
                <div class="row less-gutter">
                    <div class="col-md-11">
						<span class="glyphicon glyphicon-filter"></span>{{trans('messages.reject-title')}}
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
		{{ Form::open(array('route' => 'unhls_test.rejectAction')) }}
			{{ Form::hidden('specimen_id', $test->specimen->id) }}
			{{ Form::hidden('test_id', $test->id) }}
			<div class="container-fluid">
			<div class="panel-body">
				<div class="panel display-details row">
					<div class="col-md-4">
					    <p><strong>{{ Lang::choice('messages.test-type',1) }}</strong>
					        {{$test->testType->name}}</p>
				    </div>
				    <div class="col-md-4">
					    <p><strong>{{trans('messages.specimen-type-title')}}</strong>
					        {{$test->specimen->specimenType->name}}</p>
					    </div>
				    <div class="col-md-4">
				    	<p><strong>{{trans('messages.specimen-number-title')}}</strong>
				        	{{$test->specimen->id}}
				    	</p>
					</div>
				</div>
			</div>
			<div class="form-group">
				{{Form::label('rejectReason', trans('messages.rejection-reason') )}}<strong><i>{{'Please select all that apply'}}</i></strong>

			<div class="panel panel-default col-md-10">
				<div class=" form-pane container-fluid">
					<?php
					$cnt = 0;
					$zebra = "";
					?>
					@foreach($rejectionReason as $key=>$reason)
					{{ ($cnt%5==0)?"<div class='row $zebra'>":"" }}
						<?php
						$cnt++;
						$zebra = (((int)$cnt/5)%2==1?"row-striped":"");
						?>
						<div class="col col-md-2">
							{{ Form::checkbox('rejectionReason[]', $reason->id) }} <span class="input-tag">{{$reason->reason}}</span>
						</div>{{ ($cnt%5==0)?"</div>":"" }}
					@endforeach
					{{ ($cnt%5!=0)?"</div>":"" }}
				</div>
			</div>

				<div class="form-group">
					{{ Form::label('rejecting_officer', trans("messages.rejecting-officer")) }}
					{{Form::text('rejecting-officer', Auth::user()->name, Input::old('rejecting_officer'),
						array('class' => 'form-control'))}}
				</div>
				<div class="form-group">
					{{ Form::label('cadre-obtainer', 'Cadre of Rejecting officer') }}
                    {{Form::text('cadre-obtainer',Auth::user()->designation, Input::old('cadre_obtainer'), array('class' => 'form-control'))}}
				</div>	
				<div class="form-group">
                    {{ Form::label('contacts', trans("messages.contacts").' of Rejecting officer') }}
                    {{Form::textarea('contacts', Input::old('contacts'),
                        array('class' => 'form-control'))}}
                </div>
				<div class="form-group">
					{{ Form::label('reject_explained_to', trans("messages.reject-explained-to")) }}
					{{Form::text('reject_explained_to', Input::old('reject_explained_to'),
						array('class' => 'form-control'))}}
				</div>
				<div class="form-group actions-row">
					{{ Form::button("<span class='glyphicon glyphicon-thumbs-down'></span> ".trans('messages.reject'),
						['class' => 'btn btn-danger', 'onclick' => 'submit()']) }}
				</div>
			</div>
		{{ Form::close() }}
		</div>
</div>
@stop

