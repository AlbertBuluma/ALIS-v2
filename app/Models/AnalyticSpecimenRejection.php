<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalyticSpecimenRejection extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'analytic_specimen_rejections';

	public $timestamps = false;

	/**
	 * Test relationship
	 */
	public function test()
	{
		return $this->belongsTo('App\Models\UnhlsTest');
	}

	/**
	 * Specimen relationship
	 */
	public function specimen()
	{
		return $this->belongsTo('App\Models\UnhlsSpecimen');
	}

	/**
	 * User (rejected) relationship
	 */
	public function rejectedBy()
	{
		return $this->belongsTo('App\Models\User', 'rejected_by', 'id');
	}
}
