@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
	  <li class="active">{{ Lang::choice('messages.report',2) }}</li>
	</ol>
</div>
<div class='container-fluid'>

<div class="sub_panel" style="left: -220px;">
						<div class="side_inner ps-ready ps-container" style="height: 620px;">
							<h4 class="panel_heading panel_heading_first">{{trans('messages.daily-reports')}}</h4>
							<ul>
								<li>
									<div>
										<a href="{{ URL::route('reports.patient.index')}}">
											<span class="glyphicon glyphicon-tag"></span>
											{{trans('messages.patient-report')}}</a>
									</div>
								</li>
								<li>
									<div><a href="{{ URL::route('reports.daily.log')}}">
										<span class="glyphicon glyphicon-tag"></span>
										{{trans('messages.daily-log')}}</a>
									</div>
								</li>
							</ul>
							<h4 class="panel_heading panel_heading_first">{{trans('messages.aggregate-reports')}}</h4>
							<ul>
								<li>
									<div><a href="{{ URL::route('reports.aggregate.prevalence')}}">
										<span class="glyphicon glyphicon-tag"></span>
										{{trans('messages.positivity-rates')}}</a>
									</div>
								</li>
								<li>
									<div><a href="{{ URL::route('reports.aggregate.surveillance')}}">
										<span class="glyphicon glyphicon-tag"></span>
										{{trans('messages.surveillance')}}</a>
									</div>
								</li>
								<li>
									<div><a href="{{ URL::route('reports.aggregate.counts')}}">
										<span class="glyphicon glyphicon-tag"></span>
										{{trans('messages.counts')}}</a>
									</div>
								</li>
								<li>
									<div><a href="{{ URL::route('reports.aggregate.tat')}}">
										<span class="glyphicon glyphicon-tag"></span>
										{{trans('messages.turnaround-time')}}</a>
									</div>
								</li>
								<li>
									<div><a href="{{ URL::route('reports.aggregate.infection')}}">
										<span class="glyphicon glyphicon-tag"></span>
										{{trans('messages.infection-report')}}</a>
									</div>
								</li>
								<li>
									<div><a href="{{ URL::route('reports.aggregate.userStatistics')}}">
										<span class="glyphicon glyphicon-tag"></span>
										{{trans('messages.user-statistics-report')}}</a>
									</div>
								</li>
								<li>
									<div><a href="{{ URL::route('reports.aggregate.moh706')}}">
										<span class="glyphicon glyphicon-tag"></span>
										{{trans('messages.moh-706')}}</a>
									</div>
								</li>
								<li>
									<div><a href="#">
										<span class="glyphicon glyphicon-tag"></span>
										HMIS 105</a>
									</div>
								</li>
								<li>
									<div><a href="{{ URL::route('reports.aggregate.cd4')}}">
										<span class="glyphicon glyphicon-tag"></span>
										{{trans('messages.cd4-report')}}</a>
									</div>
								</li>
								<li>
									<div><a href="{{ URL::route('reports.qualityControl')}}">
										<span class="glyphicon glyphicon-tag"></span>
										{{Lang::choice('messages.quality-control', 2)}}</a>
									</div>
								</li>
							</ul>
							<h4 class="panel_heading panel_heading_first">{{trans('messages.inventory-reports')}}</h4>
							<ul>
								<li>
									<div><a href="{{ URL::route('reports.inventory')}}">
										<span class="glyphicon glyphicon-tag"></span>
										{{trans('messages.stock-levels')}}</a>
									</div>
								</li>
							</ul>
							<h4 class="panel_heading panel_heading_first">Dashboard</h4>
							<ul>
								<li>
									<div><a href="{{ URL::route('user.dashboard')}}">
										<span class="glyphicon glyphicon-tag"></span>
										Dashboard</a>
									</div>
								</li>
							</ul>

						<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 215px; display: none;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 620px; display: none;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
					</div>
</div>

@stop
