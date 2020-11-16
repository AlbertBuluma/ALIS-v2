<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Models\User;
use App\Models\UnhlsVisit;
use App\Models\UnhlsTest;
use App\Models\UnhlsSpecimen;
use App\Models\TestType;

class DashboardController extends Controller {


    /**
     * Display dashboard.
     *
     * @return Response
     */
	public function index(Request $request){

        $dateFrom = date('Y-m-01');
        $dateTo =date('Y-m-d');

        $from = $request->date_from;
        $to = $request->date_to;

        if(isset($from)){
            $dateFrom= $from;
        }else{
            $from = $dateFrom;
        }
        if(isset($to)){
            $dateTo = $to;
        }else{
            $to =$dateTo;
        }



        $patients = UnhlsVisit::whereBetween('created_at', [$from, $to]);
        $patientCounts = $patients->count();
        if($patientCounts > 0){
            $outPatients = round($patients->whereVisitType('Out-Patient')->count() * 100/$patientCounts, 0);
        }else{
            $outPatients = 0.00;
        }

        $testCounts = UnhlsTest::where('test_status_id', '=', UnhlsTest::COMPLETED)->orWhere('test_status_id', '=', UnhlsTest::VERIFIED)
                    ->whereBetween('time_created', [$from, $to])->count();

        $testsReffered = UnhlsTest::where('test_status_id', '=', UnhlsTest::REFERRED_OUT)->whereBetween('time_created', [$from, $to])->count();

        $samplesRejected = UnhlsTest::where('test_status_id', '=', UnhlsTest::REJECTED)->whereBetween('time_created', [$from, $to])->count();

        $sampleCounts = UnhlsSpecimen::whereBetween('time_collected', [$from, $to])->count();

        if($sampleCounts > 0){
            $samplesAccepted = round(($sampleCounts - $samplesRejected) * 100/$sampleCounts, 2);
        }else{
            $samplesAccepted = 0.00;
        }

        $staffCount = User::count();

        $getPrevalenceCounts =  TestType::getPrevalenceCounts($from, $to, $testTypeID=0, $ageRange=null);
          $tb = $hiv = $malaria = 0.00;

        foreach($getPrevalenceCounts as $prevalence){
            if ($prevalence['test'] == 'Malaria RDTs'){
                $malaria = $prevalence['rate'];
            }
            elseif ($prevalence['test'] == 'TB') {
                $tb = $prevalence['rate'];
            }
            elseif($prevalence['test'] == 'HIV' || $prevalence['test'] == 'H.I.V'){
                $hiv = $prevalence['rate'];
            }
        }

        $testAnalytics = array('patientCnts' => $patientCounts , 'opd' => $outPatients, 'testCnts' => $testCounts, 'testsReffered' => $testsReffered,
            'sampleCnts' => $sampleCounts, 'samplesAccepted' => $samplesAccepted, 'samplesRejected' => $samplesRejected, 'malaria' => $malaria,
            'tb' => $tb, 'hiv' => $hiv);

        return view("dashboard.home")
            ->with('dateFrom', $dateFrom)
            ->with('dateTo', $dateTo)
            ->with('testAnalytics', $testAnalytics)
            ->with('staff', $staffCount);
    }

	/**
	 * Show the form for creating a new resource.
	 * GET /dashboard/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /dashboard
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /dashboard/{id}
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
	 * GET /dashboard/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /dashboard/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /dashboard/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
