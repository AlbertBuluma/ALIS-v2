<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'facilities';

	public function ReferFacility()
	{
		return $this->hasMany('App\Models\UNHLSFacility', 'level_id', 'id');
	}


}
