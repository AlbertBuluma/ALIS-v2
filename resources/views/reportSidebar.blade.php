@section("reportSidebar")
	<nav id="side_nav">
		<ul>
			<li>
				<a href="{{ URL::route('user.home')}}"><span class="ion-home"></span> <span class="nav_title">Main Menu</span></a>
			</li>
			
			<li class="nav_trigger">
				<a href="#">
					<span class="ion-stats-bars"></span>
					<span class="nav_title">Reports</span>
				</a>
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
								<div><a href="{{ URL::route('reports.aggregate.hmis105')}}">
									<span class="glyphicon glyphicon-tag"></span>
									HMIS 105</a>
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
			</li>
		</ul>
	</nav>
@show


