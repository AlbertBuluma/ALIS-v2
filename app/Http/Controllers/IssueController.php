<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\Issue;
use App\Models\Receipt;
use App\Models\TestCategory;
use App\Models\TopupRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class IssueController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		//
		$issues = Issue::all();
		return view('issue.index')->with('issues', $issues);
	}

	/**
	 * Show the form for dispatching the resource to the bench.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function dispatch($id)
	{
		$topupRequest = TopupRequest::find($id);
		$batches = Receipt::where('commodity_id', '=', $topupRequest->commodity_id)->pluck('batch_no', 'id')->toArray();
		$users = User::where('id', '!=', Auth::user()->id)->pluck('name', 'id')->toArray();

		return view('issue.create')
				->with('topupRequest', $topupRequest)
				->with('users', $users)
				->with('batches', $batches);
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
		$rules = array(
			'receivers_name' => 'required',
			'quantity_issued' => 'required|integer',
			'batch_no' => 'required',
		);
		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return redirect()->route('issue.index')->withErrors($validator);
		} else {
			// store
			$issue = new Issue;
			$issue->receipt_id = $request->get('batch_no');
			$issue->topup_request_id = $request->get('topup_request_id');
			$issue->quantity_issued = $request->get('quantity_issued');
			$issue->issued_to = $request->get('receivers_name');
			$issue->user_id = Auth::user()->id;
			$issue->remarks = $request->get('remarks');

			try{
			$issue->save();
			return redirect()->route('issue.index')
				->with('message', trans('messages.commodity-succesfully-added'));
				}catch(QueryException $e){
				Log::error($e);
			}
		}
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
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		//
		$issue = Issue::find($id);
		$commodities= Commodity::all()->pluck('name', 'id')->toArray();
		$batches = Receipt::all()->pluck('batch_no', 'id')->toArray();
		$users = User::where('id', '!=', Auth::user()->id)->pluck('name', 'id')->toArray();
		$sections = TestCategory::all()->pluck('name', 'id')->toArray();
		//To DO:create function for this
		$available = $issue->topupRequest->commodity->available();
		return view('issue.edit')
			->with('commodities', $commodities)
			->with('available', $available)
			->with('users', $users)
			->with('sections', $sections)
			->with('issue', $issue)
			->with('batches', $batches);
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
			'receivers_name' => 'required',
			'quantity_issued' => 'required|integer',
			'batch_no' => 'required',
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return redirect()->route('issue.index')->withErrors($validator);

		} else {
			// Update
			$issue = Issue::find($id);
			$issue->receipt_id = $request->get('batch_no');
			$issue->topup_request_id = $request->get('topup_request_id');
			$issue->quantity_issued = $request->get('quantity_issued');
			$issue->issued_to = $request->get('receivers_name');
			$issue->user_id = Auth::user()->id;
			$issue->remarks = $request->get('remarks');

			$issue->save();

			return redirect()->route('issue.index')
					->with('message', 'Successfully updated');
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
		//Soft delete the item
		$issue = Issue::find($id);
		$issue->delete();

		// redirect
		return redirect()->route('issue.index')->with('message', trans('messages.issue-succesfully-deleted'));
	}

}
