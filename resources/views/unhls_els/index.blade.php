@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
	 
	  <li class="active">Equipment, Logistics and Supplies</li>
	</ol>
</div>

<div class="sub_panel" style="left: -220px;">
						<div class="side_inner ps-ready ps-container" style="height: 620px;">
							<h4 class="panel_heading panel_heading_first">Inventory</h4>
							<ul>
								<li>
									<a href="{{ URL::route("stockcard.index")}}">
									<span class="glyphicon glyphicon-tag"></span> {{trans('messages.stock-card')}}</a>
								</li>
							<li>
								<a href="{{ URL::route("stockrequisition.index")}}">
								<span class="glyphicon glyphicon-tag"></span> Stockbook</a>
							</li>
							<li>
								<a href="{{ URL::route("commodity.index")}}">
								<span class="glyphicon glyphicon-tag"></span> {{trans('messages.commodities')}}</a>
							</li>
							<li>
								<a href="{{ URL::route("supplier.index")}}">
								<span class="glyphicon glyphicon-tag"></span> {{Lang::choice('messages.suppliers',2)}}</a>
							</li>
							<li>
								<a href="{{ URL::route("metric.index")}}">
								<span class="glyphicon glyphicon-tag"></span> {{trans('messages.metrics')}}</a>
							</li>
							</ul>
							<h4 class="panel_heading">Equipment</h4>
							<ul>
								<li><a href="{{ URL::route("equipmentinventory.index")}}"><span class="glyphicon glyphicon-tag"></span> Inventory</a></li>
								<li><a href="{{ URL::route("equipmentmaintenance.index")}}"><span class="glyphicon glyphicon-tag"></span> Maintenance log</a></li>
								<li><a href="{{ URL::route("equipmentbreakdown.index")}}"><span class="glyphicon glyphicon-tag"></span> Breakdown</a></li>
								<li><a href="{{ URL::route("equipmentsupplier.index")}}"><span class="glyphicon glyphicon-tag"></span> Supplier</a></li>
							</ul>
						<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 215px; display: none;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 620px; display: none;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
					</div>

@stop