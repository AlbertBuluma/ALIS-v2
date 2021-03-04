<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PatientAntibiotics extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'patient_antibiotics';

	public function patient()
	{
		return $this->belongsTo('App\Models\UnhlsPatient');
	}

	public function drug()
	{
		return $this->belongsTo('App\Models\Drug');
	}

}

