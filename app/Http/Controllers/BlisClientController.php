<?php

namespace App\Http\Controllers;
use App\Models\BlisClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlisClientController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		//	Get available equipment
		$client = BlisClient::pluck('equipment_name', 'id')->toArray();
		return view('instrument.blisClient')->with('client', $client);
	}

    /**
     * Get details of the given client
     *
     * @param Request $request
     * @return false|string
     */
	public function details(Request $request)
	{
		$id = $request->get('equip');
		$client = BlisClient::find($id);
		$client->feed = $client->feed($client->feed_source);
		$client->comm = $client->comm($client->comm_type);
		$client->lab = $client->testCategory->name;
		return json_encode($client);
	}

    /**
     * Get config properties of the given client
     *
     * @param Request $request
     * @return false|string
     */
	public function properties(Request $request)
	{
		$id = $request->get('client');
		$client = BlisClient::find($id);
		$properties = DB::table('equip_config')->where('equip_id', $client->id)->get();
		foreach ($properties as $property)
		{
			$conf = DB::table('ii_quickcodes')->where('feed_source', $client->feed_source)
                        ->where('id', $property->prop_id)->first();
			$property->config_prop = $conf->config_prop;
		}
		return json_encode($properties);
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
		//
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
		//
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


}
