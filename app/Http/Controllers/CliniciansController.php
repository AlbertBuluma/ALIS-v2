<?php

namespace App\Http\Controllers;

use App\Models\Clinician;

class CliniciansController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
 */
    public function index()
    {
        //List all wards
        $clinicians = Clinician::orderBy('name', 'ASC')->get();
        //Load the view and pass the wards
        return View::make('clinicians.index')->with('clinicians',$clinicians);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {


        //Create ward
        return View::make('clinicians.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //Validation
        $rules = array(
            'name' => 'required|unique:clinicians,name',
            'phone' => 'required'
            );
        $validator = Validator::make(Input::all(), $rules);

        //process
        if($validator->fails()){
                return Redirect::back()->withErrors($validator);
        }else{
            //store
            $clinician = new Clinician;
            $clinician->name = Input::get('name');
            $clinician->cadre = Input::get('cadre');
            $clinician->phone = Input::get('phone');
            $clinician->email = Input::get('email');
            try{
                $clinician->save();

                return Redirect::route('clinicians.index')
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
     * @return Response
     */
    public function show($id)
    {
        //show a ward
        $clinician = Clinician::find($id);

        //show the view and pass the $ward to it
        return View::make('clinicians.show')->with('clinician',$clinician);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //Get the patient
        $clinician = Clinician::find($id);

        //Open the Edit View and pass to it the $patient
        return View::make('clinicians.edit')->with('clinician', $clinician);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //Validate
        $rules = array('name' => 'required|unique:clinicians,name',
            'phone' => 'required');
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput(Input::except('password'));
        } else {
            // Update
            $clinician = Clinician::find($id);
            $clinician->name = Input::get('name');
            $clinician->cadre = Input::get('cadre');
            $clinician->phone = Input::get('phone');
            $clinician->email = Input::get('email');
           	$clinician->save();

            // redirect

            return Redirect::route('clinicians.index')
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
