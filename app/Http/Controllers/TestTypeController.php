<?php

namespace App\Http\Controllers;

use App\Models\Measure;
use App\Models\MeasureType;
use App\Models\Organism;
use App\Models\SpecimenType;
use App\Models\TestCategory;
use App\Models\TestNameMapping;
use App\Models\TestType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

/**
 *Contains functions for managing test types
 *
 */
class TestTypeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		// List all the active testtypes
			$testtypes = TestType::orderBy('name', 'ASC')->get();

		// Load the view and pass the testtypes
		return view('testtype.index')->with('testtypes', $testtypes);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$measures = Measure::orderBy('name')->get();
		$specimentypes = SpecimenType::orderBy('name')->get();
		$testcategory = TestCategory::all();
        $measuretype = MeasureType::all()->sortBy('id');
        $organisms = Organism::orderBy('name')->get();
        $standardnames = TestNameMapping::all();
		//Create TestType
		return view('testtype.create')
					->with('testcategory', $testcategory)
					->with('measures', $measures)
       				->with('standardnames', $standardnames)
       				->with('measuretype', $measuretype)
					->with('specimentypes', $specimentypes)
					->with('organisms', $organisms);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function store(Request $request)
	{
		//
        $request->validate([
            'name' => 'required',
            'test_category_id' => 'required',
            'specimentypes' => 'required',
            'new-measures' => 'required',
            'parentId' => 'required',
            'targetTAT' => 'required',
            'targetTAT_unit' => 'required'

        ], [
            'name.required' => 'Test type name is required',
            'test_category_id.required' => 'Lab section required',
            'specimentypes.required' => 'Specimen type required',
            'new-measures.required' => 'Measures required',
            'parentId.required' => 'Standard name required',
            'targetTAT.required' => 'TAT required',
            'targetTAT_unit.required' => 'TAT unit required'
        ]);

			// store
			$testtype = new TestType;
			$testtype->name = trim($request->get('name'));
			$testtype->description = $request->get('description');
			$testtype->test_category_id = $request->get('test_category_id');
			$testtype->targetTAT = $request->get('targetTAT');
			$testtype->targetTAT_unit = $request->get('targetTAT_unit');
			$testtype->prevalence_threshold = $request->get('prevalence_threshold');
			$testtype->orderable_test = $request->get('orderable_test');
			$testtype->accredited = $request->get('accredited');
			try{
				$testtype->save();
				$measureIds = array();
				$inputNewMeasures = $request->get('new-measures');

				$measures = New MeasureController;
				$measureIds = $measures->store($inputNewMeasures);
				$testtype->setMeasures($measureIds);
				$testtype->setSpecimenTypes($request->get('specimentypes'));
				// todo: this command is broken rework it
				// $testtype->setOrganisms(Input::get('organisms'));


			}catch(QueryException $e){
				Log::error($e);
			}
				return redirect()->route('testtype.index')
					->with('message', trans('messages.success-creating-test-type'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id)
	{
		//Show a testtype
		$testtype = TestType::find($id);

		//Show the view and pass the $testtype to it
		return view('testtype.show')->with('testtype', $testtype);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		//Get the testtype
		$testtype = TestType::find($id);
		$measures = Measure::all();
        $measuretype = MeasureType::all()->sortBy('id');
		$specimentypes = SpecimenType::orderBy('name')->get();
		$testcategory = TestCategory::all();
		$organisms = Organism::orderBy('name')->get();
		$standardnames = TestNameMapping::all();
		//Open the Edit View and pass to it the $testtype
		return view('testtype.edit')
					->with('testtype', $testtype)
					->with('testcategory', $testcategory)
					->with('measures', $measures)
       				->with('measuretype', $measuretype)
       				->with('standardnames', $standardnames)
					->with('specimentypes', $specimentypes)
					->with('organisms', $organisms);
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
		$rules = array(
			'name' => 'required',
			'test_category_id' => 'required', Rule::notIn([0]),
			'specimentypes' => 'required',
			'targetTAT' => 'required',
			'targetTAT_unit'=>'required'
		);
		$validator = Validator::make($request->all(), $rules);

		// process the login
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		} else {
			// Update
			$testtype = TestType::find($id);
			$testtype->name = trim($request->get('name'));
			$testtype->description = $request->get('description');
			$testtype->test_category_id = $request->get('test_category_id');
            $testtype->parentId = $request->get('parentId');
			$testtype->targetTAT = $request->get('targetTAT');
			$testtype->targetTAT_unit = $request->get('targetTAT_unit');
			$testtype->prevalence_threshold = $request->get('prevalence_threshold');
			$testtype->orderable_test = $request->get('orderable_test');
			$testtype->accredited = $request->get('accredited');

			try{
				$testtype->save();
				// todo: this command is broken rework it
				// $testtype->setOrganisms(Input::get('organisms'));
				$testtype->setSpecimenTypes($request->get('specimentypes'));
				$measureIds = array();
					if ($request->get('new-measures')) {
						$inputNewMeasures = $request->get('new-measures');

						$measures = new MeasureController;
						$measureIds = $measures->store($inputNewMeasures);
					}

					if ($request->get('measures')) {
						$inputMeasures = $request->get('measures');
						foreach($inputMeasures as $key => $value)
						{
						  $measureIds[] = $key;
						}
						$measures = New MeasureController;
						$measures->update($inputMeasures);
					}
					$testtype->setMeasures($measureIds);
			}catch(QueryException $e){
				Log::error($e);
			}

			// redirect
			$url = $request->session()->get('SOURCE_URL');

            return redirect($url)
						->with('message', trans('messages.success-updating-test-type'))->with('activetesttype', $testtype ->id);
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
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function delete($id)
	{
		//Soft delete the testtype
		$testtype = TestType::find($id);
        $inUseByTests = $testtype->tests->toArray();

		if (empty($inUseByTests)) {
		    // The test type is not in use
			$testtype->delete();
		} else {
		    // The test type is in use
		    return redirect()->route('testtype.index')
		    	->with('message', 'messages.failure-test-type-in-use');
		}
		// redirect
		return redirect()->route('testtype.index')
			->with('message', trans('messages.success-deleting-test-type'));
	}
}
