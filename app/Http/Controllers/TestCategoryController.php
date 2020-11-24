<?php

namespace App\Http\Controllers;

use App\Models\TestCategory;
use App\Models\TestType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

/**
 * Contains test categories a.k.a lab sections
 * A classification of test types
 */
class TestCategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		//List all test categories
		$testcategory = TestCategory::orderBy('name', 'ASC')->get();
		//Load the view and pass the test categories
		return view('testcategory.index')->with('testcategory',$testcategory);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		//Create test category
		return view('testcategory.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function store(Request $request)
	{
		//Validation
		$rules = array('name' => 'required|unique:test_categories,name');
		$validator = Validator::make($request->all(), $rules);

		//process
		if($validator->fails()){
			$url = Session::get('SOURCE_URL');

            	return redirect($url)->withErrors($validator);
		}else{
			//store
			$testcategory = new TestCategory;
			$testcategory->name = $request->get('name');
			$testcategory->description = $request->get('description');
			try{
				$testcategory->save();
				$url = Session::get('SOURCE_URL');

            	return redirect($url)
					->with('message', trans('messages.success-creating-test-category')) ->with('activetestcategory', $testcategory ->id);
			}catch(QueryException $e){
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
		//show a test category
		$testcategory = TestCategory::find($id);
		//show the view and pass the $testcategory to it
		return view('testcategory.show')->with('testcategory',$testcategory);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		//Get the patient
		$testcategory = TestCategory::find($id);

		//Open the Edit View and pass to it the $patient
		return view('testcategory.edit')->with('testcategory', $testcategory);
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
		//Validate
		$rules = array('name' => 'required');
		$validator = Validator::make($request->all(), $rules);

		// process the login
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput($request->except('password'));
		} else {
			// Update
			$testcategory = TestCategory::find($id);
			$testcategory->name = $request->get('name');
			$testcategory->description = $request->get('description');
			$testcategory->save();

			// redirect
			$url = Session::get('SOURCE_URL');

            return redirect($url)
				->with('message', trans('messages.success-updating-test-category')) ->with('activetestcategory', $testcategory ->id);
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
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function delete($id)
	{
		//Soft delete the test category
		$testcategory = TestCategory::find($id);

		$testCategoryInUse = TestType::where('test_category_id', '=', $id)->first();
		if (empty($testCategoryInUse)) {
		    // The test category is not in use
			$testcategory->delete();
		} else {
		    // The test category is in use
		    $url = Session::get('SOURCE_URL');

            return redirect($url)
		    	->with('message', trans('messages.failure-test-category-in-use'));
		}
		// redirect
			$url = Session::get('SOURCE_URL');

            return redirect($url)
			->with('message', trans('messages.success-deleting-test-category'));
	}
}






