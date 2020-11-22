<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class UNHLSSetting extends Model
{
	protected $table = "unhls_setting";


	public function district()
	{
		return $this->belongsTo('App\Models\District');
	}

	public function facility()
	{
		return $this->belongsTo('App\Models\UNHLSFacility');
	}

	public function year()
	{
		return $this->belongsTo('App\Models\UNHLSFinancialYear');
	}
}
