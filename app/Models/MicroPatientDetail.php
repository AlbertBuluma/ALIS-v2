<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class MicroPatientDetail extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'micro_patients_details';

	public function patient()
	{
		return $this->hasOne('App\Models\UnhlsPatient', 'id');
	}

	public function drug()
	{
		return $this->belongsTo('App\Models\Drug');
	}

	public function district()
	{
		return $this->hasMany('App\Models\District', 'id');
	}


}

