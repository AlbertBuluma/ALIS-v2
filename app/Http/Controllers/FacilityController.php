<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\UNHLSFacility;
use App\Models\UNHLSFacilityLevel;
use App\Models\UNHLSFacilityOwnership;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FacilityController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		//List all facilities
		$facilities = UNHLSFacility::orderBy('name', 'asc')->get();
		//Load the view and pass the facilities
		return view('facility.index')->with('facilities',$facilities);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$districts = District::orderBy('name','ASC')->pluck('name', 'id')->toArray();
		$owners = UNHLSFacilityOwnership::pluck('name', 'id')->toArray();
		$levels = UNHLSFacilityLevel::pluck('name', 'id')->toArray();

		return view('facility.create')
				->with('districts', $districts)
				->with('owners', $owners)
				->with('levels', $levels);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function store(Request $request)
	{
		//Validation
		$rules = array('name' => 'required|unique:facilities,name');
		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return redirect()->route('facility.index')->withErrors($validator)->withInput();
		} else {
			// Add
			$facility = new UNHLSFacility;
			$facility->name = $request->get('name');
			$facility->district_id = $request->get('district_id');
			$facility->level_id = $request->get('level_id');
			$facility->ownership_id = $request->get('ownership_id');
			// redirect
			try{
				$facility->save();
				$url = Session::get('SOURCE_URL');
				return redirect($url)
					->with('message', trans('messages.successfully-created-facility'))
					->with('activefacility', $facility ->id);
			} catch(QueryException $e){
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
		$facility = UNHLSFacility::find($id);
		$districts = District::orderBy('name','ASC')->pluck('name', 'id')->toArray();
		$levels = UNHLSFacilityLevel::pluck('name', 'id')->toArray();
		$owners = UNHLSFacilityOwnership::pluck('name', 'id')->toArray();

		return view('facility.edit')
				->with('facility', $facility)
				->with('districts', $districts)
				->with('owners', $owners)
				->with('levels', $levels);
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
		//Validate and check
		$rules = array('name' => 'required|unique:facilities,name');
		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return redirect()->route('facility.index')->withErrors($validator)->withInput();
		} else {
			// Update
			$facility = UNHLSFacility::find($id);
			$facility->name = $request->get('name');
			$facility->district_id = $request->get('district_id');
			$facility->level_id = $request->get('level_id');
			$facility->ownership_id = $request->get('ownership_id');
			$facility->save();
			// redirect
			$url = Session::get('SOURCE_URL');

			return redirect($url)->with('message', trans('messages.successfully-updated-facility'))
                                ->with('activefacility', $facility ->id);
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function delete($id)
	{
		//Deleting the Item
		$facility = UNHLSFacility::find($id);

		//Soft delete
		$facility->delete();

		// redirect
		$url = Session::get('SOURCE_URL');

			return redirect($url)

			->with('message', trans('messages.successfully-deleted-facility'));
	}


}
