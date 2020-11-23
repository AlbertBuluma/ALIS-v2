<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\UNHLSFacility;
use App\Models\UNHLSStaff;
use App\Models\UNHLSStockcard;
use App\Models\UNHLSWarehouse;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
                        ->pluck('full_name', 'id')
                        ->toArray();

		$stock = UNHLSStockcard::with('District','Year','Facility','Commodity')
				->get();

		return view('stockcard.index')
			->with('items', $items)
			->with('stock', $stock);

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
			Session::put('item',$request->get('item'));
			Session::put('action',$request->get('optAction'));
		}

		else
		{


			if(!(Session::has('item')))
			{
				Session::put('item',$request->get('item'));
			}

			if(!(Session::has('action')))
			{
				Session::put('action',$request->get('optAction'));
			}
		}

		$source_destination_list = UNHLSFacility::orderBy('name', 'ASC')->lists('name', 'id');
		$source_destination_label = "From";


		$item = Commodity::with('Metric')->Find(Session::get('item'));

		$card_action = 'losses / adjustments';

		if(Session::get('action')== config('constants.INCOMING_STOCK_FLAG') )
		{
			$card_action = 'stock in';
			if($request->get('inboundOption')==1)
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

			if($request->get('outboundOption')==3)
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


	public function validate_batch(Request $request)
	{

		$batch = UNHLSStockcard::where('action','=','I')->where('batch_number','=',$request->get('batch_no'))->orderBy('created_at','asc')->first();

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


	public function store(Request $request)
	{

		$rules = array(
		'voucher_no' => 'required',
		'to_from' => 'required',
		'transaction_date'=>'required'
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		}
		/*else if ($batch->count()==0) {
			Session::put('batch_error',Input::get('batch_no').' is an invalid batch number');

			dd($batch);
		}*/ else {


		//check for batch number validity
		$stockcard = new UNHLSStockcard;

		$action = $request->get('action');

		$quantity=0;
		$balance=$request->get('balance_on_hand');


        $stockcard->to_from = $request->get('to_from');
        $stockcard->to_from_type = Session::get('to_from_type');
        $stockcard->district_id = config('constants.DISTRICT_ID') ;
        $stockcard->facility_id = config('constants.FACILITY_ID');
        $stockcard->year_id = config('constants.FIN_YEAR_ID');
        $stockcard->commodity_id = Session::get('item');
        $stockcard->voucher_number = $request->get('voucher_no');
        $stockcard->batch_number = $request->get('batch_no');
        $stockcard->expiry_date = $request->get('expiry_date');
        $stockcard->transaction_date = date('Y-m-d',strtotime($request->get('transaction_date')));
        $stockcard->issue_date = new DateTime();
        $stockcard->remarks = $request->get('remarks');
        $stockcard->initials = $request->get('initials');
        $stockcard->action = $request->get('action');

		if($action==config('constants.INCOMING_STOCK_FLAG'))
		{
			$quantity = $request->get('quantity_in');
			$balance += $quantity;

 		    $stockcard->quantity_in = $quantity;
		}
		else if($action==config('constants.OUTGOING_STOCK_FLAG'))
		{
			$quantity = $request->get('quantity_out');
			$balance -= $quantity;

 		    $stockcard->quantity_out = $quantity;
		}
		else{
			$quantity = $request->get('losses_adjustments');
			$balance += $quantity;

 	        $stockcard->quantity = $quantity;
			$stockcard->to_from = config('constants.FACILITY_ID');
        	$stockcard->to_from_type = config('constants.FROM_FACILITY');
		}

        $stockcard->balance = $balance;

        $stockcard->save();

		return redirect('stockcard');

		}
	}

}
