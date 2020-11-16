<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class DrugSusceptibility extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'drug_susceptibility';

	public function isolatedOrganism()
	{
		return $this->belongsTo('IsolatedOrganism');
	}

	public function drug()
	{
		return $this->belongsTo('Drug');
	}

	public function drugSusceptibilityMeasure()
	{
		return $this->belongsTo('DrugSusceptibilityMeasure');
	}
}
