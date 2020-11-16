<?php

class OrganismAntibioticController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		/*
		|	not a logical function since OrganismAntibiotic shd be specific to an organism
		|	organism.show used instead
		*/
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($organismId)
	{
		//Get the antibiotics
		$antibiotics = Drug::orderBy('name', 'ASC')->lists('name', 'id');
		//Get the organism
		$organism = Organism::find($organismId);

		return View::make('organism.antibiotic.create')
					->with('organism', $organism)
					->with('antibiotics', $antibiotics);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Validation
		$rules = array('organism_id' => 'required',
		'antibiotic_id' => 'required',);
		$validator = Validator::make(Input::all(), $rules);
		//process
		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}else{
			try{
					$organism = Organism::find(Input::get('organism_id'));
					$organism->setAntibiotic(Input::get('antibiotic_id'),
						Input::get('resistant_max'),
						Input::get('intermediate_min'),
						Input::get('intermediate_max'),
						Input::get('sensitive_min')
					);
			return Redirect::route('organism.show', [Input::get('organism_id')])
				->with('message', 'Zone Diameters Successfully Created')->with('activeorganism', $organism->id);
			}catch(QueryException $e){
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
	public function show($zoneDiameterId)
	{
		$organism = Organism::find($zoneDiameterId);
		return $organism->load('zoneDiameters.drug');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($zoneDiameterId)
	{
		$antibiotics = Drug::orderBy('name', 'ASC')->lists('name', 'id');
		

		$zoneDiameter = ZoneDiameter::find($zoneDiameterId);
		return View::make('organism.antibiotic.edit')
					->with('zoneDiameter', $zoneDiameter)
					->with('antibiotics', $antibiotics);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($zoneDiameterId)
	{
		//Validate
		$rules = ['antibiotic_id' => 'required'];
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator);
		} else {
			try{
				$zoneDiameter = ZoneDiameter::find($zoneDiameterId);
				$zoneDiameter->drug_id = Input::get('antibiotic_id'); 
				$zoneDiameter->resistant_max = Input::get('resistant_max');
				$zoneDiameter->intermediate_min = Input::get('intermediate_min');
				$zoneDiameter->intermediate_max = Input::get('intermediate_max');
				$zoneDiameter->sensitive_min = Input::get('sensitive_min');
				$zoneDiameter->save();
			}catch(QueryException $e){
				Log::error($e);
			}
			return Redirect::route('organism.show', [$zoneDiameter->organism_id])
				->with('message', 'Zone Diameters Successfully Updated')->with('activeorganism', $zoneDiameter->id);
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($zoneDiameterId)
	{
		//Soft delete the organism
		$zoneDiameter = ZoneDiameter::find($zoneDiameterId);
		$organismId = $zoneDiameter->organism_id;
		$zoneDiameter->delete();
		// redirect
		return Redirect::route('organism.show', [$organismId])
			->with('message', 'Break Point Successfully Deleted');
	}
}
