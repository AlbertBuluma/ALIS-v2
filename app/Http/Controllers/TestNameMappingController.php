<?php

class TestNameMappingController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//List all facilities
		$testNameMappings = TestNameMapping::all();
		//Load the view and pass the testNameMappings
		return View::make('testnamemapping.index')->with('testNameMappings',$testNameMappings);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$testTypes = TestType::orderBy('name')->lists('name', 'id');
		return View::make('testnamemapping.create')
				->with('testTypes', $testTypes);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Validation
		$rules = array('system_name' => 'required');
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('testnamemapping.index')->withErrors($validator)->withInput();
		} else {
			// Add
			$testNameMapping = new TestNameMapping;
			$testNameMapping->test_type_id = Input::get('test_type_id');
			$testNameMapping->standard_name = Input::get('standard_name');
			$testNameMapping->system_name = Input::get('system_name');
			// redirect
			try{
				$testNameMapping->save();
				$url = Session::get('SOURCE_URL');
				return Redirect::to($url)
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
	 * @return Response
	 */
	public function show($id)
	{
		$testNameMapping = TestNameMapping::find($id)->load('measureNameMappings');
		// if culture
		if ($testNameMapping->system_name == 'culture_sensitivity') {
			$negativeOrganisms = DailyNegativeCulture::all();
			return View::make('testnamemapping.measurenamemapping.negativeorganisms')
				->with('negativeOrganisms',$negativeOrganisms)
				->with('testNameMapping',$testNameMapping);
		// if gram stain
		}elseif ($testNameMapping->system_name == 'gram_stain') {
			$negativeGramStains = DailyNegativeGramStain::all();
			return View::make('testnamemapping.measurenamemapping.negativegramstains')
				->with('negativeGramStains',$negativeGramStains)
				->with('testNameMapping',$testNameMapping);
		}else {
			return View::make('testnamemapping.measurenamemapping.index')->with('testNameMapping',$testNameMapping);
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$testNameMapping = TestNameMapping::find($id);
		$testTypes = TestType::orderBy('name')->lists('name', 'id');

		return View::make('testnamemapping.edit')
				->with('testNameMapping', $testNameMapping)
				->with('testTypes', $testTypes);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//Validate and check
		$rules = array('system_name' => 'required');
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('testnamemapping.index')->withErrors($validator)->withInput();
		} else {
			// Update
			$testNameMapping = TestNameMapping::find($id);
			$testNameMapping->test_type_id = Input::get('test_type_id');
			$testNameMapping->standard_name = Input::get('standard_name');
			$testNameMapping->system_name = Input::get('system_name');
			$testNameMapping->save();
			// redirect
			return Redirect::route('testnamemapping.index')
				->with('message', 'Successfully Updated Measure Name Mapping');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		//Deleting the Item
		$testNameMapping = TestNameMapping::find($id);

		//Soft delete
		$testNameMapping->delete();

		// redirect
		return Redirect::route('testnamemapping.index')
			->with('message', 'Successfully Deleted Measure Name Mapping');
	}


}
