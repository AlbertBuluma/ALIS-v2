<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class PreAnalyticSpecimenRejection extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pre_analytic_specimen_rejections';

	public $timestamps = false;

	/**
	 * Specimen relationship
	 */
	public function specimen()
	{
		return $this->belongsTo('UnhlsSpecimen');
	}

	/**
	 * User (rejected) relationship
	 */
	public function rejectedBy()
	{
		return $this->belongsTo('User', 'rejected_by', 'id');
	}
}
