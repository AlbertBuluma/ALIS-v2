<?php

class UuidGeneratorController extends \BaseController {

	/**
	 * Reset Unique Lab Identification Number to desired number
	 *
	 *@param int $incrementNum
	 *@return Response
	*/
	public function reset(){

		$rules = array('incrementNum' => 'required');

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			//return Redirect::route('resetulin.create')->with('message', 'Please Enter a number to reset to');
			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		}else{
			$incrementNum = Input::get('incrementNum');
			$url = Session::get('SOURCE_URL');
			
			$uuid = new UuidGenerator;

			if($incrementNum > 1){
				$uuid->resetUuid($incrementNum);

				// return Redirect::route('resetulin.create')->with('message', 'ULIN has been succesfully reset to '.$incrementNum);
				return Redirect::to($url)->with('message', 'Success! The next ULIN will now start at: '.$incrementNum);

			}else{
				$uuid->truncate();

				return Redirect::route('resetulin.create')->with('message', 'ULIN has been succesfully reset to 1');
			}

		}
			
	}
	/**
	 * Display a listing of the resource.
	 * GET /uuidgenerator
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /uuidgenerator/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('resetulin.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /uuidgenerator
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /uuidgenerator/{id}
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
	 * GET /uuidgenerator/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /uuidgenerator/{id}
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
	 * DELETE /uuidgenerator/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}