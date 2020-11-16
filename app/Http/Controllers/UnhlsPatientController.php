<?php

namespace App\Http\Controllers;

use App\Models\UnhlsVisit;
use Illuminate\Http\Request;
use App\Models\UnhlsPatient;
use App\Models\AdhocConfig;
use App\Models\UuidGenerator;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 *Contains functions for managing patient records
 *
 */
class UnhlsPatientController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return
     */
	public function index(Request $request)
    {

//		$patients = UnhlsPatient::all();
		$patients = UnhlsPatient::paginate(50);
		/*if (count($patients) == 0) {
		 	Session::flash('message', trans('messages.no-match'));
		}*/
		$clinicianUI = AdhocConfig::where('name','Clinician_UI')->first()->activateClinicianUI();


		// Load the view and pass the patients
		return view('unhls_patient.index')
				->with('patients', $patients)
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
		/**return View('unhls_patient.index')i
				->with('patients', $patients)
				->with('clinicianUI', $clinicianUI)
				->withInput(Input::all());*/
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

		return view('unhls_patient.create')->with('ulinFormat', $ulinFormat);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
	public function store(Request $request)
	{
		$this->validate($request, [
			'name'       => 'required',
			'gender' => 'required',
			'dob' => 'required' ,
			'village_residence' => 'required',
			'phone_number' => 'required'
    	]);

		$patient = new UnhlsPatient;
		$patient->patient_number = $request->patient_number;
		$patient->nin = $request->nin;
		$patient->name = $request->name;
		$patient->gender = $request->gender;
		$patient->dob = $request->dob;
		$patient->village_residence = $request->village_residence;
		$patient->village_workplace = $request->village_workplace;
		$patient->occupation = $request->occupation;
		$patient->email = $request->email;
		$patient->address = $request->address;
		$patient->phone_number = $request->phone_number;
		$patient->created_by = Auth::user()->id;

		try{
			$patient->save();
			if ($request->ulin!= '') {
				$patient->ulin = $request->ulin;
			}else{
				$patient->ulin = $patient->getUlin();
			}
			$patient->save();
			$uuid = new UuidGenerator;
			$uuid->counter = 3;
			$uuid->save();

		  /*
			$url = Session::get('SOURCE_URL');
			return Redirect::to($url)
			->with('message', 'Successfully created patient with ULIN:  '.$patient->ulin.'!');
			**/
			//Show the view and pass the $patient to it
			return view('unhls_patient.show')->with('patient', $patient);
		}catch(QueryException $e){
			Log::error($e);
			echo $e->getMessage();
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
	public function update(Request $request, $id)
	{
		//
		$patient = UnhlsPatient::find($id);
		$validator = $this->validate($request, [
			'name'       => 'required',
			'gender' => 'required',
			'dob' => 'required' ,
			'village_residence' => 'required',
			'phone_number' => 'required'
    	]);

		// process the login
		if ($validator) {
			return redirect('unhls_patient/' . $id . '/edit')
				->withErrors($validator)
				->withInput($request->except('password'));
		} else {
			// Update
			$patient->patient_number = $request->patient_number;
			$patient->nin = $request->nin;
			$patient->name = $request->name;
			$patient->gender = $request->gender;
			$patient->dob = $request->dob;

			$patient->village_residence = $request->village_residence;
			$patient->village_workplace = $request->village_workplace;
			$patient->occupation = $request->occupation;
			$patient->email = $request->email;
			$patient->address = $request->address;
			$patient->phone_number = $request->phone_number;
			$patient->created_by = Auth::user()->id;
			$patient->save();

			// redirect
			$url = \Session::get('SOURCE_URL');
			return ($url)
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
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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
			return redirect('unhls_patient.index')
				            ->with('message', 'This Patient has visits, not Deleted!');
		}
		// redirect
		return redirect('unhls_patient.index')
			            ->with('message', 'Patient Successfully Deleted!');
	}

	/**
	 * Return a Patients collection that meets the searched criteria as JSON.
	 *
	 * @return Response
	 */
	public function search()
	{
        return UnhlsPatient::search(Input::get('text'))->take(config('kblis.limit-items'))->get()->toJson();
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
