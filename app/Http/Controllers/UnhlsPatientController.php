<?php

namespace App\Http\Controllers;

use App\Models\AdhocConfig;
use App\Models\UnhlsPatient;
use App\Models\UnhlsVisit;
use App\Models\UuidGenerator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

/**
 *Contains functions for managing patient records
 *
 */
class UnhlsPatientController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $patients = UnhlsPatient::search($search)->orderBy('id', 'desc')->paginate(config('kblis.page-items'))->appends($request->except('_token'));

        if (count($patients) == 0) {
            $request->session()->flash('message', trans('messages.no-match'));
        }
        $clinicianUI = AdhocConfig::where('name','Clinician_UI')->first()->activateClinicianUI();


        // Load the view and pass the patients
        return view('unhls_patient.index')
            ->with('patients', $patients)
            ->with('clinicianUI', $clinicianUI)
            ->withInput($request->all());
    }


    public function live()
    {

        $patients = UnhlsPatient::all();
        /*if (count($patients) == 0) {
             Session::flash('message', trans('messages.no-match'));
        }*/
        $clinicianUI = AdhocConfig::where('name','Clinician_UI')->first()->activateClinicianUI();



        return compact('patients');
        // Load the view and pass the patients
        /**return View::make('unhls_patient.index')
        ->with('patients', $patients)
        ->with('clinicianUI', $clinicianUI)
        ->withInput($request->all());*/
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        //Create Patient
        $ulinFormat = AdhocConfig::where('name','ULIN')->first()->getULINFormat();
        return view('unhls_patient.create')
            ->with('ulinFormat', $ulinFormat);
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
            'name'       => 'required',
            'gender' => 'required',
            'dob' => 'required' ,
            'nationality' => 'required'
            // 'village_residence' => 'required'

        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput($request->all());
        } else {

            $nation = ['0' => 'National', '1' => 'Refugee', '2' => 'Foreigner'];
            // store
            $patient = new UnhlsPatient;
            $patient->patient_number = $request->get('patient_number');
            $patient->nin = $request->get('nin');
            $patient->name = $request->get('name');
            $patient->gender = $request->get('gender');
            $patient->nationality = $nation[$request->get('nationality')];
            $patient->dob = $request->get('dob');
            $patient->village_residence = $request->get('village_residence');
            $patient->village_workplace = $request->get('village_workplace');
            $patient->occupation = $request->get('occupation');
            $patient->email = $request->get('email');
            $patient->address = $request->get('address');
            $patient->phone_number = $request->get('phone_number');
            $patient->created_by = Auth::user()->id;

            try{
                $patient->save();
//                if ($request->get('ulin')!= '') {
//                    $patient->ulin = $request->get('ulin');
//                }else{
//                    $patient->ulin = $patient->getUlin();
//                }
//                $patient->save();
//                $uuid = new UuidGenerator;
//                $uuid->save();

                /*
                  $url = Session::get('SOURCE_URL');
                  return Redirect::to($url)
                  ->with('message', 'Successfully created patient with ULIN:  '.$patient->ulin.'!');
                  **/
                //Show the view and pass the $patient to it
                return redirect()->to('/unhls_test/create/'.$patient->id);


            }catch(QueryException $e){
                Log::error($e);
                echo $e->getMessage();
            }

            // redirect
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
        //Show a patient
        $patient = UnhlsPatient::find($id);

        //Show the view and pass the $patient to it
        return view('unhls_patient.show')->with('patient', $patient);
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
        $patient = UnhlsPatient::find($id);

        //Open the Edit View and pass to it the $patient
        return view('unhls_patient.edit')->with('patient', $patient);
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
        //
        $rules = array(
            'name'       => 'required',
            'gender' => 'required',
            'dob' => 'required'

        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->to('unhls_patient/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // Update
            $patient = UnhlsPatient::find($id);
            $patient->patient_number = $request->get('patient_number');
            $patient->nin = $request->get('nin');
            $patient->name = $request->get('name');
            $patient->gender = $request->get('gender');
            $patient->nationality = $request->get('nationality');
            $patient->dob = $request->get('dob');
            $patient->village_residence = $request->get('village_residence');
            $patient->village_workplace = $request->get('village_workplace');
            $patient->occupation = $request->get('occupation');
            $patient->email = $request->get('email');
            $patient->address = $request->get('address');
            $patient->phone_number = $request->get('phone_number');
            $patient->created_by = Auth::user()->id;
            $patient->save();

            // redirect
            $url = Session::get('SOURCE_URL');
            return redirect()->to($url)
                ->with('message', 'The patient details were successfully updated!') ->with('activepatient',$patient ->id);

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
        // if no visit made, soft delete
        $patient = UnhlsPatient::find($id);

        $patientInUse = UnhlsVisit::where('patient_id', '=', $id)->first();
        if (empty($patientInUse)) {
            // The has no visit
            $patient->delete();
        } else {
            // The has visit
            return redirect()->route('unhls_patient.index')
                ->with('message', 'This Patient has visits, not Deleted!');
        }
        // redirect
        return redirect()->route('unhls_patient.index')
            ->with('message', 'Patient Successfully Deleted!');
    }

    /**
     * Return a Patients collection that meets the searched criteria as JSON.
     *
     * @param Request $request
     * @return Response
     */
    public function search(Request $request)
    {
        return UnhlsPatient::search($request->get('text'))->take(config('kblis.limit-items'))->get()->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createEid()
    {
        //Create Patient
        return view('unhls_patient.eidCreate');
    }
}
