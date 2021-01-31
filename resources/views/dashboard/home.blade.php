@extends("layout")
@section("content")

<div class="container-fluid">
	<div class="row"> <!--beggining of upper row -->
		<div class="container-fluid">
			<div class="row">
				{{Form::open(array('route' =>array('dashboard.index')))}}
					<div class="col col-md-4">
						<span style="font-weight: bold; color:blue;">DATA BELOW IS FOR THE CURRENT MONTH - <?php echo date('01-m-Y'); ?> to
							<?php echo date('d-m-Y'); ?></span><br> <strong>To view older stats please select a date range</strong>
					</div>
					<div class="col col-md-3">
						<div class="col-md-2">
							<span style="font-weight: bold; color:blue;">{{Form::label('From', 'From')}}</span>
						</div>
						<div class="col-md-7">
							<span style="font-weight: bold; color:blue;"> {{Form::text('date_from', $dateFrom, array('class' => 'form-control standard-datepicker') )}}</span>
						</div>
					</div>
					<div class="col col-md-3">
						<div class="col-md-2">
							<span style="font-weight: bold; color:blue;">{{Form::label('To', 'To')}}</span>
						</div>
						<div class="col-md-7">
							<span style="font-weight: bold; color:blue;">{{Form::text('date_to', $dateTo, array('class' => 'form-control standard-datepicker') )}}</span>
						</div>
					</div>
					<div class="btn col-md-2">
						{{ Form::button("<span class='glyphicon glyphicon-filter'>
						</span> ".trans('messages.view'), array('class' => 'btn btn-primary', 'id' => 'filter', 'type' => 'submit')) }}
					</div>
				{{Form::close()}}
			</div>
		</div>  <!--end of inner container -->
	</div> <!--End of upper row -->
	@extends("layout")
@section("content")

<div class="container-fluid">
	<div class="row"> <!--beggining of upper row -->
		<div class="container-fluid">
			<div class="row">
				{{Form::open(array('route' =>array('dashboard.index')))}}
					<div class="col col-md-4">
						<span style="font-weight: bold; color:blue;">DATA BELOW IS FOR THE CURRENT MONTH - <?php echo date('01-m-Y'); ?> to
							<?php echo date('d-m-Y'); ?></span><br> <strong>To view older stats please select a date range</strong>
					</div>
					<div class="col col-md-3">
						<div class="col-md-2">
							<span style="font-weight: bold; color:blue;">{{Form::label('From', 'From')}}</span>
						</div>
						<div class="col-md-7">
							<span style="font-weight: bold; color:blue;"> {{Form::text('date_from', $dateFrom, array('class' => 'form-control standard-datepicker') )}}</span>
						</div>
					</div>
					<div class="col col-md-3">
						<div class="col-md-2">
							<span style="font-weight: bold; color:blue;">{{Form::label('To', 'To')}}</span>
						</div>
						<div class="col-md-7">
							<span style="font-weight: bold; color:blue;">{{Form::text('date_to', $dateTo, array('class' => 'form-control standard-datepicker') )}}</span>
						</div>
					</div>
					<div class="btn col-md-2">
						{{ Form::button("<span class='glyphicon glyphicon-filter'>
						</span> ".trans('messages.view'), array('class' => 'btn btn-primary', 'id' => 'filter', 'type' => 'submit')) }}
					</div>
				{{Form::close()}}
			</div>
		</div>  <!--end of inner container -->
	</div> <!--End of upper row -->
	<div class="container-fluid col-md-12">
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="panel panel-default"><b>Patients and Tests</b>
					<div class="panel-body">
						<div class="stat_box">
							<div class="stat_ico color_a"><i class="ion-ios-people"></i></div>
							<div class="stat_content">
								<span class="stat_count">{{$patientCount}} ({{$outPatients}}% OPD)</span>
								<span class="stat_name">Number of patient Visits</span>
							</div>

						</div>
						<div class="stat_box">
							<div class="stat_ico color_a"><i class="ion-ios-flask"></i></div>
							<div class="stat_content">
								<span class="stat_count">{{$testCounts}}</span>
								<span class="stat_name">Tests completed</span>
							</div>

						</div>
						<div class="stat_box">
							<div class="stat_ico color_a"><i class="ion-plane"></i></div>
							<div class="stat_content">
								@if(App\Models\UnhlsTest::where('test_status_id','=', 4)->whereMonth('time_created', '=', Illuminate\Support\Carbon::today()->month)->count() > 0)
								<span class="stat_count">{{round(App\Models\Referral::whereMonth('created_at', '=', Illuminate\Support\Carbon::today()->month)->count()/
									App\Models\UnhlsTest::where('test_status_id','=', 4)->whereMonth('time_created', '=', Illuminate\Support\Carbon::today()->month)->count()/100, 2)}}%</span>
								@endif
								<span class="stat_name">Tests referred</span>
							</div>

						</div>
					</div>
				</div> <!--end of panel-->
			</div>

			<div class="col-lg-4 col-md-6">
				<div class="panel panel-default"><b>Prevalences</b>
					<div class="panel-body">
						<div class="stat_box">
							<div class="stat_ico color_b"><i class="ion-ios-personadd"></i></div>
							<div class="stat_content">
								<span class="stat_count"> {{$hiv}} % </span>
								<span class="stat_name">HIV Prevalence</span>
							</div>
						</div>
						<div class="stat_box">
							<div class="stat_ico color_b"><i class="ion-ios-personadd"></i></div>
							<div class="stat_content">
								<span class="stat_count"> {{$malaria}}% </span>
								<span class="stat_name">Malaria Prevalence</span>
							</div>
						</div>
						<div class="stat_box">
							<div class="stat_ico color_b"><i class="ion-ios-personadd"></i></div>
							<div class="stat_content">
								<span class="stat_count">{{$tb}}% </span>
								<span class="stat_name">TB Prevalence</span>
							</div>
						</div>
					</div>
				</div> <!--end of panel-->
			</div>

			<div class="col-lg-4 col-md-6">
				<div class="panel panel-default"><b>Samples</b>
					<div class="panel-body">
						<div class="stat_box">
							<div class="stat_ico color_a"><i class="ion-ios-medkit"></i></div>
							<div class="stat_content">
								<span class="stat_count">{{$sampleCounts}}</span>
								<span class="stat_name">Samples collected</span>
							</div>
						</div>
						<div class="stat_box">
							<div class="stat_ico color_c"><i class="ion-ios-close"></i></div>
							<div class="stat_content">
								<span class="stat_count">{{$samplesRejected}}</span>
								<span class="stat_name">Samples Rejected</span>
							</div>
						</div>
						<div class="stat_box">
							<div class="stat_ico color_d"><i class="ion-ios-checkmark"></i></div>
							<div class="stat_content">
								<span class="stat_count">{{$samplesAccepted }}%</span>
								<span class="stat_name">Samples accepted</span>
							</div>
						</div>
					</div>
				</div><!--end of panel-->
			</div>

		</div>

	<div class="row"> <!--start of commodity row -->
		<div class="col-lg-4 col-md-6">
			<div class="panel panel-default"><b>Commodities</b>
				<div class="panel-body">
				<div class="stat_box">
					<div class="stat_ico color_d"><i class="ion-ios-list"></i></div>
					<div class="stat_content">
						<span class="stat_count">{{ 0 }}</span>
						<span class="stat_name">Number of expired tracer items</span>
					</div>

				</div>
				<div class="stat_box">
					<div class="stat_ico color_d"><i class="ion-ios-list"></i></div>
					<div class="stat_content">
						<span class="stat_count">{{ 0}}</span>
						<span class="stat_count"></span>
						<span class="stat_name">Number of stocked out tracer items</span>
					</div>

				</div>
				<div class="stat_box">
					<div class="stat_ico color_d"><i class="ion-gear-b"></i></div>
					<div class="stat_content">
						<span class="stat_count">0</span>
						<span class="stat_name">Non functional equipment</span>
					</div>

				</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-6">
			<div class="panel panel-default"><b>Biosafety & Biosecurity Incidents</b>
				<div class="panel-body">
					<div class="stat_box">
						<div class="stat_ico color_g"><i class="ion-nuclear"></i></div>
						<div class="stat_content">
							<span class="stat_count">{{count(App\Models\Bbincidence::countbbincidents_all())}}</span>
							<span class="stat_name">Number of BB incidents</span>
						</div>
					</div>
					<div class="stat_box">
						<div class="stat_ico color_g"><i class="ion-nuclear"></i></div>
						<div class="stat_content">
							<span class="stat_count">
								{{count(App\Models\Bbincidence::countbbincidents_major())}}
								<?php if((count(App\Models\Bbincidence::countbbincidents_all()))>0){ ?>
								({{round ((count(App\Models\Bbincidence::countbbincidents_major())/count(App\Models\Bbincidence::countbbincidents_all())*100),2) }} %)
								<?php } ?>
							</span>
							<span class="stat_name">Major incidents</span>
						</div>
					</div>
					<div class="stat_box">
						<div class="stat_ico color_g"><i class="ion-nuclear"></i></div>
						<div class="stat_content">
							<span class="stat_count">
								{{count(App\Models\Bbincidence::countbbincidents_minor())}}
								<?php if((count(App\Models\Bbincidence::countbbincidents_all()))>0){ ?>
								({{round ((count(App\Models\Bbincidence::countbbincidents_minor())/count(App\Models\Bbincidence::countbbincidents_all())*100),2) }} %)
								<?php } ?>
								</span>
							<span class="stat_name">Minor incidents</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-6">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="stat_box">
						<div class="stat_ico color_f"><i class="ion-ios-people"></i></div>
						<div class="stat_content">
							<span class="stat_count">{{$staff}}</span>
							<span class="stat_name">Number of Lab Staff</span>
						</div>
					</div>
					<div class="stat_box">
						<div class="stat_ico color_f"><i class="ion-ios-person"></i></div>
						<div class="stat_content">
							<span class="stat_count">26 %</span>
							<span class="stat_name">Percentage of volunteers</span>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>	<!--end of commodity row -->
	</div>
</div>


<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="heading_b">Stocked out items</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Item</th>
									<th class="text-right">Days stocked out</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Humacount Diluent ,20L </td>
									<td class="text-right">3</td>
								</tr>
								<tr>
									<td>Humacount Lyse 1L</td>
									<td class="text-right">16</td>
								</tr>
								<tr>
									<td>Nihon Kohden MEK Diluent Isotonac 3 20L</td>
									<td class="text-right">6</td>
								</tr>
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="heading_b">BB Incidents</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Type of Incident</th>
									<th class="text-right">Number</th>
								</tr>
							</thead>
							<tbody>
								@foreach ((App\Models\Bbincidence::bbincidents_monthly_natures()) as $nature)
									<tr>
										<td>{{$nature->name}}</td>
										<td class="text-right">{{$nature->total}}</td>
									</tr>
									@endforeach
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
    @endsection()
@stop
