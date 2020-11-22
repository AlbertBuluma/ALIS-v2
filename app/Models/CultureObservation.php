<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class CultureObservation extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'culture_observations';

	public function test()
	{
		return $this->belongsTo('App\Models\UnhlsTest','test_id');
	}
}
