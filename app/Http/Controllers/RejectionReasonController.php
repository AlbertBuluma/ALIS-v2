<?php

namespace App\Http\Controllers;

use App\Models\RejectionReason;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

/**
 * Contains functions for managing specimen rejection
 *
 */
class RejectionReasonController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // List all the active rejection reasons
        $rejection = RejectionReason::orderBy('reason', 'ASC')->get();

        // Load the view and pass the reasons
        return view('specimenrejection.index')->with('rejection', $rejection);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //Create rejection
        return view('specimenrejection.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $rules = array('reason'=> 'required');

        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->route("specimenrejection.create")
                ->withErrors($validator);
        } else {
            // store
            $rejection = new RejectionReason;
            $rejection->reason = $request->get('reason');
            $rejection->save();
        }
            $url = Session::get('SOURCE_URL');

            return redirect($url)

            ->with('message', trans('messages.success-creating-rejection-reason'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        //Get the Rejection Reason
        $rejection = RejectionReason::find($id);
        //Open the Edit View and pass to it the $rejection
        return view('specimenrejection.edit')->with('reason', $rejection);
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
        $rules = array('reason' => 'required');

        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            // Update
            $rejection = RejectionReason::find($id);
            $rejection->reason = $request->get('reason');
            $rejection->save();

            // redirect
            $url = Session::get('SOURCE_URL');

            return redirect($url)
                    ->with('message', trans('messages.success-updating-rejection-reason')) ->with('activerejection', $rejection->id);
        }
    }

    /**
     * Remove the specified resource from storage (soft delete).
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(Request $request, $id)
    {
        //Soft delete the rejection
        $rejection = RejectionReason::find($id);
        $inUseBySpecimen = optional($rejection->specimen)->toArray();
        try {
            // The rejection is not in use
            $rejection->delete();
        } catch (Exception $e) {
            // The rejection is in use
            $url = Session::get('SOURCE_URL');

            return redirect($url)
                ->with('message', trans('messages.failure-specimen-rejection-reason-in-use'));
        }
        // redirect
            $url = Session::get('SOURCE_URL');

            return redirect($url)
            ->with('message', trans('messages.success-deleting-rejection-reason'));
    }
}
