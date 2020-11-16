<?php

class DrugSusceptibilityController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$drugSusceptibilities = DrugSusceptibility::with(
			'drug',
			'isolatedOrganism.organism',
			'drugSusceptibilityMeasure')->get();

		return $drugSusceptibilities;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$zoneDiameterReferenceRange = ZoneDiameter::where('drug_id', Input::get('drug_id'))
			->where('organism_id', Input::get('organism_id'))
			->get()
			->first();

		$drugSusceptibility = new DrugSusceptibility;
		if (Input::get('zone_diameter')!= '') {
			$drugSusceptibility->zone_diameter = Input::get('zone_diameter');
			$zoneDiameterInterpretation = $zoneDiameterReferenceRange->getZoneDiameterInterpretation(Input::get('zone_diameter'));
		} else{
			$zoneDiameterInterpretation = Input::get('drug_susceptibility_measure_id');
		}
		$drugSusceptibility->user_id = Auth::user()->id;
		$drugSusceptibility->isolated_organism_id = Input::get('isolated_organism_id');
		$drugSusceptibility->drug_id = Input::get('drug_id');
		$drugSusceptibility->drug_susceptibility_measure_id = $zoneDiameterInterpretation;
		$drugSusceptibility->save();

		return $drugSusceptibility->load(
				'drug',
				'isolatedOrganism.organism',
				'drugSusceptibilityMeasure');
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
		//
	}

	/**
	 * Update the specified resource in storage.de
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$zoneDiameterReferenceRange = ZoneDiameter::where('drug_id', Input::get('drug_id'))
			->where('organism_id', Input::get('organism_id'))
			->get()
			->first();
		$drugSusceptibility = DrugSusceptibility::find($id);
        if (Input::get('zone_diameter')!= '') {
			$zoneDiameterInterpretation = $zoneDiameterReferenceRange->getZoneDiameterInterpretation(Input::get('zone_diameter'));
			$drugSusceptibility->zone_diameter = Input::get('zone_diameter');
        } else{
			$zoneDiameterInterpretation = Input::get('drug_susceptibility_measure_id');
			$drugSusceptibility->zone_diameter = null;
        }
		$drugSusceptibility->user_id = Auth::user()->id;
		$drugSusceptibility->isolated_organism_id = Input::get('isolated_organism_id');
		$drugSusceptibility->drug_id = Input::get('drug_id');
		$drugSusceptibility->drug_susceptibility_measure_id = $zoneDiameterInterpretation;
		$drugSusceptibility->save();
		return $drugSusceptibility->load(
				'drug',
				'isolatedOrganism.organism',
				'drugSusceptibilityMeasure');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$drugSusceptibility = DrugSusceptibility::find($id);
		$drugSusceptibility->delete();
		return $id;
	}
}
