<?php

namespace App\Http\Controllers;

use App\Models\IsolatedOrganism;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsolatedOrganismController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$isolatedOrganisms = IsolatedOrganism::with('test','organism')->get();

		return $isolatedOrganisms;
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
     * @param Request $request
     * @return IsolatedOrganism
     */
	public function store(Request $request)
	{
		$isolatedOrganism = new IsolatedOrganism;
		$isolatedOrganism->user_id = Auth::user()->id;
		$isolatedOrganism->test_id = $request->get('test_id');
		$isolatedOrganism->organism_id = $request->get('organism_id');
		$isolatedOrganism->save();
		return $isolatedOrganism->load('test','organism');
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
     * @param Request $request
     * @param int $id
     * @return Response
     */
	public function update(Request $request, $id)
	{
		$isolatedOrganism = IsolatedOrganism::find($id);
		$isolatedOrganism->user_id = Auth::user()->id;
		$isolatedOrganism->test_id = $request->get('test_id');
		$isolatedOrganism->organism_id = $request->get('organism_id');
		$isolatedOrganism->save();
		return $isolatedOrganism->load('test','organism');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$isolatedOrganism = IsolatedOrganism::find($id);
		$isolatedOrganism->delete();
		return $id;
	}
}
