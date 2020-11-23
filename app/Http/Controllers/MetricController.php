<?php

namespace App\Http\Controllers;

use App\Models\Metric;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MetricController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		//
		$metrics = Metric::orderBy('name', 'ASC')->get();
		return view('metric.index')->with('metrics', $metrics);
		//return View::make('inventory.metricsList');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('metric.create');
	}

	public function store(Request $request)
	{
		//
		$rules = array(
			'unit-of-issue' => 'required|unique:metrics,name');
		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return redirect()->route('metric.index')->withErrors($validator);
		} else {
			// store
			$metric = new Metric;
			$metric->name= $request->get('unit-of-issue');
			$metric->description= $request->get('description');
			try{
				$metric->save();
				$url = Session::get('SOURCE_URL');
				return redirect()->route('metric.index') ->with('message', trans('messages.metric-succesfully-added'));
			}catch(QueryException $e){
				Log::error($e);
			}
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$metrics = Metric::find($id);

		//Open the Edit View and pass to it the $patient
		return view('metric.edit')->with('metrics', $metrics);
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
		$rules = array('name' => 'required');
		$validator = Validator::make($request->all(), $rules);

		// process the login
		if ($validator->fails()) {
			return redirect()->route('metric.index')->withErrors($validator);
		} else {
		// Update
			$metric = Metric::find($id);
			$metric->name= $request->get('unit-of-issue');
			$metric->description= $request->get('description');

		try{
			$metric->save();
			return redirect()->route('metric.index')
			->with('message', trans('messages.success-updating-metric'))->with('activemetric', $metric ->id);
			}catch(QueryException $e){
				Log::error($e);
			}
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
		$metric = Metric::find($id);
		$metric->delete();

		// redirect
		return redirect()->route('metric.index')->with('message', trans('messages.metric-succesfully-deleted'));
	}
}
