<?php

namespace App\Http\Controllers;

use App\Models\DrugSusceptibilityMeasure;
use App\Models\Organism;
use App\Models\UnhlsTest;

class CultureController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$test = UnhlsTest::find($id);
		$test->load(
			'isolatedOrganisms.organism',
			'isolatedOrganisms.drugSusceptibilities.drug',
			'isolatedOrganisms.drugSusceptibilities.drugSusceptibilityMeasure');

		$content = View::make('test.culture.microbiologyreport')
			->with('test', $test);
		$pdf = App::make('dompdf');
		$pdf->loadHTML($content);
		return $pdf->stream('microbiology.pdf');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$test = UnhlsTest::find($id);

		$test->load(
			'isolatedOrganisms.organism',
			'isolatedOrganisms.drugSusceptibilities.drug',
			'isolatedOrganisms.drugSusceptibilities.drugSusceptibilityMeasure');

		$drugSusceptibilityMeasures = ['']+DrugSusceptibilityMeasure::all()->lists('interpretation','id');
		$organisms = ['']+Organism::all()->lists('name','id');

		return View::make('unhls_test.culture')
			->with('drugSusceptibilityMeasures', $drugSusceptibilityMeasures)
			->with('organisms', $organisms)
			->with('test', $test);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
}
