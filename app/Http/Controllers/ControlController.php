<?php

namespace App\Http\Controllers;

use App\Models\ControlMeasureResult;
use App\Models\ControlTest;
use Illuminate\Http\Request;
use App\Models\Control;
use App\Models\Lot;
use App\Models\MeasureType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ControlController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$controls = Control::orderBy('id')->get();
		return view('control.index')->with('controls', $controls);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$lots = Lot::pluck('number', 'id')->toArray();
		$measureTypes = MeasureType::orderBy('id')->take(2)->get();

		return view('control.create')->with('lots', $lots) ->with('measureTypes', $measureTypes);
	}


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function store(Request $request)
	{
		//Validation -checking that name is unique among the un soft-deleted ones
		$rules = array('name' => 'required|unique:controls,name,NULL,id,deleted_at,null',
		 			'lot' => 'required|non_zero_key',
		 			'new-measures' => 'required');
		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return redirect()->route('control.create')->withErrors($validator)->withInput();
		} else {
			// Add
			$control = new Control;
			$control->name = $request->get('name');
			$control->description = $request->get('description');
			$control->lot_id = $request->get('lot');

			if ($request->get('new-measures')) {
					$newMeasures = $request->get('new-measures');
					$controlMeasure = New ControlMeasureController;
					$controlMeasure->saveMeasuresRanges($newMeasures, $control);
			}
			// redirect
			return redirect()->route('control')
					->with('message', trans('messages.successfully-added-control'))
					->with('activeControl', $control ->id);
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
		$lots = Lot::pluck('number', 'id')->toArray();
		$control = Control::find($id);
		$measureTypes = MeasureType::all();
		return view('control.edit')->with('control',$control)->with('lots', $lots)
				->with('measureTypes', $measureTypes);
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
			'name' => 'unique:controls,name,NULL,id,deleted_at,null',
			'lot' => 'required|non_zero_key',
			'measures' => 'required',
		);
		$validator = Validator::make($request->all(), $rules);

		// process the login
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		} else {
			// Update
			$control = Control::find($id);
			$control->name = $request->get('name');
			$control->description = $request->get('description');
			$control->lot_id = $request->get('lot');

			if ($request->get('new-measures')) {
				$inputNewMeasures = $request->get('new-measures');
				$measures = New ControlMeasureController;
				$measureIds = $measures->saveMeasuresRanges($inputNewMeasures, $control);
			}

			if ($request->get('measures')) {
				$inputMeasures = $request->get('measures');
				$measures = New ControlMeasureController;
				$measures->editMeasuresRanges($inputMeasures, $control);
			}
			// redirect
			return redirect()->back()->with('message', trans('messages.success-updating-control'));
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		//Delete the control
		$control = Control::find($id);
		$control->delete();
		// redirect
		return redirect()->route('control.index')->with('message', trans('messages.success-deleting-control'));
	}

	/**
	 * Return resultsindex page
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function resultsIndex()
	{
		$controls = Control::all();
		return view('control.resultsIndex')->with('controls', $controls);
	}

	/**
	 * Return resultsindex page
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function resultsEntry($controlId)
	{
		$control = Control::find($controlId);
		return view('control.resultsEntry')->with('control', $control);
	}

	/**
	 * Return resultshow page
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function resultsList($controlId)
	{
		$control = Control::find($controlId);
		return view('control.resultsList')->with('control',$control);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function resultsEdit($controlTestId)
	{
		$controlTest = ControlTest::find($controlTestId);
		return view('control.resultsEdit', compact('controlTest'));
	}

    /**
     * Saves control results
     *
     * @param Request $request
     * @param Input, result inputs
     * @return \Illuminate\Http\RedirectResponse
     */
	public function saveResults(Request $request, $controlId)
	{
		//Validate
		$control = Control::find($controlId);

		$controlTest = new ControlTest();
		$controlTest->entered_by = Auth::user()->id;
		$controlTest->control_id = $controlId;
		$controlTest->save();

		foreach ($control->controlMeasures as $controlMeasure) {
			$controlResult = new ControlMeasureResult;
			$controlResult->results = $request->get('m_'.$controlMeasure->id);
			$controlResult->control_measure_id = $controlMeasure->id;
			$controlResult->control_test_id = $controlTest->id;
			$controlResult->save();
		}
		return redirect()->route('control.resultsIndex')->with('message', trans('messages.success-adding-control-result'));
	}
}
