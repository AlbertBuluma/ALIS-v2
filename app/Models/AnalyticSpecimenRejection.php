<?php

class AnalyticSpecimenRejection extends Eloquent
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
		return $this->belongsTo('UnhlsTest');
	}

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
