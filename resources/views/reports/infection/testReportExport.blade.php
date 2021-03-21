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
					TEST REPORT
				</div>
			</div>
		</div>
	</div>
  	<table class="table table-bordered"  width="100%">
		<thead>
					<tr>
						<th rowspan="2">{{ Lang::choice('messages.test',1) }}</th>
						<th rowspan="2">{{ Lang::choice('messages.measure',1) }}</th>
						<th rowspan="2">{{ trans('messages.test-results') }}</th>
						<th rowspan="2">{{ trans('messages.gender') }}</th>
						<th colspan="{{ count($ageRanges) }}">{{ trans('messages.measure-age-range') }}</th>
						<th rowspan="2">{{ trans('messages.mf-total') }}</th>
						<th rowspan="2">{{ Lang::choice('messages.total',1) }}</th>
						<th rowspan="2">{{ trans('messages.total-tests') }}</th>
					</tr>
					<tr>
						@foreach($ageRanges as $ageRange => $description)
							<th title='{{$description}}'>{{ $ageRange }}</th>
					    @endforeach
					</tr>
				</thead>
				<tbody>
					<?php 
						$testRow = "";

						$currentTest = "";
						$currentMeasure = "";
						$currentResult = "";

						$testCount = 0;
						$measureCount = 0;
						$resultCount = 0;

						$testTotal = 0;
						$resultTotal = 0;
					?>
					@forelse($infectionData as $inf)
						<?php
						$testCount++;
						$measureCount++;
						$resultCount++;

						if(strcmp($currentTest, $inf->test_name) == 0){
							$testRow.="<tr>";

							if(strcmp($currentMeasure, $inf->measure_name) != 0){
								$testRow = str_replace("NEW_MEASURE", $measureCount, $testRow);
								$testRow = str_replace("NEW_RESULT", $resultCount, $testRow);
								$testRow = str_replace("RESULT_TOTAL", $resultTotal, $testRow);

								$measureCount=0;
								$resultCount=0;
								$resultTotal = 0;

								$currentMeasure = $inf->measure_name;
								$currentResult = $inf->result;

								$testRow.="<td rowspan='NEW_MEASURE'>".$inf->measure_name."</td>";
								$testRow.="<td rowspan='NEW_RESULT'>".$inf->result."</td>";
							}else{
								if(strcmp($currentResult, $inf->result) != 0){
									$testRow = str_replace("NEW_RESULT", $resultCount, $testRow);
									$testRow = str_replace("RESULT_TOTAL", $resultTotal, $testRow);

									$resultCount=0;
									$resultTotal = 0;

									$currentResult = $inf->result;
									$testRow.="<td rowspan='NEW_RESULT'>".$inf->result."</td>";
								}
							}
						}else{
							$testRow = str_replace("NEW_TEST", $testCount, $testRow);
							$testRow = str_replace("NEW_MEASURE", $measureCount, $testRow);
							$testRow = str_replace("NEW_RESULT", $resultCount, $testRow);

							$testRow = str_replace("RESULT_TOTAL", $resultTotal, $testRow);
							$testRow = str_replace("TEST_TOTAL", $testTotal, $testRow);

							echo $testRow;

							$testCount=0;
							$measureCount=0;
							$resultCount=0;

							$testTotal = 0;
							$resultTotal = 0;

							$currentTest = $inf->test_name;
							$currentMeasure = $inf->measure_name;
							$currentResult = $inf->result;

							$testRow="<tr>";
							$testRow.="<td rowspan='NEW_TEST'>".$inf->test_name."</td>";
							$testRow.="<td rowspan='NEW_MEASURE'>".$inf->measure_name."</td>";
							$testRow.="<td rowspan='NEW_RESULT'>".$inf->result."</td>";
						}

						$testRow.="<td>".$inf->gender."</td>";
						$testRow.="<td>".$inf->RC_U_5."</td>";
						$testRow.="<td>".$inf->RC_5_15."</td>";
						$testRow.="<td>".$inf->RC_A_15."</td>";
						$testRow.="<td>".($inf->RC_U_5 + $inf->RC_5_15 + $inf->RC_A_15)."</td><!-- Male|Female Total-->";

						$resultTotal += $inf->RC_U_5 + $inf->RC_5_15 + $inf->RC_A_15;

						if(strcmp($currentResult, $inf->result) == 0 && $resultCount == 0){
							$testRow.="<td rowspan='NEW_RESULT'>RESULT_TOTAL</td>";
						}

						if($measureCount == 0)
							$testTotal = $inf->RC_U_5 + $inf->RC_5_15 + $inf->RC_A_15;
						else
							$testTotal += $inf->RC_U_5 + $inf->RC_5_15 + $inf->RC_A_15;

						if(strcmp($currentTest, $inf->test_name) == 0 && $testCount == 0){
							$testRow.="<td rowspan='NEW_TEST'>TEST_TOTAL</td>";
						}

						$testRow.="</tr>";
						?>
					@empty
						<tr>
							<td colspan="9">
								{{trans('messages.no-records-found')}}
							</td>
						</tr>
					@endforelse
					<?php
						$testRow = str_replace("NEW_TEST", ++$testCount, $testRow);
						$testRow = str_replace("NEW_MEASURE", ++$measureCount, $testRow);
						$testRow = str_replace("NEW_RESULT", ++$resultCount, $testRow);
						$testRow = str_replace("RESULT_TOTAL", $resultTotal, $testRow);
						$testRow = str_replace("TEST_TOTAL", $testTotal, $testRow);
					?>
					{{$testRow}}
				</tbody>
			</table>
</div>
</div>
</body>
</html>