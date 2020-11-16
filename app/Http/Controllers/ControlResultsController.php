<?php

namespace App\Http\Controllers;

use App\Models\Control;
use App\Models\ControlMeasureResult;
use App\Models\ControlTest;
use Illuminate\Support\Facades\Auth;

class ControlResultsController extends Controller {

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($controlTestId)
	{
		$control = Control::find($controlTestId);
		$controlTest = ControlTest::find($controlTestId);
		$controlTest->entered_by = Auth::user()->id;
		$controlTest->control_id = $controlTest->control->id;
		$controlTest->save();

		foreach ($controlTest->control->controlMeasures as $controlMeasure) {
			$controlResult = ControlMeasureResult::where('control_measure_id', $controlMeasure->id)->where('control_test_id', $controlTest->id)->first();
			$controlResult->results = Input::get('m_'.$controlMeasure->id);
			$controlResult->control_measure_id = $controlMeasure->id;
			$controlResult->control_test_id = $controlTestId;
			$controlResult->save();
		}
		return Redirect::route('control.resultsIndex')->with('message', trans('messages.success-updating-control-result'));
	}



}
