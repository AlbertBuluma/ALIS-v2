<?php

namespace App\Http\Controllers;

use App\Models\AdhocConfig;
use App\Models\SpecimenType;
use App\Models\TestCategory;
use App\Models\Therapy;
use App\Models\UnhlsPatient;
use App\Models\UnhlsSpecimen;
use App\Models\UnhlsTest;
use App\Models\UnhlsVisit;
use App\Models\VisitStatus;
use App\Models\Ward;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class VisitController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // the phlebotomist will recieved the specimen and attach it to test of that patient that has no specimen

        // on registering a patient auto generate a visit?

        $fromRedirect = Session::pull('fromRedirect');

        if($fromRedirect){
            $input = Session::get('TESTS_FILTER_INPUT');
        }else{
            $input = $request->except('_token');
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
        $statuses = array('all')+VisitStatus::all()->pluck('name','id')->toArray();

        foreach ($statuses as $key => $value) {
            $statuses[$key] = trans("messages.$value");
        }

        // Pagination
        $visits = $visits->paginate(config('kblis.page-items'))->appends($input);
        $clinicianUI = AdhocConfig::where('name','Clinician_UI')->first()->activateClinicianUI();

        // Load the view and pass it the visits
        return view('visit.index')
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($patientID)
    {
        $wards = ['Select Sample Origin']+Ward::pluck('name', 'id')->toArray();

        $patient = UnhlsPatient::find($patientID);

        //Load Test Create View
        return view('visit.create')
            ->with('patient', $patient)
            ->with('ward', $wards);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //Create New Test
        $rules = array(
            'visit_type' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->route('visit.create',
                array($request->get('patient_id')))->withInput()->withErrors($validator);
        } else {

            $visitType = ['Out-patient','In-patient'];

            /*
             * - Create a visit
             * - Fields required: visit_type, patient_id
             */
            $visit = new UnhlsVisit;
            $visit->patient_id = $request->get('patient_id');
            $visit->visit_type = $visitType[$request->get('visit_type')];
            $visit->visit_status_id = UnhlsVisit::APPOINTMENT_MADE;
            $visit->ward_id = $request->get('ward_id');
            $visit->bed_no = $request->get('bed_no');
            $visit->save();
            return redirect()->route('visit.index')->with('message', 'Appointment Successfully Made');
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
        // list tests in the view... perhaps with results for the clinician
        $visit = UnhlsVisit::find($id);
        return view('visit.show')
            ->with('visit', $visit);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        //Create a Lab categories Array
        $categories = ['Select Lab Section']+TestCategory::pluck('name', 'id')->toArray();
        $wards = ['Select Sample Origin']+Ward::pluck('name', 'id')->toArray();

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

        $visit = UnhlsVisit::find($id);

        //Load Test Create View
        return view('visit.edit')
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
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

        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->route('visit.edit', [$id])->withInput()->withErrors($validator);
        } else {

            if ($visit->isAppointment()) {

                $therapy = new Therapy;
                $therapy->patient_id = $visit->patient->id;
                $therapy->visit_id = $visit->id;
                $therapy->previous_therapy = $request->get('previous_therapy');
                $therapy->current_therapy = $request->get('current_therapy');
                $therapy->clinical_notes = $request->get('clinical_notes');
                $therapy->clinician = $request->get('clinician');
                $therapy->contact = $request->get('contact');
                $therapy->save();

                /*
                 * - Create tests requested
                 * - Fields required: visit_id, test_type_id, specimen_id, test_status_id, created_by, requested_by
                 */
                $testLists = $request->get('test_list');
                if(is_array($testLists)){
                    foreach ($testLists as $testList) {
                        foreach ($testList['test_type_id'] as $id) {
                            $testTypeID = (int)$id;

                            $test = new UnhlsTest;
                            $test->visit_id = $visit->id;
                            $test->test_type_id = $testTypeID;
                            $test->test_status_id = UnhlsTest::SPECIMEN_NOT_RECEIVED;
                            $test->created_by = Auth::user()->id;
                            $test->requested_by = $request->get('physician');
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
                $tests = $request->get('tests');
                // Create Specimen - specimen_type_id, accepted_by, referred_from, referred_to
                $specimen = new UnhlsSpecimen;
                $specimen->specimen_type_id = $request->get('specimen_type');
                $specimen->accepted_by = Auth::user()->id;
                $specimen->time_collected = $request->get('collection_date');
                $specimen->time_accepted = $request->get('reception_date');
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
                if ($request->get('testsWithoutSpecimen') == $i) {
                    $visit->visit_status_id = UnhlsVisit::SPECIMEN_RECEIVED;
                    $visit->save();
                }
                $message = 'Specimen Successfully Received';
            }
            return redirect()->route('visit.index')->with('message', $message);
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
        // if no request made, receptionist delete
        $visit = UnhlsVisit::find($id);

        $visitInUse = UnhlsTest::where('visit_id', '=', $id)->first();
        if (empty($visitInUse)) {
            // The test is not in use
            $visit->delete();
        } else {
            // The test is in use
            return redirect()->route('visit.index')
                ->with('message', 'This Visit has requests, not Deleted!');
        }
        // redirect
        return redirect()->route('visit.index')
            ->with('message', 'Visit Successfully Deleted!');
    }

    /**
     *Select all tests under a selected test Category - Test Menu
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    // change name to request testlist, or more understandable naming
    public function testList(Request $request)
    {
        $testCategoryId =$request->get('test_category_id');

        $testCategory = TestCategory::find($testCategoryId);
        $testTypes = $testCategory->testTypes;

        return view('visit.testTypeList')
            ->with('testTypes', $testTypes);
    }

    public function getAddTest(Request $request, $id)
    {
        //Create a Lab categories Array
        $categories = ['Select Lab Section']+TestCategory::pluck('name', 'id')->toArray();
        // $wards = ['Select Sample Origin']+Ward::lists('name', 'id');

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

        $visit = UnhlsVisit::find($id);
        $clinicianUI = AdhocConfig::where('name','Clinician_UI')->first()->activateClinicianUI();

        // if else clinician UI is active, and dude is clinician
        if ($clinicianUI && Auth::user()->can('make_labrequests')) {
            $view = 'visit.clinicianAddTest';
        }else{
            $view = 'visit.technologistAddTest';
        }

        //Load Test Create View
        return view($view)
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
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clinicianPostAddTest(Request $request, $id)
    {
        $rules = array(
            'physician' => 'required',
            'test_list' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->route('visit.addtest', [$id])->withInput()->withErrors($validator);
        } else {
            $visit = UnhlsVisit::find($id);

            $therapy = new Therapy;
            $therapy->patient_id = $visit->patient->id;
            $therapy->visit_id = $visit->id;
            $therapy->previous_therapy = $request->get('previous_therapy');
            $therapy->current_therapy = $request->get('current_therapy');
            $therapy->clinical_notes = $request->get('clinical_notes');
            $therapy->clinician = $request->get('clinician');
            $therapy->contact = $request->get('contact');
            $therapy->save();

            /*
             * - Create tests requested
             * - Fields required: visit_id, test_type_id, specimen_id, test_status_id, created_by, requested_by
             */
            $testLists = $request->get('test_list');
            if(is_array($testLists)){
                foreach ($testLists as $testList) {
                    foreach ($testList['test_type_id'] as $id) {
                        $testTypeID = (int)$id;

                        $test = new UnhlsTest;
                        $test->visit_id = $visit->id;
                        $test->test_type_id = $testTypeID;
                        $test->test_status_id = UnhlsTest::SPECIMEN_NOT_RECEIVED;
                        $test->created_by = Auth::user()->id;
                        $test->requested_by = $request->get('physician');
                        $test->save();
                    }
                }
            }
            $visit->visit_status_id = UnhlsVisit::TEST_REQUEST_MADE;
            $visit->save();

            return redirect()->route('visit.show', [$test->visit_id])
                ->with('message', 'Test Successfully Added!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function technologistPostAddTest(Request $request, $id)
    {
        $rules = array(
            'test_list' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->route('visit.addtest', [$id])->withInput()->withErrors($validator);
        } else {
            $visit = UnhlsVisit::find($id);

            $therapy = new Therapy;
            $therapy->patient_id = $visit->patient->id;
            $therapy->visit_id = $visit->id;
            $therapy->previous_therapy = $request->get('previous_therapy');
            $therapy->current_therapy = $request->get('current_therapy');
            $therapy->clinical_notes = $request->get('clinical_notes');
            $therapy->clinician = $request->get('clinician');
            $therapy->contact = $request->get('contact');
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
                        $test->requested_by = $request->get('physician');
                        $test->purpose = $request->get('hiv_purpose');
                        $test->save();

                        $activeTest[] = $test->id;
                    }
                }
            }
            $visit->visit_status_id = UnhlsVisit::TEST_REQUEST_MADE;
            $visit->save();

            return redirect()->route('visit.show', [$test->visit_id])
                ->with('message', 'Test Successfully Added!');
        }
    }
}
