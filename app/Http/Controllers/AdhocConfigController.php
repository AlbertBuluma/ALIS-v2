<?php

namespace App\Http\Controllers;

use App\Models\AdhocConfig;
use Illuminate\Http\Request;


class AdhocConfigController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$adhocConfigs = AdhocConfig::all();
		$constants = AdhocConfig::$constants;
		//Load the view and pass the adhocConfigs
		return view('adhocconfig.index')
			->with('adhocConfigs',$adhocConfigs)
			->with('constants', $constants);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$adhocConfig = AdhocConfig::find($id);
		$constants = AdhocConfig::$constants;

		return view('adhocconfig.edit')
				->with('adhocConfig', $adhocConfig)
				->with('constants', $constants);
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
		// Update
		$adhocConfig = AdhocConfig::find($id);
		$adhocConfig->name = $request->get('name');
		$adhocConfig->option = $request->get('option');
		$adhocConfig->save();
		// redirect
		return redirect()->route('adhocconfig.index')
			->with('message', 'Successfully Updated Adhoc Config');
	}
}
