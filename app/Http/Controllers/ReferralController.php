<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\UnhlsVisit;
use App\Models\Ward;
use App\Models\WardType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

/**
 * Contains wards
 */
class ReferralController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
 */
    public function index()
    {
        //List all wards
        $referral = Facility::orderBy('name', 'ASC')->get();
        //Load the view and pass the wards
        return view('referral.index')->with('referral',$referral);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $ward_types = WardType::pluck("name","id")->toArray();

        //Create ward
        return view('ward.create')->with('ward_types',$ward_types);
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
            $ward->ward_type_id = $request->get('ward_type_id');
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
        $ward_types = WardType::pluck("name","id")->toArray();
        //Open the Edit View and pass to it the $patient
        return view('ward.edit')->with('ward', $ward)->with('ward_types',$ward_types);
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
        $rules = array('name' => 'required','ward_type_id'=>'required');
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->except('password'));
        } else {
            // Update
            $ward = Ward::find($id);
            $ward->name = $request->get('name');
            $ward->description = $request->get('description');
            $ward->ward_type_id = $request->get('ward_type_id');
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
