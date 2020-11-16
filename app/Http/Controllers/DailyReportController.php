<?php

namespace App\Http\Controllers;

use App\Models\DailyTestCount;

class DailyReportController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$input = Input::get('month');
		if ($input == '') {
			$month = date('Y-m');
		}else{
			$month = date('Y-m',strtotime($input));
		}
		// for each day in the month
		for($i = 1; $i <=  date('t', strtotime($month)); $i++){
			// stop the loop if it reaches the date today, since reports can only be made for the past
			if (date('m', strtotime($month)) == date('m')&& date('d') == $i) {
				// todo let it check if it's a previous month let the counting continue
				break;
			}
			// add the date to the dates array
			$expectedDates[] = date('Y',strtotime($month)) . "-" . date('m',strtotime($month)) . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
		}
		$dailyreports = DailyTestCount::where('date', 'like', '%' . $month . '%')->lists('date');
		return View::make('reportconfig.dailyreport')
			->with('dailyreports',$dailyreports)
			->with('month',$month)
			->with('expectedDates',$expectedDates);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// N/A
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($date)
	{
		Artisan::call('report:day', ['date' => $date]);

		$month = date('Y-m',strtotime($date));
		return Redirect::route('reportconfig.dailyreport')
			->with('month', $month)
			->with('message', 'Daily Report Database successfully populated for '.$date.'. Thanks for being patient.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// N/A
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// N/A
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// N/A
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		// todo: some real action on the way
		// $->delete();
		return Redirect::route('reportconfig.dailyreport')
			->with('message', trans('messages.successfully-deleted-dailyreport'));
	}


}
