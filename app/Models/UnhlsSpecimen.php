<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class UnhlsSpecimen extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'specimens';

	public $timestamps = false;
	/**
	 * Specimen status constants
	 */
	const NOT_COLLECTED = 1;
	const ACCEPTED = 2;
	const REJECTED = 3;
	// change constant to REFERRED_OUT
	const REFERRED = 4;
	// todo: this is also accepted find a non conflicting way of dealing with it!!!
	const REFERRED_IN = 5;

	/**
	 * Test Phase relationship
	 */
	public function testPhase()
	{
		return $this->belongsTo('App\Models\TestPhase');
	}

	/**
	 * Specimen Status relationship
	 */
	public function specimenStatus()
	{
		return $this->belongsTo('App\Models\SpecimenStatus');
	}

	/**
	 * Specimen Type relationship
	 */
	public function specimenType()
	{
		return $this->belongsTo('App\Models\SpecimenType');
	}

	/**
	 * Rejected specimen relationship
	 */
	public function preAnalyticSpecimenRejections()
	{
		return $this->hasOne('App\Models\PreAnalyticSpecimenRejection', 'specimen_id');
	}

	/**
	 * Rejected specimen relationship
	 */
	public function analyticSpecimenRejections()
	{
		return $this->hasOne('App\Models\AnalyticSpecimenRejection', 'specimen_id');
	}

	/**
	 * Test relationship
	 */
	public function tests()
    {
        return $this->hasMany('App\Models\UnhlsTest', 'specimen_id');
    }


    /**
	 * referrals relationship
	 */
	public function referral()
    {
        return $this->belongsTo('App\Models\Referral');
    }

    /**
	 * User (accepted) relationship
	 */
	public function acceptedBy()
	{
		return $this->belongsTo('App\Models\User', 'accepted_by', 'id');
	}

    /**
	 * Check if specimen is referred
	 *
	 * @return boolean
	 */
    public function isReferred()
    {
    	if(is_null($this->referral))
    	{
    		return false;
    	}
    	else {
    		return true;
    	}
    }

    /**
    * Check if specimen is NOT_COLLECTED
    *
    * @return boolean
    */
    public function isNotCollected()
    {
        if($this->specimen_status_id == UnhlsSpecimen::NOT_COLLECTED)
        {
            return true;
        }
        else {
            return false;
        }
    }

    /**
    * Check if specimen is ACCEPTED
    *
    * @return boolean
    */
    public function isAccepted()
    {
        if($this->specimen_status_id == UnhlsSpecimen::ACCEPTED)
        {
            return true;
        }
        else {
            return false;
        }
    }

    /**
    * Check if specimen is rejected
    *
    * @return boolean
    */
    public function isRejected()
    {
        if($this->specimen_status_id == UnhlsSpecimen::REJECTED)
        {
            return true;
        }
        else {
            return false;
        }
    }

}
