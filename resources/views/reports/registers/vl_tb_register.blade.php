@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li class="active">{{ Lang::choice('messages.report', 2) }}</li>
		</ol>
	</div>
	<!--
	{{ Form::open(array('route' => array('reports.patient.index'), 'class'=>'form-inline', 'role'=>'form', 'method'=>'POST')) }}
		<div class="form-group">

		    {{ Form::label('search', "search", array('class' => 'sr-only')) }}
            {{ Form::text('search', Input::get('search'), array('class' => 'form-control test-search')) }}
		</div>
		<div class="form-group">
			{{ Form::button("<span class='glyphicon glyphicon-search'></span> ".trans('messages.search'),
		        array('class' => 'btn btn-primary', 'id' => 'filter', 'type' => 'submit')) }}
		</div>
	{{ Form::close() }}
-->
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
    <th colspan="21" scope="col"><strong>(HMIS 055aH8)&nbsp;</strong><strong>Daily Activity Register&nbsp;</strong><strong>for Viral Load, CD4, TB LAM &amp; CRAG</strong></th>
  </tr>
  <tr>
    <th scope="col"><p><strong>(1)</strong></p>
    <p><strong>Date</strong></p></th>
    <th scope="col"><p><strong>(2)</strong></p>
    <p><strong>Opd</strong><strong>&nbsp;No.</strong></p></th>
    <th scope="col"><p><strong>(3)</strong></p>
    <p><strong>Ipd</strong><strong>&nbsp;No.</strong></p></th>
    <th scope="col"><p><strong>(4)</strong></p>
    <p><strong>Lab. No.</strong></p></th>
    <th scope="col"><p><strong>(5)</strong></p>
    <p><strong>NIN</strong></p></th>
    <th colspan="3" scope="col"><p><strong>(6)</strong></p>
    <p><strong>Patient Category</strong></p></th>
    <th scope="col"><p><strong>(7)</strong></p>
    <p><strong>ART No.</strong></p></th>
    <th scope="col"><p><strong>(8)</strong></p>
    <p><strong>Age</strong></p></th>
    <th scope="col"><p><strong>(9)</strong></p>
    <p><strong>Sex</strong></p></th>
    <th scope="col"><p><strong>(10)</strong></p>
    <p><strong>Unit/Ward</strong></p></th>
    <th scope="col"><p><strong>(11)</strong></p>
    <p><strong>Specimen</strong></p></th>
    <th rowspan="2" scope="col"><p><strong>(12)</strong></p>
      <p><strong>VIRAL LOAD</strong></p>
    <p><strong>(Copies/ml)</strong></p></th>
    <th colspan="2" scope="col"><p><strong>(13)</strong></p>
    <p><strong>CD4 COUNTS</strong></p></th>
    <th scope="col"><p><strong>(14)</strong></p>
    <p><strong>TB LAM</strong></p></th>
    <th scope="col"><p><strong>(15)</strong></p>
    <p><strong>CRAG</strong></p></th>
    <th scope="col"><p><strong>(16)</strong></p>
      <p><strong>Date</strong></p>
    <p><strong>Done</strong></p></th>
    <th scope="col"><p><strong>(17)</strong></p>
    <p><strong>TAT</strong></p></th>
    <th scope="col"><p><strong>18)</strong></p>
    <p><strong>Comments</strong></p></th>
  </tr>
  <tr>
    <th colspan="5" scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5">&nbsp;</td>
    <td><p><strong>CD4</strong></p>
    <p><strong>(Cells/&micro;l)</strong></p></td>
	<td><strong>CD4%</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th colspan="5" scope="row">Number of Tests Done</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th colspan="13" scope="row">Number of Positives</th>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
		</table>
	</div>

</div>
@stop
