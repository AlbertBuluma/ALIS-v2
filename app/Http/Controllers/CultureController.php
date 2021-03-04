<?php

namespace App\Http\Controllers;

use App\Models\CultureObservation;
use App\Models\DailyTestCount;
use App\Models\DrugSusceptibilityMeasure;
use App\Models\Organism;
use App\Models\UnhlsTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CultureController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
	public function index(Request $request)
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
     * @param Request $request
     * @return CultureObservation
     */
	public function store(Request $request)
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

		$content = view('test.culture.microbiologyreport')
			->with('test', $test);
		$pdf = App::make('dompdf');
		$pdf->loadHTML($content);
		return $pdf->stream('microbiology.pdf');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$test = UnhlsTest::find($id);

		$test->load(
			'isolatedOrganisms.organism',
			'isolatedOrganisms.drugSusceptibilities.drug',
			'isolatedOrganisms.drugSusceptibilities.drugSusceptibilityMeasure');

		$drugSusceptibilityMeasures = ['']+DrugSusceptibilityMeasure::all()->pluck('interpretation','id')->toArray();
		$organisms = ['']+Organism::all()->pluck('name','id')->toArray();

		return view('unhls_test.culture')
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
	 * @return int
	 */
	public function destroy($id)
	{
		//
	}
}
