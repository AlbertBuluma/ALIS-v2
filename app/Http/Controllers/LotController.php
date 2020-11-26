<?php

namespace App\Http\Controllers;

use App\Models\Instrument;
use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LotController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		//Lists all lots
		$lots = Lot::all();
		return view('lot.index')->with('lots', $lots);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$instruments = Instrument::pluck('name', 'id')->toArray();
		return view('lot.create')->with('instruments', $instruments);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function store(Request $request)
	{
		//Validation
		$rules = array('number' => 'required|unique:lots,number',
					'instrument' => 'required|non_zero_key');
		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return redirect()->route('lot.create')->withErrors($validator)->withInput();
		} else {
			// Add
			$lot = new Lot;
			$lot->number = $request->get('number');
			$lot->description = $request->get('description');
			$lot->expiry = $request->get('expiry');
			$lot->instrument_id = $request->get('instrument');

			$lot->save();

			$url = Session::get('SOURCE_URL');
			return redirect($url)
					->with('message', trans('messages.successfully-created-lot'));
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
		$lot = Lot::find($id);
		return view('lot.show')->with('lot', $lot);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$lot = Lot::find($id);
		$instruments = Instrument::lists('name', 'id');
		return view('lot.edit')->with('lot', $lot)->with('instruments', $instruments);
	}


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function update(Request $request, $id)
	{
		//Validation
		$rules = array('number' => 'required',
					'instrument' => 'required|non_zero_key');
		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return redirect('lot/'.$id.'/edit')->withErrors($validator)->withInput();
		} else {
			// Add
			$lot = Lot::find($id);
			$lot->number = $request->get('number');
			$lot->description = $request->get('description');
			$lot->expiry = $request->get('expiry');
			$lot->instrument_id = $request->get('instrument');

			$lot->save();

			$url = Session::get('SOURCE_URL');
			return redirect($url)
					->with('message', trans('messages.successfully-updated-lot'));
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
	 * Remove the specified lot from storage (global UI implementation).
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function delete($id)
	{
		//Delete the lot
		$lot = Lot::find($id);

		$lot->delete();

		// redirect
		return redirect()->route('lot.index')->with('message', trans('messages.success-deleting-lot'));
	}


}
