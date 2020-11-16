<?php

namespace  App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class POC extends Model
{
	const MALE = 0;
	const FEMALE = 1;
	const BOTH = 2;
	const UNKNOWN = 3;
	/**
	 * Enabling soft deletes for patient details.
	 *
	 */
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'poc_tables';


	public function poc_result(){
		return $this->hasOne('POCResult', 'patient_id');
	}

	/**
	 * Visits relationship
	 */


    public function visits()
    {
        return $this->hasMany('UnhlsVisit');
    }

	/**
	 * Patient Age
	 *
	 * @param optional String - format [Y|YY|YYMM]
	 * @param optional Timestamp - age as at this date
	 * @return String x years y months
	 */
	public function getAge($format = "YYMM", $at = NULL)
	{
		if(!$at)$at = new DateTime('now');

		$dateOfBirth = new DateTime($this->dob);
		$interval = $dateOfBirth->diff($at);

		$age = "";

		switch ($format) {
			case 'Y':
				$age = $interval->y;break;
			case 'YY':
				$age = $interval->y ." years ";break;
			default:
				if($interval->y == 0){
					$age = $interval->format('%a days');
				}
				elseif($interval->y > 0 && $interval->y <= 2){
					$age = $interval->format('%m') + 12 * $interval->format('%y')." months";
				}
				else{
					$age=$interval->y." years ";
				}

				break;
		}

		return $age;
	}

	/**
	* Get patient's gender
	*
	* @param optional boolean $shortForm - return abbreviation (M/F). Default true
	* @return String gender
	*/
	public function getGender($shortForm=true)
	{
		if ($this->gender == UnhlsPatient::MALE)
		{
			return $shortForm?"M":trans("messages.male");
		}
		else if ($this->gender == UnhlsPatient::FEMALE)
		{
			return $shortForm?"F":trans("messages.female");
		}
	}

	/**
	* Search for patients meeting given criteria
	*
	* @param String $searchText
	* @return Collection
	*/
	public static function search($searchText)
	{
		return UnhlsPatient::where('patient_number', '=', $searchText)
						->orWhere('name', 'LIKE', '%'.$searchText.'%')
						->orWhere('external_patient_number', '=', $searchText);
	}
	/**
	* Get patients facility Id Number
	*
	*/
	public function getFacilityCode()
	{
		$facilityCode =\Config::get('constants.FACILITY_CODE');
		return $facilityCode;

	}

	/**
    * Get patients Unique Identification Number (ULIN)
    *
    * @return string
    */
    public function getUlin(){
    	$facilityCode ='';
    	$facilityCode = $this->getFacilityCode();
    	$registrationDate = strtotime($this->created_at);
    	$yearMonth = date('ym', $registrationDate);
    	$autoNum = DB::table('uuids')->max('id')+1;
        $name = preg_split("/\s+/", $this->name);
        $initials = null;
        $ulin ='';

    	foreach ($name as $n){
    		$initials .= $n[0];

    	}
    	return $facilityCode.'/'.$yearMonth.'/'.$autoNum.'/'.$initials;
    }
}
