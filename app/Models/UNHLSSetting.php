<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class UNHLSSetting extends Model
{
	protected $table = "unhls_setting";


	public function district()
	{
		return $this->belongsTo('District');
	}

	public function facility()
	{
		return $this->belongsTo('UNHLSFacility');
	}

	public function year()
	{
		return $this->belongsTo('UNHLSFinancialYear');
	}
}
