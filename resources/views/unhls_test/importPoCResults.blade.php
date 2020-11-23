@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{ route('user.home') }}">{{trans('messages.home')}}</a></li>
		  <li><a href="{{ route('unhls_test.index') }}">{{ Lang::choice('messages.test',2) }}</a></li>
		  <li class="active">{{trans('messages.import-results-title')}}</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
            <div class="container-fluid">
                <div class="row less-gutter">
                    <div class="col-md-11">
						<span class="ion-archive"> </span>{{trans('messages.import-results-title')}}
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

		@if ($message)
        	<div class="alert alert-info">{{ $message }}</div>
    	@endif

		{{ Form::open(array('route' => 'unhls_test.uploadPoCResults','files'=>true)) }}
			<div class="panel-body">

					<div class="input-group image-preview">
						{{ Form::label('filename', 'File name', array('class'=>'control-label hidden')) }}
                		{{ Form::text('filename', old('filename'), array('class' => 'form-control image-preview-filename','readonly'=>'readonly')) }}
						<!-- don't give a name === doesn't send on POST/GET -->
						<span class="input-group-btn">
						<!-- image-preview-input -->
						<div class="btn btn-default image-preview-input file"> <span class="glyphicon glyphicon-folder-open"></span> <span class="image-preview-input-title">Browse</span>
							{{ Form::label('file', 'File', array('class'=>'control-label hidden')) }}
							<input type="file" class="file" accept=".csv" name="file" id="filez"/>
							<!-- rename it -->
						</div>
						<button type="submit" class="btn btn-labeled btn-default"> <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Upload</button>
						</span>
					</div>
					<!-- /input-group image-preview [TO HERE]-->
					</br></br>

					@if ($failed_import)
					<!-- Upload Finished -->
<!-- 						<div class="js-upload-finished">
							<h4>Failed upload results list</h4>
							<ul class="list-group">

									<li class="list-group-item list-group-item-danger"> {{implode("</br>",$failed_import)}} </li>

						</ul> -->
					@endif
		{{ Form::close() }}
		</div>
	</div>

<script type="text/javascript">

$('.file').change(function(e){


        $('#filename').val(e.target.files[0].name);
});



</script>
@stop
