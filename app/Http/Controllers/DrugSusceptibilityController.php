<?php

namespace App\Http\Controllers;

use App\Models\DrugSusceptibility;
use App\Models\ZoneDiameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DrugSusceptibilityController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
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
     * @param Request $request
     * @return DrugSusceptibility
     */
	public function store(Request $request)
	{
		$zoneDiameterReferenceRange = ZoneDiameter::where('drug_id', $request->get('drug_id'))
			->where('organism_id', $request->get('organism_id'))
			->get()
			->first();

		$drugSusceptibility = new DrugSusceptibility;
		if ($request->get('zone_diameter')!= '') {
			$drugSusceptibility->zone_diameter = $request->get('zone_diameter');
			$zoneDiameterInterpretation = $zoneDiameterReferenceRange->getZoneDiameterInterpretation($request->get('zone_diameter'));
		} else{
			$zoneDiameterInterpretation = $request->get('drug_susceptibility_measure_id');
		}
		$drugSusceptibility->user_id = Auth::user()->id;
		$drugSusceptibility->isolated_organism_id = $request->get('isolated_organism_id');
		$drugSusceptibility->drug_id = $request->get('drug_id');
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
     * @param Request $request
     * @param int $id
     * @return Response
     */
	public function update(Request $request, $id)
	{
		$zoneDiameterReferenceRange = ZoneDiameter::where('drug_id', $request->get('drug_id'))
			->where('organism_id', $request->get('organism_id'))
			->get()
			->first();
		$drugSusceptibility = DrugSusceptibility::find($id);
        if ($request->get('zone_diameter')!= '') {
			$zoneDiameterInterpretation = $zoneDiameterReferenceRange->getZoneDiameterInterpretation($request->get('zone_diameter'));
			$drugSusceptibility->zone_diameter = $request->get('zone_diameter');
        } else{
			$zoneDiameterInterpretation = $request->get('drug_susceptibility_measure_id');
			$drugSusceptibility->zone_diameter = null;
        }
		$drugSusceptibility->user_id = Auth::user()->id;
		$drugSusceptibility->isolated_organism_id = $request->get('isolated_organism_id');
		$drugSusceptibility->drug_id = $request->get('drug_id');
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
	 * @return int
	 */
	public function destroy($id)
	{
		$drugSusceptibility = DrugSusceptibility::find($id);
		$drugSusceptibility->delete();
		return $id;
	}
}
