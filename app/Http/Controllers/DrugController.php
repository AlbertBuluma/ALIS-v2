<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\DrugSusceptibility;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

/**
 * Contains drugs resources
 *
 */
class DrugController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		//List all drugs
		$drugs = Drug::orderBy('name', 'ASC')->get();
		//Load the view and pass the drugs
		return view('drug.index')->with('drugs',$drugs);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		//Create drug
		return view('drug.create');
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
		$rules = array('name' => 'required|unique:drugs,name');
		$validator = Validator::make($request->all(), $rules);

		//process
		if($validator->fails()){
			return redirect()->back()->withErrors($validator);
		}else{
			//store
			$drug = new Drug;
			$drug->name = $request->get('name');
			$drug->description = $request->get('description');
			try{
				$drug->save();
				$url = Session::get('SOURCE_URL');

            	return redirect()->to($url)
					->with('message', trans('messages.success-creating-drug')) ->with('activedrug', $drug ->id);
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
		//show a drug
		$drug = Drug::find($id);
		//show the view and pass the $drug to it
		return view('drug.show')->with('drug',$drug);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		//Get the drug
		$drug = Drug::find($id);

		//Open the Edit View and pass to it the $drug
		return view('drug.edit')->with('drug', $drug);
	}


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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
			$drug = Drug::find($id);
			$drug->name = $request->get('name');
			$drug->description = $request->get('description');
			$drug->save();

			// redirect
			$url = Session::get('SOURCE_URL');

            return redirect($url)
				->with('message', trans('messages.success-updating-drug')) ->with('activetestcategory', $drug ->id);
		}
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
	/**
	 * Remove the specified resource from storage (soft delete).
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function delete($id)
	{
		//Soft delete the drug
		$drug = Drug::find($id);

		/*$testCategoryInUse = TestType::where('test_category_id', '=', $id)->first();
		if (empty($testCategoryInUse)) {
		    // The test category is not in use
			$testcategory->delete();
		} else {
		    // The test category is in use
		    $url = Session::get('SOURCE_URL');

            return Redirect::to($url)
		    	->with('message', trans('messages.failure-test-category-in-use'));
		}*/
		// redirect
			$url = Session::get('SOURCE_URL');

			return redirect($url)
			->with('message', 'Delete Feature Not Functional, Contact Systems Programmer');

/*            return Redirect::to($url)
			->with('message', trans('messages.success-deleting-drug'));
*/	}
}
