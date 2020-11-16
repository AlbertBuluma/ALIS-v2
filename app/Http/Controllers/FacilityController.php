<?php

class FacilityController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//List all facilities
		$facilities = UNHLSFacility::orderBy('name', 'asc')->get();
		//Load the view and pass the facilities
		return View::make('facility.index')->with('facilities',$facilities);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$districts = District::orderBy('name','ASC')->lists('name', 'id');
		$owners = UNHLSFacilityOwnership::lists('name', 'id');
		$levels = UNHLSFacilityLevel::lists('name', 'id');

		return View::make('facility.create')
				->with('districts', $districts)
				->with('owners', $owners)
				->with('levels', $levels);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Validation
		$rules = array('name' => 'required|unique:facilities,name');
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('facility.index')->withErrors($validator)->withInput();
		} else {
			// Add
			$facility = new UNHLSFacility;
			$facility->name = Input::get('name');
			$facility->district_id = Input::get('district_id');
			$facility->level_id = Input::get('level_id');
			$facility->ownership_id = Input::get('ownership_id');
			// redirect
			try{
				$facility->save();
				$url = Session::get('SOURCE_URL');
				return Redirect::to($url)
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
	 * @return Response
	 */
	public function edit($id)
	{
		$facility = UNHLSFacility::find($id);
		$districts = District::orderBy('name','ASC')->lists('name', 'id');
		$levels = UNHLSFacilityLevel::lists('name', 'id');
		$owners = UNHLSFacilityOwnership::lists('name', 'id');

		return View::make('facility.edit')
				->with('facility', $facility)
				->with('districts', $districts)
				->with('owners', $owners)
				->with('levels', $levels);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//Validate and check
		$rules = array('name' => 'required|unique:facilities,name');
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('facility.index')->withErrors($validator)->withInput();
		} else {
			// Update
			$facility = UNHLSFacility::find($id);
			$facility->name = Input::get('name');
			$facility->district_id = Input::get('district_id');
			$facility->level_id = Input::get('level_id');
			$facility->ownership_id = Input::get('ownership_id');
			$facility->save();
			// redirect
			$url = Session::get('SOURCE_URL');
			
			return Redirect::to($url)

				->with('message', trans('messages.successfully-updated-facility')) ->with('activefacility', $facility ->id);
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
		//Deleting the Item
		$facility = UNHLSFacility::find($id);

		//Soft delete
		$facility->delete();

		// redirect
		$url = Session::get('SOURCE_URL');
			
			return Redirect::to($url)

			->with('message', trans('messages.successfully-deleted-facility'));
	}


}
