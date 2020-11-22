<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class RejectionReason extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'rejection_reasons';

	public $timestamps = false;

	/**
	 * Test relationship
	 */
	public function tests()
	{
		return $this->hasMany('App\Models\AnalyticSpecimenRejection', 'test_id');
	}

	/**
	 * Specimen relationship
	 */
	public function specimens()
	{
		return $this->hasMany('App\Models\PreAnalyticSpecimenRejection', 'specimen_id');
	}

}
