<?php

namespace App\Http\Controllers;

use App\Models\Clinician;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CliniciansController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
 */
    public function index()
    {
        //List all wards
        $clinicians = Clinician::orderBy('name', 'ASC')->get();
        //Load the view and pass the wards
        return view('clinicians.index')->with('clinicians',$clinicians);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {


        //Create ward
        return view('clinicians.create');
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
            'name' => 'required|unique:clinicians,name',
            'cadre' => 'required',
            'phone' => 'required'
            );
        $validator = Validator::make($request->all(), $rules);

        //process
        if($validator->fails()){
                return redirect()->back()->withErrors($validator);
        }else{
            //store
            $clinician = new Clinician;
            $clinician->name = $request->get('name');
            $clinician->cadre = $request->get('cadre');
            $clinician->phone = $request->get('phone');
            $clinician->email = $request->get('email');
            try{
                $clinician->save();

                return redirect()->route('clinicians.index')
                    ->with('message', 'Clinician Successfully Created');
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
        $clinician = Clinician::find($id);

        //show the view and pass the $ward to it
        return view('clinicians.show')->with('clinician',$clinician);
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
        $clinician = Clinician::find($id);

        //Open the Edit View and pass to it the $patient
        return view('clinicians.edit')->with('clinician', $clinician);
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
        $rules = array('name' => 'required|unique:clinicians,name',
            'phone' => 'required');
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->except('password'));
        } else {
            // Update
            $clinician = Clinician::find($id);
            $clinician->name = $request->get('name');
            $clinician->cadre = $request->get('cadre');
            $clinician->phone = $request->get('phone');
            $clinician->email = $request->get('email');
           	$clinician->save();

            // redirect

            return redirect()->route('clinicians.index')
                ->with('message', 'Clinician Successfully Updated') ->with('activeclinician', $clinician ->id);
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

    }
}
