<?php

class VisitController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// the phlebotomist will recieved the specimen and attach it to test of that patient that has no specimen

		// on registering a patient auto generate a visit?

		$fromRedirect = Session::pull('fromRedirect');

		if($fromRedirect){
			$input = Session::get('TESTS_FILTER_INPUT');
		}else{
			$input = Input::except('_token');
		}

		$searchString = isset($input['search'])?$input['search']:'';

		if (Auth::user()->can('manage_visits')) {
			$visitStatusId = isset($input['visit_status'])?$input['visit_status']:'';
		}elseif (Auth::user()->can('make_labrequests')) {
			$visitStatusId = UnhlsVisit::APPOINTMENT_MADE;
		}else{
			// for the guy in the lab with no permission to manage visits
			$visitStatusId = UnhlsVisit::TEST_REQUEST_MADE;
		}
		$dateFrom = isset($input['date_from'])?$input['date_from']:date('Y-m-d');
		$dateTo = isset($input['date_to'])?$input['date_to']:date('Y-m-d');

		// Search Conditions
		if($searchString||$visitStatusId||$dateFrom||$dateTo){
			if ($searchString != '') {
				$dateFrom = '';
				$dateTo = '';
			}

			$visits = UnhlsVisit::search($searchString, $visitStatusId, $dateFrom, $dateTo);

			if (count($visits) == 0) {
				Session::flash('message', trans('messages.empty-search'));
			}
		}
		else
		{
			// List all the active visits
			$visits = UnhlsVisit::orderBy('created_at', 'ASC');
		}

		// Create Visit Statuses array. Include a first entry for ALL
		$statuses = array('all')+VisitStatus::all()->lists('name','id');

		foreach ($statuses as $key => $value) {
			$statuses[$key] = trans("messages.$value");
		}

		// Pagination
		$visits = $visits->paginate(Config::get('kblis.page-items'))->appends($input);
		$clinicianUI = AdhocConfig::where('name','Clinician_UI')->first()->activateClinicianUI();

		// Load the view and pass it the visits
		return View::make('visit.index')
					->with('visits', $visits)
					->with('visitStatus', $statuses)
					->with('dateFrom', $dateFrom)
					->with('dateTo', $dateTo)
					->with('clinicianUI', $clinicianUI)
					->withInput($input);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($patientID)
	{
		$wards = ['Select Sample Origin']+Ward::lists('name', 'id');

		$patient = UnhlsPatient::find($patientID);

		//Load Test Create View
		return View::make('visit.create')
					->with('patient', $patient)
					->with('ward', $wards);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Create New Test
		$rules = array(
			'visit_type' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::route('visit.create', 
				array(Input::get('patient_id')))->withInput()->withErrors($validator);
		} else {

			$visitType = ['Out-patient','In-patient'];

			/*
			 * - Create a visit
			 * - Fields required: visit_type, patient_id
			 */
			$visit = new UnhlsVisit;
			$visit->patient_id = Input::get('patient_id');
			$visit->visit_type = $visitType[Input::get('visit_type')];
			$visit->visit_status_id = UnhlsVisit::APPOINTMENT_MADE;
			$visit->ward_id = Input::get('ward_id');
			$visit->bed_no = Input::get('bed_no');
			$visit->save();
			return Redirect::route('visit.index')->with('message', 'Appointment Successfully Made');
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
		// list tests in the view... perhaps with results for the clinician
		$visit = UnhlsVisit::find($id);
		return View::make('visit.show')
					->with('visit', $visit);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//Create a Lab categories Array
		$categories = ['Select Lab Section']+TestCategory::lists('name', 'id');
		$wards = ['Select Sample Origin']+Ward::lists('name', 'id');

		// sample collection default details
		$now = new DateTime();
		$collectionDate = $now->format('Y-m-d H:i');
		$receptionDate = $now->format('Y-m-d H:i');

		$fromRedirect = Session::pull('TEST_CATEGORY');

		if($fromRedirect){
			$input = Session::get('TEST_CATEGORY');
		}else{
			$input = Input::except('_token');
		}

		$specimenTypes = ['select Specimen Type']+SpecimenType::lists('name', 'id');

		$visit = UnhlsVisit::find($id);

		//Load Test Create View
		return View::make('visit.edit')
					->with('collectionDate', $collectionDate)
					->with('receptionDate', $receptionDate)
					->with('specimenType', $specimenTypes)
					->with('visit', $visit)
					->with('testCategory', $categories)
					->with('ward', $wards);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$visit = UnhlsVisit::find($id);
		if ($visit->isAppointment()) {
			//test request rules
			$rules = array(
				'physician' => 'required',
				'test_list' => 'required',
			);
		}elseif ($visit->isRequest()) {
			//if visit is a request, specimen reception rules
			$rules = array(
				'collection_date' => 'required',
				'reception_date' => 'required',
				'tests' => 'required',
				'specimen_type' => 'required|non_zero_key',
			);
		}

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::route('visit.edit', [$id])->withInput()->withErrors($validator);
		} else {

			if ($visit->isAppointment()) {

				$therapy = new Therapy;
				$therapy->patient_id = $visit->patient->id;
				$therapy->visit_id = $visit->id;
				$therapy->previous_therapy = Input::get('previous_therapy');
				$therapy->current_therapy = Input::get('current_therapy');
				$therapy->clinical_notes = Input::get('clinical_notes');
				$therapy->clinician = Input::get('clinician');
				$therapy->contact = Input::get('contact');
				$therapy->save();

				/*
				 * - Create tests requested
				 * - Fields required: visit_id, test_type_id, specimen_id, test_status_id, created_by, requested_by
				 */
				$testLists = Input::get('test_list');
				if(is_array($testLists)){
					foreach ($testLists as $testList) {
						foreach ($testList['test_type_id'] as $id) {
							$testTypeID = (int)$id;

							$test = new UnhlsTest;
							$test->visit_id = $visit->id;
							$test->test_type_id = $testTypeID;
							$test->test_status_id = UnhlsTest::SPECIMEN_NOT_RECEIVED;
							$test->created_by = Auth::user()->id;
							$test->requested_by = Input::get('physician');
							$test->save();
						}
					}
				}
				$visit->visit_status_id = UnhlsVisit::TEST_REQUEST_MADE;
				$visit->save();
				$message = 'Requests Successfully Made';
			}elseif ($visit->isRequest()) {
				/*
				 * - Create Specimen received
				 * - Fields required: visit_id, test_type_id, specimen_id, test_status_id
				 */
				$tests = Input::get('tests');
				// Create Specimen - specimen_type_id, accepted_by, referred_from, referred_to
				$specimen = new UnhlsSpecimen;
				$specimen->specimen_type_id = Input::get('specimen_type');
				$specimen->accepted_by = Auth::user()->id;
				$specimen->time_collected = Input::get('collection_date');
				$specimen->time_accepted = Input::get('reception_date');
				$specimen->save();
				$i = 0;
				foreach ($tests as $id) {
					$i++;
					$testID = (int)$id;

					$test = UnhlsTest::find($testID);
					$test->specimen_id = $specimen->id;
					$test->test_status_id = UnhlsTest::PENDING;
					$test->save();
				}
				// check if all tests of the visit has a specimen assigned
				if (Input::get('testsWithoutSpecimen') == $i) {
					$visit->visit_status_id = UnhlsVisit::SPECIMEN_RECEIVED;
					$visit->save();
				}
				$message = 'Specimen Successfully Received';
			}
			return Redirect::route('visit.index')->with('message', $message);
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
		// if no request made, receptionist delete
		$visit = UnhlsVisit::find($id);

		$visitInUse = UnhlsTest::where('visit_id', '=', $id)->first();
		if (empty($visitInUse)) {
			// The test is not in use
			$visit->delete();
		} else {
			// The test is in use
			return Redirect::route('visit.index')
				->with('message', 'This Visit has requests, not Deleted!');
		}
		// redirect
		return Redirect::route('visit.index')
			->with('message', 'Visit Successfully Deleted!');
	}

	/**
	 *Select all tests under a selected test Category - Test Menu
	 *
	 * @return Response
	 */
	// change name to request testlist, or more understandable naming
	public function testList()
	{
		$testCategoryId =Input::get('test_category_id');

		$testCategory = TestCategory::find($testCategoryId);
		$testTypes = $testCategory->testTypes;

		return View::make('visit.testTypeList')
			->with('testTypes', $testTypes);
	}

	public function getAddTest($id)
	{
		//Create a Lab categories Array
		$categories = ['Select Lab Section']+TestCategory::lists('name', 'id');
		// $wards = ['Select Sample Origin']+Ward::lists('name', 'id');

		// sample collection default details
		$now = new DateTime();
		$collectionDate = $now->format('Y-m-d H:i');
		$receptionDate = $now->format('Y-m-d H:i');

		$fromRedirect = Session::pull('TEST_CATEGORY');

		if($fromRedirect){
			$input = Session::get('TEST_CATEGORY');
		}else{
			$input = Input::except('_token');
		}

		$specimenTypes = ['select Specimen Type']+SpecimenType::lists('name', 'id');

		$visit = UnhlsVisit::find($id);
		$clinicianUI = AdhocConfig::where('name','Clinician_UI')->first()->activateClinicianUI();

		// if else clinician UI is active, and dude is clinician
		if ($clinicianUI && Auth::user()->can('make_labrequests')) {
			$view = 'visit.clinicianAddTest';
		}else{
			$view = 'visit.technologistAddTest';
		}

		//Load Test Create View
		return View::make($view)
					->with('collectionDate', $collectionDate)
					->with('receptionDate', $receptionDate)
					->with('specimenType', $specimenTypes)
					->with('visit', $visit)
					->with('testCategory', $categories);
					// ->with('ward', $wards);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function clinicianPostAddTest($id)
	{
		$rules = array(
			'physician' => 'required',
			'test_list' => 'required',
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::route('visit.addtest', [$id])->withInput()->withErrors($validator);
		} else {
			$visit = UnhlsVisit::find($id);

			$therapy = new Therapy;
			$therapy->patient_id = $visit->patient->id;
			$therapy->visit_id = $visit->id;
			$therapy->previous_therapy = Input::get('previous_therapy');
			$therapy->current_therapy = Input::get('current_therapy');
			$therapy->clinical_notes = Input::get('clinical_notes');
			$therapy->clinician = Input::get('clinician');
			$therapy->contact = Input::get('contact');
			$therapy->save();

			/*
			 * - Create tests requested
			 * - Fields required: visit_id, test_type_id, specimen_id, test_status_id, created_by, requested_by
			 */
			$testLists = Input::get('test_list');
			if(is_array($testLists)){
				foreach ($testLists as $testList) {
					foreach ($testList['test_type_id'] as $id) {
						$testTypeID = (int)$id;

						$test = new UnhlsTest;
						$test->visit_id = $visit->id;
						$test->test_type_id = $testTypeID;
						$test->test_status_id = UnhlsTest::SPECIMEN_NOT_RECEIVED;
						$test->created_by = Auth::user()->id;
						$test->requested_by = Input::get('physician');
						$test->save();
					}
				}
			}
			$visit->visit_status_id = UnhlsVisit::TEST_REQUEST_MADE;
			$visit->save();

			return Redirect::route('visit.show', [$test->visit_id])
				->with('message', 'Test Successfully Added!');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function technologistPostAddTest($id)
	{
		$rules = array(
			'test_list' => 'required',
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::route('visit.addtest', [$id])->withInput()->withErrors($validator);
		} else {
			$visit = UnhlsVisit::find($id);

			$therapy = new Therapy;
			$therapy->patient_id = $visit->patient->id;
			$therapy->visit_id = $visit->id;
			$therapy->previous_therapy = Input::get('previous_therapy');
			$therapy->current_therapy = Input::get('current_therapy');
			$therapy->clinical_notes = Input::get('clinical_notes');
			$therapy->clinician = Input::get('clinician');
			$therapy->contact = Input::get('contact');
			$therapy->save();

			/*
			 * - Create tests requested
			 * - Fields required: visit_id, test_type_id, specimen_id, test_status_id, created_by, requested_by
			 */
			$testLists = Input::get('test_list');
            if(is_array($testLists)){
                foreach ($testLists as $testList) {
                    // Create Specimen - specimen_type_id, accepted_by, referred_from, referred_to
                    $specimen = new UnhlsSpecimen;
                    $specimen->specimen_type_id = $testList['specimen_type_id'];
                    $specimen->accepted_by = Auth::user()->id;
                    $specimen->time_collected = Input::get('collection_date');
                    $specimen->time_accepted = Input::get('reception_date');
                    $specimen->save();
                    foreach ($testList['test_type_id'] as $id) {
                        $testTypeID = (int)$id;

                        $test = new UnhlsTest;
                        $test->visit_id = $visit->id;
                        $test->test_type_id = $testTypeID;
                        $test->specimen_id = $specimen->id;
                        $test->test_status_id = UnhlsTest::PENDING;
                        $test->created_by = Auth::user()->id;
                        $test->requested_by = Input::get('physician');
                        $test->purpose = Input::get('hiv_purpose');
                        $test->save();

                        $activeTest[] = $test->id;
                    }
                }
            }
			$visit->visit_status_id = UnhlsVisit::TEST_REQUEST_MADE;
			$visit->save();

			return Redirect::route('visit.show', [$test->visit_id])
				->with('message', 'Test Successfully Added!');
		}
	}
}
