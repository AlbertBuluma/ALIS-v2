<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AdhocConfig;
use App\Models\FinalReportPdf;
use App\Models\User;
use App\Models\Control;
use App\Models\ControlTest;
use App\Models\DailyAlphanumericCount;
use App\Models\DailyHIVCount;
use App\Models\DailyNegativeCulture;
use App\Models\DailyNegativeGramStain;
use App\Models\DailyNumericRangeCount;
use App\Models\DailyTestTypeCount;
use App\Models\Disease;
use App\Models\Drug;
use App\Models\IsolatedOrganism;
use App\Models\MeasureRange;
use App\Models\Receipt;
use App\Models\ReportDisease;
use App\Models\ResultInterpretation;
use App\Models\SpecimenType;
use App\Models\TestCategory;
use App\Models\TestType;
use App\Models\UnhlsPatient;
use App\Models\UnhlsSpecimen;
use App\Models\UnhlsTest;
use App\Models\UnhlsVisit;
use DateTime;
use Maatwebsite\Excel\Facades\Excel;

set_time_limit(0); //60 seconds = 1 minute

class ReportController extends Controller {

	//	Begin patient report functions
	/**
	 * Display a listing of the resource.
	 * Called loadPatients because the same controller shall be used for all other reports
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function index()
	{
		return view('reports.index');
	}


	public function loadPatients(Request $request)
	{
		$search = $request->search;
        $request['search'] = $request->search;

		$patients = UnhlsPatient::search($search)->orderBy('id','DESC')->paginate(config('kblis.page-items'));

		if (count($patients) == 0) {
            $request->session()->flash('message', trans('messages.no-match'));
		}

		// Load the view and pass the patients
		return view('reports.patient.index')
                    ->with('patients', $patients)
                    ->with('request', $request);
//                    ->withInput($request = $request->all());
	}

	public function viewFinalPatientReport(Request $request, $id, $visit = null,$testId = null){
		$from = $request->get('start');
		$to = $request->get('end');
		$pending = $request->get('pending');
		$date = date('Y-m-d');
		$error = '';
		$visitId = $request->get('visit_id');
		//	Check checkbox if checked and assign the 'checked' value
		if ($request->get('tests') === '1') {
			$pending='checked';
		}
		//	Query to get tests of a particular patient
		if (($visit || $visitId) && $id && $testId){
			$tests = UnhlsTest::where('id', '=', $testId);
		}
		else if(($visit || $visitId) && $id){
			$tests = UnhlsTest::where('visit_id', '=', $visit?$visit:$visitId);
		}
		else{
			$tests = UnhlsTest::join('unhls_visits', 'unhls_visits.id', '=', 'unhls_tests.visit_id')
							->where('patient_id', '=', $id);
		}
		//	Begin filters - include/exclude pending tests
		if($pending){
			$tests=$tests->where('unhls_tests.test_status_id', '!=', UnhlsTest::SPECIMEN_NOT_RECEIVED);
		}
		else{
			$tests = $tests->whereIn('unhls_tests.test_status_id', [UnhlsTest::APPROVED]);
		}
		//	Date filters
		if($from||$to){

			if(!$to) $to = $date;

			if(strtotime($from)>strtotime($to)||strtotime($from)>strtotime($date)||strtotime($to)>strtotime($date)){
					$error = trans('messages.check-date-range');
			}
			else
			{
				$toPlusOne = date_add(new DateTime($to), date_interval_create_from_date_string('1 day'));
				$tests=$tests->whereBetween('time_created', array($from, $toPlusOne->format('Y-m-d H:i:s')));
			}
		}
		//	Get tests collection
		$tests = $tests->get(array('unhls_tests.*'));
		//	Get patient details
		$patient = UnhlsPatient::find($id);
		//	Check if tests are accredited
		$accredited = $this->accredited($tests);
		$verified = array();
		foreach ($tests as $test) {
			if($test->isVerified())
				array_push($verified, $test->id);
			else
				continue;
		}


		// adhoc config decision
		//$template = AdhocConfig::where('name','Report')->first()->getReportTemplate();
		$template = "reports.patient.entebbe_iso";

		$content = View($template)
			->with('patient', $patient)
			->with('tests', $tests)
			->with('pending', $pending)
			->with('error', $error)
			->with('visit', $visit)
			->with('accredited', $accredited)
			->with('verified', $verified)
			->withInput($request->all());

			ob_end_clean();

		$test_request_information  = array(
			'tests' => $tests,
			'patient'=> $patient
			);
		$pdf = new FinalReportPdf;
		$pdf->setTestRequestInformation($test_request_information);

		$pdf->SetAutoPageBreak(TRUE, 15);
		$pdf->AddPage();
		$pdf->SetFont('times','','11');
		$pdf->writeHTML($content, 'true', 'false', 'false', 'false', '');

		return $pdf->output('report.pdf');


	}

	public function viewInterimPatientReport(Request $request, $id, $visit = null,$testId = null){
		$from = $request->get('start');
		$to = $request->get('end');
		$pending = $request->get('pending');
		$date = date('Y-m-d');
		$error = '';
		$visitId = $request->get('visit_id');
		//	Check checkbox if checked and assign the 'checked' value
		if ($request->get('tests') === '1') {
			$pending='checked';
		}
		//	Query to get tests of a particular patient
	    if(($visit || $visitId) && $id){
			$tests = UnhlsTest::where('visit_id', '=', $visit?$visit:$visitId);
		}
		else{
			$tests = UnhlsTest::join('unhls_visits', 'unhls_visits.id', '=', 'unhls_tests.visit_id')
							->where('patient_id', '=', $id);
		}
		//	Begin filters - include/exclude pending tests
		/**if($pending){
			$tests=$tests->where('unhls_tests.test_status_id', '!=', UnhlsTest::SPECIMEN_NOT_RECEIVED);
		}*/

		$tests = $tests->whereIn('unhls_tests.test_status_id', [UnhlsTest::VERIFIED,UnhlsTest::APPROVED]);

		//	Date filters
		if($from||$to){

			if(!$to) $to = $date;

			if(strtotime($from)>strtotime($to)||strtotime($from)>strtotime($date)||strtotime($to)>strtotime($date)){
					$error = trans('messages.check-date-range');
			}
			else
			{
				$toPlusOne = date_add(new DateTime($to), date_interval_create_from_date_string('1 day'));
				$tests=$tests->whereBetween('time_created', array($from, $toPlusOne->format('Y-m-d H:i:s')));
			}
		}
		//	Get tests collection
		$tests = $tests->get(array('unhls_tests.*'));
		//	Get patient details
		$patient = UnhlsPatient::find($id);
		//	Check if tests are accredited
		$accredited = $this->accredited($tests);
		$verified = array();
		foreach ($tests as $test) {
			if($test->isVerified())
				array_push($verified, $test->id);
			else
				continue;
		}



		// adhoc config decision
		//$template = AdhocConfig::where('name','Report')->first()->getReportTemplate();
		$template = "reports.patient.entebbe_iso";

		$content = view($template)
			->with('patient', $patient)
			->with('tests', $tests)
			->with('pending', $pending)
			->with('error', $error)
			->with('visit', $visit)
			->with('accredited', $accredited)
			->with('verified', $verified)
			->withInput($request->all());

			ob_end_clean();
		$test_request_information  = array(
			'tests' => $tests,
			'patient'=> $patient
			);


		$pdf = new InterimReportPdf;
		$pdf->setTestRequestInformation($test_request_information);
		$pdf->SetAutoPageBreak(TRUE, 15);
		$pdf->AddPage();
		$pdf->SetFont('times','','11');
		$pdf->writeHTML($content, 'true', 'false', 'false', 'false', '');

		return $pdf->output('report.pdf');


	}

    /**
     * Display data after applying the filters on the report uses patient ID
     *
     * @param Request $request
     * @param $id
     * @param null $visit
     * @param null $testId
     * @return Response
     */
	public function viewPatientReport(Request $request, $id, $visit = null, $testId = null){
		$from = $request->get('start');
		$to = $request->get('end');
		$pending = $request->get('pending');
		$date = date('Y-m-d');
		$error = '';
		$visitId = $request->get('visit_id');
		//	Check checkbox if checked and assign the 'checked' value
		if ($request->get('tests') === '1') {
			$pending='checked';
		}


		//	Query to get tests of a particular patient
		if (($visit || $visitId) && $id && $testId){
			$tests = UnhlsTest::where('id', '=', $testId);
		}
		else if(($visit || $visitId) && $id){
			$tests = UnhlsTest::where('visit_id', '=', $visit?$visit:$visitId);
		}
		else{
			/*$tests = UnhlsTest::join('unhls_visits', 'unhls_visits.id', '=', 'unhls_tests.visit_id')
							->where('patient_id', '=', $id);
			*/



		}
		//	Begin filters - include/exclude pending tests
		/**if($pending){
			$tests=$tests->where('unhls_tests.test_status_id', '!=', UnhlsTest::SPECIMEN_NOT_RECEIVED);
		}
		else{
			$tests = $tests->whereIn('unhls_tests.test_status_id', [UnhlsTest::COMPLETED, UnhlsTest::VERIFIED]);
		}
		//	Date filters
		if($from||$to){

			if(!$to) $to = $date;

			if(strtotime($from)>strtotime($to)||strtotime($from)>strtotime($date)||strtotime($to)>strtotime($date)){
					$error = trans('messages.check-date-range');
			}
			else
			{
				$toPlusOne = date_add(new DateTime($to), date_interval_create_from_date_string('1 day'));
				$tests=$tests->whereBetween('time_created', array($from, $toPlusOne->format('Y-m-d H:i:s')));
			}
		}
		//	Get tests collection
		$tests = $tests->get(array('unhls_tests.*'));


		//	Check if tests are accredited
		$accredited = $this->accredited($tests);
		$verified = array();
		foreach ($tests as $test) {
			if($test->isVerified())
				array_push($verified, $test->id);
			else
				continue;
		}*/

		//	Get patient details
		$patient = UnhlsPatient::find($id);
		$visits = UnhlsVisit::select('id')->where('patient_id','=',$id)->get();
		//$tests = UnhlsTest::whereIn('visit_id', [5051])->get();

		Log::info('...visits...');
		Log::info($visits);
		$visits_array=json_decode($visits,true);
		Log::info('...end visits...');
		$tests = UnhlsTest::whereIn('visit_id', $visits_array)->get();

		Log::info("....1....");
		// adhoc config decision
		$template = AdhocConfig::where('name','Report')->first()->getReportTemplate();

		Log::info("....2....");
		Log::info($patient);

		Log::info("....tests....");
		Log::info($tests);
		Log::info("..end..tests....");

		$content = view($template)
			->with('patient', $patient)
			->with('tests', $tests)

			->withInput($request->all());

			/*$content = View($template)
			->with('patient', $patient)
			->with('tests', $tests)
			->with('pending', $pending)
			->with('error', $error)
			->with('visit', $visit)
			->with('accredited', $accredited)
			->with('verified', $verified)
			->withInput(Input::all());*/

		ob_end_clean();

		$pdf = new Mypdf;
		$pdf->SetAutoPageBreak(TRUE, 15);
		$pdf->AddPage();
		$pdf->SetFont('times','','11');
		$pdf->writeHTML($content, 'true', 'false', 'false', 'false', '');


		return $pdf->output('report.pdf');

	}

    public function viewPatientVisitReport(Request $request, $visit_id){

	    $tests = UnhlsTest::where('visit_id', '=', $visit_id)->get();

		$patient_json_id_instance = UnhlsVisit::select('patient_id')->where('id','=',$visit_id)->get();
	    $patient_json_id_decoded_instance = json_decode($patient_json_id_instance,true);

		//	Get patient details
		$patient = UnhlsPatient::find($patient_json_id_decoded_instance[0]['patient_id']);



		// adhoc config decision
		//$template = AdhocConfig::where('name','Report')->first()->getReportTemplate();
		$template = "reports.patient.entebbe_iso";

		$content = View($template)
			->with('patient', $patient)
			->with('tests', $tests)
			->withInput($request->all());

			ob_end_clean();

		$test_request_information  = array(
			'tests' => $tests,
			'patient'=> $patient
			);
		$pdf = new FinalReportPdf;

		if($this->isReportInterim($tests)){
			$pdf = new InterimReportPdf;

		}


		$pdf->setTestRequestInformation($test_request_information);

		$pdf->SetAutoPageBreak(TRUE, 15);
		$pdf->AddPage();
		$pdf->SetFont('times','','11');
		$pdf->writeHTML($content, 'true', 'false', 'false', 'false', '');

		return $pdf->output('report.pdf');
    }

    private function isReportInterim($tests){
    	$isInterim = false;
    	foreach ($tests as $key => $test) {
    	    if($test->test_status_id != UnhlsTest::APPROVED){
    	    	$isInterim = true;

    	    	break;
    	    }else{
    	    	$isInterim = false;
    	    }

    	}

    	return $isInterim;
    }
	public function viewPatientVisits(Request $request, $id){

		$error = '';
		$visitId = $request->get('visit_id');

		//	Get patient details
		$patient = UnhlsPatient::find($id);
		$visits = UnhlsVisit::where('patient_id','=',$id)->get();


		// Load the view and pass the patients
		return View('reports.patient.visits')->with('patient', $patient)
		->with('visits', $visits)->withInput($request->all());

	}

    /**
     *
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
	public function viewVisitReport(Request $request, $id){
		$date = date('Y-m-d');
		$error = '';

		$visit = UnhlsVisit::find($id);
		$visit->load(
			'patient',
			'unhls_tests.testType',
			'unhls_tests.testResults',
			'unhls_tests.isolatedOrganisms.organism',
			'unhls_tests.isolatedOrganisms.drugSusceptibilities.drug',
			'unhls_tests.isolatedOrganisms.drugSusceptibilities.drugSusceptibilityMeasure');
		return view('reports.visit.report')
					->with('error', $error)
					->with('visit', $visit)
					->withInput($request->all());
	}

    /**
     *    Function to return test types of a particular test category to fill test types dropdown
     * @param Request $request
     * @return
     */
	public function reportsDropdown(Request $request){
		$input = $request->get('option');
		$testCategory = TestCategory::find($input);
		$testTypes = $testCategory->testTypes();
		return Response::make($testTypes->get(['id','name']));
	}

	//	Begin Daily Log-Patient report functions

    /**
     * Display a view of the daily patient records.
     * @param Request $request
     * @return
     * @throws \Exception
     */
	public function dailyLog(Request $request)
	{
		$from = $request->get('start');
		$to = $request->get('end');
		$pendingOrAll = $request->get('pending_or_all');
		$error = '';
		$accredited = array();
		//	Check radiobutton for pending/all tests is checked and assign the 'true' value
		if ($request->get('tests') === '1') {
			$pending='true';
		}
		$date = date('Y-m-d');
		if(!$to){
			$to=$date;
		}
		if(!$from){
			$from=$date;
		}
		$toPlusOne = date_add(new DateTime($to), date_interval_create_from_date_string('1 day'));
		$records = $request->get('records');
		$testCategory = $request->get('section_id');
		$testType = $request->get('test_type');
//		$labSections = TestCategory::lists('name', 'id');
		$labSections = TestCategory::pluck('name', 'id')->toArray();
		if($testCategory)
			$testTypes = TestCategory::find($testCategory)->testTypes->lists('name', 'id');
		else
			$testTypes = array(""=>"");

		if($records=='patients'){
			if($from||$to){
				if(strtotime($from)>strtotime($to)||strtotime($from)>strtotime($date)||strtotime($to)>strtotime($date)){
						$error = trans('messages.check-date-range');
				}
				else{
					$visits = UnhlsVisit::whereBetween('created_at', array($from, $toPlusOne))->get();
				}
				if (count($visits) == 0) {
                    $request->session()->flash('message', trans('messages.no-match'));
				}
			}
			else{

				$visits = UnhlsVisit::where('created_at', 'LIKE', $date.'%')->orderBy('patient_id')->get();
			}
			if($request->has('word')){
				$date = date("Ymdhi");
				$fileName = "daily_visits_log_".$date.".doc";
				$headers = array(
					"Content-type"=>"text/html",
					"Content-Disposition"=>"attachment;Filename=".$fileName
				);
				$content = View('reports.daily.exportPatientLog')
								->with('visits', $visits)
								->with('accredited', $accredited)
								->withInput($request->all());
//				return Response::make($content,200, $headers);
				return response($content, 200)->withHeaders($headers);

			}
			else{
				return view('reports.daily.patient')
								->with('visits', $visits)
								->with('error', $error)
								->with('accredited', $accredited)
								->withInput($request->all());
			}
		}
		//Begin specimen rejections
		else if($records=='rejections')
		{
			$specimens = UnhlsSpecimen::where('specimen_status_id', '=', UnhlsSpecimen::REJECTED);
			/*Filter by test category*/
			if($testCategory&&!$testType){
				$specimens = $specimens->join('unhls_tests', 'specimens.id', '=', 'unhls_tests.specimen_id')
									   ->join('test_types', 'unhls_tests.test_type_id', '=', 'test_types.id')
									   ->where('test_types.test_category_id', '=', $testCategory);
			}
			/*Filter by test type*/
			if($testCategory&&$testType){
				$specimens = $specimens->join('unhls_tests', 'specimens.id', '=', 'unhls_tests.specimen_id')
				   					   ->where('unhls_tests.test_type_id', '=', $testType);
			}

			/*Filter by date*/
			if($from||$to){
				if(strtotime($from)>strtotime($to)||strtotime($from)>strtotime($date)||strtotime($to)>strtotime($date)){
						$error = trans('messages.check-date-range');
				}
				else
				{
					/*$specimens = $specimens->whereBetween('time_rejected',
						array($from, $toPlusOne))->get(array('specimens.*'));*/

					/*$specimens = $specimens->join('pre_analytic_specimen_rejections', 'pre_analytic_specimen_rejections.specimen_id', '=', 'specimens.id')->whereBetween('time_rejected',
						array($from, $toPlusOne))->get(array('specimens.*'));*/
					// analytic specimen rejection is the functional one now
					$specimens = $specimens->join('analytic_specimen_rejections', 'analytic_specimen_rejections.specimen_id', '=', 'specimens.id')->whereBetween('time_rejected',
						array($from, $toPlusOne))->get(array('specimens.*'));
				}
			}
			else
			{
				$specimens = $specimens->where('time_rejected', 'LIKE', $date.'%')->orderBy('id')
										->get(array('specimens.*'));
			}
			if($request->has('word')){
				$date = date("Ymdhi");
				$fileName = "daily_rejected_specimen_".$date.".doc";
				$headers = array(
					"Content-type"=>"text/html",
					"Content-Disposition"=>"attachment;Filename=".$fileName
				);
				$content = View('reports.daily.exportSpecimenLog')
								->with('specimens', $specimens)
								->with('testCategory', $testCategory)
								->with('testType', $testType)
								->with('accredited', $accredited)
								->withInput($request->all());
                return response($content, 200)->withHeaders($headers);
//                return Response::make($content,200, $headers);
			}
			else
			{
				return view('reports.daily.specimen')
							->with('labSections', $labSections)
							->with('testTypes', $testTypes)
							->with('specimens', $specimens)
							->with('testCategory', $testCategory)
							->with('testType', $testType)
							->with('error', $error)
							->with('accredited', $accredited)
							->withInput($request->all());
			}
		}
		//Begin test records
		else
		{
			$tests = UnhlsTest::whereNotIn('test_status_id', [UnhlsTest::SPECIMEN_NOT_RECEIVED]);

			/*Filter by test category*/
			if($testCategory&&!$testType){
				$tests = $tests->join('test_types', 'unhls_tests.test_type_id', '=', 'test_types.id')
							   ->where('test_types.test_category_id', '=', $testCategory);
			}
			/*Filter by test type*/
			if($testType){
				$tests = $tests->where('test_type_id', '=', $testType);
			}
			/*Filter by all tests*/
			if($pendingOrAll=='pending'){
				$tests = $tests->whereIn('test_status_id', [UnhlsTest::PENDING, UnhlsTest::STARTED]);
			}
			else if($pendingOrAll=='all'){
				$tests = $tests->whereIn('test_status_id',
					[UnhlsTest::PENDING, UnhlsTest::STARTED, UnhlsTest::COMPLETED, UnhlsTest::VERIFIED]);
			}
			//For Complete tests and the default.
			else{
				$tests = $tests->whereIn('test_status_id', [UnhlsTest::COMPLETED, UnhlsTest::VERIFIED]);
			}
			/*Get collection of tests*/
			/*Filter by date*/
			if($from||$to){
				if(strtotime($from)>strtotime($to)||strtotime($from)>strtotime($date)||strtotime($to)>strtotime($date)){
						$error = trans('messages.check-date-range');
				}
				else
				{
					$tests = $tests->whereBetween('time_created', array($from, $toPlusOne))->get(array('unhls_tests.*'));
				}
			}
			else
			{
				$tests = $tests->where('time_created', 'LIKE', $date.'%')->get(array('unhls_tests.*'));
			}
			if($request->has('word')){
				$date = date("Ymdhi");
				$fileName = "daily_test_records_".$date.".doc";
				$headers = array(
					"Content-type"=>"text/html",
					"Content-Disposition"=>"attachment;Filename=".$fileName
				);
				$content = view('reports.daily.exportTestLog')
								->with('tests', $tests)
								->with('testCategory', $testCategory)
								->with('testType', $testType)
								->with('pendingOrAll', $pendingOrAll)
								->with('accredited', $accredited)
								->withInput($request->all());
				return response($content, 200)->withHeaders($headers);
//				return Response::make($content,200, $headers);
			}
			else
			{
				return view('reports.daily.test')
							->with('labSections', $labSections)
							->with('testTypes', $testTypes)
							->with('tests', $tests)
							->with('accredited', $this->accredited($tests))
							->with('counts', $tests->count())
							->with('testCategory', $testCategory)
							->with('testType', $testType)
							->with('pendingOrAll', $pendingOrAll)
							->with('accredited', $accredited)
							->with('error', $error)
							->withInput($request->all());
			}
		}
	}
	//	End Daily Log-Patient report functions

	/*	Begin Aggregate reports functions	*/
	//	Begin prevalence rates reports functions
    /**
     * Display a both chart and table on load.
     *
     * @param Request $request
     * @return Response
     */
	public function prevalenceRates(Request $request)
	{
		$from = $request->get('start');
		$to = $request->get('end');
		$today = date('Y-m-d');
		$year = date('Y');
		$testTypeID = $request->get('test_type');

		//	Apply filters if any
		if($request->has('filter')){

			if(!$to) $to=$today;

			if(strtotime($from)>strtotime($to)||strtotime($from)>strtotime($today)||strtotime($to)>strtotime($today)){
                $request->session()->flash('message', trans('messages.check-date-range'));
			}

			$months = json_decode(self::getMonths($from, $to));
			$data = TestType::getPrevalenceCounts($from, $to, $testTypeID);
			$chart = self::getPrevalenceRatesChart($testTypeID);
		}
		else
		{
			// Get all tests for the current year
			$test = UnhlsTest::where('time_created', 'LIKE', date('Y').'%');
			$periodStart = $test->min('time_created'); //Get the minimum date
			$periodEnd = $test->max('time_created'); //Get the maximum date
			$data = TestType::getPrevalenceCounts($periodStart, $periodEnd);
			$chart = self::getPrevalenceRatesChart();
		}

		return view('reports.prevalence.index')
						->with('data', $data)
						->with('chart', $chart)
						->withInput($request->all());
	}

	/**
	* Get months: return months for time_created column when filter dates are set
	*/
	public static function getMonths($from, $to){
		$today = "'".date("Y-m-d")."'";
		$year = date('Y');
		$tests = UnhlsTest::select('time_created')->distinct();

		if(strtotime($from)===strtotime($today)){
			$tests = $tests->where('time_created', 'LIKE', $year.'%');
		}
		else
		{
			$toPlusOne = date_add(new DateTime($to), date_interval_create_from_date_string('1 day'));
			$tests = $tests->whereBetween('time_created', array($from, $toPlusOne));
		}

		$allDates = $tests->lists('time_created');
		asort($allDates);
		$yearMonth = function($value){return strtotime(substr($value, 0, 7));};
		$allDates = array_map($yearMonth, $allDates);
		$allMonths = array_unique($allDates);
		$dates = array();

		foreach ($allMonths as $date) {
			$dateInfo = getdate($date);
			$dates[] = array('months' => $dateInfo['mon'], 'label' => substr($dateInfo['month'], 0, 3),
				'annum' => $dateInfo['year']);
		}

		return json_encode($dates);
	}

    /**
     * Display prevalence rates chart
     *
     * @param Request $request
     * @param int $testTypeID
     * @return Response
     */
	public static function getPrevalenceRatesChart(Request $request, $testTypeID = 0){
		$from = $request->get('start');
		$to = $request->get('end');
		$months = json_decode(self::getMonths($from, $to));
		$testTypes = new Illuminate\Database\Eloquent\Collection();

		if($testTypeID == 0){

			$testTypes = TestType::supportPrevalenceCounts();
		}else{
			$testTypes->add(TestType::find($testTypeID));
		}

		$options = '{
			"chart": {
				"type": "spline"
			},
			"title": {
				"text":"'.trans('messages.positivity-rates').'"
			},
			"subtitle": {
				"text":';
				if($from==$to)
					$options.='"'.trans('messages.for-the-year').' '.date('Y').'"';
				else
					$options.='"'.trans('messages.from').' '.$from.' '.trans('messages.to').' '.$to.'"';
			$options.='},
			"credits": {
				"enabled": false
			},
			"navigation": {
				"buttonOptions": {
					"align": "right"
				}
			},
			"series": [';
				$counts = count($testTypes);

					foreach ($testTypes as $testType) {
						$options.= '{
							"name": "'.$testType->name.'","data": [';
								$counter = count($months);
								foreach ($months as $month) {
								$data = $testType->getPrevalenceCount($month->annum, $month->months);
									if($data->isEmpty()){
										$options.= '0.00';
										if($counter==1)
											$options.='';
										else
											$options.=',';
									}
									else{
										foreach ($data as $datum) {
											$options.= $datum->rate;

											if($counter==1)
												$options.='';
											else
												$options.=',';
										}
									}
								$counter--;
							}
							$options.=']';
						if($counts==1)
							$options.='}';
						else
							$options.='},';
						$counts--;
					}
			$options.='],
			"xAxis": {
				"categories": [';
				$count = count($months);
					foreach ($months as $month) {
						$options.= '"'.$month->label." ".$month->annum;
						if($count==1)
							$options.='" ';
						else
							$options.='" ,';
						$count--;
					}
				$options.=']
			},
			"yAxis": {
				"title": {
					"text": "'.trans('messages.prevalence-rates-label').'"
				},
				"min": "0",
				"max": "100"
			},
			"exporting": {
				"buttons":{
					"contextButtons": {
						"symbol": "url(../../../i/button_download.png)",
						"symbolStrokeWidth": "1",
						"symbolFill": "#a4edba",
						"symbolStroke": "#330033"


					}
				}

			}
		}';
	return $options;
	}
	//	Begin count reports functions

    /**
     * Display a test((un)grouped) and specimen((un)grouped) counts.
     * @param Request $request
     * @return
     * @throws \Exception
     */
	public function countReports(Request $request){
		$date = date('Y-m-d');
		$from = $request->get('start');
		if(!$from) $from = date('Y-m-01');
		$to = $request->get('end');
		if(!$to) $to = $date;
		$toPlusOne = date_add(new DateTime($to), date_interval_create_from_date_string('1 day'));
		$counts = $request->get('counts');
		$accredited = array();
		//	Begin grouped test counts
		if($counts==trans('messages.grouped-test-counts'))
		{
			$testCategories = TestCategory::all();
			$testTypes = TestType::all();
			$ageRanges = array('0-5', '5-15', '15-120');	//	Age ranges - will definitely change in configurations
			$gender = array(UnhlsPatient::MALE, UnhlsPatient::FEMALE); 	//	Array for gender - male/female

			$perAgeRange = array();	// array for counts data for each test type and age range
			$perTestType = array();	//	array for counts data per testype
			if(strtotime($from)>strtotime($to)||strtotime($from)>strtotime($date)||strtotime($to)>strtotime($date)){
                $request->session()->flash('message', trans('messages.check-date-range'));
			}
			foreach ($testTypes as $testType) {
				$countAll = $this->getGroupedTestCounts($testType, null, null, $from, $toPlusOne->format('Y-m-d H:i:s'));
				$countMale = $this->getGroupedTestCounts($testType, [UnhlsPatient::MALE], null, $from, $toPlusOne->format('Y-m-d H:i:s'));
				$countFemale = $this->getGroupedTestCounts($testType, [UnhlsPatient::FEMALE], null, $from, $toPlusOne->format('Y-m-d H:i:s'));
				$perTestType[$testType->id] = ['countAll'=>$countAll, 'countMale'=>$countMale, 'countFemale'=>$countFemale];
				foreach ($ageRanges as $ageRange) {
					$maleCount = $this->getGroupedTestCounts($testType, [UnhlsPatient::MALE], $ageRange, $from, $toPlusOne->format('Y-m-d H:i:s'));
					$femaleCount = $this->getGroupedTestCounts($testType, [UnhlsPatient::FEMALE], $ageRange, $from, $toPlusOne->format('Y-m-d H:i:s'));
					$perAgeRange[$testType->id][$ageRange] = ['male'=>$maleCount, 'female'=>$femaleCount];
				}
			}
			return view('reports.counts.groupedTestCount')
						->with('testCategories', $testCategories)
						->with('ageRanges', $ageRanges)
						->with('gender', $gender)
						->with('perTestType', $perTestType)
						->with('perAgeRange', $perAgeRange)
						->with('accredited', $accredited)
						->withInput($request->all());
		}
		else if($counts==trans('messages.ungrouped-specimen-counts')){
			if(strtotime($from)>strtotime($to)||strtotime($from)>strtotime($date)||strtotime($to)>strtotime($date)){
                $request->session()->flash('message', trans('messages.check-date-range'));
			}

			$ungroupedSpecimen = array();
			foreach (SpecimenType::all() as $specimenType) {
				$rejected = $specimenType->countPerStatus([UnhlsSpecimen::REJECTED], $from, $toPlusOne->format('Y-m-d H:i:s'));
				$accepted = $specimenType->countPerStatus([UnhlsSpecimen::ACCEPTED], $from, $toPlusOne->format('Y-m-d H:i:s'));
				$total = $rejected+$accepted;
				$ungroupedSpecimen[$specimenType->id] = ["total"=>$total, "rejected"=>$rejected, "accepted"=>$accepted];
			}

			// $data = $data->groupBy('test_type_id')->paginate(Config::get('kblis.page-items'));
			return view('reports.counts.ungroupedSpecimenCount')
							->with('ungroupedSpecimen', $ungroupedSpecimen)
							->with('accredited', $accredited)
							->withInput($request->all());

		}
		else if($counts==trans('messages.grouped-specimen-counts')){
			$ageRanges = array('0-5', '5-15', '15-120');	//	Age ranges - will definitely change in configurations
			$gender = array(UnhlsPatient::MALE, UnhlsPatient::FEMALE); 	//	Array for gender - male/female

			$perAgeRange = array();	// array for counts data for each test type and age range
			$perSpecimenType = array();	//	array for counts data per testype
			if(strtotime($from)>strtotime($to)||strtotime($from)>strtotime($date)||strtotime($to)>strtotime($date)){
                $request->session()->flash('message', trans('messages.check-date-range'));
			}
			$specimenTypes = SpecimenType::all();
			foreach ($specimenTypes as $specimenType) {
				$countAll = $specimenType->groupedSpecimenCount([UnhlsPatient::MALE, UnhlsPatient::FEMALE], null, $from, $toPlusOne->format('Y-m-d H:i:s'));
				$countMale = $specimenType->groupedSpecimenCount([UnhlsPatient::MALE], null, $from, $toPlusOne->format('Y-m-d H:i:s'));
				$countFemale = $specimenType->groupedSpecimenCount([UnhlsPatient::FEMALE], null, $from, $toPlusOne->format('Y-m-d H:i:s'));
				$perSpecimenType[$specimenType->id] = ['countAll'=>$countAll, 'countMale'=>$countMale, 'countFemale'=>$countFemale];
				foreach ($ageRanges as $ageRange) {
					$maleCount = $specimenType->groupedSpecimenCount([UnhlsPatient::MALE], $ageRange, $from, $toPlusOne->format('Y-m-d H:i:s'));
					$femaleCount = $specimenType->groupedSpecimenCount([UnhlsPatient::FEMALE], $ageRange, $from, $toPlusOne->format('Y-m-d H:i:s'));
					$perAgeRange[$specimenType->id][$ageRange] = ['male'=>$maleCount, 'female'=>$femaleCount];
				}
			}
			return view('reports.counts.groupedSpecimenCount')
						->with('specimenTypes', $specimenTypes)
						->with('ageRanges', $ageRanges)
						->with('gender', $gender)
						->with('perSpecimenType', $perSpecimenType)
						->with('perAgeRange', $perAgeRange)
						->with('accredited', $accredited)
						->withInput($request->all());
		}
		else{
			if(strtotime($from)>strtotime($to)||strtotime($from)>strtotime($date)||strtotime($to)>strtotime($date)){
                $request->session()->flash('message', trans('messages.check-date-range'));
			}

			$ungroupedTests = array();
			foreach (TestType::all() as $testType) {
				$pending = $testType->countPerStatus([UnhlsTest::PENDING, UnhlsTest::STARTED], $from, $toPlusOne->format('Y-m-d H:i:s'));
				$complete = $testType->countPerStatus([UnhlsTest::COMPLETED, UnhlsTest::VERIFIED], $from, $toPlusOne->format('Y-m-d H:i:s'));
				$ungroupedTests[$testType->id] = ["complete"=>$complete, "pending"=>$pending];
			}

			// $data = $data->groupBy('test_type_id')->paginate(Config::get('kblis.page-items'));
			return view('reports.counts.ungroupedTestCount')
							->with('ungroupedTests', $ungroupedTests)
							->with('accredited', $accredited)
							->withInput($request->all());
		}
	}

	/*
	*	Begin turnaround time functions - functions related to the turnaround time report
	*	Most have been borrowed from the original BLIS by C4G
	*/
	/*
	* 	getPercentile() returns the percentile value from the given list
	*/
	public static function getPercentile($list, $ile_value)
	{
		$num_values = count($list);
		sort($list);
		$mark = ceil(round($ile_value/100, 2) * $num_values);
		return $list[$mark-1];
	}
	/*
	* 	week_to_date() returns timestamp for the first day of the week (Monday)
	*	@var $week_num and $year
	*/
	public static function week_to_date($week_num, $year)
	{
		# Returns timestamp for the first day of the week (Monday)
		$week = $week_num;
		$Jan1 = mktime (0, 0, 0, 1, 1, $year); //Midnight
		$iYearFirstWeekNum = (int) strftime("%W", $Jan1);
		if ($iYearFirstWeekNum == 1)
		{
			$week = $week - 1;
		}
		$weekdayJan1 = date ('w', $Jan1);
		$FirstMonday = strtotime(((4-$weekdayJan1)%7-3) . ' days', $Jan1);
		$CurrentMondayTS = strtotime(($week) . ' weeks', $FirstMonday);
		return ($CurrentMondayTS);
	}
	/*
	* 	rawTaT() returns list of timestamps for tests that were registered and handled between date_from and date_to
	*	optional @var $from, $to, $labSection, $testType
	*/
	public static function rawTaT($from, $to, $labSection, $testType){
		$rawTat = DB::table('unhls_tests')->select(DB::raw('UNIX_TIMESTAMP(time_created) as timeCreated, UNIX_TIMESTAMP(time_started) as timeStarted, UNIX_TIMESTAMP(time_completed) as timeCompleted, targetTAT'))
						->join('test_types', 'test_types.id', '=', 'unhls_tests.test_type_id')
						->whereIn('test_status_id', [UnhlsTest::COMPLETED, UnhlsTest::VERIFIED]);
						if($from && $to){
							$rawTat = $rawTat->whereBetween('time_created', [$from, $to]);
						}
						else{
							$rawTat = $rawTat->where('time_created', 'LIKE', '%'.date("Y").'%');
						}
						if($labSection){
							$rawTat = $rawTat->where('test_category_id', $labSection);
						}
						if($testType){
							$rawTat = $rawTat->where('test_type_id', $testType);
						}
		return $rawTat->get();
	}
	/*
	* 	getTatStats() calculates Weekly progression of TAT values for a given test type and time period
	*	optional @var $from, $to, $labSection, $testType, $interval
	*/
	public static function getTatStats($from, $to, $labSection, $testType, $interval){
		# Calculates Weekly progression of TAT values for a given test type and time period

		$resultset = self::rawTaT($from, $to, $labSection, $testType);
		# {resultentry_ts, specimen_id, date_collected_ts, ...}

		$progression_val = array();
		$progression_count = array();
		$percentile_tofind = 90;
		$percentile_count = array();
		$goal_val = array();
		# Return {month=>[avg tat, percentile tat, goal tat, [overdue specimen_ids], [pending specimen_ids]]}

		if($interval == 'M'){
			foreach($resultset as $record)
			{
				$timeCreated = $record->timeCreated;
				$timeCreated_parsed = date("Y-m-d", $timeCreated);
				$timeCreated_parts = explode("-", $timeCreated_parsed);
				$month_ts = mktime(0, 0, 0, $timeCreated_parts[1], 0, $timeCreated_parts[0]);
				$month_ts_datetime = date("Y-m-d H:i:s", $month_ts);
				$wait_diff = ($record->timeStarted - $record->timeCreated); //Waiting time
				$date_diff = ($record->timeCompleted - $record->timeStarted); //Turnaround time

				if(!isset($progression_val[$month_ts]))
				{
					$progression_val[$month_ts] = array();
					$progression_val[$month_ts][0] = $date_diff;
					$progression_val[$month_ts][1] = $wait_diff;
					$progression_val[$month_ts][4] = array();
					$progression_val[$month_ts][4][] = $record;

					$percentile_count[$month_ts] = array();
					$percentile_count[$month_ts][] = $date_diff;

					$progression_count[$month_ts] = 1;

					if(!$record->targetTAT==null)
						$goal_tat[$month_ts] = $record->targetTAT; //Hours
					else
						$goal_tat[$month_ts] = 0.00; //Hours
				}
				else
				{
					$progression_val[$month_ts][0] += $date_diff;
					$progression_val[$month_ts][1] += $wait_diff;
					$progression_val[$month_ts][4][] = $record;

					$percentile_count[$month_ts][] = $date_diff;

					$progression_count[$month_ts] += 1;
				}
			}

			foreach($progression_val as $key=>$value)
			{
				# Find average TAT
				$progression_val[$key][0] = $value[0]/$progression_count[$key];

				# Determine percentile value
				$progression_val[$key][3] = self::getPercentile($percentile_count[$key], $percentile_tofind);

				# Convert from sec timestamp to Hours
				$progression_val[$key][0] = ($value[0]/$progression_count[$key])/(60*60);//average TAT
				$progression_val[$key][1] = ($value[1]/$progression_count[$key])/(60*60);//average WT
				$progression_val[$key][3] = $progression_val[$key][3]/(60*60);// Percentile ???

				$progression_val[$key][2] = $goal_tat[$key];

			}
		}
		else if($interval == 'D'){
			foreach($resultset as $record)
			{
				$date_collected = $record->timeCreated;
				$day_ts = $date_collected;
				$wait_diff = ($record->timeStarted - $record->timeCreated); //Waiting time
				$date_diff = ($record->timeCompleted - $record->timeStarted); //Turnaround time
				if(!isset($progression_val[$day_ts]))
				{
					$progression_val[$day_ts] = array();
					$progression_val[$day_ts][0] = $date_diff;
					$progression_val[$day_ts][1] = $wait_diff;
					$progression_val[$day_ts][4] = array();
					$progression_val[$day_ts][4][] = $record;

					$percentile_count[$day_ts] = array();
					$percentile_count[$day_ts][] = $date_diff;

					$progression_count[$day_ts] = 1;

					$goal_tat[$day_ts] = $record->targetTAT; //Hours
				}
				else
				{
					$progression_val[$day_ts][0] += $date_diff;
					$progression_val[$day_ts][1] += $wait_diff;
					$progression_val[$day_ts][4][] = $record;

					$percentile_count[$day_ts][] = $date_diff;

					$progression_count[$day_ts] += 1;
				}
			}

			foreach($progression_val as $key=>$value)
			{
				# Find average TAT
				$progression_val[$key][0] = $value[0]/$progression_count[$key];

				# Determine percentile value
				$progression_val[$key][3] = self::getPercentile($percentile_count[$key], $percentile_tofind);

				# Convert from sec timestamp to Hours
				$progression_val[$key][0] = ($value[0]/$progression_count[$key])/(60*60);//average TAT
				$progression_val[$key][1] = ($value[1]/$progression_count[$key])/(60*60);//average WT
				$progression_val[$key][3] = $progression_val[$key][3]/(60*60);// Percentile ???

				$progression_val[$key][2] = $goal_tat[$key];

			}
		}
		else{
			foreach($resultset as $record)
			{
				$date_collected = $record->timeCreated;
				$week_collected = date("W", $date_collected);
				$year_collected = date("Y", $date_collected);
				$week_ts = self::week_to_date($week_collected, $year_collected);
				$wait_diff = ($record->timeStarted - $record->timeCreated); //Waiting time
				$date_diff = ($record->timeCompleted - $record->timeStarted); //Turnaround time

				if(!isset($progression_val[$week_ts]))
				{
					$progression_val[$week_ts] = array();
					$progression_val[$week_ts][0] = $date_diff;
					$progression_val[$week_ts][1] = $wait_diff;
					$progression_val[$week_ts][4] = array();
					$progression_val[$week_ts][4][] = $record;

					$percentile_count[$week_ts] = array();
					$percentile_count[$week_ts][] = $date_diff;

					$progression_count[$week_ts] = 1;

					if(!$record->targetTAT==null)
						$goal_tat[$week_ts] = $record->targetTAT; //Hours
					else
						$goal_tat[$week_ts] = 0.00; //Hours
				}
				else
				{
					$progression_val[$week_ts][0] += $date_diff;
					$progression_val[$week_ts][1] += $wait_diff;
					$progression_val[$week_ts][4][] = $record;

					$percentile_count[$week_ts][] = $date_diff;

					$progression_count[$week_ts] += 1;
				}
			}

			foreach($progression_val as $key=>$value)
			{
				# Find average TAT
				$progression_val[$key][0] = $value[0]/$progression_count[$key];

				# Determine percentile value
				$progression_val[$key][3] = self::getPercentile($percentile_count[$key], $percentile_tofind);

				# Convert from sec timestamp to Hours
				$progression_val[$key][0] = ($value[0]/$progression_count[$key])/(60*60);//average TAT
				$progression_val[$key][1] = ($value[1]/$progression_count[$key])/(60*60);//average WT
				$progression_val[$key][3] = $progression_val[$key][3]/(60*60);// Percentile ???

				$progression_val[$key][2] = $goal_tat[$key];

			}
		}
		# Return {month=>[avg tat, percentile tat, goal tat, [overdue specimen_ids], [pending specimen_ids], avg wait time]}
		return $progression_val;
	}

    /**
     * turnaroundTime() function returns the turnaround time blade with necessary contents
     *
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
	public function turnaroundTime(Request $request)
	{
		$today = date('Y-m-d');
		$from = $request->get('start');
		$to = $request->get('end');
		if(!$to){
			$to=$today;
		}
		$testCategory = $request->get('section_id');
		$testType = $request->get('test_type');
		$labSections = TestCategory::lists('name', 'id');
		$interval = $request->get('period');
		$error = null;
		$accredited = array();

		if($testCategory)
			$testTypes = TestCategory::find($testCategory)->testTypes->lists('name', 'id');
		else
			$testTypes = array(""=>"");

		if($from||$to){
			if(strtotime($from)>strtotime($to)||strtotime($from)>strtotime($today)||strtotime($to)>strtotime($today)){
					$error = trans('messages.check-date-range');
			}
			else
			{
				$toPlusOne = date_add(new DateTime($to), date_interval_create_from_date_string('1 day'));
				$request->session()->flash('fine', '');
			}
		}
		$resultset = self::getTatStats($from, $to, $testCategory, $testType, $interval);
		return view('reports.tat.index')
					->with('labSections', $labSections)
					->with('testTypes', $testTypes)
					->with('resultset', $resultset)
					->with('testCategory', $testCategory)
					->with('testType', $testType)
					->with('interval', $interval)
					->with('error', $error)
					->with('accredited', $accredited)
					->withInput($request->all());
	}

	//	Begin infection reports functions

    /**
     * Display a table containing all infection statistics.
     * @param Request $request
     * @return
     * @throws \Exception
     */
	public function infectionReport(Request $request){

	 	$ageRanges = array('0-5'=>'Under 5 years',
	 					'5-14'=>'5 years and over but under 14 years',
	 					'14-120'=>'14 years and above');	//	Age ranges - will definitely change in configurations
		$gender = array(UnhlsPatient::MALE, UnhlsPatient::FEMALE); 	//	Array for gender - male/female
		$ranges = array('Low', 'Normal', 'High');
		$accredited = array();

		//	Fetch form filters
		$date = date('Y-m-d');
		$from = $request->get('start');
		if(!$from) $from = date('Y-m-01');

		$to = $request->get('end');
		if(!$to) $to = $date;

		$toPlusOne = date_add(new DateTime($to), date_interval_create_from_date_string('1 day'));

		$testCategory = $request->get('test_category');

		$infectionData = UnhlsTest::getInfectionData($from, $toPlusOne, $testCategory);	// array for counts data for each test type and age range

		return view('reports.infection.index')
					->with('gender', $gender)
					->with('ageRanges', $ageRanges)
					->with('ranges', $ranges)
					->with('infectionData', $infectionData)
					->with('accredited', $accredited)
					->withInput($request->all());
	}

    /**
     * Displays summary statistics on users application usage.
     * @param Request $request
     * @return
     */
	public function userStatistics(Request $request){

		//	Fetch form filters
		$date = date('Y-m-d');
		$from = $request->get('start');
		if(!$from) $from = date('Y-m-01');

		$to = $request->get('end');
		if(!$to) $to = $date;

		$selectedUser = $request->get('user');
		if(!$selectedUser)$selectedUser = "";
		else $selectedUser = " USER: ".User::find($selectedUser)->name;

		$reportTypes = array('Summary', 'Patient Registry', 'Specimen Registry', 'Tests Registry', 'Tests Performed');

		$selectedReport = $request->get('report_type');
		if(!$selectedReport)$selectedReport = 0;

		switch ($selectedReport) {
			case '1':
				$reportData = User::getPatientsRegistered($from, $to.' 23:59:59', $request->get('user'));
				$reportTitle = Lang::choice('messages.user-statistics-patients-register-report-title',1);
				break;
			case '2':
				$reportData = User::getSpecimensRegistered($from, $to.' 23:59:59', $request->get('user'));
				$reportTitle = Lang::choice('messages.user-statistics-specimens-register-report-title',1);
				break;
			case '3':
				$reportData = User::getTestsRegistered($from, $to.' 23:59:59', $request->get('user'));
				$reportTitle = Lang::choice('messages.user-statistics-tests-register-report-title',1);
				break;
			case '4':
				$reportData = User::getTestsPerformed($from, $to.' 23:59:59', $request->get('user'));
				$reportTitle = Lang::choice('messages.user-statistics-tests-performed-report-title',1);
				break;
			default:
				$reportData = User::getSummaryUserStatistics($from, $to.' 23:59:59', $request->get('user'));
				$reportTitle = Lang::choice('messages.user-statistics-summary-report-title',1);
				break;
		}

		$reportTitle = str_replace("[FROM]", $from, $reportTitle);
		$reportTitle = str_replace("[TO]", $to, $reportTitle);
		$reportTitle = str_replace("[USER]", $selectedUser, $reportTitle);

		return View('reports.userstatistics.index')
					->with('reportTypes', $reportTypes)
					->with('reportData', $reportData)
					->with('reportTitle', $reportTitle)
					->with('selectedReport', $selectedReport)
					->withInput($request->all());
	}

	/**
	* Returns qc index page
	*
	* @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	*/
	public function qualityControl()
	{
		$accredited = array();
		$controls = Control::all()->lists('name', 'id');
		$accredited = array();
		$tests = array();
		return view('reports.qualitycontrol.index')
			->with('accredited', $accredited)
			->with('tests', $tests)
			->with('controls', $controls);
	}

	/**
	* Returns qc results for a specific control page
	*
	* @param Input - controlId, date range
	* @return \Illuminate\Http\RedirectResponse
	*/
	public function qualityControlResults(Request $request)
	{
		$rules = array('start_date' => 'date|required',
					'end_date' => 'date|required',
					'control' => 'required');
		$validator = Validator::make($request->all(), $rules);

		if($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput();
		}
		else {
			$controlId = $request->get('control');
			$endDatePlusOne = date_add(new DateTime($request->get('end_date')), date_interval_create_from_date_string('1 day'));
			$dates= array($request->get('start_date'), $endDatePlusOne);
			$control = Control::find($controlId);
			$controlTests = ControlTest::where('control_id', '=', $controlId)
										->whereBetween('created_at', $dates)->get();
			$leveyJennings = $this->leveyJennings($control, $dates);
			return view('reports.qualitycontrol.results')
				->with('control', $control)
				->with('controlTests', $controlTests)
				->with('leveyJennings', $leveyJennings)
				->withInput($request->all());
		}
	}

    /**
     * Displays Surveillance
     * @param Request $request
     * @return
     */
	public function surveillance(Request $request){
		/*surveillance diseases*/
		//	Fetch form filters
		$date = date('Y-m-d');
		$from = $request->get('start');
		if(!$from) $from = date('Y-m-01');
		$to = $request->get('end');
		if(!$to) $to = $date;
		$accredited = array();

		$surveillance = UnhlsTest::getSurveillanceData($from, $to.' 23:59:59');
		$accredited = array();
		$tests = array();

		if($request->has('word')){
			$fileName = "surveillance_".$date.".doc";
			$headers = array(
				"Content-type"=>"text/html",
				"Content-Disposition"=>"attachment;Filename=".$fileName
			);
			$content = view('reports.surveillance.exportSurveillance')
							->with('surveillance', $surveillance)
							->with('tests', $tests)
							->with('accredited', $accredited)
							->withInput($request->all());

//			return Response::make($content,200, $headers);
			return response($content, 200)->withHeaders($headers);
		}else{
			return view('reports.surveillance.index')
					->with('accredited', $accredited)
					->with('tests', $tests)
					->with('surveillance', $surveillance)
					->with('accredited', $accredited)
					->withInput($request->all());
		}
	}

	/**
	 * Manage Surveillance Configurations
	 * @param
	 */
	public function surveillanceConfig(Request $request){

		$allSurveillanceIds = array();

		//edit or leave surveillance entries as is
		if ($request->get('surveillance')) {
			$diseases = $request->get('surveillance');

			foreach ($diseases as $id => $disease) {
				$allSurveillanceIds[] = $id;
				$surveillance = ReportDisease::find($id);
				$surveillance->test_type_id = $disease['test-type'];
				$surveillance->disease_id = $disease['disease'];
				$surveillance->save();
			}
		}

		//save new surveillance entries
		if ($request->get('new-surveillance')) {
			$diseases = $request->get('new-surveillance');

			foreach ($diseases as $id => $disease) {
				$surveillance = new ReportDisease;
				$surveillance->test_type_id = $disease['test-type'];
				$surveillance->disease_id = $disease['disease'];
				$surveillance->save();
				$allSurveillanceIds[] = $surveillance->id;

			}
		}

		//check if action is from a form submission
		if ($request->get('from-form')) {
			// Delete any pre-existing surveillance entries
			//that were not captured in any of the above save loops
			$allSurveillances = ReportDisease::all(array('id'));

			$deleteSurveillances = array();

			//Identify survillance entries to be deleted by Ids
			foreach ($allSurveillances as $key => $value) {
				if (!in_array($value->id, $allSurveillanceIds)) {
					$deleteSurveillances[] = $value->id;
				}
			}
			//Delete Surveillance entry if any
			if(count($deleteSurveillances)>0)ReportDisease::destroy($deleteSurveillances);
		}

		$diseaseTests = ReportDisease::all();

		return view('reportconfig.surveillance')
					->with('diseaseTests', $diseaseTests);
	}

    /**
     * Function to check object state before groupedTestCount
     * @param $ttypeob
     * @param null $gender
     * @param null $ageRange
     * @param null $from
     * @param null $to
     * @return int
     */
	public function getGroupedTestCounts($ttypeob, $gender=null, $ageRange=null, $from=null, $to=null)
	{
		if($ttypeob == null){
			return 0;
		}
		return $ttypeob->groupedTestCount($gender, $ageRange, $from, $to);
	}

    /**
     * Function to check object state before totalTestResults
     * @param $measureobj
     * @param null $gender
     * @param null $ageRange
     * @param null $from
     * @param null $to
     * @param null $range
     * @param null $positive
     * @return int
     */
	public function getTotalTestResults($measureobj, $gender=null, $ageRange=null, $from=null, $to=null, $range=null, $positive=null){
		if($measureobj == null){
			return 0;
		}
		return $measureobj->totalTestResults($gender, $ageRange, $from, $to, $range, $positive);
	}
	/**
	 * MOH 706
	 *
	 */
	public function moh706(){
		//	Variables definition
	}
	/**
	 * Manage Diseases reported on
	 * @param
	 */
	public function disease(Request $request){
		if ($request->all()) {
			$rules = array();
			$newDiseases = $request->get('new-diseases');

			if ($request->get('new-diseases')) {
				// create an array that form the rules array
				foreach ($newDiseases as $key => $value) {

					//Ensure no duplicate disease
					$rules['new-diseases.'.$key.'.disease'] = 'unique:diseases,name';
				}
			}

			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				return redirect('reportconfig.disease')->withErrors($validator);
			} else {

				$allDiseaseIds = array();

				//edit or leave disease entries as is
				if ($request->get('diseases')) {
					$diseases = $request->get('diseases');

					foreach ($diseases as $id => $disease) {
						$allDiseaseIds[] = $id;
						$diseases = Disease::find($id);
						$diseases->name = $disease['disease'];
						$diseases->save();
					}
				}

				//save new disease entries
				if ($request->get('new-diseases')) {
					$diseases = $request->get('new-diseases');

					foreach ($diseases as $id => $disease) {
						$diseases = new Disease;
						$diseases->name = $disease['disease'];
						$diseases->save();
						$allDiseaseIds[] = $diseases->id;
					}
				}

				//check if action is from a form submission
				if ($request->get('from-form')) {
					// Delete any pre-existing disease entries
					//that were not captured in any of the above save loops
					$allDiseases = Disease::all(array('id'));

					$deleteDiseases = array();

					//Identify disease entries to be deleted by Ids
					foreach ($allDiseases as $key => $value) {
						if (!in_array($value->id, $allDiseaseIds)) {

							//Allow delete if not in use
							$inUseByReports = Disease::find($value->id)->reportDiseases->toArray();
							if (empty($inUseByReports)) {

								// The disease is not in use
								$deleteDiseases[] = $value->id;
							}
						}
					}
					//Delete disease entry if any
					if(count($deleteDiseases)>0){

						Disease::destroy($deleteDiseases);
					}
				}
			}
		}
		$diseases = Disease::all();

		return View('reportconfig.disease')
					->with('diseases', $diseases);
	}

	public function stockLevel(Request $request){

		//	Fetch form filters
		$date = date('Y-m-d');
		$from = $request->get('start');
		if(!$from) $from = date('Y-m-01');

		$to = $request->get('end');
		if(!$to) $to = $date;

		$reportTypes = array('Monthly', 'Quarterly');


		$selectedReport = $request->get('report_type');
		if(!$selectedReport)$selectedReport = 0;

		switch ($selectedReport) {
			case '0':

				$reportData = Receipt::getIssuedCommodities($from, $to.' 23:59:59');
				$reportTitle = Lang::choice('messages.monthly-stock-level-report-title',1);
				break;
			case '1':
				$reportData = Receipt::getIssuedCommodities($from, $to.' 23:59:59');
				$reportTitle = Lang::choice('messages.quarterly-stock-level-report-title',1);
				break;
				default:
				$reportData = Receipt::getIssuedCommodities($from, $to.' 23:59:59');
				$reportTitle = Lang::choice('messages.monthly-stock-level-report-title',1);
				break;
		}

		$reportTitle = str_replace("[FROM]", $from, $reportTitle);
		$reportTitle = str_replace("[TO]", $to, $reportTitle);

		return view('reports.inventory.index')
					->with('reportTypes', $reportTypes)
					->with('reportData', $reportData)
					->with('reportTitle', $reportTitle)
					->with('selectedReport', $selectedReport)
					->withInput($request->all());
	}

    /**
     * Function to calculate the mean, SD, and UCL, LCL
     * for a given control measure.
     *
     * @param $control
     * @param $dates
     * @return json|false|string
     */
	public function leveyJennings($control, $dates)
	{
		foreach ($control->controlMeasures as $key => $controlMeasure) {
			if(!$controlMeasure->isNumeric())
			{
				//We ignore non-numeric results
				continue;
			}

			$results = $controlMeasure->results()->whereBetween('created_at', $dates)->lists('results');

			$count = count($results);

			if($count < 6)
			{
				$response[] = array('success' => false,
					'error' => "Too few results to create LJ for ".$controlMeasure->name);
				continue;
			}

			//Convert string results to float
			foreach ($results as &$result) {
				$result = (double) $result;
			}

			$total = 0;
			foreach ($results as $res) {
				$total += $res;
			}

			$average = round($total / $count, 2);

			$standardDeviation = $this->stat_standard_deviation($results);
			$standardDeviation  = round($standardDeviation, 2);

			$response[] = array('success' => true,
							'total' => $total,
							'average' => $average,
							'standardDeviation' => $standardDeviation,
							'plusonesd' => $average + $standardDeviation,
							'plustwosd' => $average + ($standardDeviation * 2),
							'plusthreesd' => $average + ($standardDeviation * 3),
							'minusonesd' => $average - ($standardDeviation),
							'minustwosd' => $average - ($standardDeviation * 2),
							'minusthreesd' => $average - ($standardDeviation * 3),
							'dates' => $controlMeasure->results()->lists('created_at'),
							'controlName' => $controlMeasure->name,
							'controlUnit' => $controlMeasure->unit,
							'results' => $results);
		}
		return json_encode($response);
	}

	/**
	 * This user-land implementation follows the implementation quite strictly;
	 * it does not attempt to improve the code or algorithm in any way. It will
	 * raise a warning if you have fewer than 2 values in your array, just like
	 * the extension does (although as an E_USER_WARNING, not E_WARNING).
	 *
	 * @param array $a
	 * @param bool $sample [optional] Defaults to false
	 * @return float|bool The standard deviation or false on error.
	 */
	function stat_standard_deviation(array $a, $sample = false) {
		$n = count($a);
		if ($n === 0) {
			trigger_error("The array has zero elements", E_USER_WARNING);
			return false;
		}
		if ($sample && $n === 1) {
			trigger_error("The array has only 1 element", E_USER_WARNING);
			return false;
		}
		$mean = array_sum($a) / $n;
		$carry = 0.0;
		foreach ($a as $val) {
			$d = ((double) $val) - $mean;
			$carry += $d * $d;
		};
		if ($sample) {
		   --$n;
		}
		return sqrt($carry / $n);
	}

    /**
     * Display data after applying the filters on the report uses patient ID
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
	public function cd4(Request $request){
		//	check if accredited
		$accredited = array();
		$from = $request->get('start');
		$to = $request->get('end');
		$pending = $request->get('pending');
		$date = date('Y-m-d');
		$error = '';
		//	Check dates
		if(!$from)
			$from = date('Y-m-01');
		if(!$to)
			$to = $date;
		//	Get columns
		$columns = array(Lang::choice('messages.cd4-less', 1), Lang::choice('messages.cd4-greater', 1));
		$rows = array(Lang::choice('messages.baseline', 1), Lang::choice('messages.follow-up', 1));
		//	Get test
		$test = TestType::find(TestType::getTestTypeIdByTestName('cd4'));
		$counts = array();
		foreach ($columns as $column)
		{
			foreach ($rows as $row)
			{
				if($test != null) {
					$counts[$column][$row] = $test->cd4($from, $to, $column, $row);
				}
				else {
					$counts[$column][$row] = 0;
				}
			}
		}
		if($request->has('word'))
		{
			$date = date("Ymdhi");
			$fileName = "cd4_report_".$date.".doc";
			$headers = array(
				"Content-type"=>"text/html",
				"Content-Disposition"=>"attachment;Filename=".$fileName
			);
			$content = view('reports.cd4.export')
				->with('columns', $columns)
				->with('rows', $rows)
				->with('accredited', $accredited)
				->with('test', $test)
				->with('counts', $counts)
				->withInput($request->all());

//			return Response::make($content,200, $headers);
            return response($content, 200)->withHeaders($headers);
		}
		else
		{
			return view('reports.cd4.index')
				->with('columns', $columns)
				->with('rows', $rows)
				->with('accredited', $accredited)
				->with('test', $test)
				->with('counts', $counts)
				->withInput($request->all());
		}
	}

    /**
     *    Function to check for accredited test types
     * @param $tests
     * @return array
     */
	public function accredited($tests)
	{
		$accredited = array();
		foreach ($tests as $test) {
			if($test->testType->isAccredited())
				array_push($accredited, $test->id);
		}
		return $accredited;
	}

    /**
     *    Function to check for accredited test types
     * @param string $month
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function hmis105($month = '')
	{
		$month = ($month == '') ? date('Y-m') : $month ;
		$testTypes = TestType::all();
		$testTypeCountArray = [];
		$testTypeCountArray['vdrl_rpr']['total'] = 0;
		$testTypeCountArray['vdrl_rpr']['positive'] = 0;

		/*ZN stain, modified ZN might have same fate as above */

		foreach ($testTypes as $testType) {
			if ($testType->testNameMapping != '') {
				$testSystemName = $testType->testNameMapping->system_name;
				$test_type_id = $testType->id;

				if ($testSystemName == 'malaria_microscopy')  {

					$positiveRanges = MeasureRange::where('measure_id',$testType->measures->first()->id)
						->where('result_interpretation_id', ResultInterpretation::POSITIVE)->lists('id');

					$totalUnderFive  = DailyTestTypeCount::where('date', 'like', '%'.$month.'%')->where('gender',UnhlsPatient::BOTH)
						->where('age_upper_limit','<',5)->where('age_lower_limit','=',0)->where('test_type_id',$test_type_id);
					$testTypeCountArray[$testSystemName]['total']['under_5'] = $totalUnderFive->sum('all');

					$totalAboveFive  = DailyTestTypeCount::where('date', 'like', '%'.$month.'%')->where('gender',UnhlsPatient::BOTH)
						->where('age_upper_limit','>=',100)->where('age_lower_limit','>=',5)->where('test_type_id',$test_type_id);
					$testTypeCountArray[$testSystemName]['total']['above_5'] = $totalAboveFive->sum('all');

					$positiveUnderFive  = DailyAlphanumericCount::where(function($q) use ($test_type_id, $month){
						$q->whereHas('dailyTestTypeCount', function($q)  use ($test_type_id, $month){
							$q->where(function($q) use ($test_type_id, $month){
								$q->where('date', 'like', '%'.$month.'%')->where('gender',UnhlsPatient::BOTH)
									->where('age_upper_limit','<',5)->where('age_lower_limit','=',0)
									->where('test_type_id',$test_type_id);
							});
						});
					})->whereIn('measure_range_id',$positiveRanges);
					$testTypeCountArray[$testSystemName]['positive']['under_5'] = $positiveUnderFive->sum('count');

					$totalAboveFive  = DailyAlphanumericCount::where(function($q) use ($test_type_id, $month){
						$q->whereHas('dailyTestTypeCount', function($q)  use ($test_type_id, $month){
							$q->where(function($q) use ($test_type_id, $month){
								$q->where('date', 'like', '%'.$month.'%')->where('gender',UnhlsPatient::BOTH)
									->where('age_upper_limit','>=',100)->where('age_lower_limit','=',5)
									->where('test_type_id',$test_type_id);
							});
						});
					})->whereIn('measure_range_id',$positiveRanges);
					$testTypeCountArray[$testSystemName]['positive']['above_5'] = $totalAboveFive->sum('count');

				}elseif ($testSystemName == 'malaria_rdts') {
					$positiveRange = MeasureRange::where('measure_id',$testType->measures->first()->id)
						->where('result_interpretation_id', ResultInterpretation::POSITIVE)->first();

					$positiveRange = ($positiveRange!='') ? $positiveRange->id : '' ;

					$totalUnderFive  = DailyTestTypeCount::where('date', 'like', '%'.$month.'%')->where('gender',UnhlsPatient::BOTH)
						->where('age_upper_limit','<',5)->where('age_lower_limit','=',0)->where('test_type_id',$test_type_id);
					$testTypeCountArray[$testSystemName]['total']['under_5'] = $totalUnderFive->sum('all');

					$totalAboveFive  = DailyTestTypeCount::where('date', 'like', '%'.$month.'%')->where('gender',UnhlsPatient::BOTH)
						->where('age_upper_limit','>=',100)->where('age_lower_limit','>=',5)->where('test_type_id',$test_type_id);
					$testTypeCountArray[$testSystemName]['total']['above_5'] = $totalAboveFive->sum('all');

					$positiveUnderFive  = DailyAlphanumericCount::where(function($q) use ($test_type_id, $month){
						$q->whereHas('dailyTestTypeCount', function($q)  use ($test_type_id, $month){
							$q->where(function($q) use ($test_type_id, $month){
								$q->where('date', 'like', '%'.$month.'%')->where('gender',UnhlsPatient::BOTH)
									->where('age_upper_limit','<',5)->where('age_lower_limit','=',0)
									->where('test_type_id',$test_type_id);
							});
						});
					})->where('measure_range_id',$positiveRange);
					$testTypeCountArray[$testSystemName]['positive']['under_5'] = $positiveUnderFive->sum('count');

					$totalAboveFive  = DailyAlphanumericCount::where(function($q) use ($test_type_id, $month){
						$q->whereHas('dailyTestTypeCount', function($q)  use ($test_type_id, $month){
							$q->where(function($q) use ($test_type_id, $month){
								$q->where('date', 'like', '%'.$month.'%')->where('gender',UnhlsPatient::BOTH)
									->where('age_upper_limit','>=',100)->where('age_lower_limit','=',5)
									->where('test_type_id',$test_type_id);
							});
						});
					})->where('measure_range_id',$positiveRange);
					$testTypeCountArray[$testSystemName]['positive']['above_5'] = $totalAboveFive->sum('count');

				}elseif ($testSystemName == 'hiv') {

					// HCT
					$hctCount  = DailyHIVCount::where('date', 'like', '%'.$month.'%')->where('purpose','HCT');
					$testTypeCountArray[$testSystemName]['determine']['HCT'] = $hctCount->where('measure_id',1)->sum('count');
					$testTypeCountArray[$testSystemName]['start_pak']['HCT'] = $hctCount->where('measure_id',2)->sum('count');
					$testTypeCountArray[$testSystemName]['unigold']['HCT'] = $hctCount->where('measure_id',3)->sum('count');

					// PMTCT
					$pmtctCount  = DailyHIVCount::where('date', 'like', '%'.$month.'%')->where('purpose','PMTCT');
					$testTypeCountArray[$testSystemName]['determine']['PMTCT'] = $pmtctCount->where('measure_id',1)->sum('count');
					$testTypeCountArray[$testSystemName]['start_pak']['PMTCT'] = $pmtctCount->where('measure_id',2)->sum('count');
					$testTypeCountArray[$testSystemName]['unigold']['PMTCT'] = $pmtctCount->where('measure_id',3)->sum('count');

					// CLINICAL DIAGNOSIS
					$clinicalDiagnosisCount  = DailyHIVCount::where('date', 'like', '%'.$month.'%')->where('purpose','CLINICAL DIAGNOSIS');
					$testTypeCountArray[$testSystemName]['determine']['CLINICAL DIAGNOSIS'] = $clinicalDiagnosisCount->where('measure_id',1)->sum('count');
					$testTypeCountArray[$testSystemName]['start_pak']['CLINICAL DIAGNOSIS'] = $clinicalDiagnosisCount->where('measure_id',2)->sum('count');
					$testTypeCountArray[$testSystemName]['unigold']['CLINICAL DIAGNOSIS'] = $clinicalDiagnosisCount->where('measure_id',3)->sum('count');

					// QUALITY CONTROL
					$qualityControlCount  = DailyHIVCount::where('date', 'like', '%'.$month.'%')->where('purpose','QUALITY CONTROL');
					$testTypeCountArray[$testSystemName]['determine']['QUALITY CONTROL'] = $qualityControlCount->where('measure_id',1)->sum('count');
					$testTypeCountArray[$testSystemName]['start_pak']['QUALITY CONTROL'] = $qualityControlCount->where('measure_id',2)->sum('count');
					$testTypeCountArray[$testSystemName]['unigold']['QUALITY CONTROL'] = $qualityControlCount->where('measure_id',3)->sum('count');

					// SMC
					$smcCount  = DailyHIVCount::where('date', 'like', '%'.$month.'%')->where('purpose','SMC');
					$testTypeCountArray[$testSystemName]['determine']['SMC'] = $smcCount->where('measure_id',1)->sum('count');
					$testTypeCountArray[$testSystemName]['start_pak']['SMC'] = $smcCount->where('measure_id',2)->sum('count');
					$testTypeCountArray[$testSystemName]['unigold']['SMC'] = $smcCount->where('measure_id',3)->sum('count');

					$totalCount  = DailyHIVCount::where('date', 'like', '%'.$month.'%');
					$testTypeCountArray[$testSystemName]['determine']['total'] = $totalCount->where('measure_id',1)->sum('count');
					$testTypeCountArray[$testSystemName]['start_pak']['total'] = $totalCount->where('measure_id',2)->sum('count');
					$testTypeCountArray[$testSystemName]['unigold']['total'] = $totalCount->where('measure_id',3)->sum('count');

				}elseif ($testSystemName == 'gram_stain') {
					$measureSystemName = ($testType->measures->first()->measureNameMapping != '') ?
								$testType->measures->first()->measureNameMapping->system_name : '' ;

					$testTypeCount  = DailyTestTypeCount::where('date', 'like', '%'.$month.'%')->where('gender',UnhlsPatient::BOTH)
						->where('age_upper_limit','>=',100)->where('age_lower_limit','=',0)
						->where('test_type_id',$test_type_id)->where('test_type_id',$test_type_id);
					$testTypeCountArray[$testSystemName][$measureSystemName]['total'] = $testTypeCount->sum('all');

					$negatives = DailyNegativeGramStain::lists('gram_stain_range_id');
					$testTypeCount  = DailyTestTypeCount::with('dailyGramStainResultCount','dailyGramStainResultCount.gramStainRange')
						->where('date', 'like', '%'.$month.'%')->where('gender',UnhlsPatient::BOTH)
						->where('age_upper_limit','>=',100)->where('age_lower_limit','=',0)
						->where('test_type_id',$test_type_id)->where('test_type_id',$test_type_id)
						->where(function($q) use ($negatives){
							$q->whereHas('dailyGramStainResultCount', function($q)  use ($negatives){
								$q->where(function($q) use ($negatives){
									$q->whereHas('gramStainRange', function($q)  use ($negatives){
										$q->whereNotIn('id',$negatives);
									});
								});
							});
						});
					$testTypeCountArray[$testSystemName][$measureSystemName]['positive'] = $testTypeCount->sum('all');

				}elseif ($testSystemName == 'culture_sensitivity') {

					$measureSystemName = ($testType->measures->first()->measureNameMapping != '') ?
								$testType->measures->first()->measureNameMapping->system_name : '' ;
					$testTypeCount  = DailyTestTypeCount::where('date', 'like', '%'.$month.'%')->where('gender',UnhlsPatient::BOTH)
						->where('age_upper_limit','>=',100)->where('age_lower_limit','=',0)
						->where('test_type_id',$test_type_id)->where('test_type_id',$test_type_id);
					$testTypeCountArray[$testSystemName][$measureSystemName]['total'] = $testTypeCount->sum('all');

					$negatives = DailyNegativeCulture::lists('organism_id');
					$testTypeCount  = DailyTestTypeCount::with('dailyOrganismCount')
						->where('date', 'like', '%'.$month.'%')->where('gender',UnhlsPatient::BOTH)
						->where('age_upper_limit','>=',100)->where('age_lower_limit','=',0)
						->where('test_type_id',$test_type_id)->where('test_type_id',$test_type_id)
						->where(function($q) use ($negatives){
							$q->whereHas('dailyOrganismCount', function($q)  use ($negatives){
								$q->where(function($q) use ($negatives){
									$q->whereHas('organism', function($q)  use ($negatives){
										$q->whereNotIn('id',$negatives);
									});
								});
							});
						});
					$testTypeCountArray[$testSystemName][$measureSystemName]['positive'] = $testTypeCount->sum('all');

				}elseif ($testType->hasNumericMeasures()) {
					foreach ($testType->measures as $measure) {

						if ($measure->measureNameMapping != '' && $measure->measureNameMapping->system_name == 'hgb') {
							$measureSystemName = $measure->measureNameMapping->system_name;
							// less than 8
							$testTypeCount  = DailyNumericRangeCount::with('dailyTestTypeCount')
								->where('date', 'like', '%'.$month.'%')->where('measure_id',$measure->id)
								->where('result','hbg_less_8')
								->where(function($q) use ($test_type_id){
									$q->whereHas('dailyTestTypeCount', function($q)  use ($test_type_id){
										$q->where('gender',UnhlsPatient::BOTH)->where('age_upper_limit','>=',100)->where('age_lower_limit','=',0);
									});
								});
							$testTypeCountArray[$testSystemName][$measureSystemName]['hbg_less_8'] = $testTypeCount->sum('count');

							// greater or equal 8
							$testTypeCount  = DailyNumericRangeCount::with('dailyTestTypeCount')
								->where('date', 'like', '%'.$month.'%')->where('measure_id',$measure->id)
								->where('result','hbg_equal_8')
								->where(function($q) use ($test_type_id){
									$q->whereHas('dailyTestTypeCount', function($q)  use ($test_type_id){
										$q->where('gender',UnhlsPatient::BOTH)->where('age_upper_limit','>=',100)->where('age_lower_limit','=',0);
									});
								});

							$testTypeCountArray[$testSystemName][$measureSystemName]['hbg_equal_8'] = $testTypeCount->sum('count');
						}elseif($measure->measureNameMapping != ''){

							$measureSystemName = $measure->measureNameMapping->system_name;
							$testTypeCount  = DailyNumericRangeCount::with('dailyTestTypeCount')
								->where('date', 'like', '%'.$month.'%')->where('measure_id',$measure->id)->where('result','all')
								->where(function($q) use ($test_type_id){
									$q->whereHas('dailyTestTypeCount', function($q)  use ($test_type_id){
										$q->where('gender',UnhlsPatient::BOTH)->where('age_upper_limit','>=',100)->where('age_lower_limit','=',0);
									});
								});
							$testTypeCountArray[$testSystemName][$measureSystemName]['total'] = $testTypeCount->sum('count');
						}
					}

				}elseif ($testType->hasAlphanumericMeasures()) {
					foreach ($testType->measures as $measure) {
						if ($measure->measureNameMapping != '' && $measure->measureNameMapping->system_name != '') {
							$measureSystemName = $measure->measureNameMapping->system_name;
							$testTypeCount  = DailyAlphanumericCount::with('dailyTestTypeCount')
								->where('date', 'like', '%'.$month.'%')->where('measure_id',$measure->id)
								->where(function($q) use ($test_type_id){
									$q->whereHas('dailyTestTypeCount', function($q)  use ($test_type_id){
										$q->where('gender',UnhlsPatient::BOTH)->where('age_upper_limit','>=',100)->where('age_lower_limit','=',0);
									});
								});

							$testTypeCountArray[$testSystemName][$measureSystemName]['total'] = $testTypeCount->sum('count');

							$positiveRange = MeasureRange::where('measure_id',$measure->id)
								->where('result_interpretation_id', ResultInterpretation::POSITIVE)->first()->id;

							$positive  = DailyAlphanumericCount::with('dailyTestTypeCount')
								->where('date', 'like', '%'.$month.'%')->where('measure_id',$measure->id)
								->where(function($q) use ($test_type_id){
									$q->whereHas('dailyTestTypeCount', function($q)  use ($test_type_id){
										$q->where('gender',UnhlsPatient::BOTH)->where('age_upper_limit','>=',100)->where('age_lower_limit','=',0);
									});
								})->where('measure_range_id',$positiveRange);
							$testTypeCountArray[$testSystemName][$measureSystemName]['positive'] = $positive->sum('count');
						}
					}
					if ($testType->testNameMapping->system_name == 'vdrl' || $testType->testNameMapping->system_name == 'rpr') {
						$testTypeCountArray['vdrl_rpr']['total'] = $testTypeCountArray['vdrl_rpr']['total'] +
							$testTypeCountArray[$testSystemName][$measureSystemName]['total'];
						$testTypeCountArray['vdrl_rpr']['positive'] = $testTypeCountArray['vdrl_rpr']['positive'] +
							$testTypeCountArray[$testSystemName][$measureSystemName]['positive'];
					}
				}else{
					$testTypeCount  = DailyTestTypeCount::with('dailyAlphanumericCount')
						->where('date', 'like', '%'.$month.'%')->where('gender',UnhlsPatient::BOTH)
						->where('age_upper_limit','>=',100)->where('age_lower_limit','=',0)
						->where('test_type_id',$test_type_id)->where('test_type_id',$test_type_id);

					$testTypeCountArray[$testSystemName][$measureSystemName]['total'] = $testTypeCount->sum('all');
				}
			}
		}

		return View('reports.hmis.105')
			->with('month', $month)
			->with('testTypeCountArray', $testTypeCountArray);
	}

	public function searchMicrobiology()
	{
		$dateFrom =  date('Y-m-01');
		$dateTo = date('Y-m-d');

		// Load the view and pass it the tests
		return View('reports.microbiology')
					->with('dateFrom', $dateFrom)
					->with('dateTo', $dateTo);
	}

	public function downloadMicrobiology(Request $request)
	{

		$dateFrom =  $request->get('date_from');
		$dateTo = $request->get('date_to');

		if(!$dateFrom) $dateFrom = date('Y-m-01');
		if(!$dateTo) $dateTo = date('Y-m-d');

		$drugs = Drug::all();

		$isolatedOrganisms = IsolatedOrganism::with(
				'test',
				'test.visit',
				'test.visit.patient',
				'test.specimen',
				'drugSusceptibilities',
				'drugSusceptibilities.drug',
				'organism'
			)->where(function($q) use ($dateFrom, $dateTo){
				$dateTo = $dateTo . ' 23:59:59';
				$q->where('created_at', '>=', $dateFrom);
				$q->where('created_at', '<=', $dateTo);
			})->orderBy('created_at', 'DESC')->get();
		$content = [];

		$i = 1;
		foreach ($isolatedOrganisms as $isolatedOrganism) {
			$content[$i]['Patient ID'] = $isolatedOrganism->test->visit->patient->ulin;
			$content[$i]['Sex'] = $isolatedOrganism->test->visit->patient->getGender();//sex
			$content[$i]['Age'] = $isolatedOrganism->test->visit->patient->getAge();//age
			$content[$i]['Hospitalized for more than 2 days (48 hours) at time of specimen collection? '] = ($isolatedOrganism->test->visit->hospitalized == 1) ? 'Yes' : 'No';//48hrs
			$content[$i]['Specimen Date'] = $isolatedOrganism->test->specimen->time_accepted;//specimen_date
			$content[$i]['Specimen Type'] = $isolatedOrganism->test->specimen->specimenType->name;//specimen_type
			$content[$i]['Organism'] = $isolatedOrganism->organism->name;

			// put all antibiotic indexes with empty values
			foreach ($drugs as $drug) {
				$content[$i][$drug->name] = '';
			}

			// update with available values as available
			foreach ($isolatedOrganism->drugSusceptibilities as $drugSusceptibility) {
				$content[$i][$drugSusceptibility->drug->name] = $drugSusceptibility->drugSusceptibilityMeasure->symbol;
			}
			$i++;
		}

		$fileName = $dateFrom.' to '.$dateTo;
		Excel::create($fileName, function($excel) use($content) {
			$excel->sheet('Sheet1', function($sheet) use($content) {
				$sheet->fromArray($content);
			});
		})->export('xls');
	}
}
