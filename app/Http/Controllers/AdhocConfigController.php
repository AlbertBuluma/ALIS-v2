<?php

namespace App\Http\Controllers;

use App\Models\AdhocConfig;

class AdhocConfigController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$adhocConfigs = AdhocConfig::all();
		$constants = AdhocConfig::$constants;
		//Load the view and pass the adhocConfigs
		return View::make('adhocconfig.index')
			->with('adhocConfigs',$adhocConfigs)
			->with('constants', $constants);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$adhocConfig = AdhocConfig::find($id);
		$constants = AdhocConfig::$constants;

		return View::make('adhocconfig.edit')
				->with('adhocConfig', $adhocConfig)
				->with('constants', $constants);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Update
		$adhocConfig = AdhocConfig::find($id);
		$adhocConfig->name = Input::get('name');
		$adhocConfig->option = Input::get('option');
		$adhocConfig->save();
		// redirect
		return Redirect::route('adhocconfig.index')
			->with('message', 'Successfully Updated Adhoc Config');
	}
}
