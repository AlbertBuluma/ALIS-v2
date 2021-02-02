<?php

namespace App\Http\Controllers;

use App\Models\UnhlsVisit;
use App\Models\Ward;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

/**
 * Contains wards
 */
class WardController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
 */
    public function index()
    {
        //List all wards
        $ward = Ward::orderBy('name', 'ASC')->get();
        //Load the view and pass the wards
        return view('ward.index')->with('ward',$ward);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        //Create ward
        return view('ward.create')->with('ward_types');
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
        $rules = array(
            'name' => 'required|unique:wards,name',
            );
        $validator = Validator::make($request->all(), $rules);

        //process
        if($validator->fails()){
                return redirect()->back()->withErrors($validator);
        }else{
            //store
            $ward = new Ward;
            $ward->name = $request->get('name');
            $ward->description = $request->get('description');

            try{
                $ward->save();

                return redirect()->route('ward.index')
                    ->with('message', 'Health Unit Successfully Create');
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
        //show a ward
        $ward = Ward::find($id);

        //show the view and pass the $ward to it
        return view('ward.show')->with('ward',$ward);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        //Get the patient
        $ward = Ward::find($id);
        //Open the Edit View and pass to it the $patient
        return view('ward.edit')->with('ward', $ward)->with('ward_types');
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
            // Update
            $ward = Ward::find($id);
            $ward->name = $request->get('name');
            $ward->description = $request->get('description');
            $ward->save();

            // redirect

            return redirect()->route('ward.index')
                ->with('message', 'Health Unit Successfully Updated') ->with('activeward', $ward ->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //Soft delete the ward
        $ward = Ward::find($id);

        $wardInUse = UnhlsVisit::where('ward_id', '=', $id)->first();
        if (empty($wardInUse)) {
            // The ward is not in use
            $ward->delete();
        } else {
            // The ward is in use

            return redirect()->route('ward.index')
                ->with('message', 'This Health Unit is in use');
        }
        // redirect
            return redirect()->route('ward.index')
            ->with('message', 'Health Unit Successfully Deleted');
    }
}
