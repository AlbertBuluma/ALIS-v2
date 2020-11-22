<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UNHLSFacilityLevel extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'unhls_facility_level';

	public function facility()
	{
		return $this->hasMany('App\Models\UNHLSFacility', 'level_id', 'id');
	}


}
