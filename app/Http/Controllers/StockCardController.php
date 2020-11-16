<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\UNHLSFacility;
use App\Models\UNHLSStaff;
use App\Models\UNHLSStockcard;
use App\Models\UNHLSWarehouse;
use Illuminate\Support\Facades\DB;

class StockCardController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{

		$items = Commodity::select(DB::raw('concat (name," (",description,")") as full_name,id'))
		->orderBy('full_name', 'ASC')
		->lists('full_name', 'id');

		$stock = UNHLSStockcard::with('District','Year','Facility','Commodity')
				->get();

		return view('stockcard.index')
			->with('items', $items)
			->with('stock', $stock);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		if( Input::get('redirect')==0 )
		{
			Session::put('item',Input::get('item'));
			Session::put('action',Input::get('optAction'));
		}

		else
		{


			if(!(Session::has('item')))
			{
				Session::put('item',Input::get('item'));
			}

			if(!(Session::has('action')))
			{
				Session::put('action',Input::get('optAction'));
			}
		}

		$source_destination_list = UNHLSFacility::orderBy('name', 'ASC')->lists('name', 'id');
		$source_destination_label = "From";


		$item = Commodity::with('Metric')->Find(Session::get('item'));

		$card_action = 'losses / adjustments';

		if(Session::get('action')== config('constants.INCOMING_STOCK_FLAG') )
		{
			$card_action = 'stock in';
			if(Input::get('inboundOption')==1)
			{
				$source_destination_list = UNHLSFacility::orderBy('name', 'ASC')->lists('name', 'id');
				Session::put('to_from_type', config('constants.FROM_FACILITY'));
			}
			else
			{
				$source_destination_list = UNHLSWarehouse::orderBy('name', 'ASC')->lists('name', 'id');
				Session::put('to_from_type', config('constants.FROM_WAREHOUSE'));
			}
		}
		elseif(Session::get('action')== config('constants.OUTGOING_STOCK_FLAG'))
		{
			$card_action = 'stock out';
			$source_destination_label = "To";

			if(Input::get('outboundOption')==3)
			{
				$source_destination_list = UNHLSFacility::orderBy('name', 'ASC')->lists('name', 'id');
				Session::put('to_from_type', config('constants.TO_FACILITY'));
			}
			else
			{
				$source_destination_list = UNHLSStaff::select(DB::raw('concat (firstName," ",lastName) as full_name,id'))
					->orderBy('full_name', 'ASC')
					->lists('full_name', 'id');
				Session::put('to_from_type', config('constants.TO_PERSON'));
			}

		}

		$stock_record = UNHLSStockcard::orderBy('created_at', 'DESC')
					->where('commodity_id','=',$item->id)
					->first();

		$balance_on_hand = ($stock_record==null)?0:$stock_record->balance;

		return view('stockcard.create')
		->with('balance_on_hand', $balance_on_hand)
		->with('item', $item)
		->with('optAction',Session::get('action'))
		->with('card_action', $card_action)
		->with('source_destination_list', $source_destination_list)
		->with('source_destination_label', $source_destination_label);
	}


	public function validate_batch()
	{

		$batch = 	UNHLSStockcard::where('action','=','I')->where('batch_number','=',Input::get('batch_no'))->orderBy('created_at','asc')->first();

		if ($batch==null)
		{
			return Response::json(array("isValid"=>false,"message"=>"Invalid batch number provided"));
		}
		else if($batch->expiry_date<date('Y-m-d'))
		{
			return Response::json(array("isValid"=>false,"message"=>"Selected batch has expired"));
		}

		return Response::json(array("isValid"=>true));
	}


	public function store()
	{

		$rules = array(
		'voucher_no' => 'required',
		'to_from' => 'required',
		'transaction_date'=>'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator);
		}
		/*else if ($batch->count()==0) {
			Session::put('batch_error',Input::get('batch_no').' is an invalid batch number');

			dd($batch);
		}*/ else {


		//check for batch number validity
		$stockcard = new UNHLSStockcard;

		$action = Input::get('action');

		$quantity=0;
		$balance=Input::get('balance_on_hand');


        $stockcard->to_from = Input::get('to_from');
        $stockcard->to_from_type = Session::get('to_from_type');
        $stockcard->district_id = \Config::get('constants.DISTRICT_ID') ;
        $stockcard->facility_id = \Config::get('constants.FACILITY_ID');
        $stockcard->year_id = \Config::get('constants.FIN_YEAR_ID');
        $stockcard->commodity_id = Session::get('item');
        $stockcard->voucher_number = Input::get('voucher_no');
        $stockcard->batch_number = Input::get('batch_no');
        $stockcard->expiry_date = Input::get('expiry_date');
        $stockcard->transaction_date = date('Y-m-d',strtotime(Input::get('transaction_date')));
        $stockcard->issue_date = new DateTime();
        $stockcard->remarks = Input::get('remarks');
        $stockcard->initials = Input::get('initials');
        $stockcard->action = Input::get('action');

		if($action==\Config::get('constants.INCOMING_STOCK_FLAG'))
		{
			$quantity = Input::get('quantity_in');
			$balance += $quantity;

 		    $stockcard->quantity_in = $quantity;
		}
		else if($action==\Config::get('constants.OUTGOING_STOCK_FLAG'))
		{
			$quantity = Input::get('quantity_out');
			$balance -= $quantity;

 		    $stockcard->quantity_out = $quantity;
		}
		else{
			$quantity = Input::get('losses_adjustments');
			$balance += $quantity;

 	        $stockcard->quantity = $quantity;
			$stockcard->to_from = \Config::get('constants.FACILITY_ID');
        	$stockcard->to_from_type = \Config::get('constants.FROM_FACILITY');
		}

        $stockcard->balance = $balance;

        $stockcard->save();

		return Redirect::to('stockcard');

		}
	}

}
