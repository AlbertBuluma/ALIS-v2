<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use App\Models\Item;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		//List all items
		$items = Item::orderBy('name', 'ASC')->get();
		//	Barcode
		$barcode = Barcode::first();
		//Load the view and pass the items
		return view('inventory.item.index')->with('items', $items)->with('barcode', $barcode);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		//Create Item
		return view('inventory.item.create');
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
		$rules = array('name' => 'required|unique:inv_items,name');
		$validator = Validator::make($request->all(), $rules);

		//process
		if($validator->fails()){
			return redirect()->back()->withErrors($validator);
		}else{
			//store
			$item = new Item;
			$item->name = $request->get('name');
	        $item->unit = $request->get('unit');
	        $item->remarks = $request->get('remarks');
	        $item->min_level = $request->get('min_level');
	        $item->max_level = $request->get('max_level');
	        $item->storage_req = $request->get('storage_req');

			$item->user_id = Auth::user()->id;
			try{
				$item->save();
				$url = Session::get('SOURCE_URL');

            	return redirect()->to($url)
					->with('message', trans('messages.record-successfully-saved')) ->with('activeitem', $item ->id);
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
		//show a Item
		$item =Item::find($id);
		//	Barcode
		$barcode = Barcode::first();
		//show the view and pass the $item to it
		return view('inventory.item.show')->with('item', $item)->with('barcode', $barcode);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		//Get the Item
		$item =Item::find($id);

		//Open the Edit View and pass to it the $item
		return view('inventory.item.edit')->with('item', $item);
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
			//store
			$item = Item::find($id);
			$item->name = $request->get('name');
	        $item->unit = $request->get('unit');
	        $item->remarks = $request->get('remarks');
	        $item->min_level = $request->get('min_level');
	        $item->max_level = $request->get('max_level');
	        $item->storage_req = $request->get('storage_req');

			$item->user_id = Auth::user()->id;
			$item->save();

			// redirect
			$url = Session::get('SOURCE_URL');

            return redirect()->to($url)
				->with('message', trans('messages.record-successfully-updated')) ->with('activeitem', $item ->id);
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
		//Soft delete the Item
		$item =Item::find($id);
		$url = Session::get('SOURCE_URL');
		if(count($item->stocks)>0 || count($item->requests)>0)
		{
			return redirect()->to($url)->with('message', trans('messages.failure-delete-record'));
		}
		else
		{
			$item->delete();
        	return redirect()->to($url)->with('message', trans('messages.record-successfully-deleted'));
        }
	}
}
