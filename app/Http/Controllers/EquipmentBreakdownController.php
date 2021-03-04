<?php

namespace App\Http\Controllers;

use App\Models\UNHLSEquipmentBreakdown;
use App\Models\UNHLSEquipmentInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EquipmentBreakdownController extends Controller {

	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	*/
	public function index()
	{

		//

		$items = UNHLSEquipmentBreakdown::get();
		return view('equipment.breakdown.index')->with('items',$items);

	}


	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	*/
	public function create()
	{
		//

		$breakdown_type = array('1' => 'Hardware', '2' => 'Software', '3' => 'Both');
		$equipment = UNHLSEquipmentInventory::get()->pluck('name','id')->toArray();
		return view('equipment.breakdown.create')
		->with('equipment',$equipment)
		->with('breakdown_type',$breakdown_type);

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

			'equipment_id' => 'required',
			'problem' => 'required',
			'action_taken' => 'required',
			);

			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator);
			} else {

				$item = new UNHLSEquipmentBreakdown;

				$item->district_id = config('constants.DISTRICT_ID') ;
				$item->facility_id = config('constants.FACILITY_ID');
				$item->year_id = config('constants.FIN_YEAR_ID');

				$item->equipment_id = $request->get('equipment_id');
				$item->equipment_code = $request->get('equipment_code');
				$item->equipment_type = $request->get('equipment_type');
				$item->description = $request->get('problem');
				$item->problem = $request->get('problem');
				$item->reporting_officer = $request->get('reporting_officer');
				$item->reporting_officer_email = $request->get('reporting_officer_email');
				$item->reporting_officer_contact = $request->get('reporting_officer_contact');
				$item->action_taken = $request->get('action_taken');
				$item->intervention_authority = $request->get('intervention_authority');
				$item->conclusion = $request->get('conclusion');
				$item->facility_code = $request->get('facility_code');
				$item->facility_level = $request->get('facility_level');
				$item->report_date = date('Y-m-d H:i:s', strtotime($request->get('report_date')));
				$item->breakdown_date = date('Y-m-d H:i:s',strtotime($request->get('report_date')));
				$item->verified_by = $request->get('verified_by');
				$item->verification_date = date('Y-m-d H:i:s',strtotime($request->get('verification_date')));


				$item->save();

				return redirect('equipmentbreakdown');
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
		* @return Response
		*/
		public function edit($id)
		{
			//
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
		* Show the form for creating a new resource.
		*
		* @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
		*/
		public function restore($id)
		{
			//

			$breakdown = UNHLSEquipmentBreakdown::find($id);
			return view('equipment.breakdown.restoration')->with('breakdown',$breakdown);

		}

		public function saveRestore(Request $request)
		{
			//

			$rules = array(

			'reviewed_by' => 'required',
			'review_date' => 'required'

			);

			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator);
			} else {

				$breakdown = UNHLSEquipmentBreakdown::find( $request->get('breakdown_id'));

				$breakdown->comment = $request->get('comment');
				$breakdown->restored_by = $request->get('reviewed_by');
				$breakdown->restore_date = $request->get('review_date');


				$breakdown->save();

				return redirect()->route('equipmentbreakdown');
			}
		}


	}
