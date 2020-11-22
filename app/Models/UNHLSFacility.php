<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class UNHLSFacility extends Model
{
	protected $table = "unhls_facilities";

	public function district()
	{
		return $this->belongsTo('App\Models\District', 'district_id', 'id');
	}

	public function level()
	{
		return $this->belongsTo('App\Models\UNHLSFacilityLevel', 'level_id', 'id');
	}

	public function ownership()
	{
		return $this->belongsTo('App\Models\UNHLSFacilityOwnership', 'ownership_id', 'id');
	}

	public function bbincidence()
    {
        return $this->hasMany('App\Models\Bbincidence','facility_id','id');
	}
}
