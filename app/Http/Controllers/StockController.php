<?php

namespace App\Http\Controllers;


use App\Models\Barcode;
use App\Models\Item;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\Topup;
use App\Models\Usage;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class StockController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index($id)
	{
		//	Get item
		$item = Item::find($id);
		//	Barcode
		$barcode = Barcode::first();
		//Load the view and pass the stocks
		return view('inventory.stock.index')->with('item', $item)->with('barcode', $barcode);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create($id)
	{
		//Create stock
		//	Get item
		$item = Item::find($id);
		//	Get suppliers for select list
		$suppliers = Supplier::pluck('name', 'id')->toArray();
		return view('inventory.stock.create')->with('item', $item)->with('suppliers', $suppliers);
	}


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function store(Request $request)
	{
		//Validation
		$rules = array(
			'item_id'   => 'required:inv_supply,item_id',
            'supplier_id'   => 'required:inv_supply,supplier_id'
		);
		$validator = Validator::make($request->all(), $rules);

		//process
		if($validator->fails()){
			return redirect()->back()->withErrors($validator);
		}else{
			//store
			$stock = new Stock;
			$stock->item_id = $request->get('item_id');
	        $stock->lot = $request->get('lot');
	        $stock->batch_no = $request->get('batch_no');
	        $stock->expiry_date = $request->get('expiry_date');
	        $stock->manufacturer = $request->get('manufacturer');
	        $stock->supplier_id = $request->get('supplier_id');
	        $stock->quantity_supplied = $request->get('quantity_supplied');
	        $stock->cost_per_unit = $request->get('cost_per_unit');
	        $stock->date_of_reception = $request->get('date_of_reception');
	        $stock->remarks = $request->get('remarks');

			$stock->user_id = Auth::user()->id;
			try{
				$stock->save();
				$url = Session::get('SOURCE_URL');

            	return redirect()->to($url)
					->with('message', trans('messages.record-successfully-saved')) ->with('activestock', $stock ->id);
			}catch(QueryException $e){
				Log::error($e);
			}
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id)
	{
		//show a stock
		$stock = Stock::find($id);
		//show the view and pass the $stock to it
		return view('inventory.stock.show')->with('stock', $stock);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		//	Get suppliers for select list
		$suppliers = Supplier::pluck('name', 'id')->toArray();
		//	Get stock
		$stock = Stock::find($id);
		//	Get initially saved supplier
		$supplier = $stock->supplier_id;

		//Open the Edit View and pass to it the $stock
		return view('inventory.stock.edit')->with('stock', $stock)->with('supplier', $supplier)->with('suppliers', $suppliers);
	}


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
	public function update(Request $request, $id)
	{
		//Validate
		$rules = array(
			'item_id'   => 'required:inv_supply,item_id',
            'supplier_id'   => 'required:inv_supply,supplier_id'
		);
		$validator = Validator::make($request->all(), $rules);

		// process the login
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput($request->except('password'));
		} else {
			//store
			$stock = Stock::find($id);
			$stock->item_id = $request->get('item_id');
	        $stock->lot = $request->get('lot');
	        $stock->batch_no = $request->get('batch_no');
	        $stock->expiry_date = $request->get('expiry_date');
	        $stock->manufacturer = $request->get('manufacturer');
	        $stock->supplier_id = $request->get('supplier_id');
	        $stock->quantity_supplied = $request->get('quantity_supplied');
	        $stock->cost_per_unit = $request->get('cost_per_unit');
	        $stock->date_of_reception = $request->get('date_of_reception');
	        $stock->remarks = $request->get('remarks');

			$stock->user_id = Auth::user()->id;
			$stock->save();

			// redirect
			$url = Session::get('SOURCE_URL');

            return redirect()->to($url)
				->with('message', trans('messages.record-successfully-updated')) ->with('activestock', $stock->id);
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	/**
	 * Remove the specified resource from storage (soft delete).
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function delete($id)
	{
		//Soft delete the stock
		$stock = Stock::find($id);
		$url = Session::get('SOURCE_URL');

        return redirect()->to($url)
		->with('message', trans('messages.record-successfully-deleted'));
	}
	/**
	 * Stock usage
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function usage($id, $req = null)
	{
		//	Get stock
		$stock = Stock::find($id);
		//	Get Requests
		$requests = $stock->item->requests;
		if($req)
			$record = $req;
		else
			$record = 0;
		//show the view and pass the $stock to it
		return view('inventory.stock.usage')->with('stock', $stock)->with('requests', $requests)->with('record', $record);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function stockUsage(Request $request)
	{
		//Validate
		$rules = array(
			'stock_id'   => 'required:inv_usage,stock_id',
			'request_id'   => 'required:inv_usage,request_id',
			'issued_by'   => 'required:inv_usage,issued_by',
			'received_by'   => 'required:inv_usage,received_by'
		);
		$validator = Validator::make($request->all(), $rules);
		//process
		if($validator->fails())
		{
			return redirect()->back()->withErrors($validator);
		}
		else
		{
			$usage = new Usage;
	        $usage->stock_id = $request->get('stock_id');
	        $usage->request_id = $request->get('request_id');
	        $usage->quantity_used = $request->get('quantity_used');
	        $usage->date_of_usage = $request->get('date_of_usage');
	        $usage->issued_by = $request->get('issued_by');
	        $usage->received_by = $request->get('received_by');
	        $usage->remarks = $request->get('remarks');
	        $usage->user_id = Auth::user()->id;

	        $url = Session::get('SOURCE_URL');
	        if($usage->quantity_used>Stock::find((int)$usage->stock_id)->quantity())
	        {
	        	return redirect()->back()->with('message', trans('messages.insufficient-stock'))->withInput($request->all());
	        }
	        else if($usage->quantity_used>Topup::find((int)$usage->request_id)->quantity_ordered)
	        {
	        	return redirect()->back()->with('message', trans('messages.issued-greater-than-ordered'))->withInput($request->all());
	        }
	        else
	        {
	        	$usage->save();
	        	return redirect()->to($url)->with('message', trans('messages.record-successfully-updated'))->with('active_stock', $usage->stock->id);
	        }
	    }
	}
	/**
	 * lot usage
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function lot($id)
	{
		//	Get lot usage
		$lt = Usage::find($id);
		//	Get Requests
		$requests = Topup::all();
		//	Get request
		$request = $lt->request_id;
		//show the view and pass the $stock to it
		return view('inventory.stock.lot')->with('lt', $lt)->with('requests', $requests)->with('request', $request);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function lotUsage(Request $request)
	{
		$id = $request->get('id');
		$rules = array(
			'stock_id'   => 'required:inv_usage,stock_id',
			'request_id'   => 'required:inv_usage,request_id',
			'issued_by'   => 'required:inv_usage,issued_by',
			'received_by'   => 'required:inv_usage,received_by'
		);
		$validator = Validator::make($request->all(), $rules);
		//process
		if($validator->fails())
		{
			return redirect()->back()->withErrors($validator);
		}
		else
		{
			$usage = Usage::findOrFail($id);
	        $usage->stock_id = $request->get('stock_id');
	        $usage->quantity_used = $request->get('quantity_used');
	        $usage->date_of_usage = $request->get('date_of_usage');
	        $usage->issued_by = $request->get('issued_by');
	        $usage->received_by = $request->get('received_by');
	        $usage->remarks = $request->get('remarks');
	        $usage->user_id = Auth::user()->id;
	        $url = Session::get('SOURCE_URL');
	        if($usage->quantity_used>Stock::find((int)$usage->stock_id)->quantity())
	        {
	        	return redirect()->back()->with('message', trans('messages.insufficient-stock'))->withInput($request->all());
	        }
	        else if($usage->quantity_used>Topup::find((int)$usage->request_id)->quantity_ordered)
	        {
	        	return redirect()->back()->with('message', trans('messages.issued-greater-than-ordered'))->withInput($request->all());
	        }
	        else
	        {
		        $usage->save();

		        return redirect()->to($url)->with('message', trans('messages.record-successfully-updated'))->with('active_stock', $usage->stock->id);
		    }
		}
	}
}
