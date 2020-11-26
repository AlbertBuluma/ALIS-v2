<?php

namespace App\Http\Controllers;

use App\Models\Instrument;
use App\Models\TestType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

/**
 *Contains functions for managing instruments
 *
 */
class InstrumentController extends Controller {

	/**
	 * Display a listing of the instruments.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		// List all the active instruments
			$instruments = Instrument::paginate(config('kblis.page-items'));

		// Load the view and pass the instruments
		return view('instrument.index')->with('instruments', $instruments);
	}

	/**
	 * Show the form for creating a new instrument.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		// Get a list of all installed plugins
		$plugins = Instrument::getInstalledPlugins();

		//Create Instrument view
		return view('instrument.create')->with('instruments', $plugins);
	}

    /**
     * Store a newly created instrument in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function store(Request $request)
	{
		//
		$rules = array(
			'name' => 'required',
			'ip' => 'sometimes|ip',
		);
		$validator = Validator::make($request->all(), $rules);

		// Validate form input
		if ($validator->fails()) {
			return redirect()->route('instrument.create')->withErrors($validator);
		} else {
			// Save the instrument
			$newInstrument = new Instrument();
			$newInstrument->name = $request->get('name');
			$newInstrument->description = $request->get('description');
			$newInstrument->ip = $request->get('ip');
			$newInstrument->hostname = $request->get('hostname');

			$newInstrument->save();
			return redirect()->route('instrument.index')->with('message', trans('messages.success-creating-instrument'));
		}
	}

	/**
	 * Display the specified instrument.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id)
	{
		//Show an instrument
		$instrument = Instrument::find($id);

		//Show the view and pass the $instrument to it
		return view('instrument.show')->with('instrument', $instrument);
	}

	/**
	 * Show the form for editing the specified instrument.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		//Get the instrument
		$instrument = Instrument::find($id);

		//Open the Edit View and pass to it the $instrument
		return view('instrument.edit')->with('instrument', $instrument);
	}

    /**
     * Update the specified instrument.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
	public function update(Request $request, $id)
	{
		//
		$rules = array(
			'name' => 'required',
			'ip' => 'required|ip'
		);
		$validator = Validator::make($request->all(), $rules);

		// process the login
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		} else {
			// Update
			$instrument = Instrument::find($id);
			$instrument->name = $request->get('name');
			$instrument->description = $request->get('description');
			$instrument->ip = $request->get('ip');
			$instrument->hostname = $request->get('hostname');

			try{
				$instrument->save();
				$message = trans('messages.success-updating-instrument');
			}catch(QueryException $e){
				$message = trans('messages.failure-updating-instrument');
				Log::error($e);
			}

			return redirect()->route('instrument.index')->with('message', $message);
		}
	}

	/**
	 * Remove the specified instrument from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Remove the specified instruments from storage (global UI implementation).
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function delete($id)
	{
		//Delete the instrument
		$instrument = Instrument::find($id);

		$instrument->testTypes()->detach();
		$instrument->delete();

		// redirect
		return redirect()->route('instrument.index')->with('message', trans('messages.success-deleting-instrument'));
	}

    /**
     * Pull test results from an instrument as JSON.
     *
     * @param Request $request
     * @return Response
     */
	public function getTestResult(Request $request)
	{
		//Get Instrument Interface Class file
		$testTypeID = $request->get("test_type_id");
		$testType = TestType::find($testTypeID);
		$instrument = $testType->instruments->first();

 		// Fetch the results
		return $instrument->fetchResult($testType);
	}

	/**
	 * Save an imported implemention of the Intrumentation class.
	 *
	 * @param String route
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function importDriver(Request $request)
	{
		$route = ($request->get('import_file') !== null)?$request->get('import_file'):"instrument.index";

        $rules = array(
            'import_file' => 'required|max:500'
        );

        $validator = Validator::make($request->all(), $rules);
        $message = null;

        if ($validator->fails()) {
            return redirect()->route('instrument.index')->withErrors($validator);
        } else {
            if ($request->hasFile('import_file')) {
            	$message = Instrument::saveDriver($request->file('import_file'));
            }
        }

		return redirect()->route($route)->with('message', $message);
	}
}
