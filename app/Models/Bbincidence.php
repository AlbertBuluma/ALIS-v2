<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Bbincidence extends Model
{
    use SoftDeletes;
	/**
	 * Enabling soft deletes for specimen type details.
	 *
	 */
	protected $dates = ['deleted_at'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'unhls_bbincidences';


	/**
	 * Facility relationship
	 */
	public function facility()
	{
		return $this->belongsTo('App\Models\UNHLSFacility', 'facility_id', 'id');
	}

	/**
	 * User relationship
	 */
	public function user()
	{
		return $this->belongsTo('App\Models\User', 'createdby', 'id');
	}

	/**
	 * Nature relationship
	 */
	public function bbnature()
	{
		return $this->belongsToMany('App\Models\BbincidenceNature', 'unhls_bbincidences_nature', 'bbincidence_id', 'nature_id');

		$bbnaturecount = Bbincidence::with( 'bbincidence_id', 'nature_id' )->where( 'bbincidence_id','=', 'bbincidence_id' )->first();
		$sum = $bbnaturecount[ 'nature_id'];
	}

	/**
	 * Cause relationship
	 */
	public function bbcause()
	{
		return $this->belongsToMany('App\Models\BbincidenceCause', 'unhls_bbincidences_cause', 'bbincidence_id', 'cause_id');
	}

	/**
	 * Action relationship
	 */
	public function bbaction()
	{
		return $this->belongsToMany('App\Models\BbincidenceAction', 'unhls_bbincidences_action', 'bbincidence_id', 'action_id');
	}

	/**
	* Search for bbincidencinces meeting given criteria
	*
	* @param String $searchText
	* @return Collection
	*/
	public static function search($searchText)
	{
		return Bbincidence::where('id', '=', $searchText)
						->orWhere('description', 'LIKE', '%'.$searchText.'%')
						->orWhere('serial_no', 'LIKE', '%'.$searchText.'%');
	}

	public static function facility_search($searchText)
	{
		$user_facility = Auth::user()->facility_id;

		/*return Bbincidence::where('id', '=', $searchText)
						->orWhere('description', 'LIKE', '%'.$searchText.'%')
						->orWhere('serial_no', 'LIKE', '%'.$searchText.'%');*/

		return Bbincidence::where(function ($query) use ($user_facility) {$query
			->where('facility_id', '=', $user_facility);
			})->where(function ($query) use ($searchText) {$query
				->where('id', '=', $searchText)
				->orWhere('description', 'LIKE', '%'.$searchText.'%')
				->orWhere('serial_no', 'LIKE', '%'.$searchText.'%');
			});
	}

	/**
	* Filter bbincidencinces by dates
	*/
	public static function filterbydate($datefrom,$dateto)
	{
		return Bbincidence::where('occurrence_date', '>=', $datefrom)
						->Where('occurrence_date', '<=', $dateto);
	}

	public static function facility_filterbydate($datefrom,$dateto)
	{
		$user_facility = Auth::user()->facility_id;
		/*return Bbincidence::where('occurrence_date', '>=', $datefrom)
						->Where('occurrence_date', '<=', $dateto);*/

		return Bbincidence::where(function ($query) use ($user_facility) {$query
			->where('facility_id', '=', $user_facility);
			})->where(function ($query) use ($datefrom,$dateto) {$query
				->where('occurrence_date', '>=', $datefrom)
				->Where('occurrence_date', '<=', $dateto);
			});
	}

	public static function countbbincidentcategories($option)
	{
		return DB::table('unhls_bbnatures')->where('class','=',$option)->select('priority','class','name', DB::raw('count(unhls_bbincidences_nature.created_at) as total'))->leftjoin('unhls_bbincidences_nature','unhls_bbincidences_nature.nature_id','=','unhls_bbnatures.id')
					->groupBy('priority','class','name')
             		->get();
	}
	public static function incidentsum($option)
	{
		return DB::table('unhls_bbincidences_nature')->where('class','=',$option)->select('bbincidence_id','nature_id', DB::raw('count(unhls_bbincidences_nature.created_at) as total'))->leftjoin('unhls_bbincidences_nature','unhls_bbincidences_nature.nature_id','=','unhls_bbnatures.id')
					->groupBy('bbincidence_id')
								->get();
	}

	public static function countbbincidentreferralstatus()
	{
		return Bbincidence::select('referral_status', DB::raw('count(referral_status) as total'))
					->groupBy('referral_status')
             		->get();
	}

	public static function countbbincidentcompletionstatus()
	{
		/**$user_facility = Auth::user()->facility_id;
		return Bbincidence::select('status', DB::raw('count(status) as total'))
					->where('facility_id','=',$user_facility)
					->groupBy('status')
             		->get();**/
        return Bbincidence::select('status', DB::raw('count(status) as total'))
					->groupBy('status')
             		->get();
	}

	public static function countbbincidentprevalence()
	{
		return Bbincidence::select('personnel_category', DB::raw('count(personnel_category) as total'))
					->groupBy('personnel_category')
             		->get();
	}

	public static function countbbincidentcauses()
	{
		return DB::table('unhls_bbcauses')->select('causename', DB::raw('count(cause_id) as total'))->leftjoin('unhls_bbincidences_cause','unhls_bbincidences_cause.cause_id','=','unhls_bbcauses.id')
					->groupBy('causename')
             		->get();
	}

	public static function countbbincidentactions()
	{
		return DB::table('unhls_bbactions')->select('actionname', DB::raw('count(action_id) as total'))->leftjoin('unhls_bbincidences_action','unhls_bbincidences_action.action_id','=','unhls_bbactions.id')
					->groupBy('actionname')
             		->get();
	}

	public static function countbbincidents_all()
	{
		//return BbincidenceNatureIntermediate::get();

		$startdate = date('Y-m-01');
		$today = date('Y-m-d');

		return BbincidenceNatureIntermediate::join('unhls_bbincidences', 'unhls_bbincidences.id', '=',
			'unhls_bbincidences_nature.bbincidence_id')->whereBetween('unhls_bbincidences.occurrence_date', array($startdate,$today))->get();
	}

	public static function bbincidents_monthly_natures()
	{

		$startdate = date('Y-m-01');
		$today = date('Y-m-d');


		return BbincidenceNatureIntermediate::
		join('unhls_bbincidences', 'unhls_bbincidences.id', '=', 'unhls_bbincidences_nature.bbincidence_id')
		->join('unhls_bbnatures', 'unhls_bbnatures.id', '=', 'unhls_bbincidences_nature.nature_id')
		->whereBetween('unhls_bbincidences.occurrence_date', array($startdate,$today))
		->select('name', DB::raw('count(*) as total'))
		->groupBy('name')->get();
	}

	public static function countbbincidents_major()
	{

		$startdate = date('Y-m-01');
		$today = date('Y-m-d');


		return BbincidenceNatureIntermediate::join('unhls_bbincidences', 'unhls_bbincidences.id', '=',
			'unhls_bbincidences_nature.bbincidence_id')->join('unhls_bbnatures', 'unhls_bbnatures.id', '=',
			'unhls_bbincidences_nature.nature_id')->where('unhls_bbnatures.priority', '=', 'Major')->whereBetween('unhls_bbincidences.occurrence_date', array($startdate,$today))->get();
	}

	/*public static function countbbincidents_major()
	{
		return BbincidenceNatureIntermediate::join(BbincidenceNature,
			function($join){$join->on('BbincidenceNatureIntermediate.nature_id', '=',
				'BbincidenceNature.id');})->where('BbincidenceNature.priority', '=', 'Major')->get();
	}*/

	public static function countbbincidents_minor()
	{
		$startdate = date('Y-m-01');
		$today = date('Y-m-d');

		return BbincidenceNatureIntermediate::join('unhls_bbincidences', 'unhls_bbincidences.id', '=',
			'unhls_bbincidences_nature.bbincidence_id')->join('unhls_bbnatures', 'unhls_bbnatures.id', '=',
			'unhls_bbincidences_nature.nature_id')->where('unhls_bbnatures.priority', '=', 'Minor')->whereBetween('unhls_bbincidences.occurrence_date', array($startdate,$today))->get();
	}
}
