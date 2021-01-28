<html>
<head>
{{ HTML::style('css/bootstrap.min.css') }}
{{ HTML::style('css/bootstrap-theme.min.css') }}
</head>
<body>
@include("reportHeader")
<div id="content">
	<div class="panel panel-primary">
	<div class="panel-heading ">
		<div class="container-fluid">
			<div class="row less-gutter">
				<div class="col-md-8">
					<span class="glyphicon glyphicon-user"></span>
					{{ trans('messages.positivity-rates') }}
				</div>
				<div class="col-md-4">
					<a class="btn btn-info pull-right" id="reveal" href="#" onclick="return false;"
                            alt="{{trans('messages.show-hide')}}" title="{{trans('messages.show-hide')}}">
                            <span class="glyphicon glyphicon-eye-open"></span> {{trans('messages.show-hide')}}</a>
				</div>
			</div>
		</div>
	</div>
  	<table class="table table-bordered"  width="100%">
		<tbody align="left">
			<<tr>
					    	<th>{{Lang::choice('messages.test-type',1)}}</th>
					    	<th>{{trans('messages.total-specimen')}}</th>
					    	<th>Within TAT</th>
					    	<th>Beyond TAT</th>
					    	<th>{{trans('messages.tat-rates-label')}}</th>
					    </tr>
					    @forelse($data as $datum)
					    <tr>
					    	<td>{{$datum->name}}</td>
			  				<td>{{$datum->total}}</td>
			  				<td>{{$datum->total - $datum->Beyond}}</td>
			  				<td>{{$datum->Beyond}}</td>
			  				<td>{{$datum->Within / $datum->total * 100}}</td>
					    </tr>
						    @empty
					    <tr>
					    	<td colspan="5">{{trans('messages.no-records-found')}}</td>
					    </tr>
					    @endforelse
		</tbody>
	</table>
</div>
</div>
</body>
</html>