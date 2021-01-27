<?php

namespace App\Http\Controllers;

use App\Models\UnhlsPurpose;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UnhlsPurposeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		// List all the active test purpose
		$purposes = UnhlsPurpose::orderBy('name', 'ASC')->get();
		// Load the view and pass the test purposes
		return view('testpurpose.index')->with('purpose',$purposes);
	}


	/**
	 * tes the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		//Create Test purpose
		return view('testpurpose.create');
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
		$rules = array('name' => 'required|unique:unhls_testpurposes,name');
		$validator = Validator::make($request->all(), $rules);

		// process the login
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		} else {
			// store
			$purpose = new UnhlsPurpose;
			$purpose->name = $request->get('name');
			$purpose->description = $request->get('description');

			try{
				$purpose->save();
			// $url = Session::get('SOURCE_URL');
			return redirect()->to('testpurpose')
                    ->with('message', trans('Successfully test-purpose is created'));
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
			//Show a purpose
		$purpose = UnhlsPurpose::find($id);

		//Show the view and pass the $purpose to it
		return view('testpurpose.show')->with('purpose', $purpose);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		//Get the purpose
		$purpose = UnhlsPurpose::find($id);

		//Open the Edit View and pass to it the $specimentype
		return view('testpurpose.edit')->with('purpose', $purpose);
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
			$purpose = UnhlsPurpose::find($id);
			$purpose->name = $request->get('name');
			$purpose->description = $request->get('description');
			$purpose->save();

			// redirect
			//$url = Session::get('SOURCE_URL');

			return redirect()->to('testpurpose')
			->with('message', trans('Successfully test-purpose is updated'))->with('activetestpurpose', $purpose ->id);

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
		//Soft delete the testpurpose
		$purpose = UnhlsPurpose::find($id);
		// $inUseByTesttype = $specimentype->testTypes->toArray();
		// $inUseBySpecimen = $specimentype->specimen->toArray();
		// if (empty($inUseByTesttype) && empty($inUseBySpecimen)) {
		    // The specimen type is not in use
			$purpose->delete();
		// } else {
		//     // The specimen type is in use
		//     return Redirect::route('testpurpose.index')
		//     	->with('message', trans('messages.failure-specimen-type-in-use'));
		// }
		// redirect
		  //$url = Session::get('SOURCE_URL');

			return redirect()->to('testpurpose')
			->with('message', trans('messages.success-updating-specimen-type'));
	}


}
