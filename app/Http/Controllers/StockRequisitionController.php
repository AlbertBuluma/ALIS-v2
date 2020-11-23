<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\District;
use App\Models\FinancialYear;
use App\Models\UNHLSFacility;
use App\Models\UNHLSStockrequisition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class StockRequisitionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		//
		$districts = District::orderBy('name', 'ASC')->pluck('name', 'id')->toArray();
		$years = FinancialYear::orderBy('year', 'ASC')->pluck('year', 'id')->toArray();
		$items = Commodity::orderBy('name', 'ASC')->pluck('name', 'id')->toArray();

		return view('stockrequisition.index')
			->with('districts', $districts)
			->with('years', $years)
			->with('items', $items);
	}

	public function fetch(Request $request)
	{

		$commodity = Commodity::find($request->get('id'));

		$results = DB::select( DB::raw("SELECT year(transaction_date) as year,monthname(transaction_date) as month,sum(quantity) as adjustment,sum(quantity_in) as stock_in,sum(quantity_out) as stock_out,(sum(quantity_in)-sum(quantity_out)+sum(quantity)) balance FROM unhls_stockcard where commodity_id=:commodity_id
		GROUP by monthname(transaction_date),year(transaction_date)"), array(
		   'commodity_id' => $request->get('id'),
		 ));


		return Response::json(array("commodity"=>$commodity,"results"=>$results));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function create(Request $request)
	{
		if( $request->get('redirect')==0 )
		{
			Session::put('district',$request->get('district'));
			Session::put('facility',$request->get('facility'));
			Session::put('item',$request->get('item'));
			Session::put('year',$request->get('year'));
		}

		else
		{

			if(!(Session::has('district')))
			{
				Session::put('district',$request->get('district'));
			}

			if(!(Session::has('facility')))
			{
				Session::put('facility',$request->get('facility'));
			}

			if(!(Session::has('item')))
			{
				Session::put('item',$request->get('item'));
			}

			if(!(Session::has('year')))
			{
				Session::put('year',$request->get('year'));
			}

		}

		$district = District::Find(Session::get('district'));
		$facility = UNHLSFacility::Find(Session::get('facility'));
		$item = Commodity::with('Metric')->Find(Session::get('item'));
		$year = FinancialYear::Find(Session::get('year'));


		return view('stockrequisition.create')
		->with('district', $district)
		->with('facility', $facility)
		->with('year', $year)
		->with('item', $item);

	}


	public function store(Request $request)
	{

		//
		$rules = array(
		'voucher_no' => 'required'
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		} else {

		$stockrequisition = new UNHLSStockrequisition;

        $stockrequisition->district_id = Session::get('district');
        $stockrequisition->facility_id = Session::get('facility');
        $stockrequisition->year_id = Session::get('year');
        $stockrequisition->item_id = Session::get('item');

        $stockrequisition->issued_to = $request->get('issued_to');
        $stockrequisition->voucher_number = $request->get('voucher_no');
        $stockrequisition->quantity_required = $request->get('quantity_required');
        $stockrequisition->quantity_issued = $request->get('quantity_issued');
        $stockrequisition->issue_date = $request->get('issue_date');
        $stockrequisition->remarks = $request->get('remarks');

        $stockrequisition->save();
		return redirect('stockrequisition');

		}
	}

}
