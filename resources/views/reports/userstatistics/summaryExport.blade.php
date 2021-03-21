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
							<th>{{Lang::choice('messages.name',1)}}</th>
							<th>{{Lang::choice('messages.received-tests',1)}}</th>
							<th>{{Lang::choice('messages.accepted-specimen',1)}}</th>
							<th>{{Lang::choice('messages.rejected-specimen',1)}}</th>
							<th>{{Lang::choice('messages.performed-tests',1)}}</th>
							<th>{{Lang::choice('messages.verified-tests',1)}}</th>
							<th>Approved</th>
			</tr>
			<?php $i = 1;?>
						@forelse($reportData as $row)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$row->name}}</td>
								<td>{{$row->created}}</td>
								<td>{{$row->specimen_registered}}</td>
								<td>{{$row->specimen_rejected}}</td>
								<td>{{$row->tested}}</td>
								<td>{{$row->verified}}</td>
								<td>{{$row->approved}}</td>
							</tr>
						@empty
							<tr>
								<td>{{Lang::choice('messages.no-data-found',1)}}</td>
							</tr>
						@endforelse
		</tbody>
	</table>
</div>
</body>
</html>