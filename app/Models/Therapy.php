<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class Therapy extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'therapy';

	public $timestamps = false;

	/**
	*
	*
	*/
	public function clinicianLink()
	{
		return $this->belongsTo('App\Models\Clinician','clinician_id');
	}


}
