@extends("layout")
@section("content")

<div class="row">
	<span style="font-weight: bold; color:blue;">DATA BELOW IS FOR CURRENT MONTH - <?php echo date('01-m-Y'); ?> to
		<?php echo date('d-m-Y'); ?></span>
						<div class="col-md-12">
							<div class="row">
								<div class="col-lg-4 col-md-6">
									<div class="panel panel-default"><b>Patients and Tests</b>
										<div class="stat_box">
											<div class="stat_ico color_a"><i class="ion-ios-people"></i></div>
											<div class="stat_content">
												@if(App\Models\UnhlsVisit::count() > 0)
												<span class="stat_count">{{App\Models\UnhlsVisit::whereMonth('created_at', '=', Illuminate\Support\Carbon::today()->month)->count()}}
													({{App\Models\UnhlsVisit::where('visit_type', '=', 'Out-patient')->whereMonth('created_at', '=', Illuminate\Support\Carbon::today()->month)->count()*100/App\Models\UnhlsVisit::count()}}% - OPD)</span>
												@endif
												<span class="stat_name">Number of Patient Visits</span>
											</div>

										</div>
										<div class="stat_box">
											<div class="stat_ico color_a"><i class="ion-clipboard"></i></div>
											<div class="stat_content">
												<span class="stat_count">{{App\Models\UnhlsTest::where('time_completed','!=', 'NULL')->whereMonth('time_created', '=', Illuminate\Support\Carbon::today()->month )->count()}}</span>
												<span class="stat_name">Tests done</span>
											</div>

										</div>
										<div class="stat_box">
											<div class="stat_ico color_a"><i class="ion-forward"></i></div>
											<div class="stat_content">
												@if(App\Models\UnhlsTest::where('test_status_id','=', 4)->count() > 0)
												<span class="stat_count">{{round(App\Models\Referral::whereMonth('created_at', '=', Illuminate\Support\Carbon::today()->month)->count()/
													App\Models\UnhlsTest::where('test_status_id','=', 4)->whereMonth('time_created', '=', Illuminate\Support\Carbon::today()->month)->count()/100, 2)}}%</span>
												@endif
												<span class="stat_name">Tests referred</span>
											</div>

										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6">
									<div class="panel panel-default"><b>Prevalences</b>
										<div class="stat_box">
											<div class="stat_ico color_b"><i class="ion-ios-personadd"></i></div>
											<div class="stat_content">
												<span class="stat_count"> 8 % </span>
												<span class="stat_name">HIV Prevalence</span>
											</div>
										</div>
										<div class="stat_box">
											<div class="stat_ico color_b"><i class="ion-ios-personadd"></i></div>
											<div class="stat_content">
												<span class="stat_count"> 6 % </span>
												<span class="stat_name">Malaria Prevalence</span>
											</div>
										</div>
										<div class="stat_box">
											<div class="stat_ico color_b"><i class="ion-ios-personadd"></i></div>
											<div class="stat_content">
												<span class="stat_count">9 % </span>
												<span class="stat_name">TB Prevalence</span>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6">
									<div class="panel panel-default"><b>Samples</b>
										<div class="stat_box">
											<div class="stat_ico color_c"><i class="ion-ios-people"></i></div>
											<div class="stat_content">
												<span class="stat_count">{{App\Models\UnhlsSpecimen::whereMonth('time_collected', '=', Illuminate\Support\Carbon::today()->month)->count()}}</span>
												<span class="stat_name">Samples collected</span>
											</div>
										</div>
										<div class="stat_box">
											<div class="stat_ico color_c"><i class="ion-ios-close"></i></div>
											<div class="stat_content">
												@if(App\Models\UnhlsSpecimen::count() > 0)
												<span class="stat_count">{{round(App\Models\UnhlsSpecimen::where('specimen_status_id', '=',3)->whereMonth('time_collected', '=', Illuminate\Support\Carbon::today()->month)->count()*100/
													App\Models\UnhlsSpecimen::whereMonth('time_collected', '=', Illuminate\Support\Carbon::today()->month)->count(), 2)}} % </span>
												@endif
												<span class="stat_name">Samples rejected</span>
											</div>
										</div>
										<div class="stat_box">
											<div class="stat_ico color_c"><i class="ion-ios-checkmark"></i></div>
											<div class="stat_content">
												@if(App\Models\UnhlsSpecimen::count() > 0)
												<span class="stat_count">{{round(App\Models\UnhlsSpecimen::whereMonth('time_collected', '=', Illuminate\Support\Carbon::today()->month)->where('specimen_status_id', '=', 2)->count()*100/
													App\Models\UnhlsSpecimen::whereMonth('time_collected', '=', Illuminate\Support\Carbon::today()->month)->count(), 2)}} %</span>
												@endif
												<span class="stat_name">Samples accepted</span>
											</div>
										</div>
									</div>
								</div>

							</div>

							<div class="row">
								<div class="col-lg-4 col-md-6">
									<div class="panel panel-default"><b>Commodities</b>
										<div class="stat_box">
											<div class="stat_ico color_d"><i class="ion-ios-list"></i></div>
											<div class="stat_content">
												<span class="stat_count">5</span>
												<span class="stat_name">Number of expired tracer items</span>
											</div>

										</div>
										<div class="stat_box">
											<div class="stat_ico color_d"><i class="ion-ios-list"></i></div>
											<div class="stat_content">
												<span class="stat_count">3</span>
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

								<div class="col-lg-4 col-md-6">
									<div class="panel panel-default"><b>Biosafety & Biosecurity Incidents</b>
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

								<div class="col-lg-4 col-md-6">
									<div class="panel panel-default">
										<div class="stat_box">
											<div class="stat_ico color_f"><i class="ion-ios-people"></i></div>
											<div class="stat_content">
												<span class="stat_count">7</span>
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
@stop
