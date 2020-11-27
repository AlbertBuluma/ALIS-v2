<?php

namespace App\Http\Controllers;

use App\Models\DailyNegativeCulture;
use App\Models\DailyNegativeGramStain;
use App\Models\TestNameMapping;
use App\Models\TestType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TestNameMappingController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		//List all facilities
		$testNameMappings = TestNameMapping::all();
		//Load the view and pass the testNameMappings
		return view('testnamemapping.index')->with('testNameMappings',$testNameMappings);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$testTypes = TestType::orderBy('name')->pluck('name', 'id')->toArray();
		return view('testnamemapping.create')
				->with('testTypes', $testTypes);
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
			return redirect()->route('testnamemapping.index')->withErrors($validator)->withInput();
		} else {
			// Add
			$testNameMapping = new TestNameMapping;
			$testNameMapping->test_type_id = $request->get('test_type_id');
			$testNameMapping->standard_name = $request->get('standard_name');
			$testNameMapping->system_name = $request->get('system_name');
			// redirect
			try{
				$testNameMapping->save();
				$url = Session::get('SOURCE_URL');
				return redirect($url)
					->with('message', 'Successfully Created Measure Name Mapping')
					->with('activefacility', $testNameMapping ->id);
			} catch(QueryException $e){
				Log::error($e);
			}
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id)
	{
		$testNameMapping = TestNameMapping::find($id)->load('measureNameMappings');
		// if culture
		if ($testNameMapping->system_name == 'culture_sensitivity') {
			$negativeOrganisms = DailyNegativeCulture::all();
			return view('testnamemapping.measurenamemapping.negativeorganisms')
				->with('negativeOrganisms',$negativeOrganisms)
				->with('testNameMapping',$testNameMapping);
		// if gram stain
		}elseif ($testNameMapping->system_name == 'gram_stain') {
			$negativeGramStains = DailyNegativeGramStain::all();
			return view('testnamemapping.measurenamemapping.negativegramstains')
				->with('negativeGramStains',$negativeGramStains)
				->with('testNameMapping',$testNameMapping);
		}else {
			return view('testnamemapping.measurenamemapping.index')->with('testNameMapping',$testNameMapping);
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$testNameMapping = TestNameMapping::find($id);
		$testTypes = TestType::orderBy('name')->pluck('name', 'id')->toArray();

		return view('testnamemapping.edit')
				->with('testNameMapping', $testNameMapping)
				->with('testTypes', $testTypes);
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
			return redirect()->route('testnamemapping.index')->withErrors($validator)->withInput();
		} else {
			// Update
			$testNameMapping = TestNameMapping::find($id);
			$testNameMapping->test_type_id = $request->get('test_type_id');
			$testNameMapping->standard_name = $request->get('standard_name');
			$testNameMapping->system_name = $request->get('system_name');
			$testNameMapping->save();
			// redirect
			return redirect()->route('testnamemapping.index')
				->with('message', 'Successfully Updated Measure Name Mapping');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function delete($id)
	{
		//Deleting the Item
		$testNameMapping = TestNameMapping::find($id);

		//Soft delete
		$testNameMapping->delete();

		// redirect
		return redirect()->route('testnamemapping.index')
			->with('message', 'Successfully Deleted Measure Name Mapping');
	}


}
