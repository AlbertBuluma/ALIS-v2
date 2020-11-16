<?php
namespace App\Http\Controllers;

use App\Models\BbincidenceNature;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Bbincidence;
use Illuminate\Support\Facades\DB;

/**
 *Contains functions for managing bbincidence records
 *
 */
class BbincidenceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		$search = $request->search;
		$datefrom = $request->datefrom;
		$dateto = $request->dateto;

		if(\Entrust::can('manage_national_biorisk')){
			if($datefrom != ''){
			$bbincidences = Bbincidence::filterbydate($datefrom,$dateto)->orderBy('id','DESC')->paginate(\Config::get('kblis.page-items'))->appends(Input::except('_token'));
			}
			else
			$bbincidences = Bbincidence::search($search)->orderBy('id','DESC')->paginate(\Config::get('kblis.page-items'))->appends($request->except('_token'));
		}
		else{

			if($datefrom != ''){
			$bbincidences = Bbincidence::filterbydate($datefrom,$dateto)->orderBy('id','DESC')->paginate(\Config::get('kblis.page-items'))->appends(Input::except('_token'));
			}
			else
			$bbincidences = Bbincidence::search($search)->orderBy('id','DESC')->paginate(\Config::get('kblis.page-items'))->appends($request->except('_token'));
		}

		if (count($bbincidences) == 0) {
		 	\Session::flash('message', trans('messages.no-match'));
		}

		// Load the view and pass the bbincidences
		$bbcount=count($bbincidences);
		return View('bbincidence.index')->with('bbincidences', $bbincidences)->with('bbcount',$bbcount);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Create Bbincidence

		//return View::make('bbincidence.create')->with('lastInsertId', $lastInsertId);

		//$user_facility_id = Auth::user()->facility->id;

		//$facilitiesList = DB::table('facilities')->orderBy('name')->lists('name', 'id');

		//$userfacilityList = DB::table('facilities')->where('id', '=', Auth::user()->facility_id)->orderBy('name')->lists('name', 'id');

		//$naturesList = DB::table('unhls_bbnatures')->orderBy('priority')->orderBy('class')->lists('name', 'id');

		$natures = BbincidenceNature::orderBy('name')->get();
		//$causes = BbincidenceCause::orderBy('causename')->get();
		//$actions = BbincidenceAction::orderBy('actionname')->get();


		return View::make('bbincidence.create')->with('natures', $natures);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$rules = array(
		//	'patient_number' => 'required|unique:patients,patient_number',
			'facility_id' => 'required',
			'description' => 'required',
			//'occurrence_date' => ['required','date_format:Y-m-d|before:today'],
			'occurrence_date' => 'required',
			'occurrence_time' =>'required',
			'description' =>'required',
			'officer_fname' => 'required',
			'officer_lname' => 'required',
			'officer_cadre' => 'required',

			//'occurrence_time' => date("Y-m-d", strtotime($request->datepicker)),

		//'occurrence_time' => ['required','regex:/^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$/'],
		//	'intervention_time' => ['required','regex:/^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$/'],
		//	'analysis_time' => ['required','regex:/^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$/'],
			'nature' => 'required',
			'personnel_surname' =>'required',
			'personnel_othername' => 'required',
			'personnel_gender' => 'required',

		//	'personnel_dob' => 'required_with:personnel_surname',
		//	'personnel_age' => 'required_with:personnel_surname',
		//	'personnel_dob' => 'required_without:personnel_age',
		//	'personnel_age' => 'required_without:personnel_dob',
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {

			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		} else {
			// store


			$personnel_dob = Input::get('personnel_dob');
			$personnel_age = Input::get('personnel_age');

			//converting Age to DOB
			if ($personnel_dob=='' && $personnel_age!=''){
				$dob_year = date('Y')-$personnel_age;
				$personnel_dob = $dob_year.'-01-01';
			}



			$bbincidence = new Bbincidence;

			$bbincidence->facility_id = Input::get('facility_id');
			$bbincidence->occurrence_date = Input::get('occurrence_date');
			$bbincidence->occurrence_time = Input::get('occurrence_time');
			$bbincidence->firstaid = Input::get('firstaid');
			$bbincidence->personnel_id = Input::get('personnel_id');
			$bbincidence->personnel_surname = Input::get('personnel_surname');
			$bbincidence->personnel_othername = Input::get('personnel_othername');
			$bbincidence->personnel_gender = Input::get('personnel_gender');
			$bbincidence->personnel_dob = $personnel_dob;
			$bbincidence->personnel_age = $personnel_age;
			$bbincidence->personnel_category = Input::get('personnel_category');
			$bbincidence->personnel_telephone = Input::get('personnel_telephone');
			$bbincidence->personnel_email = Input::get('personnel_email');
			$bbincidence->nok_name = Input::get('nok_name');
			$bbincidence->nok_telephone = Input::get('nok_telephone');
			$bbincidence->nok_email = Input::get('nok_email');
			$bbincidence->lab_section = Input::get('lab_section');
			$occurrences = Input::get('nature');
			if(Input::get('nature')!=''){ $bbincidence->occurrence = implode(',', Input::get('nature') ); }
			$bbincidence->ulin = Input::get('ulin');
			$bbincidence->equip_name = Input::get('equip_name');
			$bbincidence->equip_code = Input::get('equip_code');
			$bbincidence->task = Input::get('task');
			$bbincidence->description = Input::get('description');
			$bbincidence->officer_fname = Input::get('officer_fname');
			$bbincidence->officer_lname = Input::get('officer_lname');
			$bbincidence->officer_cadre = Input::get('officer_cadre');
			$bbincidence->officer_telephone = Input::get('officer_telephone');

			$bbincidence->status = 'Ongoing';

			$bbincidence->createdby = Auth::user()->id;

			try{
				$bbincidence->save();

				$lastInsertId = DB::table('unhls_bbincidences')->max('id');
				$bbincidenceSerialNo = 'BB/'.Auth::user()->facility->code.'/'.date('Y').'/'.$lastInsertId;

				$bbincidence->serial_no = $bbincidenceSerialNo;
				$bbincidence->save();

				foreach ($occurrences as $occurrence){
				$bbincidence_nature_intermediate = new BbincidenceNatureIntermediate;
				$bbincidence_nature_intermediate->bbincidence_id = $bbincidence->id;
				$bbincidence_nature_intermediate->nature_id = $occurrence;
				$bbincidence_nature_intermediate->save();

				/*$connected = fopen("http://www.google.com:80/","r");
  				if($connected){
     				return true;
     			} else {
   					return false;
  				}*/



				/*$options = Bbincidence::with(array('bbnature' => function($q) use ($occurrence) {
    				$q->wherePivot('nature_id', '=', $occurrence);
    				}))->get();

				foreach ($options as $option){
				if($option->priority=='Major'){
					Mail::send('bbincidence.bbmajornotice', array(), function($message){
        			$message->to(explode(',','justusashaba@gmail.com,Ajustus_IC@aslm.org'))->subject('[BLIS UG] Major Incident Notice');
    				});
				}
				}*/

				}

			/*This is working
			foreach ($bbincidence->bbnature as $option){
				if($option->priority=='Major'){
					Mail::send('bbincidence.bbmajornotice', array('occurrence'=>$option->name,
						'priority'=>$option->priority,'class'=>$option->class,'serial'=>$bbincidenceSerialNo,'entrant'=>Auth::user()->name,
						'description'=>$bbincidence->description, 'hfacility'=>Auth::user()->facility->name,
						'district'=>Auth::user()->facility->district->name),
						 function($message){
        			$message->to(explode(',','justusashaba@gmail.com,kasuled@gmail.com,agnesnakakawa@gmail.com'))->subject('[UG BLIS] Major Incident Notification');
    				});
				}
				}*/

				$majorincidents='';
				$incidentpriorities='';
				foreach ($bbincidence->bbnature as $option){
					if($option->priority=='Major'){
					$incidentpriorities = $incidentpriorities.'Major';
					$majorincidents = $majorincidents.$option->name.'; ';
					}
				}

			/*	if(strpos($incidentpriorities, 'Major') !== false){
					Mail::send('bbincidence.bbmajornotice', array('majorincidents'=>$majorincidents,
						'serial'=>$bbincidenceSerialNo,'entrant'=>Auth::user()->name,
						'description'=>$bbincidence->description, 'hfacility'=>Auth::user()->facility->name,
						'district'=>Auth::user()->facility->district->name),
						 function($message){
        			$message->to(explode(',','justusashaba@gmail.com'))->subject('[UG BLIS] Major Incident Notification');
    				});
				}*/

			$url = \Session::get('SOURCE_URL');
			return Redirect::to($url)
			->with('message', 'Successfully created BB Incidence with ID '.$bbincidenceSerialNo);
			}catch(QueryException $e){
				echo $e;
				Log::error($e);

			}

			// redirect
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
		//Show a bbincidence
		$bbincidence = Bbincidence::find($id);

		$firstInsertedId = DB::table('unhls_bbincidences')->min('id');
		$lastInsertedId = DB::table('unhls_bbincidences')->max('id');

		$id>=$lastInsertedId ? $nextbbincidence=$lastInsertedId : $nextbbincidence = $id+1;
		$id<=$firstInsertedId ? $previousbbincidence=$firstInsertedId : $previousbbincidence = $id-1;

		//dd($bbincidence);

		//Show the view and pass the $bbincidence to it
		$content = View::make('bbincidence.show')->with('bbincidence', $bbincidence)->with('nextbbincidence', $nextbbincidence)
		->with('previousbbincidence', $previousbbincidence);

		return PDF::loadHTML($content)->stream('bbincidenceReport.pdf');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//Get the bbincidence
		$bbincidence = Bbincidence::find($id);

		$natures = BbincidenceNature::orderBy('class')->get();
		//$causes = BbincidenceCause::orderBy('causename')->get();
		//$actions = BbincidenceAction::orderBy('actionname')->get();

		$firstInsertedId = DB::table('unhls_bbincidences')->min('id');
		$lastInsertedId = DB::table('unhls_bbincidences')->max('id');

		$id>=$lastInsertedId ? $nextbbincidence=$lastInsertedId : $nextbbincidence = $id+1;
		$id<=$firstInsertedId ? $previousbbincidence=$firstInsertedId : $previousbbincidence = $id-1;

		//Open the Edit View and pass to it the $bbincidence
		return View::make('bbincidence.edit')->with('bbincidence', $bbincidence)->with('natures', $natures)
		->with('nextbbincidence', $nextbbincidence)->with('previousbbincidence', $previousbbincidence);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$rules = array(
		//	'patient_number' => 'required|unique:patients,patient_number',
			'facility_id'       => 'required',
			'description' => 'required',
		//	'dob' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {

			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		} else {
			// Update
			$bbincidence = Bbincidence::find($id);

			$personnel_dob = Input::get('personnel_dob');
			$personnel_age = Input::get('personnel_age');

			//converting Age to DOB
			if (($personnel_dob=='' or $personnel_dob=='0000-00-00') and $personnel_age!=''){
				$dob_year = date('Y')-$personnel_age;
				$personnel_dob = $dob_year.'-06-01';
			}

			$bbincidence->occurrence_date = Input::get('occurrence_date');
			$bbincidence->occurrence_time = Input::get('occurrence_time');
			$bbincidence->firstaid = Input::get('firstaid');
			$bbincidence->personnel_id = Input::get('personnel_id');
			$bbincidence->personnel_surname = Input::get('personnel_surname');
			$bbincidence->personnel_othername = Input::get('personnel_othername');
			$bbincidence->personnel_gender = Input::get('personnel_gender');
			$bbincidence->personnel_dob = $personnel_dob;
			$bbincidence->personnel_age = $personnel_age;
			$bbincidence->personnel_category = Input::get('personnel_category');
			$bbincidence->personnel_telephone = Input::get('personnel_telephone');
			$bbincidence->personnel_email = Input::get('personnel_email');
			$bbincidence->nok_name = Input::get('nok_name');
			$bbincidence->nok_telephone = Input::get('nok_telephone');
			$bbincidence->nok_email = Input::get('nok_email');
			$bbincidence->lab_section = Input::get('lab_section');
			$occurrences = Input::get('nature');
			if(Input::get('nature')!=''){ $bbincidence->occurrence = implode(',', Input::get('nature') ); }
			$bbincidence->ulin = Input::get('ulin');
			$bbincidence->equip_name = Input::get('equip_name');
			$bbincidence->equip_code = Input::get('equip_code');
			$bbincidence->task = Input::get('task');
			$bbincidence->description = Input::get('description');
			$bbincidence->officer_fname = Input::get('officer_fname');
			$bbincidence->officer_lname = Input::get('officer_lname');
			$bbincidence->officer_cadre = Input::get('officer_cadre');
			$bbincidence->officer_telephone = Input::get('officer_telephone');

			$bbincidence->updatedby = Auth::user()->id;
			$bbincidence->save();


			DB::table('unhls_bbincidences_nature')->where('bbincidence_id', '=', $bbincidence->id)->delete();
			if (isset($occurrences)){
			foreach ($occurrences as $occurrence){
				$bbincidence_nature_intermediate = new BbincidenceNatureIntermediate;
				$bbincidence_nature_intermediate->bbincidence_id = $bbincidence->id;
				$bbincidence_nature_intermediate->nature_id = $occurrence;
				$bbincidence_nature_intermediate->save();
			}
			}

			// redirect
			$url = \Session::get('SOURCE_URL');
			return Redirect::to($url)
			->with('message', 'Details for BB Incidence No '.$bbincidence->serial_no.' were successfully updated!') ->with('activebbincidence',$bbincidence ->id);

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
	 * @return Response
	 */
	public function delete($id)
	{
		//Soft delete the bbincidence
		$bbincidence = Bbincidence::find($id);

		$bbincidence->delete();

		// redirect
			$url = \Session::get('SOURCE_URL');
			return Redirect::to($url)
			->with('message', 'The commodity was successfully deleted!');
	}

	/**
	 * Return a Bbincidence collection that meets the searched criteria as JSON.
	 *
	 * @return Response
	 */
	public function search()
	{
        return Bbincidence::search(Input::get('text'))->take(\Config::get('kblis.limit-items'))->get()->toJson();
	}

	public function facility_search()
	{
        return Bbincidence::facility_search(Input::get('text'))->take(\Config::get('kblis.limit-items'))->get()->toJson();
	}

	public function filterbydate()
	{
        return Bbincidence::filterbydate(Input::get('text'))->take(\Config::get('kblis.limit-items'))->get()->toJson();
	}

	public function facility_filterbydate()
	{
        return Bbincidence::facility_filterbydate(Input::get('text'))->take(\Config::get('kblis.limit-items'))->get()->toJson();
	}


/*	public function clinical()
	{
		$searchterm = Input::get('searchterm');
		$datefrom = Input::get('datefrom');
		$dateto = Input::get('dateto');
		$user_facility = Auth::user()->facility_id;

		//->where('facility_id', '=', Auth::user()->facility_id)

		if($datefrom != ''){
			$bbincidences = Bbincidence::facility_filterbydate($datefrom,$dateto)->orderBy('id','DESC')->paginate(\Config::get('kblis.page-items'))->appends(Input::except('_token'));
		}
		else{
			$bbincidences = Bbincidence::facility_search($searchterm)->orderBy('id','DESC')->paginate(\Config::get('kblis.page-items'))->appends(Input::except('_token'));
		}

		if (count($bbincidences) == 0) {
		 	\Session::flash('message', trans('messages.no-match'));
		 }

		 // Load the view and pass the bbincidences
		$bbcount=count($bbincidences);

		return View::make('bbincidence.clinical')->with('bbincidences', $bbincidences)->withInput(Input::all())->with ($bbcount);

	} */

	public function clinicaledit($id)
	{
		//Get the bbincidence
		$bbincidence = Bbincidence::find($id);

		$natures = BbincidenceNature::orderBy('class')->get();
		$causes = BbincidenceCause::orderBy('causename')->get();
		$actions = BbincidenceAction::orderBy('actionname')->get();

		$firstInsertedId = DB::table('unhls_bbincidences')->min('id');
		$lastInsertedId = DB::table('unhls_bbincidences')->max('id');

		$id>=$lastInsertedId ? $nextbbincidence=$lastInsertedId : $nextbbincidence = $id+1;
		$id<=$firstInsertedId ? $previousbbincidence=$firstInsertedId : $previousbbincidence = $id-1;

		//Open the Edit View and pass to it the $bbincidence
		return View::make('bbincidence.clinicaledit')->with('bbincidence', $bbincidence)->with('natures', $natures)
		->with('causes', $causes)->with('actions', $actions)->with('nextbbincidence', $nextbbincidence)
		->with('previousbbincidence', $previousbbincidence);
	}

	public function clinicalupdate($id){
		//
		$rules = array(

		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		} else {
			// Update
			$bbincidence = Bbincidence::find($id);

			$bbincidence->extent = Input::get('extent');
			$bbincidence->intervention = Input::get('intervention');
			$bbincidence->intervention_date = Input::get('intervention_date');
			$bbincidence->intervention_time = Input::get('intervention_time');
			$bbincidence->intervention_followup = Input::get('intervention_followup');
			$bbincidence->mo_fname = Input::get('mo_fname');
			$bbincidence->mo_lname = Input::get('mo_lname');
			$bbincidence->mo_designation = Input::get('mo_designation');
			$bbincidence->mo_telephone = Input::get('mo_telephone');

			$bbincidence->save();

			// redirect
			$url = \Session::get('SOURCE_URL');
			return Redirect::to($url)
			->with('message', 'Details for BB Incidence No '.$bbincidence->serial_no.' were successfully updated!') ->with('activebbincidence',$bbincidence ->id);

		}
	}


	public function analysisedit($id)
	{
		//Get the bbincidence
		$bbincidence = Bbincidence::find($id);

		$causes = BbincidenceCause::orderBy('causename')->get();
		$actions = BbincidenceAction::orderBy('actionname')->get();

		$firstInsertedId = DB::table('unhls_bbincidences')->min('id');
		$lastInsertedId = DB::table('unhls_bbincidences')->max('id');

		$id>=$lastInsertedId ? $nextbbincidence=$lastInsertedId : $nextbbincidence = $id+1;
		$id<=$firstInsertedId ? $previousbbincidence=$firstInsertedId : $previousbbincidence = $id-1;

		//Open the Update View and pass to it the $bbincidence
		return View::make('bbincidence.analysisedit')->with('bbincidence', $bbincidence)
		->with('causes', $causes)->with('actions', $actions)->with('nextbbincidence', $nextbbincidence)
		->with('previousbbincidence', $previousbbincidence);
	}

	public function analysisupdate($id){
		//
		$rules = array(

		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		} else {
			// Update
			$bbincidence = Bbincidence::find($id);

			$causes = Input::get('cause');
			if(Input::get('cause')!=''){ $bbincidence->cause = implode(',', Input::get('cause') ); }
			$actions = Input::get('corrective_action');
			if(Input::get('corrective_action')!=''){ $bbincidence->corrective_action = implode(',', Input::get('corrective_action') ); }
			$bbincidence->referral_status = Input::get('referral_status');
			$bbincidence->status = Input::get('status');
			$bbincidence->analysis_date = Input::get('analysis_date');
			$bbincidence->analysis_time = Input::get('analysis_time');
			$bbincidence->bo_fname = Input::get('bo_fname');
			$bbincidence->bo_lname = Input::get('bo_lname');
			$bbincidence->bo_designation = Input::get('bo_designation');
			$bbincidence->bo_telephone = Input::get('bo_telephone');

			$bbincidence->save();

			DB::table('unhls_bbincidences_cause')->where('bbincidence_id', '=', $bbincidence->id)->delete();
			if (isset($causes)){
			foreach ($causes as $cause){
				$bbincidence_cause_intermediate = new BbincidenceCauseIntermediate;
				$bbincidence_cause_intermediate->bbincidence_id = $bbincidence->id;
				$bbincidence_cause_intermediate->cause_id = $cause;
				$bbincidence_cause_intermediate->save();
			}
			}

			DB::table('unhls_bbincidences_action')->where('bbincidence_id', '=', $bbincidence->id)->delete();
			if (isset($actions)){
			foreach ($actions as $action){
				$bbincidence_action_intermediate = new BbincidenceActionIntermediate;
				$bbincidence_action_intermediate->bbincidence_id = $bbincidence->id;
				$bbincidence_action_intermediate->action_id = $action;
				$bbincidence_action_intermediate->save();
			}
			}

			// redirect
			$url = \Session::get('SOURCE_URL');
			return Redirect::to($url)
			->with('message', 'Details for BB Incidence No '.$bbincidence->serial_no.' were successfully updated!') ->with('activebbincidence',$bbincidence ->id);

		}
	}


	public function responseedit($id)
	{
		//Get the bbincidence
		$bbincidence = Bbincidence::find($id);

		$firstInsertedId = DB::table('unhls_bbincidences')->min('id');
		$lastInsertedId = DB::table('unhls_bbincidences')->max('id');

		$id>=$lastInsertedId ? $nextbbincidence=$lastInsertedId : $nextbbincidence = $id+1;
		$id<=$firstInsertedId ? $previousbbincidence=$firstInsertedId : $previousbbincidence = $id-1;

		//Open the Update View and pass to it the $bbincidence
		return View::make('bbincidence.responseedit')->with('bbincidence', $bbincidence)
		->with('nextbbincidence', $nextbbincidence)->with('previousbbincidence', $previousbbincidence);
	}

	public function responseupdate($id){
		//
		$rules = array(

		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		} else {
			// Update
			$bbincidence = Bbincidence::find($id);

			$bbincidence->findings = Input::get('findings');
			$bbincidence->improvement_plan = Input::get('improvement_plan');
			$bbincidence->response_date = Input::get('response_date');
			$bbincidence->response_time = Input::get('response_time');
			$bbincidence->brm_fname = Input::get('brm_fname');
			$bbincidence->brm_lname = Input::get('brm_lname');
			$bbincidence->brm_designation = Input::get('brm_designation');
			$bbincidence->brm_telephone = Input::get('brm_telephone');

			$bbincidence->save();

			// redirect
			$url = \Session::get('SOURCE_URL');
			return Redirect::to($url)
			->with('message', 'Details for BB Incidence No '.$bbincidence->serial_no.' were successfully updated!') ->with('activebbincidence',$bbincidence ->id);

		}
	}


	public function bbfacilityreport()
	{
		$natures = BbincidenceNature::orderBy('class')->get();
		$causes = BbincidenceCause::orderBy('causename')->get();
		$actions = BbincidenceAction::orderBy('actionname')->get();

		$datefrom = Input::get('datefrom');
		$dateto = Input::get('dateto');

        $bbincidentnatureclasses = DB::table('unhls_bbnatures')->distinct()->get(['class']);

        //$bbincidentstatus = Bbincidence::

      /*  $bbincidentnaturecount = DB::table('unhls_bbnatures')->where('class','=','Mechanical')->select('priority','class','name', DB::raw('count(*) as total'))->join('unhls_bbincidences_nature','unhls_bbincidences_nature.nature_id','=','unhls_bbnatures.id')
					->groupBy('priority','class','name')
             		->get();         */

		$countbbincidentreferralstatus = Bbincidence::select('referral_status', DB::raw('count(referral_status) as total'))
					->groupBy('referral_status')
             		->get();

		return View::make('bbincidence.bbfacilityreport') ->with('bbincidentnatureclasses', $bbincidentnatureclasses)
			->with('natures', $natures)
			->with('causes', $causes)
			->with('actions', $actions)
			->with('countbbincidentreferralstatus', $countbbincidentreferralstatus);

	}

}
