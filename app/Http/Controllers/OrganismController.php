<?php

class OrganismController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//List all organisms
		$organisms = Organism::orderBy('name', 'ASC')->get();
		//Load the view and pass the organisms
		return View::make('organism.index')->with('organisms',$organisms);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('organism.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Validation
		$rules = array('name' => 'required|unique:organisms,name');
		$validator = Validator::make(Input::all(), $rules);
	
		//process
		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}else{
			//store
			$organism = new Organism;
			$organism->name = Input::get('name');
			$organism->description = Input::get('description');
			$organism->save();

			// todo: put option to redirect to page to add antibiotic with zone diameters, save and add antibiotic
			return Redirect::to('organism')
				->with('message', trans('messages.success-creating-organism'))->with('activeorganism', $organism->id);
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
		//show a organism
		$organism = Organism::find($id);
		//show the view and pass the $organism to it
		// todo: the loaded page should have add antibiotic
		return View::make('organism.show')->with('organism',$organism);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//Get the organism
		$organism = Organism::find($id);

		//Open the Edit View and pass to it the $organism
		return View::make('organism.edit')->with('organism', $organism);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//Validate
		$rules = array('name' => 'required');
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator);
		} else {
			// Update
			$organism = Organism::find($id);
			$organism->name = Input::get('name');
			$organism->description = Input::get('description');
			$organism->save();
            return Redirect::to('organism')
				->with('message', trans('messages.success-updating-organism')) ->with('activeorganism', $organism->id);
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
	 * Remove the specified resource from storage (soft delete).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		//Soft delete the organism
		$organism = Organism::find($id);

		$organismInUse = ZoneDiameter::where('organism_id', '=', $id)->first();
		// todo: there is also and issue when the organism has already been isolated chech that too
		// isolated organisms are also
		if (empty($organismInUse)) {
			// The test category is not in use
			$organism->delete();
		} else {
			// The test category is in use
			$url = Session::get('SOURCE_URL');

			return Redirect::to($url)
				->with('message', 'Delete Action Failed, Organism in Use');
		}
			$url = Session::get('SOURCE_URL');

			return Redirect::to($url)
				->with('message', trans('messages.success-deleting-organism'));
	}
}