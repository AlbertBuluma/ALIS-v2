<?php

namespace App\Http\Controllers;

use AnalyticSpecimenRejection;
use App\Models\AnalyticSpecimenRejectionReason;
use App\Models\Barcode;
use App\Models\Clinician;
use App\Models\Facility;
use App\Models\Instrument;
use App\Models\Measure;
use App\Models\Referral;
use App\Models\ReferralReason;
use App\Models\RejectionReason;
use App\Models\RejectionReportPdf;
use App\Models\SpecimenType;
use App\Models\TestCategory;
use App\Models\TestStatus;
use App\Models\Therapy;
use App\Models\UnhlsPatient;
use App\Models\UnhlsSpecimen;
use App\Models\UnhlsTest;
use App\Models\UnhlsTestResult;
use App\Models\UnhlsVisit;
use App\Models\Ward;
use DateTime;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use LaravelQRCode\Facades\QRCode;

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
     * @return Response
     */
    public function index(Request $request)
    {

        $fromRedirect = Session::pull('fromRedirect');

        if($fromRedirect){

            $input = Session::get('TESTS_FILTER_INPUT');

        }else{

            $input = $request->except('_token');
        }

        $searchString = isset($input['search'])?$input['search']:'';
        $testStatusId = isset($input['test_status'])?$input['test_status']:'';
        $testCategoryId = isset($input['test_category'])?$input['test_category']:'';
        if (isset($input['date_from'])) {
            $dateFrom = $input['date_from'];
        }else{
            $dateFrom = date('Y-m-d');
            $input['date_from'] = date('Y-m-d');
        }
        $dateTo = isset($input['date_to'])?$input['date_to']:'';

        // Search Conditions
        if($searchString||$testStatusId||$testCategoryId||$dateFrom||$dateTo){
            if ($searchString != '') {
                $dateFrom = '';
                $dateTo = '';
            }

            $tests = UnhlsTest::search($searchString, $testStatusId, $testCategoryId, $dateFrom, $dateTo);

            if (count($tests->get()) == 0) {
                Session::flash('message', trans('messages.empty-search'));
            }
        }
        else
        {
            // List all the active tests
            $tests = UnhlsTest::orderBy('time_created', 'DESC');
        }

        // Create Test Statuses array. Include a first entry for ALL
        $statuses = array('all')+TestStatus::all()->pluck('name','id')->toArray();

        foreach ($statuses as $key => $value) {
            $statuses[$key] = trans("messages.$value");
        }

        $test_categories = array('All')+TestCategory::all()->pluck('name','id')->toArray();
        foreach ($test_categories as $key => $value) {
            $test_categories[$key] = $value;
        }

        // Pagination
        $tests = $tests->paginate(config('kblis.page-items'))->appends($input);

        //	Barcode
        $barcode = Barcode::first();

        // QRcode
        // $qrcode = QRCode::size(500)
        //           ->format('png');
        //           ->generate('ItSolutionStuff.com');

        // Load the view and pass it the tests
        return view('unhls_test.index')
            ->with('testSet', $tests)
            ->with('testStatus', $statuses)
            ->with('barcode', $barcode)
            ->with('testCategories', $test_categories)
            ->with('selectedTestCategoryId', $testCategoryId)
            ->with('dateFrom', $dateFrom)
            ->with('dateTo', $dateTo)
            ->withInput($input);
    }

// 	public function qr_code()
// {
//    $qrCode = QRCode::text('Laravel QR Code Generator!')->png();
// }

    /**
     * Listing of Completed tests
     *@param
     * @return Response
     */
    public function completed(Request $request)
    {
        $fromRedirect = Session::pull('fromRedirect');

        if($fromRedirect){

            $input = Session::get('TESTS_FILTER_INPUT');

        }else{

            $input = $request->except('_token');
        }

        $searchString = isset($input['search'])?$input['search']:'';
        $testCategoryId = isset($input['test_category'])?$input['test_category']:'';
        $testStatusId = '4';
        if (isset($input['date_from'])) {
            $dateFrom = $input['date_from'];
        }else{
            $dateFrom = date('Y-m-d');
            $input['date_from'] = date('Y-m-d');
        }
        $dateTo = isset($input['date_to'])?$input['date_to']:'';
        $tests = UnhlsTest::CompletedTests();

        // Search Conditions
        if($searchString||$testStatusId||$testCategoryId||$dateFrom||$dateTo){

            $tests = UnhlsTest::completedTests($searchString, $testStatusId, $testCategoryId, $dateFrom, $dateTo);

            if (count($tests->get()) == 0) {
                Session::flash('message', trans('messages.empty-search'));
            }
        }
        else
        {
            // List all the active tests
            $tests = UnhlsTest::orderBy('time_created', 'DESC');
        }

        // Create Test Statuses array. Include a first entry for ALL
        $statuses = array('all')+TestStatus::all()->pluck('name','id')->toArray();

        foreach ($statuses as $key => $value) {
            $statuses[$key] = trans("messages.$value");
        }

        $test_categories = array('All')+TestCategory::all()->pluck('name','id')->toArray();
        foreach ($test_categories as $key => $value) {
            $test_categories[$key] = $value;
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
            ->with('testCategories', $test_categories)
            ->with('selectedTestCategoryId', $testCategoryId)
            ->with('barcode', $barcode)
            ->withInput($input);

    }


    /**
     * Listing of pending tests
     *@param
     * @return Response
     */
    public function pending(Request $request)
    {
        $fromRedirect = Session::pull('fromRedirect');

        if($fromRedirect){

            $input = Session::get('TESTS_FILTER_INPUT');

        }else{

            $input = $request->except('_token');
        }

        $searchString = isset($input['search'])?$input['search']:'';
        $testCategoryId = isset($input['test_category'])?$input['test_category']:'';
        $testStatusId = '2';
        if (isset($input['date_from'])) {
            $dateFrom = $input['date_from'];
        }else{
            $dateFrom = date('Y-m-d');
            $input['date_from'] = date('Y-m-d');
        }
        $dateTo = isset($input['date_to'])?$input['date_to']:'';

        // Search Conditions
        if($searchString||$testStatusId||$testCategoryId||$dateFrom||$dateTo){

            $tests = UnhlsTest::pendingTests($searchString, $testStatusId, $testCategoryId, $dateFrom, $dateTo);

            if (count($tests->get()) == 0) {
                Session::flash('message', trans('messages.empty-search'));
            }
        }
        else
        {
            // List all the active tests
            $tests = UnhlsTest::orderBy('time_created', 'DESC');
        }

        // Create Test Statuses array. Include a first entry for ALL
        $statuses = array('all')+TestStatus::all()->pluck('name','id')->toArray();

        foreach ($statuses as $key => $value) {
            $statuses[$key] = trans("messages.$value");
        }

        $test_categories = array('All')+TestCategory::all()->pluck('name','id')->toArray();
        foreach ($test_categories as $key => $value) {
            $test_categories[$key] = $value;
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
            ->with('testCategories', $test_categories)
            ->with('selectedTestCategoryId', $testCategoryId)
            ->with('barcode', $barcode)
            ->withInput($input);

    }


    /**
     * Listing of started tests
     *@param
     * @return Response
     */
    public function started(Request $request)
    {
        $fromRedirect = Session::pull('fromRedirect');

        if($fromRedirect){

            $input = Session::get('TESTS_FILTER_INPUT');

        }else{

            $input = $request->except('_token');
        }

        $searchString = isset($input['search'])?$input['search']:'';
        $testCategoryId = isset($input['test_category'])?$input['test_category']:'';
        $testStatusId = '3';
        if (isset($input['date_from'])) {
            $dateFrom = $input['date_from'];
        }else{
            $dateFrom = date('Y-m-d');
            $input['date_from'] = date('Y-m-d');
        }
        $dateTo = isset($input['date_to'])?$input['date_to']:'';

        // Search Conditions
        if($searchString||$testStatusId||$testCategoryId||$dateFrom||$dateTo){

            $tests = UnhlsTest::startedTests($searchString, $testStatusId, $testCategoryId, $dateFrom, $dateTo);

            if (count($tests->get()) == 0) {
                Session::flash('message', trans('messages.empty-search'));
            }
        }
        else
        {
            // List all the active tests
            $tests = UnhlsTest::orderBy('time_created', 'DESC');
        }

        // Create Test Statuses array. Include a first entry for ALL
        $statuses = array('all')+TestStatus::all()->pluck('name','id')->toArray();

        foreach ($statuses as $key => $value) {
            $statuses[$key] = trans("messages.$value");
        }

        $test_categories = array('All')+TestCategory::all()->pluck('name','id')->toArray();
        foreach ($test_categories as $key => $value) {
            $test_categories[$key] = $value;
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
            ->with('testCategories', $test_categories)
            ->with('selectedTestCategoryId', $testCategoryId)
            ->with('barcode', $barcode)
            ->withInput($input);

    }


    /**
     * Listing of samples not yet recieved
     *@param
     * @return Response
     */
    public function notRecieved(Request $request)
    {
        $fromRedirect = Session::pull('fromRedirect');

        if($fromRedirect){

            $input = Session::get('TESTS_FILTER_INPUT');

        }else{

            $input = $request->except('_token');
        }

        $searchString = isset($input['search'])?$input['search']:'';
        $testCategoryId = isset($input['test_category'])?$input['test_category']:'';
        $testStatusId = '1';
        if (isset($input['date_from'])) {
            $dateFrom = $input['date_from'];
        }else{
            $dateFrom = date('Y-m-d');
            $input['date_from'] = date('Y-m-d');
        }
        $dateTo = isset($input['date_to'])?$input['date_to']:'';

        // Search Conditions
        if($searchString||$testStatusId||$testCategoryId||$dateFrom||$dateTo){

            $tests = UnhlsTest::startedTests($searchString, $testStatusId, $testCategoryId, $dateFrom, $dateTo);

            if (count($tests->get()) == 0) {
                Session::flash('message', trans('messages.empty-search'));
            }
        }
        else
        {
            // List all the active tests
            $tests = UnhlsTest::orderBy('time_created', 'DESC');
        }

        // Create Test Statuses array. Include a first entry for ALL
        $statuses = array('all')+TestStatus::all()->pluck('name','id')->toArray();

        foreach ($statuses as $key => $value) {
            $statuses[$key] = trans("messages.$value");
        }

        $test_categories = array('All')+TestCategory::all()->pluck('name','id')->toArray();
        foreach ($test_categories as $key => $value) {
            $test_categories[$key] = $value;
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
            ->with('testCategories', $test_categories)
            ->with('selectedTestCategoryId', $testCategoryId)
            ->with('barcode', $barcode)
            ->withInput($input);

    }



    /**
     * Listing of verified tests
     *@param
     * @return Response
     */
    public function verified(Request $request)
    {
        $fromRedirect = Session::pull('fromRedirect');

        if($fromRedirect){

            $input = Session::get('TESTS_FILTER_INPUT');

        }else{

            $input = $request->except('_token');
        }

        $searchString = isset($input['search'])?$input['search']:'';
        $testCategoryId = isset($input['test_category'])?$input['test_category']:'';
        $testStatusId = '5';
        if (isset($input['date_from'])) {
            $dateFrom = $input['date_from'];
        }else{
            $dateFrom = date('Y-m-d');
            $input['date_from'] = date('Y-m-d');
        }
        $dateTo = isset($input['date_to'])?$input['date_to']:'';

        // Search Conditions
        if($searchString||$testStatusId||$testCategoryId||$dateFrom||$dateTo){

            $tests = UnhlsTest::verified($searchString, $testStatusId, $testCategoryId, $dateFrom, $dateTo);

            if (count($tests->get()) == 0) {
                Session::flash('message', trans('messages.empty-search'));
            }
        }
        else
        {
            // List all the active tests
            $tests = UnhlsTest::orderBy('time_created', 'DESC');
        }

        // Create Test Statuses array. Include a first entry for ALL
        $statuses = array('all')+TestStatus::all()->pluck('name','id')->toArray();

        foreach ($statuses as $key => $value) {
            $statuses[$key] = trans("messages.$value");
        }

        $test_categories = array('All')+TestCategory::all()->pluck('name','id')->toArray();
        foreach ($test_categories as $key => $value) {
            $test_categories[$key] = $value;
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
            ->with('testCategories', $test_categories)
            ->with('selectedTestCategoryId', $testCategoryId)
            ->with('dateTo', $dateTo)
            ->withInput($input);

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
        $testCategoryId =$request->get('test_category_id');
        $specimenTypeId =$request->get('specimen_type_id');

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
        $categories = ['Select Lab Section']+TestCategory::pluck('name', 'id')->toArray();
        $wards = ['Select Sample Origin']+Ward::pluck('name', 'id')->toArray();
        $clinicians = ['Select clinician']+Clinician::where('active', '=', 0)->pluck('name', 'id')->toArray();
        $facilities = ['Select facility']+Facility::where('active', '=', 1)->pluck('name', 'id')->toArray();

        // sample collection default details
        $now = new DateTime();
        $collectionDate = $now->format('Y-m-d H:i');
        $receptionDate = $now->format('Y-m-d H:i');

        $fromRedirect = Session::pull('TEST_CATEGORY');

        if($fromRedirect){
            $input = Session::get('TEST_CATEGORY');
        }else{
            $input = $request->except('_token');
        }

        $specimenTypes = ['select Specimen Type']+SpecimenType::pluck('name', 'id')->toArray();

        $patient = UnhlsPatient::find($patientID);

        //Load Test Create View
        return view('unhls_test.create')
            ->with('collectionDate', $collectionDate)
            ->with('receptionDate', $receptionDate)
            ->with('specimenType', $specimenTypes)
            ->with('patient', $patient)
            ->with('testCategory', $categories)
            ->with('ward', $wards)
            ->with('facilities', $facilities)
            ->with('clinicians',$clinicians);
    }

    /**
     * Save a new Test.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveNewTest(Request $request)
    {
        //Create New Test
        $rules = array(
            'visit_type' => 'required',
            'testtypes' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->route('unhls_test.create',
                array($request->get('patient_id')))->withInput()->withErrors($validator);
        } else {

            $visitType = ['Out-patient','In-patient', 'Referral'];
            $activeTest = array();

            /*
             * - Create a visit
             * - Fields required: visit_type, patient_id
             */
            $visit = new UnhlsVisit;
            $visit->patient_id = $request->get('patient_id');
            $visit->visit_type = $visitType[$request->get('visit_type')];
            $visit->ward_id = $request->get('ward_id');
            $visit->urgency = $request->get('urgency');
            $visit->bed_no = $request->get('bed_no');
            $visit->facility_id = $request->get('facility');
            $visit->facility_lab_number = $request->get('facility_lab_number');
            $visit->hospitalized = $request->get('hospitalized');
            $visit->on_antibiotics = $request->get('on_antibiotics');
            $visit->save();

            $therapy = new Therapy;
            $therapy->patient_id = $request->get('patient_id');
            $therapy->visit_id = $visit->id;
            $therapy->previous_therapy = $request->get('previous_therapy');
            $therapy->current_therapy = $request->get('current_therapy');
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
                        $test->urgency_id = $visit->urgency;
                        $test->test_type_id = $testTypeID;
                        $test->specimen_id = $specimen->id;
                        $test->test_status_id = UnhlsTest::PENDING;
                        $test->created_by = Auth::user()->id;
                        $test->clinician_id = $request->get('clinician');
                        $test->requested_by = $request->get('clinician');
                        $test->purpose = $request->get('hiv_purpose');
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



    public function getClinician($id){
        $clinician = Clinician::find($id);
        return $clinician;
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

    public function collectSpecimenModal(Request $request)
    {
        $now = new DateTime();
        $collectionDate = $now->format('Y-m-d H:i');
        $receptionDate = $now->format('Y-m-d H:i');
        $specimen = UnhlsSpecimen::find($request->get('id'));
        $specimenTypes = SpecimenType::all();
        return view('unhls_test.collectSpecimen')
            ->with('collectionDate', $collectionDate)
            ->with('specimen', $specimen)
            ->with('specimenTypes', $specimenTypes);
    }

    public function collectSpecimenAction(Request $request)
    {
        $specimen = UnhlsSpecimen::find($request->get('specimen_id'));

        //$specimen = UnhlsSpecimen::find($specimen_id);
        $specimen->specimen_status_id = UnhlsSpecimen::ACCEPTED;
        $specimen->accepted_by = Auth::user()->id;
        $specimen->sample_obtainer = $request->get('sample_obtainer');
        $specimen->time_collected = $request->get('collection_date');
        $specimen->time_accepted = $request->get('reception_date');
        $specimen->save();

        return redirect()->route('unhls_test.index')
            ->with('message', 'You have successfully saved specimen collection details');
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
        return view('unhls_test.reject')->with('test', $test)
            ->with('rejectionReason', $rejectionReason);
    }

    // Reject Report Function
    public function rejectionReport(Request $request, $id, $visit = null, $testId = null)
    {
        $tests = UnhlsTest::where('visit_id', '=', $visit?$visit:$visitId);
        $tests = UnhlsTest::where('id', '=', $testId)->get();
        $patient = UnhlsPatient::find($id);

        $template = "reports.patient.rejectionReport";

        $html = view($template)
            ->with('patient', $patient)
            ->with('tests', $tests)
            ->with('visit', $visit)
            ->withInput($request->all());

        $test_request_information  = array(
            'tests' => $tests,
            'patient'=> $patient
        );
        //dd($test_request_information);

        $pdf = new RejectionReportPdf;
        $pdf->setTestRequestInformation($test_request_information);

        $pdf->SetAutoPageBreak(TRUE, 15);
        $pdf->AddPage();
        $pdf->SetFont('', '', 10);
        $pdf->writeHTML($html, true, false, true, false, '');
        return $pdf->output('report.pdf');
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
        return view('unhls_test.refer')->with('specimen', $specimen)->with('test', $test)
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
            //$rejection->rejection_reason_id = $request->get('rejectionReason');
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
            $url = Session::get('SOURCE_URL');

            return redirect()->to($url)->with('message', 'messages.success-rejecting-specimen')
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
    public function enterResults($testID)
    {
        $equipment_list = array('---Choose Instrument---') + Instrument::all()->pluck('name','id')->toArray();
        // dd($equipment_list);
        $test = UnhlsTest::find($testID);
        // if the test being carried out requires a culture worksheet
        if ($test->testType->isCulture()) {
            return redirect()->route('culture.edit', [$test->id]);
        }elseif ($test->testType->isGramStain()) {
            return redirect()->route('gramstain.edit', [$test->id]);
        }else{
            return view('unhls_test.enterResults')->with('equipment_list', $equipment_list)
                ->with('test', $test);
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
     * @param $testID to save
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveResults(Request $request, $testID)
    {
        $test = UnhlsTest::find($testID);
        $test->test_status_id = UnhlsTest::COMPLETED;
        $test->tested_by = Auth::user()->id;
        $test->time_completed = date('Y-m-d H:i:s');
        $test->instrument_id = $request->get('equipment_id');
        $test->method_used = $request->get('method_used');

        if ($test->testType->name == 'Gram Staining') {
            $results = '';
            foreach ($test->gramStainResults as $gramStainResult) {
                $results = $results.$gramStainResult->gramStainRange->name.',';
            }
        }

        foreach ($test->testType->measures as $measure) {
            $testResult = UnhlsTestResult::updateOrCreate(array('test_id' => $testID, 'measure_id' => $measure->id));
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

        $input = Session::get('TESTS_FILTER_INPUT');
        Session::put('fromRedirect', 'true');

        // Get page
        $url = Session::get('SOURCE_URL');
        $urlParts = explode('&', $url);
        if(isset($urlParts['page'])){
            $pageParts = explode('=', $urlParts['page']);
            $input['page'] = $pageParts[1];
        }

        // redirect
        return redirect()->to($url)
            ->with('message', trans('messages.success-saving-results'))
            ->with('activeTest', array($test->id))
            ->withInput($input);
    }

    //Save reviewed test result
    public function saveRevisedResults(Request $request, $testID)
    {
        $test = UnhlsTest::find($testID);
        $test->test_status_id = UnhlsTest::COMPLETED;
        $test->revised_by = Auth::user()->id;
        $test->time_revised = date('Y-m-d H:i:s');

        if ($test->testType->name == 'Gram Staining') {
            $results = '';
            foreach ($test->gramStainResults as $gramStainResult) {
                $results = $results.$gramStainResult->gramStainRange->name.',';
            }
        }

        foreach ($test->testType->measures as $measure) {
            $testResult = UnhlsTestResult::updateOrCreate(array('test_id' => $testID, 'measure_id' => $measure->id));
            if ($test->testType->name == 'Gram Staining') {

                $testResult->result = $results;
                $inputName = "m_".$measure->id;
            }else{
                $testResult->revised_result = $request->get('m_'.$measure->id);
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

        $input = Session::get('TESTS_FILTER_INPUT');
        Session::put('fromRedirect', 'true');

        // Get page
        $url = Session::get('SOURCE_URL');
        $urlParts = explode('&', $url);
        if(isset($urlParts['page'])){
            $pageParts = explode('=', $urlParts['page']);
            $input['page'] = $pageParts[1];
        }

        // redirect
        return redirect()->to($url)
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
        $rejectionReason = RejectionReason::all();
        $rejection = AnalyticSpecimenRejection::all();
        $reason = AnalyticSpecimenRejectionReason::all();
        $barcode = Barcode::first();

        return view('unhls_test.viewDetails')->with('test', UnhlsTest::find($testID))
            ->with('rejectionReason', $rejectionReason)
            ->with('rejection', $rejection)
            ->with('barcode', $barcode)
            ->with('reason', $reason);

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

    public function getTestVisit($id){


        $tests = UnhlsTest::searchByVisit( $id);

        if (count($tests->get()) == 0) {
            Session::flash('message', trans('messages.empty-search'));
        }

        // Pagination
        $tests = $tests->paginate(config('kblis.page-items'));
        $visit = UnhlsVisit::find($id);

        //	Barcode
        $barcode = Barcode::first();

        // Load the view and pass it the tests
        return view('unhls_test.list_tests_in_visit')
            ->with('testSet', $tests)
            ->with('visit',$visit)
            ->with('barcode', $barcode);

    }

    /**
     * Refer the test
     *
     * @param specimenId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRefer($testid)
    {
        $test = UnhlsTest::find($testid);

        $facilities = Facility::all();
        //Referral facilities
        $referralReason = ReferralReason::all();
        return view('unhls_test.refer')

            ->with('test',$test)
            ->with('facilities', $facilities)
            ->with('referralReason', $referralReason);

    }

    /**
     * Refer action
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function refer_action(Request $request)
    {
        //Validate
        $rules = array(
            //'referral-status' => 'required',
            'facility_id' => 'required|non_zero_key',
            'person',
            'contacts'
        );
        $validator = Validator::make($request->all(), $rules);
        $specimenId = $request->get('specimen_id');

        if ($validator->fails())
        {
            return redirect()->route('unhls_test.refer', array($specimenId))-> withInput()->withErrors($validator);
        }

        //Insert into referral table
        $referral = new Referral();
        $referral->test_id = $request->get('test_id');
        $referral->status = Referral::REFERRED_OUT;
        $referral->sample_obtainer = $request->get('sample-obtainer');
        $referral->cadre_obtainer = $request->get('cadre-obtainer');
        $referral->sample_date = $request->get('sample-date');
        $referral->sample_time = $request->get('sample-time');
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
        $request->merge(array('id' => $request->get('test_id'))); //Add the testID to the Input
        $this->start();

        //Return view
        $url = Session::get('SOURCE_URL');


        return redirect()->to($url)->with('message', trans('messages.specimen-successful-refer'))
            ->with('activeTest', array($request->get('test_id')));
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
}
