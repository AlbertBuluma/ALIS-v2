<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class DrugSusceptibilityMeasure extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	// todo: change name of this from Drug susceptibility measures to drug susceptibility measures
	protected $table = 'drug_susceptibility_measures';
	public $timestamps = false;
}
