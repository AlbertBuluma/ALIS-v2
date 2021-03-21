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
					TEST COUNTS
				</div>
			</div>
		</div>
	</div>
  	<table class="table table-bordered"  width="100%">
		<tbody align="left">
			<<tr>
		    	<th>{{Lang::choice('messages.test-type',2)}}</th>
		    	<th>{{trans('messages.pending-tests')}}</th>
		    	<th>{{trans('Started Tests')}}</th>
		    	<th>{{trans('messages.complete-tests')}}</th>
		    	<th>{{trans('Verified Tests')}}</th>
		    	<th>{{trans('Approved Tests')}}</th>
		    </tr>
				@forelse($ungroupedTests as $key => $value)

			    <tr>
			    	<td>{{ App\Models\TestType::find($key)->name }}</td>
			    	<td>{{ $value['pending'] }}</td>
			    	<td>{{ $value['started'] }}</td>
			    	<td>{{ $value['complete'] }}</td>
			    	<td>{{ $value['verified'] }}</td>
			    	<td>{{ $value['approved'] }}</td>
			    </tr>
			    @empty
			    <tr>
			    	<td colspan="3">{{trans('messages.no-records-found')}}</td>
			    </tr>
			    @endforelse
		</tbody>
	</table>
</div>
</div>
</body>
</html>