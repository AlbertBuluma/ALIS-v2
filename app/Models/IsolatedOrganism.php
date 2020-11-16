<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class IsolatedOrganism extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'isolated_organisms';

	public function test()
	{
		return $this->belongsTo('UnhlsTest', 'test_id');
	}

	public function organism()
	{
		return $this->belongsTo('Organism');
	}
	public function drugSusceptibilities()
	{
		return $this->hasMany('DrugSusceptibility','isolated_organism_id');
	}
}
