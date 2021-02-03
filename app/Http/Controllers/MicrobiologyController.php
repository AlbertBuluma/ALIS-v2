<?php

namespace App\Http\Controllers;

use App\Models\AdhocConfig;
use App\Models\District;
use App\Models\Drug;
use App\Models\Facility;
use App\Models\MicroPatientDetail;
use App\Models\PatientAntibiotics;
use App\Models\SpecimenType;
use App\Models\TestCategory;
use App\Models\UnhlsPatient;
use App\Models\UnhlsPurpose;
use App\Models\UnhlsSpecimen;
use App\Models\UnhlsTest;
use App\Models\UnhlsVisit;
use App\Models\UuidGenerator;
use App\Models\Ward;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MicrobiologyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$now = new DateTime();
		$collectionDate = $now->format('Y-m-d H:i');
		$receptionDate = $now->format('Y-m-d H:i');
		$districts = ['Select District']+District::orderBy('name', 'ASC')->pluck('name', 'id')->toArray();
		$wards = ['Select Sample Origin']+Ward::pluck('name', 'id')->toArray();
		$antibiotics = ['']+Drug::orderBy('name','ASC')->pluck('name', 'id')->toArray();
		$specimenTypes = ['select Specimen Type']+SpecimenType::pluck('name', 'id')->toArray();
		$ulinFormat = AdhocConfig::where('name','ULIN')->first()->getULINFormat();
		$facilities = ['Select facility']+Facility::where('active', '=', 1)->pluck('name', 'id')->toArray();
		// Test Category
		$categories = ['Select Lab Section']+TestCategory::where('test_categories.id', '=', 2)->pluck('name', 'id')->toArray();
		$testpurpose = ['Select Test Purpose']+UnhlsPurpose::orderBy('name', 'ASC')->pluck('name', 'id')->toArray();
		$nation = ['0' => 'National', '1' => 'Refugee', '2' => 'Foreigner'];
		$visitType = ['0' => 'Out-patient', '1' => 'In-patient', '2' => 'Referral'];
		return view('microbio.create')
					->with('ward', $wards)
					->with('nation', $nation)
					->with('visitType', $visitType)
					->with('receptionDate', $receptionDate)
					->with('collectionDate', $collectionDate)
					->with('antibiotics', $antibiotics)
					->with('districts', $districts)
					->with('testCategory', $categories)
					->with('specimenType', $specimenTypes)
					->with('facilities', $facilities)
					->with('testpurpose', $testpurpose)
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
			'patient_name' => 'required',
			'gender' => 'required',
			'dob' => 'required' ,
			'nationality' => 'required',
			'patient_number' => 'required',
			'specimen_type' => 'required',
			'clinical_notes' => 'required',
			'facility_transfered' => 'required',
		);
		$validator = Validator::make($request->all(), $rules);

		$antibiotic = $request->get('antibiotic');

		if ($validator->fails()) {

			return redirect()->back()->withErrors($validator)->withInput($request->all());
		} else {

			$nation = ['0' => 'National', '1' => 'Refugee', '2' => 'Foreigner'];
			// store
			$patient = new UnhlsPatient;
			$patient->patient_number = $request->get('patient_number');
			$patient->nin = $request->get('nin');
			$patient->name = $request->get('patient_name');
			$patient->gender = $request->get('gender');
			$patient->nationality = $nation[$request->get('nationality')];
			$patient->dob = $request->get('dob');
			$patient->village_residence = $request->get('village_residence');
			$patient->village_workplace = $request->get('village_workplace');
			$patient->district_residence = $request->get('district_residence');
			$patient->district_workplace = $request->get('district_workplace');
			$patient->admission_date = $request->get('admission_date');
			//$patient->occupation = $request->get('occupation');
			//$patient->email = $request->get('email');
			//$patient->address = $request->get('address');
			$patient->phone_number = $request->get('phone_number');
			$patient->is_micro = 1;
			$patient->created_by = Auth::user()->id;

			$patient->save();
				if ($request->get('ulin')!= '') {
					$patient->ulin = $request->get('ulin');
				}else{
					$patient->ulin = $patient->getUlin();
				}
				$patient->save();
				$uuid = new UuidGenerator;
                $uuid->counter = 0;     // TODO Get default value as 0 from migration
				$uuid->save();

			$patientdetail = new MicroPatientDetail;
			$patientdetail->patient_id = $patient->id;
			$patientdetail->requested_by = $request->get('requested_by');
			$patientdetail->clinician_contact = $request->get('phone_contact');
			$patientdetail->sub_county_residence = $request->get('sub_county_residence');
			$patientdetail->sub_county_workplace = $request->get('sub_county_workplace');
			$patientdetail->name_next_kin = $request->get('name_next_kin');
			$patientdetail->contact_next_kin = $request->get('contact_next_kin');
			$patientdetail->residence_next_kin = $request->get('residence_next_kin');
			$patientdetail->transfered = $request->get('transfered');
			$patientdetail->facility_transfered = $request->get('facility_transfered');
			$patientdetail->clinical_notes = $request->get('clinical_notes');
			//$patientdetail->ward = $request->get('ward');
			$patientdetail->days_on_antibiotic = $request->get('antibiotic_days');

			$patientdetail->save();


			$activeTest = array();

			// On antibiotics --- Lists all antibiotics
			$no_of_drugs = sizeof($antibiotic['drug']);

			if($no_of_drugs>1){
				for($i=0; $i<$no_of_drugs; $i++)
				{
					$drug = new PatientAntibiotics;
					$drug->patient_id = $patient->id;
					$drug->drug_id = $antibiotic['drug'][$i];
					$drug->save();
				}
			}

			$visitType = ['0' => 'Out-patient', '1' => 'In-patient', '2' => 'Referral'];

			/*
			 * - Create a visit
			 * - Fields required: visit_type, patient_id
			 */
			$visit = new UnhlsVisit;
			$visit->patient_id = $patient->id;
			$visit->visit_type = $visitType[$request->get('visit_type')];
			$visit->ward_id = $request->get('ward');
			$visit->bed_no = $request->get('bed_no');
			$visit->facility_id = $request->get('facility');
			$visit->facility_lab_number = $request->get('facility_lab_number');
			$visit->hospitalized = $request->get('hospitalized');
			$visit->on_antibiotics = $request->get('onAntibiotics');
			$visit->save();


			/*
			 * - Create tests requested
			 * - Fields required: visit_id, test_type_id, specimen_id, test_status_id, created_by, requested_by
			 */
            $testLists = $request->get('test_list');
            if(is_array($testLists)){
                foreach ($testLists as $testList) {
                    // Create Specimen - specimen_type_id, accepted_by, referred_from, referred_to
                    $specimen = new UnhlsSpecimen;
                    $specimen->specimen_type_id = $testList['specimen_type_id'];
                    $specimen->accepted_by = Auth::user()->id;
                    $specimen->time_collected = $request->get('collection_date');
                    $specimen->time_accepted = $request->get('reception_date');
                    $specimen->save();
                    foreach ($testList['test_type_id'] as $id) {
                        $testTypeID = (int)$id;

                        $test = new UnhlsTest;
                        $test->visit_id = $visit->id;
                        $test->test_type_id = $testTypeID;
                        $test->specimen_id = $specimen->id;
                        $test->test_status_id = UnhlsTest::PENDING;
                        $test->created_by = Auth::user()->id;
                        //$test->requested_by = $request->get('clinician');
                        //$test->purpose = $request->get('hiv_purpose');
                        $test->save();

                        $activeTest[] = $test->id;
                    }
                }
            }

			$url = Session::get('SOURCE_URL');

			return redirect()->to($url)->with('message', 'messages.success-creating-test')
					->with('activeTest', $activeTest);

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
		$patient = UnhlsPatient::find($id);
		$now = new DateTime();
		$collectionDate = $now->format('Y-m-d H:i');
		$receptionDate = $now->format('Y-m-d H:i');
		$districts = ['Select District']+District::orderBy('name', 'ASC')->pluck('name', 'id')->toArray();
		$wards = ['Select Sample Origin']+Ward::pluck('name', 'id')->toArray();
		$antibiotics = ['']+Drug::orderBy('name','ASC')->pluck('name', 'id')->toArray();
		$specimenTypes = ['select Specimen Type']+SpecimenType::pluck('name', 'id')->toArray();
		$ulinFormat = AdhocConfig::where('name','ULIN')->first()->getULINFormat();
		$facilities = ['Select facility']+Facility::where('active', '=', 1)->pluck('name', 'id')->toArray();
		// Test Category
		$categories = ['Select Lab Section']+TestCategory::pluck('name', 'id')->toArray();
		$testpurpose = ['Select Test Purpose']+UnhlsPurpose::orderBy('name', 'ASC')->pluck('name', 'id')->toArray();
		$patientAntibiotics = PatientAntibiotics::where('patient_id', $patient->id)->pluck('drug_id')->toArray();
		$nation = ['0' => 'National', '1' => 'Refugee', '2' => 'Foreigner'];
		$visits = UnhlsVisit::find($id);
		//dd($patientAntibiotics);
		return view('microbio.edit')
					->with('patient', $patient)
					->with('ward', $wards)
					->with('visits', $visits)
					->with('nation', $nation)
					->with('receptionDate', $receptionDate)
					->with('collectionDate', $collectionDate)
					->with('antibiotics', $antibiotics)
					->with('districts', $districts)
					->with('testCategory', $categories)
					->with('specimenType', $specimenTypes)
					->with('patientAntibiotics', $patientAntibiotics)
					->with('facilities', $facilities)
					->with('testpurpose', $testpurpose)
					->with('ulinFormat', $ulinFormat);
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
			'patient_name' => 'required',
			'gender' => 'required',
			'dob' => 'required' ,
			'nationality' => 'required',
			'patient_number' => 'required',
		);
		$validator = Validator::make($request->all(), $rules);

		$antibiotic = $request->get('antibiotic');

		if ($validator->fails()) {

			return redirect()->back()->withErrors($validator)->withInput($request->all());
		} else {

			$nation = ['0' => 'National', '1' => 'Refugee', '2' => 'Foreigner'];
			// store
			$patient = UnhlsPatient::find($id);
			$patient->patient_number = $request->get('patient_number');
			$patient->nin = $request->get('nin');
			$patient->name = $request->get('patient_name');
			$patient->gender = $request->get('gender');
			$patient->nationality = $nation[$request->get('nationality')];
			$patient->dob = $request->get('dob');
			$patient->village_residence = $request->get('village_residence');
			$patient->village_workplace = $request->get('village_workplace');
			$patient->district_residence = $request->get('district_residence');
			$patient->district_workplace = $request->get('district_workplace');
			$patient->admission_date = $request->get('admission_date');
			//$patient->occupation = $request->get('occupation');
			//$patient->email = $request->get('email');
			//$patient->address = $request->get('address');
			$patient->phone_number = $request->get('phone_number');
			$patient->is_micro = 1;
			$patient->created_by = Auth::user()->id;

			$patient->save();
				if ($request->get('ulin')!= '') {
					$patient->ulin = $request->get('ulin');
				}else{
					$patient->ulin = $patient->getUlin();
				}
				$patient->save();
				$uuid = new UuidGenerator;
				$uuid->save();

			// $patientdetail = MicroPatientDetail::find($id);
			// $patientdetail->patient_id = $patient->id;
			// $patientdetail->requested_by = $request->get('requested_by');
			// $patientdetail->clinician_contact = $request->get('phone_contact');
			// $patientdetail->sub_county_residence = $request->get('sub_county_residence');
			// $patientdetail->sub_county_workplace = $request->get('sub_county_workplace');
			// $patientdetail->name_next_kin = $request->get('name_next_kin');
			// $patientdetail->contact_next_kin = $request->get('contact_next_kin');
			// $patientdetail->residence_next_kin = $request->get('residence_next_kin');
			// $patientdetail->transfered = $request->get('transfered');
			// $patientdetail->facility_transfered = $request->get('facility_transfered');
			// $patientdetail->clinical_notes = $request->get('clinical_notes');
			// //$patientdetail->ward = $request->get('ward');
			// $patientdetail->days_on_antibiotic = $request->get('antibiotic_days');


			// $patientdetail->save();

			$visitType = ['Out-patient','In-patient', 'Referral'];
			$activeTest = array();

			// On antibiotics --- Lists all antibiotics
			$no_of_drugs = sizeof($antibiotic['drug']);

			if($no_of_drugs>1){
				for($i=0; $i<$no_of_drugs; $i++)
				{
					$drug = PatientAntibiotics::find($id);
					$drug->patient_id = $patient->id;
					$drug->drug_id = $antibiotic['drug'][$i];
					$drug->save();
				}
			}

			/*
			 * - Create a visit
			 * - Fields required: visit_type, patient_id
			 */
			$visit = UnhlsVisit::find($id);
			$visit->patient_id = $patient->id;
			$visit->visit_type = $visitType[$request->get('visit_type')];
			$visit->ward_id = $request->get('ward');
			$visit->bed_no = $request->get('bed_no');
			//$visit->facility_id = $request->get('facility');
			$visit->facility_lab_number = $request->get('facility_lab_number');
			$visit->hospitalized = $request->get('hospitalized');
			$visit->on_antibiotics = $request->get('onAntibiotics');
			$visit->save();


			/*
			 * - Create tests requested
			 * - Fields required: visit_id, test_type_id, specimen_id, test_status_id, created_by, requested_by
			 */
            $testLists = $request->get('test_list');
            if(is_array($testLists)){
                foreach ($testLists as $testList) {
                    // Create Specimen - specimen_type_id, accepted_by, referred_from, referred_to
                    $specimen = new UnhlsSpecimen;
                    $specimen->specimen_type_id = $testList['specimen_type_id'];
                    $specimen->accepted_by = Auth::user()->id;
                    $specimen->time_collected = $request->get('collection_date');
                    $specimen->time_accepted = $request->get('reception_date');
                    $specimen->save();
                    foreach ($testList['test_type_id'] as $id) {
                        $testTypeID = (int)$id;

                        $test = new UnhlsTest;
                        $test->visit_id = $visit->id;
                        $test->test_type_id = $testTypeID;
                        $test->specimen_id = $specimen->id;
                        $test->test_status_id = UnhlsTest::PENDING;
                        $test->created_by = Auth::user()->id;
                        //$test->requested_by = $request->get('clinician');
                        $test->purpose = $request->get('testpurpose');
                        $test->save();

                        $activeTest[] = $test->id;
                    }
                }
            }

			$url = Session::get('SOURCE_URL');

			return redirect()->to($url)->with('message', 'messages.success-creating-test')
					->with('activeTest', $activeTest);

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


}
