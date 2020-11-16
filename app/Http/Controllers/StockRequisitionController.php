<?php

class StockRequisitionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$districts = District::orderBy('name', 'ASC')->lists('name', 'id');
		$years = FinancialYear::orderBy('year', 'ASC')->lists('year', 'id');
		$items = Commodity::orderBy('name', 'ASC')->lists('name', 'id');

		return View::make('stockrequisition.index')
			->with('districts', $districts)
			->with('years', $years)			
			->with('items', $items);
	}

	public function fetch()
	{
		
		$commodity = Commodity::find(Input::get('id'));

		$results = DB::select( DB::raw("SELECT year(transaction_date) as year,monthname(transaction_date) as month,sum(quantity) as adjustment,sum(quantity_in) as stock_in,sum(quantity_out) as stock_out,(sum(quantity_in)-sum(quantity_out)+sum(quantity)) balance FROM unhls_stockcard where commodity_id=:commodity_id
		GROUP by monthname(transaction_date),year(transaction_date)"), array(
		   'commodity_id' => Input::get('id'),
		 ));


		return Response::json(array("commodity"=>$commodity,"results"=>$results));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if( Input::get('redirect')==0 )
		{
			Session::put('district',Input::get('district'));
			Session::put('facility',Input::get('facility'));
			Session::put('item',Input::get('item'));
			Session::put('year',Input::get('year'));
		}
		
		else
		{

			if(!(Session::has('district')))
			{
				Session::put('district',Input::get('district'));
			}

			if(!(Session::has('facility')))
			{
				Session::put('facility',Input::get('facility'));
			}

			if(!(Session::has('item')))
			{
				Session::put('item',Input::get('item'));
			}

			if(!(Session::has('year')))
			{
				Session::put('year',Input::get('year'));
			}

		}

		$district = District::Find(Session::get('district'));		
		$facility = UNHLSFacility::Find(Session::get('facility'));
		$item = Commodity::with('Metric')->Find(Session::get('item'));	
		$year = FinancialYear::Find(Session::get('year'));	


		return View::make('stockrequisition.create')
		->with('district', $district)
		->with('facility', $facility)
		->with('year', $year)
		->with('item', $item);

	}

	
	public function store()
	{

		//
		$rules = array(
		'voucher_no' => 'required'
		);
		
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator);
		} else {

		$stockrequisition = new UNHLSStockrequisition;

        $stockrequisition->district_id = Session::get('district');
        $stockrequisition->facility_id = Session::get('facility');        
        $stockrequisition->year_id = Session::get('year');                
        $stockrequisition->item_id = Session::get('item');

        $stockrequisition->issued_to = Input::get('issued_to');
        $stockrequisition->voucher_number = Input::get('voucher_no');    
        $stockrequisition->quantity_required = Input::get('quantity_required');   
        $stockrequisition->quantity_issued = Input::get('quantity_issued');   
        $stockrequisition->issue_date = Input::get('issue_date');      
        $stockrequisition->remarks = Input::get('remarks');    

        $stockrequisition->save();
		return Redirect::to('stockrequisition');

		}
	}

}
