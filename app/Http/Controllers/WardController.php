<?php

use Illuminate\Database\QueryException;

/**
 * Contains wards
 */
class WardController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
 */
    public function index()
    {
        //List all wards
        $ward = Ward::orderBy('name', 'ASC')->get();
        //Load the view and pass the wards
        return View::make('ward.index')->with('ward',$ward);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
               
        //Create ward
        return View::make('ward.create')->with('ward_types');
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
            'name' => 'required|unique:wards,name',
            );
        $validator = Validator::make(Input::all(), $rules);
    
        //process
        if($validator->fails()){
                return Redirect::back()->withErrors($validator);
        }else{
            //store
            $ward = new Ward;
            $ward->name = Input::get('name');
            $ward->description = Input::get('description');
            try{
                $ward->save();
            
                return Redirect::route('ward.index')
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
     * @return Response
     */
    public function show($id)
    {
        //show a ward
        $ward = Ward::find($id);
        
        //show the view and pass the $ward to it
        return View::make('ward.show')->with('ward',$ward);
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
        $ward = Ward::find($id);
        //Open the Edit View and pass to it the $patient
        return View::make('ward.edit')->with('ward', $ward)->with('ward_types');
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
        $rules = array('name' => 'required');
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput(Input::except('password'));
        } else {
            // Update
            $ward = Ward::find($id);
            $ward->name = Input::get('name');
            $ward->description = Input::get('description');
            $ward->save();

            // redirect
            
            return Redirect::route('ward.index')
                ->with('message', 'Health Unit Successfully Updated') ->with('activeward', $ward ->id);
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
        //Soft delete the ward
        $ward = Ward::find($id);

        $wardInUse = UnhlsVisit::where('ward_id', '=', $id)->first();
        if (empty($wardInUse)) {
            // The ward is not in use
            $ward->delete();
        } else {
            // The ward is in use
            
            return Redirect::route('ward.index')
                ->with('message', 'This Health Unit is in use');
        }
        // redirect
            return Redirect::route('ward.index')
            ->with('message', 'Health Unit Successfully Deleted');
    }
}
