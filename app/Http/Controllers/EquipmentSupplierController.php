<?php

namespace App\Http\Controllers;

use App\Models\UNHLSEquipmentSupplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EquipmentSupplierController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{

		$suppliers = UNHLSEquipmentSupplier::get();

		return view('equipment.supplier.index')
			->with('suppliers', $suppliers);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('equipment.supplier.create');
	}


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function store(Request $request)
	{
		//
		$rules = array(
		'supplier_name' => 'required',
		'phone' => 'required',
		'email' => 'required',
		'address' => 'required'
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		} else {

			$supplier = new UNHLSEquipmentSupplier;

			$supplier->name = $request->get('supplier_name');
			$supplier->phone = $request->get('phone');
			$supplier->email = $request->get('email');
			$supplier->address = $request->get('address');

			$supplier->save();

			return redirect('equipmentsupplier');
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
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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


}
