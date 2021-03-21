<html>
<head>
{{ HTML::style('css/bootstrap.min.css') }}
{{ HTML::style('css/bootstrap-theme.min.css') }}
</head>
<body>
	<style>
  table, th, td {
    border: 1px solid black;
    padding: 10px;
  }
</style>
<div id="content">
	<div class="panel panel-primary">
	<div class="panel-heading ">
		<div class="container-fluid">
			<div class="row less-gutter">
				<div class="col-md-8">
					<span class="glyphicon glyphicon-user"></span>
					TEST TYPE TURNAROUND TIME
				</div>
			</div>
		</div>
	</div>
  	<table class="table table-bordered"  width="100%">
		<tbody align="left">
			<<tr>
					    	<th>{{Lang::choice('messages.test-type',1)}}</th>
					    	<th>{{trans('messages.total-specimen')}}</th>
					    	<th>Expected TAT</th>
					    	<th>Actual TAT</th>
					    	<th>Within TAT</th>
					    	<th>Beyond TAT</th>
					    	<th>{{trans('messages.tat-rates-label')}} Within</th>
					    	<th>{{trans('messages.tat-rates-label')}} Beyond</th>
					    </tr>
					    @forelse($data as $datum)
					    <tr>
					    	<td>{{$datum->name}}</td>
			  				<td>{{$datum->total}}</td>
			  				<td>{{$datum->ETAT}}</td>
			  				<td>{{$datum->avgtime}}</td>
			  				<td>{{$datum->Within}}</td>
			  				<td>{{$datum->Beyond}}</td>
			  				<td>{{round($datum->Within / $datum->total * 100, 2)}}</td>
			  				<td>{{round($datum->Beyond / $datum->total * 100, 2)}}</td>
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