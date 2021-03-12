<?php

namespace App\Http\Controllers;

use App\Models\DailyNegativeCulture;
use App\Models\DailyNegativeGramStain;
use App\Models\GramStainRange;
use App\Models\Measure;
use App\Models\MeasureNameMapping;
use App\Models\MeasureRange;
use App\Models\Organism;
use App\Models\ResultInterpretation;
use App\Models\TestNameMapping;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MeasureNameMappingController extends Controller {

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
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create($test_name_mapping_id)
	{
		$testNameMapping = TestNameMapping::find($test_name_mapping_id);
		$measures = ($testNameMapping->test_type_id != '') ? $testNameMapping->testType->measures->pluck('name', 'id')->toArray() : [] ;
		return view('testnamemapping.measurenamemapping.create')
				->with('measures', $measures)
				->with('testNameMapping', $testNameMapping);
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
		$rules = array('system_name' => 'required');
		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return redirect()->route('measurenamemapping.index')->withErrors($validator)->withInput();
		} else {
			// Add
			$measureNameMapping = new MeasureNameMapping;
			$measureNameMapping->test_name_mapping_id = $request->get('test_name_mapping_id');
			$measureNameMapping->measure_id = $request->get('measure_id');
			$measureNameMapping->standard_name = $request->get('standard_name');
			$measureNameMapping->system_name = $request->get('system_name');
			// redirect
			try{
				$measureNameMapping->save();
				return redirect()->route('testnamemapping.show', [$request->get('test_name_mapping_id')])
					->with('message', 'Successfully Created Measure Name Mapping');
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
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function edit(Request $request, $id)
	{
		$measureNameMapping = MeasureNameMapping::find($id);
		$measures = ($measureNameMapping->testNameMapping->test_type_id != '') ? $measureNameMapping->testNameMapping->testType->measures->pluck('name', 'id')->toArray() : [] ;

		return view('testnamemapping.measurenamemapping.edit')
				->with('measureNameMapping', $measureNameMapping)
				->with('measures', $measures);
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
		$rules = array('system_name' => 'required');
		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return redirect()->route('measurenamemapping.index')->withErrors($validator)->withInput();
		} else {
			// Update
			$measureNameMapping = MeasureNameMapping::find($id);
			$measureNameMapping->measure_id = $request->get('measure_id');
			$measureNameMapping->standard_name = $request->get('standard_name');
			$measureNameMapping->system_name = $request->get('system_name');
			$measureNameMapping->save();
			// redirect
				return redirect()->route('testnamemapping.show', [$measureNameMapping->test_name_mapping_id])
				->with('message', 'Successfully Updated Measure Name Mapping');
		}
	}


    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
	public function delete(Request $request, $id)
	{
		//Deleting the Item
		$testNameMapping = MeasureNameMapping::find($id);

		//Soft delete
		$testNameMapping->delete();

		// redirect
//		return redirect()->route('testnamemapping.show', [$request->get('test_name_mapping_id')])
//			->with('message', 'Successfully Deleted Measure Name Mapping');

        return redirect()->back()->with('message', 'Successfully Deleted Measure Name Mapping');
	}

	public function getRanges($id)
	{
		$measure = Measure::find($id);
		return view('testnamemapping.measurenamemapping.ranges')
				->with('measure', $measure);
	}

	public function getRange($id)
	{
		$measureRange = MeasureRange::find($id);
		$resultInterpretations = ResultInterpretation::orderBy('id','DESC')->pluck('name', 'id')->toArray();

		return view('testnamemapping.measurenamemapping.range')
				->with('resultInterpretations', $resultInterpretations)
				->with('measureRange', $measureRange);
	}

	public function postRange(Request $request, $id)
	{
		// Update
		$measureRange = MeasureRange::find($id);
		$measureRange->result_interpretation_id = $request->get('result_interpretation_id');
		$measureRange->save();
		// redirect
		return redirect()->route('measureranges.getranges', [$measureRange->measure->id])
		->with('message', 'Successfully Updated Measure Range Interpretation');
	}

	public function getNegativeGramStain($test_name_mapping_id)
	{
		$gramStainRanges = GramStainRange::orderBy('id','DESC')->pluck('name', 'id')->toArray();
		return view('testnamemapping.measurenamemapping.negativegramstain')
			->with('test_name_mapping_id', $test_name_mapping_id)
			->with('gramStainRanges', $gramStainRanges);
	}
	public function postNegativeGramStain(Request $request, $test_name_mapping_id)
	{
		$negativeGramStain = new DailyNegativeGramStain;
		$negativeGramStain->gram_stain_range_id = $request->get('gram_stain_range_id');
		$negativeGramStain->save();
		return redirect()->route('testnamemapping.show', [$test_name_mapping_id]);
	}
	public function deleteNegativeGramStain($id,$test_name_mapping_id)
	{
		$negativeGramStain = DailyNegativeGramStain::find($id);
		$negativeGramStain->delete();
		return redirect()->route('testnamemapping.show', [$test_name_mapping_id]);
	}

	public function getNegativeOrganism($test_name_mapping_id)
	{
		$organisms = Organism::orderBy('id','DESC')->pluck('name', 'id')->toArray();
		return view('testnamemapping.measurenamemapping.negativeorganism')
			->with('test_name_mapping_id', $test_name_mapping_id)
			->with('organisms', $organisms);
	}
	public function postNegativeOrganism(Request $request, $test_name_mapping_id)
	{
		$negativeOrganism = new DailyNegativeCulture;
		$negativeOrganism->organism_id = $request->get('organism_id');
		$negativeOrganism->save();
		return redirect()->route('testnamemapping.show', [$test_name_mapping_id]);
	}
	public function deleteNegativeOrganism($id,$test_name_mapping_id)
	{
		$negativeOrganism = DailyNegativeCulture::find($id);
		$negativeOrganism->delete();
		return redirect()->route('testnamemapping.show', [$test_name_mapping_id]);
	}

}
