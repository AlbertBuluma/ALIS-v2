@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li class="active">{{ Lang::choice('messages.report', 2) }}</li>
		</ol>
	</div>

	<br>
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-user"></span>
		{{ trans('messages.patient-report') }}
	</div>
	<div class="panel-body">

	    @if(Session::has('message'))
			<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
		@endif
	    <table id="reports_patients_table" class="row-border hover table table-bordered table-condensed table-striped">

			  <tr>
			    <td colspan="2"><strong>1. Details of reporting officer</strong></td>
			    <td colspan="2"><strong>2. Incident Identifier</strong></td>
			    <td colspan="6"><strong>3. Details of Personnel Affected</strong></td>
			    <td colspan="3"><strong>4. Details of Incident</strong></td>
			    <td colspan="3"><strong>5. Incident Analysis and Follow up</strong></td>
			  </tr>
			  <tr>
			    <td>Name of reporting officer</td>
			    <td>Contact of reporting officer</td>
			    <td>Biosafety Biosecurity Incident identification number&nbsp;<strong>(format: BB/facility code/auto generated number)</strong></td>
			    <td><p align="center">Date</p>
			      <p align="center"><strong>(D:M:Y)</strong></p>
			    <p align="center">Time&nbsp;<strong>(H:M)</strong></p></td>
			    <td>Victim&rsquo;sNIN</td>
			    <td><p align="center">Victim Laboratory Number</p>
			    <p align="center">(<em>If Applicable</em>)</p></td>
			    <td>Name of Victim</td>
			    <td>AGE</td>
			    <td><p align="center">Sex</p>
			    <p align="center">(M/F)</p></td>
			    <td>Category of Victim<em>&nbsp;(use codes&nbsp;belowA)</em></td>
			    <td>Location of incident</td>
			    <td>Type of incident</td>
			    <td>Specific incident<em>(use codes&nbsp;belowB)</em></td>
			    <td>Specific cause of incident<em>(use codes&nbsp;belowC)</em></td>
			    <td>Corrective/ preventive actions taken<em>(use codes&nbsp;belowD)</em></td>
			    <td>Incident&nbsp;<strong>Resolved or Referred?</strong></td>
			  </tr>
			  <tr>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			  </tr>

		</table>
	</div>

</div>
@stop
