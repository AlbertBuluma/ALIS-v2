<?php

namespace App\Http\Controllers;

use App\Models\UnhlsSpecimen;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

/**
 * Contains functions for managing specimen types
 *
 */
class SpecimenController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		// List all the active specimens
			$specimens = UnhlsSpecimen::orderBy('name', 'ASC')->get();

		// Load the view and pass the specimens
		return view('specimen.index')->with('specimens', $specimens);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		//Create Specimen
		return view('specimen.create');
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
		$rules = array('name' => 'required|unique:specimen_types,name');
		$validator = Validator::make($request->all(), $rules);

		// process the login
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		} else {
			// store
			$specimen = new UnhlsSpecimen;
			$specimen->name = $request->get('name');
			$specimen->description = $request->get('description');

			try{
				$specimen->save();
			$url = Session::get('SOURCE_URL');
			return redirect()->to($url)
                    ->with('message', trans('messages.success-creating-specimen-type'));
			}catch(QueryException $e){
                Log::error($e);
			}

			// redirect
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
		//Show a specimen
		$specimen = UnhlsSpecimen::find($id);

		//Show the view and pass the $specimen to it
		return view('specimen.show')->with('specimen', $specimen);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		//Get the specimen
		$specimen = UnhlsSpecimen::find($id);

		//Open the Edit View and pass to it the $specimen
		return view('specimen.edit')->with('specimen', $specimen);
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
		//
		$rules = array('name' => 'required');
		$validator = Validator::make($request->all(), $rules);

		// process the login
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		} else {
			// Update
			$specimen = UnhlsSpecimen::find($id);
			$specimen->name = $request->get('name');
			$specimen->description = $request->get('description');
			$specimen->save();

			// redirect
			$url = Session::get('SOURCE_URL');

			return redirect()->to($url)
			->with('message', trans('messages.success-updating-specimen-type'))->with('activespecimen', $specimen ->id);

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
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function delete($id)
	{
		//Soft delete the specimen
		$specimen = UnhlsSpecimen::find($id);
		$inUseByTesttype = $specimen->testTypes->toArray();
		$inUseBySpecimen = $specimen->specimen->toArray();
		if (empty($inUseByTesttype) && empty($inUseBySpecimen)) {
		    // The specimen type is not in use
			$specimen->delete();
		} else {
		    // The specimen type is in use
		    return redirect()->route('specimen.index')
		    	->with('message', trans('messages.failure-specimen-type-in-use'));
		}
		// redirect
		  $url = Session::get('SOURCE_URL');

			return redirect()->to($url)
			->with('message', trans('messages.success-updating-specimen-type'));
	}
}
