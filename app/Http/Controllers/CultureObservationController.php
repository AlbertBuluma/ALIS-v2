<?php

namespace App\Http\Controllers;

use App\Models\CultureObservation;
use Illuminate\Support\Facades\Auth;

class CultureObservationController extends Controller {

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
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$observation = new CultureObservation;
		$observation->user_id = Auth::user()->id;
		$observation->test_id = Input::get('test_id');
		$observation->observation = Input::get('observation');
		$observation->save();
		return $observation->load('test');
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
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$observation = CultureObservation::find($id);
		$observation->user_id = Auth::user()->id;
		$observation->observation = Input::get('observation');
		$observation->save();
		return $observation->load('test');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$observation = CultureObservation::find($id);
		$observation->delete();
		return $id;
	}
}
