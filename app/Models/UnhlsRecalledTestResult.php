<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UnhlsRecalledTestResult extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'unhls_recalled_test_results';

	public $timestamps = false;

	/**
	 * Mass assignment fields
	 */
	protected $fillable = array('unhls_test_id', 'measure_id', 'result','interpretation','created_by','test_result_id','revision');

	/**
	 * Test  relationship
	 */
	public function test()
	{
		return $this->belongsTo('UnhlsTest');
	}




	/**
	* relationship between result and measure
	*/
	public function measure()
	{
		return $this->belongsTo('Measure');
	}

	/**
	 * User (recalledBy) relationship
	 */
	public function recalledBy()
	{
		return $this->belongsTo('User', 'created_by', 'id');
	}
	public static function numberOfRevisions($test_id){



		$revisions = DB::select("SELECT count(*) revisions from unhls_recalled_test_results WHERE unhls_test_id=".$test_id);


		return $revisions[0]->revisions;

	}
}
