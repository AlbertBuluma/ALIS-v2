@extends("layout-menu")
@section("content")

<div class="panel panel-primary row" >

<div class="panel-body row">
	<div class="btn-group container col-md-3">
		<a class="link-tip" href="{{ URL::route('user.dashboard')}}" data-toggle="tooltip" data-placement="bottom" title="Click to view key performance indicators for laboratory performance"> 
			<div class="panel panel-default">
			<span class="ion-speedometer" style="font-size:80px"></span> <br><span class="nav_title">DASHBOARD</span>
			</div>
		</a>
	</div>
	<div class="btn-group container col-xs-3">
		<a class="link-tip" href="{{ URL::route('unhls_patient.index')}}" data-toggle="tooltip" data-placement="bottom" title="Click to view and  manage patient bio-data">
			<div class="panel panel-default">
			<span class="ion-person-stalker" style="font-size:80px"></span> <br><span class="nav_title">PATIENTS</span>
			</div>
		</a>
	</div>
	<div class="btn-group container col-xs-3">
		<a class="link-tip" href="{{ URL::route('unhls_els.index')}}" data-toggle="tooltip" data-placement="bottom" title="Click to mange stock of laboratory supplies and to update equipment information">
			<div class="panel panel-default">
			<span class="ion-ios-cart" style="font-size:80px"></span> <br><span class="nav_title">INVENTORY & EQUIPMENT</span>
			</div>
		</a>
	</div>
	<div class="btn-group container col-xs-3">
		<a class="link-tip" href="{{URL::route('poc.index')}}" data-toggle="tooltip" data-placement="bottom" title="Click to access other resources e.g links to Viral load and EID Dashboard, CPHL websites">
			<div class="panel panel-default">
			<span class="ion-icon ion-ios-folder"></span> <br><span class="nav_title">POC / EID</span>
			</div>
		</a>
	</div>
</div>


<div class="panel-body row">
	<div class="btn-group container  col-xs-3">
		<a href="{{ URL::route('reports.index')}}" data-toggle="tooltip" data-placement="bottom" title="Click to view periodic reports and special reports">
			<div class="panel panel-default">
			<span class="ion-icon ion-stats-bars"></span> <br><span class="nav_title">REPORTS</span>
			</div>
		</a>
	</div>

		<div class="btn-group container col-xs-3">
		<a href="{{ URL::route('unhls_test.index')}}" data-toggle="tooltip" data-placement="bottom" title="Click to request for a lab test or to view the list and status of test requests">
			<div class=" panel panel-default">
			<span class="ion-erlenmeyer-flask" style="font-size:80px"></span> <br><span class="nav_title">TESTS</span>
			</div>
		</a>
	</div>

	<div class="btn-group container col-xs-3">
		<a href="{{ URL::route('bbincidence.index')}}" data-toggle="tooltip" data-placement="bottom" title="Click to view and record biosafety and biosecurity incidents">
			<div class="panel panel-default">
			<span class="ion-icon ion-nuclear"></span> <br><span class="nav_title">BIOSAFETY & BIOSECURITY</span>
			</div>
		</a>
	</div>
	<div class="btn-group container col-xs-3">
		<a href="{{ URL::route('user.index')}}" data-toggle="tooltip" data-placement="bottom" title="Click to manage user accounts and other Lab Configurations e.g creating Lab sections and new test type">
			<div class="panel panel-default">
			<span class="ion-icon ion-key"></span> <br><span class="nav_title">ACCESS CONTROL</span>
			</div>
		</a>
	</div>
</div>

</div>

@stop
