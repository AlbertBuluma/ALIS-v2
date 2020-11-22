<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferralReason extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'referral_reasons';

	public $timestamps = false;

	/**
	 * Mass assignment field
	 */
	protected $fillable = array('reason');

	/**
	 * Specimen relationship
	 */
	public function specimen()
	{
		return $this->hasMany('App\Models\Specimen');
	}
}
