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
							<th>{{Lang::choice('messages.patient-number',1)}}</th>
							<th>{{Lang::choice('messages.name',1)}}</th>
							<th>{{Lang::choice('messages.gender',1)}}</th>
							<th>{{Lang::choice('messages.age',1)}}</th>
							<th>{{Lang::choice('messages.registration-date',1)}}</th>
			</tr>
			<?php $i = 1;?>
						@forelse($reportData as $row)
							<?php $patient = App\Models\UnhlsPatient::find($row->id);?>
							<tr>
								<td>{{$i++}}</td>
								<td>{{$patient->patient_number}}</td>
								<td>{{$patient->name}}</td>
								<td>{{$patient->getGender(false)}}</td>
								<td>{{$patient->getAge()}}</td>
								<td>{{$patient->created_at}}</td>
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