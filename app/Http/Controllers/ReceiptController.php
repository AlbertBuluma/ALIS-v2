<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\Receipt;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReceiptController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$receipts = Receipt::all();
		return view('receipt.index')->with('receipts', $receipts);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$commodities = Commodity::pluck('name', 'id')->toArray();
		$suppliers = Supplier::pluck('name', 'id')->toArray();
		return view('receipt.create')
				->with('commodities', $commodities)
				->with('suppliers', $suppliers);
	}


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function store(Request $request)
	{
		$rules = array(
			'commodity' => 'required',
			'quantity' => 'required',
			'batch_no' => 'required',
			'supplier' => 'required',
			'expiry_date' => 'required|date'
		);
		$validator = Validator::make($request->all(), $rules);

		// process the login
		if ($validator->fails()) {
			return redirect()->route('receipt.index')->withErrors($validator);

		} else {
			$receipts = new Receipt;
			$receipts->commodity_id = $request->get('commodity');
			$receipts->supplier_id = $request->get('supplier');
			$receipts->quantity = $request->get('quantity');
			$receipts->batch_no = $request->get('batch_no');
			$receipts->expiry_date= $request->get('expiry_date');
			$receipts->user_id= Auth::user()->id;

			$receipts->save();
			return redirect()->route('receipt.index')
					->with('message', trans('messages.receipt-succesfully-added'));
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$receipt = Receipt::find($id);
		$suppliers = Supplier::all()->pluck('name', 'id')->toArray();
		$commodities = Commodity::all()->pluck('name', 'id')->toArray();

		return view('receipt.edit')
				->with('receipt', $receipt)
				->with('commodities', $commodities)
				->with('suppliers', $suppliers);
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
		$rules = array(
			'commodity' => 'required',

		);
		$validator = Validator::make($request->all(), $rules);

		// process the login
		if ($validator->fails()) {
			return redirect()->route('receipt.index')->withErrors($validator);

		} else {
			// Update
			$receipt = Receipt::find($id);
			$receipt->commodity_id = $request->get('commodity');
			$receipt->supplier_id = $request->get('supplier');
			$receipt->quantity = $request->get('quantity');
			$receipt->batch_no = $request->get('batch_no');
			$receipt->expiry_date= $request->get('expiry_date');

		    $receipt->save();
			return redirect()->route('receipt.index')
					->with('message', trans('messages.receipt-succesfully-updated'));
		}
	}





	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function delete($id)
	{
		//Soft delete the patient
		$receipt = Receipt::find($id);
		$receipt->delete();

		// redirect
		return redirect()->route('receipt.index')
			->with('message', trans('messages.receipt-succesfully-deleted'));
	}


}
