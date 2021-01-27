<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\TestCategory;
use App\Models\Topup;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TopUpController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$requests = Topup::all();
		return view('inventory.request.index')->with('requests', $requests);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$items = Item::pluck('name', 'id')->toArray();
		$testCategories = TestCategory::pluck('name', 'id')->toArray();
		return view('inventory.request.create')
			->with('testCategories', $testCategories)
			->with('items', $items);
	}


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function store(Request $request)
	{
		$rules = array(
			'item_id' => 'required',
			'test_category_id' => 'required',
			'quantity_ordered' => 'required'
		);
		$validator = Validator::make($request->all(), $rules);

		// process the login
		if ($validator->fails()) {
		return redirect()->route('inventory.request.index')->withErrors($validator);
		} else {
			// store
			$request = new Topup;
			$request->item_id = $request->get('item_id');
			$request->quantity_remaining = $request->get('quantity_remaining');
			$request->test_category_id = $request->get('test_category_id');
			$request->tests_done = $request->get('tests_done');
			$request->quantity_ordered = $request->get('quantity_ordered');
			$request->remarks = $request->get('remarks');
			$request->user_id = Auth::user()->id;
			try{
				$request->save();
				$url = Session::get('SOURCE_URL');

            	return redirect()->to($url)
					->with('message', trans('messages.record-successfully-saved')) ->with('activerequest', $request ->id);
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
		//show a request
		$request =Topup::find($id);
		//show the view and pass the $request to it
		return view('inventory.request.show')->with('request', $request);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$request = Topup::find($id);
		$items = Item::pluck('name', 'id')->toArray();
		$item = $request->item_id;
		$testCategories = TestCategory::pluck('name', 'id')->toArray();
		$testCategory = $request->test_category_id;
		return view('inventory.request.edit')
			->with('testCategories', $testCategories)
			->with('items', $items)
			->with('item', $item)
			->with('request', $request)
			->with('testCategory', $testCategory);
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
		$rules = array(
			'commodity' => 'required',
			'quantity_ordered' => 'required',
			'test_category_id' => 'required'
		);
		// Update
		$request = Topup::find($id);
		$request->item_id = $request->get('item_id');
		$request->quantity_remaining = $request->get('quantity_remaining');
		$request->test_category_id = $request->get('test_category_id');
			$request->tests_done = $request->get('tests_done');
		$request->quantity_ordered = $request->get('quantity_ordered');
		$request->remarks = $request->get('remarks');
		$request->user_id = Auth::user()->id;
		try
		{
			$request->save();
			$url = Session::get('SOURCE_URL');

        	return redirect()->to($url)
				->with('message', trans('messages.record-successfully-updated')) ->with('activerequest', $request ->id);
		}catch(QueryException $e){
			Log::error($e);
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function delete($id)
	{
		//Soft delete the request
		$request = Topup::find($id);
		if(count($request->usage)>0)
		{
			return redirect()->route('request.index')->with('message', trans('messages.failure-delete-record'));
		}
		else
		{
			$request->delete();
			// redirect
			return redirect()->route('request.index')->with('message', trans('messages.record-successfully-deleted'));
		}
	}
}
