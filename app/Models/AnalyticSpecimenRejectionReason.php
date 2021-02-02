<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalyticSpecimenRejectionReason extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'analytic_specimen_rejection_reasons';

	public $timestamps =true;

	/**
	 * AnalyticSpecimenRejection relationship
	 */

	public function analyticSpecimenRejection()
	{
		return $this->belongsTo('App\Models\AnalyticSpecimenRejection');
	}

	/**
	 * RejectionReason
	 */
	public function rejectionReason()
	{
		return $this->belongsTo('App\Models\RejectionReason');
	}
}
