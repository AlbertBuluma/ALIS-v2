<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		//
		 $suppliers = Supplier::orderBy('name', 'ASC')->get();
		return view('supplier.index')->with('suppliers', $suppliers);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('supplier.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function store(Request $request)
	{
		//
		$rules = array(
			'name' => 'required|unique:suppliers,name');
		$validator = Validator::make($request->all(), $rules);


		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		} else {
			// store
			$supplier = new Supplier;
			$supplier->name= $request->get('name');
			$supplier->phone_no= $request->get('phone_no');
			$supplier->email= $request->get('email');
			$supplier->physical_address= $request->get('physical_address');
			try{
				$supplier->save();
				return redirect('supplier.index')
					->with('message',  'Successifully added a new supplier');
			}catch(QueryException $e){
				Log::error($e);
			}
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
		$suppliers = Supplier::find($id);

		//Open the Edit View and pass to it the $patient
		return view('supplier.edit')->with('suppliers', $suppliers);
	}


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function update(Request $request, $id)
	{//Validate
		$rules = array('name' => 'required');
		$validator = Validator::make($request->all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('supplier.edit')->withErrors($validator)->withInput($request->except('password'));
		} else {
		// Update
			$supplier = Supplier::find($id);
			$supplier->name= $request->get('name');
			$supplier->physical_address= $request->get('physical_address');
			$supplier->phone_no= $request->get('phone_no');
			$supplier->email= $request->get('email');
			$supplier->save();
			try{
				$supplier->save();
				return redirect('supplier.index')
				->with('message', trans('messages.success-updating-supplier')) ->with('activesupplier', $supplier ->id);
			}catch(QueryException $e){
				Log::error($e);
			}
		}

		}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		//Soft delete the item
		$supplier = Supplier::find($id);
		$supplier->delete();

		// redirect
		return Redirect::route('supplier.index')->with('message', trans('messages.supplier-succesfully-deleted'));
	}


}
