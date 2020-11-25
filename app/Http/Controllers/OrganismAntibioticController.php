<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\Organism;
use App\Models\ZoneDiameter;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class OrganismAntibioticController extends Controller {

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
     * @param $organismId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function create($organismId)
	{
		//Get the antibiotics
		$antibiotics = Drug::orderBy('name', 'ASC')->lists('name', 'id');
		//Get the organism
		$organism = Organism::find($organismId);

		return view('organism.antibiotic.create')
					->with('organism', $organism)
					->with('antibiotics', $antibiotics);
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
		$rules = array('organism_id' => 'required',
		'antibiotic_id' => 'required',);
		$validator = Validator::make($request->all(), $rules);
		//process
		if($validator->fails()){
			return redirect()->back()->withErrors($validator);
		}else{
			try{
					$organism = Organism::find($request->get('organism_id'));
					$organism->setAntibiotic($request->get('antibiotic_id'),
						$request->get('resistant_max'),
						$request->get('intermediate_min'),
						$request->get('intermediate_max'),
						$request->get('sensitive_min')
					);
			return redirect()->route('organism.show', [$request->get('organism_id')])
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
     * @param $zoneDiameterId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function edit($zoneDiameterId)
	{
		$antibiotics = Drug::orderBy('name', 'ASC')->pluck('name', 'id')->toArray();


		$zoneDiameter = ZoneDiameter::find($zoneDiameterId);
		return view('organism.antibiotic.edit')
					->with('zoneDiameter', $zoneDiameter)
					->with('antibiotics', $antibiotics);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $zoneDiameterId
     * @return \Illuminate\Http\RedirectResponse
     */
	public function update(Request $request, $zoneDiameterId)
	{
		//Validate
		$rules = ['antibiotic_id' => 'required'];
		$validator = Validator::make($request->all(), $rules);

		// process the login
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		} else {
			try{
				$zoneDiameter = ZoneDiameter::find($zoneDiameterId);
				$zoneDiameter->drug_id = $request->get('antibiotic_id');
				$zoneDiameter->resistant_max = $request->get('resistant_max');
				$zoneDiameter->intermediate_min = $request->get('intermediate_min');
				$zoneDiameter->intermediate_max = $request->get('intermediate_max');
				$zoneDiameter->sensitive_min = $request->get('sensitive_min');
				$zoneDiameter->save();
			}catch(QueryException $e){
				Log::error($e);
			}
			return redirect()->route('organism.show', [$zoneDiameter->organism_id])
				->with('message', 'Zone Diameters Successfully Updated')->with('activeorganism', $zoneDiameter->id);
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($zoneDiameterId)
	{
		//Soft delete the organism
		$zoneDiameter = ZoneDiameter::find($zoneDiameterId);
		$organismId = $zoneDiameter->organism_id;
		$zoneDiameter->delete();
		// redirect
		return redirect()->route('organism.show', [$organismId])
			->with('message', 'Break Point Successfully Deleted');
	}
}
