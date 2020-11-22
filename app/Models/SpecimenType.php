<?php

namespace  App\Models;

use App\Models\UnhlsSpecimen;
use DateInterval;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecimenType extends Model
{
	/**
	 * Enabling soft deletes for specimen type details.
	 *
	 */
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'specimen_types';

	/**
	 * TestType relationship
	 */
	public function testTypes()
	{
	  return $this->belongsToMany('App\Models\TestType', 'testtype_specimentypes');
	}

	/**
	 * Specimen relationship
	 */
	public function specimen()
	{
	  return $this->hasMany('App\Models\UnhlsSpecimen');
	}
	/**
	* Return the counts for a specimen type given the specimen_status_id, and date range for ungrouped specimen
	*
	* @param $specimenStatusID, $from, $to
	*/
	public function countPerStatus($specimenStatusID, $from = null, $to = null)
	{

		$specimens = UnhlsSpecimen::where('specimen_type_id', $this->id)->whereIn('specimen_status_id', $specimenStatusID);
		if($to && $from){
			if(in_array($specimenStatusID, [UnhlsSpecimen::REJECTED]))
				$specimens = $specimens->whereBetween('time_rejected', [$from, $to]);
			else
				$specimens = $specimens->whereBetween('time_accepted', [$from, $to]);
		}

		return $specimens->count();

	}
	/**
	* Returns grouped specimen Counts with optional gender, age range, date range
	*
	* @param $gender, $ageRange, $from, $to
	*/
	public function groupedSpecimenCount($gender=null, $ageRange=null, $from=null, $to=null){
			$specimens = UnhlsSpecimen::where('specimen_type_id', $this->id)->whereIn('specimen_status_id', [UnhlsSpecimen::ACCEPTED]);
			if($to && $from){
				$specimens = $specimens->whereBetween('time_accepted', [$from, $to]);
			}
			if($gender){
				$specimens = $specimens->join('unhls_tests', 'specimens.id', '=', 'unhls_tests.specimen_id')
									   ->join('unhls_visits', 'unhls_tests.visit_id', '=', 'unhls_visits.id')
									   ->join('unhls_patients', 'unhls_visits.patient_id', '=', 'unhls_patients.id')
									   ->whereIn('gender', $gender);
			}
			if($ageRange){
				$ageRange = explode('-', $ageRange);
				$ageStart = $ageRange[0];
				$ageEnd = $ageRange[1];

				$now = new DateTime('now');
				$finishDate = $now->sub(new DateInterval('P'.$ageStart.'Y'))->format('Y-m-d');
				$startDate = $now->sub(new DateInterval('P'.$ageEnd.'Y'))->format('Y-m-d');

				$specimens = $specimens->whereBetween('dob', [$startDate, $finishDate]);
			}

		return $specimens->count();
	}
}
