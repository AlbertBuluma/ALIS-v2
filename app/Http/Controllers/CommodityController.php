<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\Metric;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CommodityController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$commodities = Commodity::all();
		return view('commodity.index')->with('commodities', $commodities);
	}


	public function create()
	{
		$metrics = Metric::orderBy('name', 'ASC')->pluck('name', 'id')->toArray();
		return view('commodity.create')->with('metrics', $metrics);
	}

	public function store(Request $request)
	{
		//
		$rules = array(
		'name' => 'required|unique:commodities,name',
		'description' => 'required',
		'unit_price' => 'required|numeric',
		'item_code' => 'required',
		'storage_req' => 'required',
		'min_level' => 'required|numeric',
		'max_level' => 'required|numeric',);
		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		} else {
			// store
			$commodity = new Commodity;
			$commodity->name= $request->get('name');
			$commodity->description= $request->get('description');
			$commodity->metric_id= $request->get('unit_of_issue');
			$commodity->unit_price= $request->get('unit_price');
			$commodity->item_code = $request->get('item_code');
			$commodity->storage_req = $request->get('storage_req');
			$commodity->min_level = $request->get('min_level');
			$commodity->max_level = $request->get('max_level');

			try{
				$commodity->save();
				return redirect('commodity.index')
					->with('message', trans('messages.commodity-succesfully-added'));
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
		$metrics = Metric::orderBy('name', 'ASC')->lists('name', 'id');
		$commodity = Commodity::find($id);

		//Open the Edit View and pass to it the $patient
		return view('commodity.edit')->with('metrics', $metrics)->with('commodity', $commodity);
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
		'name' => 'required',
);
		$validator = Validator::make($request->all(), $rules);

		// process the validation
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput($request->except('password'));
		} else {
		// Update
			$commodity = Commodity::find($id);
			$commodity->name= $request->get('name');
			$commodity->description= $request->get('description');
			$commodity->metric_id= $request->get('unit_of_issue');
			$commodity->unit_price= $request->get('unit_price');
			$commodity->item_code= $request->get('item_code');
			$commodity->storage_req= $request->get('storage_req');
			$commodity->min_level= $request->get('min_level');
			$commodity->max_level= $request->get('max_level');


		try{
			$commodity->save();
			return Redirect::route('commodity.index')
			->with('message', trans('messages.success-updating-commodity'))->with('activecommodity', $commodity ->id);
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
		$commodity = Commodity::find($id);
		$commodity->delete();

		// redirect
		return Redirect::route('commodity.index')->with('message', trans('messages.commodity-succesfully-deleted'));
	}
}
