<?php
namespace App\Http\Controllers;

use AnalyticSpecimenRejection;
use AnalyticSpecimenRejectionReason;
use App\Models\Clinician;
use App\Models\Measure;
use App\Models\POCResult;
use App\Models\Referral;
use App\Models\ReferralReason;
use App\Models\RejectionReason;
use App\Models\SpecimenType;
use App\Models\TestCategory;
use App\Models\Therapy;
use App\Models\UNHLSFacility;
use App\Models\UnhlsPatient;
use App\Models\UnhlsSpecimen;
use App\Models\UnhlsTestResult;
use App\Models\Ward;
use DateTime;
use Illuminate\Database\QueryException;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use App\Models\UnhlsVisit;
use App\Models\UnhlsTest;
use App\Models\TestStatus;
use App\Models\Barcode;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Contains test resources
 *
 */
class UnhlsTestController extends Controller {

    /**
     * Display a listing of Tests. Factors in filter parameters
     * The search string may match: patient_number, patient name, test type name, specimen ID or visit ID
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function index(Request $request)
	{
		$fromRedirect = $request->session()->pull('fromRedirect');

		if($fromRedirect){

			$input = $request->session()->get('TESTS_FILTER_INPUT');

		}else{

			$input = $request->token;
		}

        $input['search'] = $request->get('search');
        $input['test_status'] = $request->get('test_status');
        $input['date_from'] = $request->get('date_from');
        $input['date_to'] = $request->get('date_to');


		$searchString = isset($input['search']) ? $input['search'] : '';
		$testStatusId = isset($input['test_status']) ? $input['test_status'] : '';

		if (isset($input['date_from'])) {
			$dateFrom = $input['date_from'];
		}else{
			$dateFrom = date('Y-m-d');
			$input['date_from'] = date('Y-m-d');
		}
		$dateTo = isset($input['date_to']) ? $input['date_to'] : '';

		// Search Conditions
		if($searchString||$testStatusId||$dateFrom||$dateTo){
			if ($searchString != '') {
				$dateFrom = '';
				$dateTo = '';
			}

			$tests = UnhlsTest::search($searchString, $testStatusId, $dateFrom, $dateTo);

			/*if (count($tests) == 0) {
				\Session::flash('message', trans('messages.empty-search'));
			}*/
		}
		else
		{
			// List all the active tests
			$tests = UnhlsTest::orderBy('time_created', 'ASC');
		}

		// Create Test Statuses array. Include a first entry for ALL
		//$statuses = array('all')+TestStatus::all()->pluck('name','id');
		$statuses = TestStatus::all()->pluck('name','id');

		foreach ($statuses as $key => $value) {
			$statuses[$key] = trans("messages.$value");
		}

		// Pagination
		$tests = $tests->paginate(config('kblis.page-items'))->appends($input);

		//	Barcode
		$barcode = Barcode::first();

		// Load the view and pass it the tests
		return view('unhls_test.index')
					->with('testSet', $tests)
					->with('testStatus', $statuses)
					->with('barcode', $barcode)
					->with('dateFrom', $dateFrom)
					->with('dateTo', $dateTo)
					->with('request', $request);
	}

	/**
	 * Listing of Completed tests
	 *@param
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function completed(Request $request)
	{
		$fromRedirect = $request->session()->pull('fromRedirect');

		if($fromRedirect){

			$input = $request->session()->get('TESTS_FILTER_INPUT');

		}else{

			$input['token'] = $request->except('_token');
		}


        $input['search'] = $request->get('search');
        $input['test_status'] = $request->get('test_status');
        $input['date_from'] = $request->get('date_from');
        $input['date_to'] = $request->get('date_to');

		$searchString = isset($input['search'])?$input['search']:'';
		$testStatusId = '4';
		if (isset($input['date_from'])) {
			$dateFrom = $input['date_from'];
		}else{
			$dateFrom = date('Y-m-d');
			$input['date_from'] = date('Y-m-d');
		}
		$dateTo = isset($input['date_to'])?$input['date_to']:'';
		$tests = UnhlsTest::completedTests();

				// Search Conditions
		if($searchString||$testStatusId||$dateFrom||$dateTo){

			$tests = UnhlsTest::completedTests($searchString, $testStatusId, $dateFrom, $dateTo);

			if (count($tests->get()) == 0) {
                $request->session()->flash('message', trans('messages.empty-search'));
			}
		}
		else{
		// List all the active tests
			$tests = UnhlsTest::orderBy('time_created', 'DESC');
		}

		// Create Test Statuses array. Include a first entry for ALL
		$statuses = TestStatus::pluck('name','id')->toArray();
        array_push($statuses, 'all');

		foreach ($statuses as $key => $value) {
			$statuses[$key] = trans("messages.$value");
		}

		// Pagination
		$tests = $tests->paginate(config('kblis.page-items'))->appends($input);

		//	Barcode
		$barcode = Barcode::first();

		return view('unhls_test.index')
					->with('testSet', $tests)
					->with('testStatus', $statuses)
					->with('dateFrom', $dateFrom)
					->with('dateTo', $dateTo)
					->with('barcode', $barcode)
					->with('request', $request = $input);
//					->withInput($input);

	}


	/**
	 * Listing of pending tests
	 *@param
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function pending(Request $request)
	{
		$fromRedirect = $request->session()->pull('fromRedirect');

		if($fromRedirect){

			$input = $request->session()->get('TESTS_FILTER_INPUT');

		}else{

			$input['token'] = $request->except('_token');
		}

        $input['search'] = $request->get('search');
        $input['test_status'] = $request->get('test_status');
        $input['date_from'] = $request->get('date_from');
        $input['date_to'] = $request->get('date_to');

		$searchString = isset($input['search'])?$input['search']:'';
		$testStatusId = '2';
		if (isset($input['date_from'])) {
			$dateFrom = $input['date_from'];
		}else{
			$dateFrom = date('Y-m-d');
			$input['date_from'] = date('Y-m-d');
		}
		$dateTo = isset($input['date_to'])?$input['date_to']:'';

				// Search Conditions
		if($searchString||$testStatusId||$dateFrom||$dateTo){

			$tests = UnhlsTest::pendingTests($searchString, $testStatusId, $dateFrom, $dateTo);

			if (count($tests->get()) == 0) {
                $request->session()->flash('message', trans('messages.empty-search'));
			}
		}
		else
		{
		// List all the active tests
			$tests = UnhlsTest::orderBy('time_created', 'DESC');
		}

		// Create Test Statuses array. Include a first entry for ALL
		$statuses = TestStatus::pluck('name','id')->toArray();
        array_push($statuses, 'all');

        foreach ($statuses as $key => $value) {
			$statuses[$key] = trans("messages.$value");
		}

		// Pagination
		$tests = $tests->paginate(config('kblis.page-items'))->appends($input);

		//	Barcode
		$barcode = Barcode::first();

		return view('unhls_test.index')
					->with('testSet', $tests)
					->with('testStatus', $statuses)
					->with('dateFrom', $dateFrom)
					->with('dateTo', $dateTo)
					->with('barcode', $barcode)
                    ->with('request', $request = $input);
//					->withInput($input);

	}


	/**
	 * Listing of started tests
	 *@param
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function started(Request $request)
	{
		$fromRedirect = $request->session()->pull('fromRedirect');

		if($fromRedirect){

			$input = $request->session()->get('TESTS_FILTER_INPUT');

		}else{

			$input['token'] = $request->except('_token');
		}

        $input['search'] = $request->get('search');
        $input['test_status'] = $request->get('test_status');
        $input['date_from'] = $request->get('date_from');
        $input['date_to'] = $request->get('date_to');

		$searchString = isset($input['search'])?$input['search']:'';
		$testStatusId = '3';
		if (isset($input['date_from'])) {
			$dateFrom = $input['date_from'];
		}else{
			$dateFrom = date('Y-m-d');
			$input['date_from'] = date('Y-m-d');
		}
		$dateTo = isset($input['date_to'])?$input['date_to']:'';

				// Search Conditions
		if($searchString||$testStatusId||$dateFrom||$dateTo){

			$tests = UnhlsTest::startedTests($searchString, $testStatusId, $dateFrom, $dateTo);

			if (count($tests->get()) == 0) {
                $request->session()->flash('message', trans('messages.empty-search'));
			}
		}
		else
		{
		// List all the active tests
			$tests = UnhlsTest::orderBy('time_created', 'DESC');
		}

		// Create Test Statuses array. Include a first entry for ALL
        $statuses = TestStatus::pluck('name','id')->toArray();
        array_push($statuses, 'all');

		foreach ($statuses as $key => $value) {
			$statuses[$key] = trans("messages.$value");
		}

		// Pagination
		$tests = $tests->paginate(config('kblis.page-items'))->appends($input);

		//	Barcode
		$barcode = Barcode::first();

		return view('unhls_test.index')
					->with('testSet', $tests)
					->with('testStatus', $statuses)
					->with('dateFrom', $dateFrom)
					->with('dateTo', $dateTo)
					->with('barcode', $barcode)
                    ->with('request', $request = $input);
//					->withInput($input);

	}


	/**
	 * Listing of samples not yet recieved
	 *@param
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function notRecieved(Request $request)
	{
		$fromRedirect = $request->session()->pull('fromRedirect');

		if($fromRedirect){

			$input = $request->session()->get('TESTS_FILTER_INPUT');

		}else{

			$input['token'] = $request->except('_token');
		}

        $input['search'] = $request->get('search');
        $input['test_status'] = $request->get('test_status');
        $input['date_from'] = $request->get('date_from');
        $input['date_to'] = $request->get('date_to');

		$searchString = isset($input['search'])?$input['search']:'';
		$testStatusId = '1';
		if (isset($input['date_from'])) {
			$dateFrom = $input['date_from'];
		}else{
			$dateFrom = date('Y-m-d');
			$input['date_from'] = date('Y-m-d');
		}
		$dateTo = isset($input['date_to'])?$input['date_to']:'';

				// Search Conditions
		if($searchString||$testStatusId||$dateFrom||$dateTo){

			$tests = UnhlsTest::startedTests($searchString, $testStatusId, $dateFrom, $dateTo);

			if (count($tests->get()) == 0) {
                $request->session()->flash('message', trans('messages.empty-search'));
			}
		}
		else
		{
		// List all the active tests
			$tests = UnhlsTest::orderBy('time_created', 'DESC');
		}

		// Create Test Statuses array. Include a first entry for ALL
        $statuses = TestStatus::pluck('name','id')->toArray();
        array_push($statuses, 'all');

		foreach ($statuses as $key => $value) {
			$statuses[$key] = trans("messages.$value");
		}

		// Pagination
		$tests = $tests->paginate(config('kblis.page-items'))->appends($input);

		//	Barcode
		$barcode = Barcode::first();

		return view('unhls_test.index')
					->with('testSet', $tests)
					->with('testStatus', $statuses)
					->with('dateFrom', $dateFrom)
					->with('dateTo', $dateTo)
					->with('barcode', $barcode)
                    ->with('request', $request = $input);
//					->withInput($input);

	}



	/**
	 * Listing of verified tests
	 *@param
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function verified(Request $request)
	{
		$fromRedirect = $request->session()->pull('fromRedirect');

		if($fromRedirect){

			$input = $request->session()->get('TESTS_FILTER_INPUT');

		}else{

            $input['token'] = $request->except('_token');
		}

        $input['search'] = $request->get('search');
        $input['test_status'] = $request->get('test_status');
        $input['date_from'] = $request->get('date_from');
        $input['date_to'] = $request->get('date_to');

		$searchString = isset($input['search'])?$input['search']:'';
		$testStatusId = '5';
		if (isset($input['date_from'])) {
			$dateFrom = $input['date_from'];
		}else{
			$dateFrom = date('Y-m-d');
			$input['date_from'] = date('Y-m-d');
		}
		$dateTo = isset($input['date_to'])?$input['date_to']:'';

				// Search Conditions
		if($searchString||$testStatusId||$dateFrom||$dateTo){

			$tests = UnhlsTest::verified($searchString, $testStatusId, $dateFrom, $dateTo);

			if (count($tests->get()) == 0) {
                $request->session()->flash('message', trans('messages.empty-search'));
			}
		}
		else
		{
		// List all the active tests
			$tests = UnhlsTest::orderBy('time_created', 'DESC');
		}

		// Create Test Statuses array. Include a first entry for ALL
        $statuses = TestStatus::pluck('name','id')->toArray();
        array_push($statuses, 'all');

		foreach ($statuses as $key => $value) {
			$statuses[$key] = trans("messages.$value");
		}

		// Pagination
		$tests = $tests->paginate(config('kblis.page-items'))->appends($input);

		//	Barcode
		$barcode = Barcode::first();

		return view('unhls_test.index')
					->with('testSet', $tests)
					->with('testStatus', $statuses)
					->with('barcode', $barcode)
					->with('dateFrom', $dateFrom)
					->with('dateTo', $dateTo)
                    ->with('request', $request = $input);
//					->withInput($input);

	}



	/**
	 * Recieve a Test from an external system
	 *
	 * @param
	 * @return Response
	 */
	public function receive($id)
	{
		$test = UnhlsTest::find($id);
		$test->test_status_id = UnhlsTest::PENDING;
		$test->time_created = date('Y-m-d H:i:s');
		$test->created_by = Auth::user()->id;
		$test->save();

		return $id;
	}

    /**
     *Select all tests under a selected test Category - Test Menu
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function testList(Request $request)
	{
		$testCategoryId = $request->get('test_category_id');
		$specimenTypeId = $request->get('specimen_type_id');

		$specimenType = SpecimenType::find($specimenTypeId);
		$testTypes = $specimenType->testTypes;

		return view('unhls_test.testTypeList')
			->with('testCategoryId', $testCategoryId)
			->with('testTypes', $testTypes);
	}

    /**
     * Display a form for creating a new Test.
     *
     * @param Request $request
     * @param int $patientID
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function create(Request $request, $patientID = 0)
	{
		if ($patientID == 0) {
			$patientID = $request->get('patient_id');
		}

		//Create a Lab categories Array
        $categories = $wards = $clinicians = [];
		$categories = TestCategory::pluck('name', 'id')->toArray();
		array_unshift($categories, 'Select Lab Section');

		$wards = Ward::pluck('name', 'id')->toArray();
        array_unshift($wards, 'Select Sample Origin');

		$clinicians = Clinician::pluck('name', 'id')->toArray();
        array_unshift($wards, 'Select clinician');

		// sample collection default details
		$now = new DateTime();
		$collectionDate = $now->format('Y-m-d H:i');
		$receptionDate = $now->format('Y-m-d H:i');

		$fromRedirect = $request->session()->pull('TEST_CATEGORY');

		if($fromRedirect){
			$input = $request->session()->get('TEST_CATEGORY');
		}else{
			$input =$request->except('_token');
		}

		$specimenTypes = SpecimenType::pluck('name', 'id')->toArray();
		array_unshift($specimenTypes, 'select Specimen Type');

		$patient = UnhlsPatient::find($patientID);

		//Load Test Create View
		return view('unhls_test.create')
					->with('collectionDate', $collectionDate)
					->with('receptionDate', $receptionDate)
					->with('specimenType', $specimenTypes)
					->with('patient', $patient)
					->with('testCategory', $categories)
					->with('ward', $wards)
					->with('clinicians',$clinicians);
	}

	public function getWards(Request $request, $ward_type_id = 0){

		if($ward_type_id == 0){
			$ward_type_id = $request->get('ward_type_id');

		}else{
			$wards = Ward::where('ward_type_id','=',$ward_type_id)->get();



		}


		return $wards;

	}

	public function getClinician($id){
		$clinician = Clinician::find($id);
		return $clinician;
	}

    /**
     * Save a new Test.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function saveNewTest(Request $request)
	{

		//Create New Test
		$rules = array(
			'visit_type' => 'required',
			'testtypes' => 'required',
			//'phone_contact'=>'required',
			'clinician'=>'required',
			//'current_therapy'=>'required',
			//'previous_therapy'=>'required',
			'clinical_notes'=>'required'

		);
		$validator = Validator::make($request->all(), $rules);
		// process the login
		if ($validator->fails()) {
			return redirect()->route('unhls_test.create', array($request->get('patient_id')))
                                ->withInput()
                                ->withErrors($validator);
		} else {

			$visitType = ['2' => 'Out-patient','1' => 'In-patient'];
			$activeTest = array();

			/*
			 * - Create a visit
			 * - Fields required: visit_type, patient_id
			 */
			$visit = new UnhlsVisit;
			$visit->visit_lab_number = $request->get('visit_lab_number');
			$visit->patient_id = $request->get('patient_id');
			$visit->visit_type = $visitType[$request->get('visit_type')];
			$visit->ward_id = $request->get('ward_id');
			$visit->bed_no = $request->get('bed_no');
			$visit->hospitalized = $request->get('hospitalized');
			$visit->on_antibiotics = $request->get('on_antibiotics');
			$visit->save();

			$therapy = new Therapy;
			$therapy->patient_id = $request->get('patient_id');
			$therapy->visit_id = $visit->id;
			$therapy->previous_therapy = $request->get('previous_therapy');
			$therapy->current_therapy = $request->get('current_therapy');

			$therapy->clinical_notes = $request->get('clinical_notes');

            $therapy->clinician_id = $request->get('clinician');
            //$therapy->contact = Input::get('phone_contact');

			$therapy->save();

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
                        $test->requested_by = $request->get('clinician');
                        $therapy->clinician_id = $request->get('clinician');

                        $test->purpose = $request->get('hiv_purpose');
                        $test->save();

                        $activeTest[] = $test->id;
                    }
                }
            }

			$url = $request->session()->get('SOURCE_URL');

			return redirect($url)->with('message', 'messages.success-creating-test')
					->with('activeTest', $activeTest);
		}
	}


	/**
	 * Display Collect page
	 *
	 * @param
	 * @return
	 */
	public function collectSpecimen($specimenID)
	{
		$specimen = UnhlsSpecimen::find($specimenID);
		return view('unhls_test.collect')->with('specimen', $specimen);
	}

    /**
     * Display accept specimen page
     *
     * @param
     * @return
     */
    public function acceptSpecimen(Request $request)
    {
		$specimen = UnhlsSpecimen::find($request->get('id'));
		$specimenTypes = SpecimenType::all();
		return view('unhls_test.acceptSpecimen')
                    ->with('specimen', $specimen)
                    ->with('specimenTypes', $specimenTypes);
    }

	/**
	 * Display Rejection page
	 *
	 * @param
	 * @return
	 */
	public function reject($testID)
	{
		$test = UnhlsTest::find($testID);
		$rejectionReason = RejectionReason::all();
		return view('unhls_test.reject')
                    ->with('test', $test)
                    ->with('rejectionReason', $rejectionReason);
	}

	/**
	 * Display Referral page
	 *
	 * @param
	 * @return
	 */
	public function refer($specimenID)
	{
		$specimen = UnhlsSpecimen::find($specimenID);
		$referralReason = ReferralReason::all();
		$test = UnhlsTest::find($specimenID);
		return view('unhls_test.refer')
                ->with('specimen', $specimen)
                ->with('test', $test)
                ->with('referralReason', $referralReason);
	}

	/**
	 * Executes Rejection
	 *
	 * @param
	 * @return
	 */
	// todo: create a functions for pre-analytic rejection
	public function rejectAction(Request $request)
	{
		//Reject justifying why.
		$rules = array(
			'rejectionReason' => 'required|non_zero_key',
			'reject_explained_to' => 'required',
		);
		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return redirect()->route('unhls_test.reject', array($request->get('test_id')))
                            ->withInput()
                            ->withErrors($validator);
		} else {
			$test = UnhlsTest::find($request->get('test_id'));
			// this refers to analytic rejection of specimen
			$test->test_status_id = UnhlsTest::REJECTED;
			$test->save();
			// todo: create cascade deletion for it, incase rejection is reversed
			$rejection = new AnalyticSpecimenRejection;
			//$rejection->rejection_reason_id = Input::get('rejectionReason');
			$rejection->test_id = $request->get('test_id');
			$rejection->specimen_id = $request->get('specimen_id');
			$rejection->rejected_by = Auth::user()->id;
			$rejection->time_rejected = date('Y-m-d H:i:s');
			$rejection->reject_explained_to = $request->get('reject_explained_to');
			$rejection->save();

			/**
			 * Create rejection reasons
			 */
			$reasons = $request->get('rejectionReason');
			if(is_array($reasons)){
				foreach ($reasons as $id => $value) {
					$reason =new AnalyticSpecimenRejectionReason;

					$reason->rejection_id = $rejection->id;
					$reason->specimen_id = $request->get('specimen_id');
					$reason->reason_id = $value;
					$reason->save();
				}
			}
			$url = $request->session()->get('SOURCE_URL');

			return redirect($url)->with('message', 'messages.success-rejecting-specimen')
						->with('activeTest', array($test->id));
		}
	}

	/**
	 * Accept a Test's Specimen
	 *
	 * @param
	 * @return
	 */
	public function acceptSpecimenAction(Request $request)
	{
		$specimen = UnhlsSpecimen::find($request->get('specimen_id'));
		$specimen->specimen_status_id = UnhlsSpecimen::ACCEPTED;
		$specimen->specimen_type_id = $request->get('specimen_type_id');
		$specimen->accepted_by = Auth::user()->id;
		$specimen->time_accepted = date('Y-m-d H:i:s');
		$specimen->save();

		return redirect()->route('unhls_test.index')
			->with('message', 'You have successfully captured specimen collection details');
	}


	/**
	 * Display Change specimenType form fragment to be loaded in a modal via AJAX
	 *
	 * @param
	 * @return
	 */
	public function changeSpecimenType(Request $request)
	{
		$test = UnhlsTest::find($request->get('id'));
		return view('unhls_test.changeSpecimenType')->with('test', $test);
	}

	/**
	 * Update a Test's SpecimenType
	 *
	 * @param
	 * @return
	 */
	public function updateSpecimenType(Request $request)
	{
		$specimen = UnhlsSpecimen::find($request->get('specimen_id'));
		$specimen->specimen_type_id = $request->get('specimen_type');
		$specimen->save();

		return redirect()->route('unhls_test.viewDetails', array($specimen->test->id));
	}

	/**
	 * Starts Test
	 *
	 * @param
	 * @return
	 */
	public function start(Request $request)
	{
		$test = UnhlsTest::find($request->get('id'));
		$test->tested_by = Auth::user()->id;
		$test->test_status_id = UnhlsTest::STARTED;
		$test->time_started = date('Y-m-d H:i:s');
		$test->save();
		return $test->test_status_id;
	}

	/**
	 * Display Result Entry page
	 *
	 * @param
	 * @return
	 */
	public function enterResults(Request $request, $testID)
	{
		$test = UnhlsTest::find($testID);
		// if the test being carried out requires a culture worksheet
		if ($test->testType->isCulture()) {
			return redirect()->route('culture.edit', [$test->id]);
		}elseif ($test->testType->isGramStain()) {
			return redirect()->route('gramstain.edit', [$test->id]);
		}else{
			return view('unhls_test.enterResults')->with('test', $test);
		}
	}

	/**
	 * Returns test result intepretation
	 * @param
	 * @return
	 */
	public function getResultInterpretation(Request $request)
	{
		$result = array();
		//save if it is available

		if ($request->get('age')) {
			$result['birthdate'] = $request->get('age');
			$result['gender'] = $request->get('gender');
		}
		$result['measureid'] = $request->get('measureid');
		$result['measurevalue'] = $request->get('measurevalue');

		$measure = new Measure;
		return $measure->getResultInterpretation($result);
	}

    /**
     * Saves Test Results
     *
     * @param Request $request
     * @param $testID to save
     * @return \Illuminate\Http\RedirectResponse
     */
	public function saveResults(Request $request, $testID)
	{
		$test = UnhlsTest::find($testID);
		$test->test_status_id = UnhlsTest::COMPLETED;
		$test->tested_by = Auth::user()->id;
		$test->time_completed = date('Y-m-d H:i:s');

		if ($test->testType->name == 'Gram Staining') {
			$results = '';
			foreach ($test->gramStainResults as $gramStainResult) {
				$results = $results.$gramStainResult->gramStainRange->name.',';
			}
		}

		foreach ($test->testType->measures as $measure) {
			$testResult = UnhlsTestResult::firstOrCreate(array('test_id' => $testID, 'measure_id' => $measure->id));
			if ($test->testType->name == 'Gram Staining') {

				$testResult->result = $results;
				$inputName = "m_".$measure->id;
			}else{
				$testResult->result = $request->get('m_'.$measure->id);
				$inputName = "m_".$measure->id;
			}
			$rules = array("$inputName" => 'max:255');

			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput($request->all());
			} else {
				$testResult->save();
			}
		}
		if ($test->isHIV()) {
			$test->interpretation = $test->interpreteHIVResults();
		}else{
			$test->interpretation = $request->get('interpretation');
		}
		$test->save();

		//Fire of entry saved/edited event
		Event::fire('test.saved', array($testID));

		$input = $request->session()->get('TESTS_FILTER_INPUT');
        $request->session()->put('fromRedirect', 'true');

		// Get page
		$url = $request->session()->get('SOURCE_URL');
		$urlParts = explode('&', $url);
		if(isset($urlParts['page'])){
			$pageParts = explode('=', $urlParts['page']);
			$input['page'] = $pageParts[1];
		}

		// redirect
		return redirect($url)
					->with('message', trans('messages.success-saving-results'))
					->with('activeTest', array($test->id))
					->withInput($input);
	}

	/**
	 * Display Edit page
	 *
	 * @param
	 * @return
	 */
	// todo: move editing results to a different controller and here leave editing particular test request?
	public function edit($testID)
	{
		$test = UnhlsTest::find($testID);
		// if the test being carried out requires a culture worksheet
		if ($test->testType->name == 'Culture and Sensitivity') {
			return redirect()->route('culture.edit', [$test->id]);
		}elseif ($test->testType->name == 'Gram Staining') {
			return redirect()->route('gramstain.edit', [$test->id]);
		}else{
			return view('unhls_test.edit')->with('test', $test);
		}
	}

	/**
	 * Display Test Details
	 *
	 * @param
	 * @return
	 */
	public function viewDetails($testID)
	{

		$test = UnhlsTest::find($testID);
		return view('unhls_test.viewDetails')->with('test',$test );

	}

	/**
	 * Verify Test
	 *
	 * @param
	 * @return
	 */
	public function verify($testID)
	{
		$test = UnhlsTest::find($testID);
		$test->test_status_id = UnhlsTest::VERIFIED;
		$test->time_verified = date('Y-m-d H:i:s');
		$test->verified_by = Auth::user()->id;
		$test->save();

		//Fire of entry verified event
		Event::fire('test.verified', array($testID));

		return view('unhls_test.viewDetails')->with('test', $test);
	}

	/**
	 * Approve Test
	 *
	 * @param
	 * @return
	 */
	public function approve($testID)
	{
		$test = UnhlsTest::find($testID);
		$test->test_status_id = UnhlsTest::APPROVED;
		$test->time_approved = date('Y-m-d H:i:s');
		$test->approved_by = Auth::user()->id;
		$test->save();

		//Fire of entry approved event
		Event::fire('test.approved', array($testID));

		return view('unhls_test.viewDetails')->with('test', $test);
	}

	/**
	 * Refer the test
	 *
	 * @param specimenId
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showRefer($specimenId)
	{
		// sample collection default details
		$now = new DateTime();
		$dispatchDate = $now->format('Y-m-d H:i');
		$receptionDate = $now->format('Y-m-d H:i');

		$specimen = UnhlsSpecimen::find($specimenId);
		$testdetails = DB::table('unhls_tests')
							->join('test_types', 'unhls_tests.test_type_id', '=' , 'test_types.id')
							->join('specimens', 'unhls_tests.specimen_id', '=', 'specimens.id')
							->join('unhls_visits', 'unhls_tests.visit_id', '=' ,'unhls_visits.id')
							->join('unhls_patients', 'unhls_visits.patient_id', '=' ,'unhls_patients.id')
							->where('unhls_tests.specimen_id', '=', $specimenId)
							->get(['test_types.name', 'unhls_patients.ulin', 'unhls_patients.nin', 'specimens.time_collected' ]);
		//Convert Array of objects to arrays
		$testdetails = json_decode(json_encode ($testdetails), true);

		$facilities = UNHLSFacility::all();
		//Referral facilities
		$referralReason = ReferralReason::all();
		// dd($unhlspatient);
		return view('unhls_test.refer')
			->with('now', $now)
			->with('dispatchDate', $dispatchDate)
			->with('receptionDate', $receptionDate)
			->with('specimen', $specimen)
			->with('testdetails', $testdetails)
			->with('facilities', $facilities)
			->with('referralReason', $referralReason);

	}

    /**
     * Refer action
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function referAction(Request $request)
	{
		//Validate
		$rules = array(
			'referral-status' => 'required',
			'facility_id' => 'required|non_zero_key',
			'person',
			'contacts'
			);
		$validator = Validator::make($request->all(), $rules);
		$specimenId = $request->get('specimen_id');

		if ($validator->fails())
		{
			return redirect()->route('unhls_test.refer', array($specimenId))
                        ->withInput()
                        ->withErrors($validator);
		}

		//Insert into referral table
		$referral = new Referral();
		$referral->status = $request->get('referral-status');
		$referral->sample_obtainer = $request->get('sample-obtainer');
		$referral->cadre_obtainer = $request->get('cadre-obtainer');
		$referral->sample_date = $request->get('reception_date');
		$referral->sample_time = $request->get('reception_date');
		$referral->time_dispatch = $request->get('time-dispatch');
		$referral->storage_condition = $request->get('storage-condition');
		$referral->transport_type = $request->get('transport-type');
		$referral->referral_reason = $request->get('referral-reason');
		$referral->priority_specimen = $request->get('priority-specimen');
		$referral->facility_id = $request->get('facility_id');
		$referral->person = $request->get('person');
		$referral->contacts = $request->get('contacts');
		$referral->user_id = Auth::user()->id;

		//Update specimen referral status
		$specimen = UnhlsSpecimen::find($specimenId);

		DB::transaction(function() use ($referral, $specimen) {
			$referral->save();
			$specimen->referral_id = $referral->id;
			$specimen->save();
		});

		//Start test
        $request->merge(array('id' => $specimen->tests->first()->id)); //Add the testID to the Input
		$this->start();

		//Return view
		$url = $request->session()->get('SOURCE_URL');

		return redirect($url)->with('message', trans('messages.specimen-successful-refer'))
					->with('activeTest', array($specimen->tests->first()->id));
	}

	/**
	 *
	 * @param
	 * @return
	 */
	public function delete($id)
	{
		// if no results saved, the permitted can delete - [clinician/technologist]
		$test = UnhlsTest::find($id);

		$testInUse = UnhlsTestResult::where('test_id', '=', $id)->first();
		if (empty($testInUse)) {
			// The test is not in use
			$test->delete();
		} else {
			// The test is in use
			return redirect()->route('visit.show', [$test->visit_id])
				->with('message', 'Test can NOT be Deleted (has results)!');
		}
		// redirect
		return redirect()->route('visit.show', [$test->visit_id])
			->with('message', 'Test Successfully Deleted!');
	}


	/**
	 * Import POC samples
	 *@param
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function importPoc()
	{

		// Load the view and pass it the tests
		return view('unhls_test.importPoCResults')
					->with('message', false)
					->with('failed_import', false);

	}

	public function uploadPoCResults(Request $request)
	{

        if($request->hasFile('file')){

            $path = $request->file('file')->getRealPath();

            $data = Excel::load($path, function($reader) {

            })->get();

            //print_r( $data->first() );

            $failed_import = array();

            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {

			        //check for sample id in tests
					$patient = DB::table('poc_tables')->where('sample_id','=',$value->sample_id)->select('id', 'sample_id')->first();

					if(count($patient->get())>0)
					{
								//avoid duplicate sample id insert
								$result_exists = POCResult::where('patient_id','=',trim($patient->id))->get();

								if($result_exists->count()==0)
								{

										$result = new POCResult;

										$result->patient_id = $patient->id;
										$result->test_date = isset($value->test_date)?$value->test_date:date('Y-m-d H:i:s');
										if(isset($value->result)){
											$valid_result = $value->result=='Positive'||$value->result=='Negative';
											$result->results = $valid_result?$value->result:'Error';
										}else{
											$result->results = trim(strtolower($value->hiv_1_mn))=="detected"?"Positive":"Negative";
										}

										$result->save();
								}

					}
					else
					{
						array_push($failed_import, trim($value->sample_id));

	            		//dd(trim($value->sample_id));
					}

                }
            		//dd($failed_import);
				// redirect
				//return Redirect::to('unhls_test/importPoc')
				return view('unhls_test.importPoCResults')
							->with('message', 'Import completed successfully')
							->with('failed_import', $failed_import);
            }


        }

	}
}
