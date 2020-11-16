<?php

class AnalyticSpecimenRejectionReason extends Eloquent 
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
		return $this->belongsTo('AnalyticSpecimenRejection');
	}

	/**
	 * RejectionReason
	 */
	public function rejectionReason()
	{
		return $this->belongsTo('RejectionReason');
	}
}