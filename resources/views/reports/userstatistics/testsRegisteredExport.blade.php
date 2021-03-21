<html>
<head>
{{ HTML::style('css/bootstrap.min.css') }}
{{ HTML::style('css/bootstrap-theme.min.css') }}
</head>
<body>
<div id="content">
	<style>
  table, th, td {
    border: 1px solid black;
    padding: 10px;
  }
</style>
	
  	<table class="table table-bordered"  width="100%">
		<tbody align="left">
			<tr>
							<th></th>
							<th>{{Lang::choice('messages.test-id',1)}}</th>
							<th>{{Lang::choice('messages.test-type',1)}}</th>
							<!-- <th>{{Lang::choice('messages.patient-number',1)}}</th> -->
							<th>{{Lang::choice('messages.patient',1)}}</th>
							<th>{{Lang::choice('messages.specimen-id',1)}}</th>
							<th>{{Lang::choice('messages.registration-date',1)}}</th>
			</tr>
			<?php $i = 1;?>
						@forelse($reportData as $row)
							<?php $test = App\Models\UnhlsTest::find($row->id);?>
							<tr>
								<td>{{$i++}}</td>
								<td>{{$test->id}}</td>
								<td>{{$test->testType->name}}</td>
								<!-- <td>{{$test->visit->patient_id}}</td> -->
								<td>{{$test->visit->patient->name}}</td>
								<td>{{$test->specimen->id}}</td>
								<td>{{$test->time_completed}}</td>
							</tr>
						@empty
							<tr>
								<td colspan='6'>{{Lang::choice('messages.no-data-found',1)}}</td>
							</tr>
						@endforelse
		</tbody>
	</table>
</div>
</body>
</html>