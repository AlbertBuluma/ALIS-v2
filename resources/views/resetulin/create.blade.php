@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('user.home')}}"></a></li>
		<li><a href="{{ URL::route('resetulin.create')}}"></a></li>

	</ol>
</div>
<div class ="panel panel-primary">
	<div class="panel-heading"> <span class="glyphicon glyphicon-cog">{{trans('messages.reset-ulin')}}</span>
		<div class="panel-btn">
			<a class="btn btn-sm btn-info" href="{{ URL::route('unhls_patient.create') }}">
				<span class="glyphicon glyphicon-plus-sign"></span>
				{{trans('messages.new-patient')}}
			</a>
		</div>
	</div>
	
	<div class="panel-body">
		@if (Session::has('message'))
			<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
		@endif
		@if($errors->all())
			<div class="alert alert-danger">
				{{ HTML::ul($errors->all())}}

			</div>
		@endif
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-7">
					{{ Form::open(array('route' => array('resetulin.reset'), 'id' => 'uuid-set'))}} 
						<div class="form-group">
							<div class="panel-btn">
								<a href="javascript:void(0)" class="btn btn-link link-tip" role="button" data-toggle="modal" data-placement="bottom" title="Please note the value should be greater than the last Lab ID" data-target="#reset" >
								<span class="glyphicon glyphicon-plus-sign "></span><strong>{{' Click to set Lab ID to a value greater than 1 '}}</strong></a>
							</div>
						</div>
						<div class="form-group">
							<div class="panel-btn"><a href="javascript:void(0)" class="btn btn-link" role="button" data-toggle="modal" data-target="#resetOne">
								<span class="glyphicon glyphicon-plus-sign"></span><strong>{{' Click to Reset Lab ID to 1'}}</strong></a>
							</div>
						</div>
					{{ Form::close()}}
				</div>
				<div class="col-md-5">
			    	<ul class="list-group">
			    		<li class="list-group-item disabled"><strong> Hints</strong></li>
			    		<li class="list-group-item">There are two options you can use to set the beginning number of Lab IDs</li>
			    		<li class="list-group-item">The First Option lets you set the starting point to a number higher than 1 or higher than the most recent Lab ID</li>
			    		<li class="list-group-item">The Second Option resets to 1 e.g at the begining of a new year or a new month</li>

			    	</ul>
		    	</div>
	    	</div>
    	</div>

	</div>
		{{ Session::put('SOURCE_URL', URL::full()) }}

</div>

<!--Modals -->

<div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	{{Form::open(array('route' => 'resetulin.reset', 'id' => 'uuid-set-2')) }}
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{'Reset ULIN to Given Value'}}</h4>
      </div>
      <div class="modal-body">
			<div class="form-group">
				{{ Form::label('incrementNum', 'Enter reset number:')}}
				{{ Form::text('incrementNum',  Input::old('incrementNum'), array('class' => 'form-control'))}}

			</div>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="submit();">Set ID</button>
      </div>
      {{Form::close()}}
    </div>
  </div>
</div>

<div class="modal fade" id="resetOne" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	{{Form::open(array('route' => 'resetulin.reset', 'id' =>'uuid-reset')) }}
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{'Reset ULIN to 1'}}</h4>
      </div>
      <div class="modal-body">
			<div class="alert alert-danger">
				{{Form::hidden('incrementNum', '0')}}
				{{ 'This will reset your Lab ID to 1. Are you sure you want to proceed? This Action is irreversible!'}}				
			</div>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="submit();">Reset ID</button>
      </div>
      {{Form::close()}}
    </div>
  </div>
</div>
<!--End of Modals -->
@stop()


