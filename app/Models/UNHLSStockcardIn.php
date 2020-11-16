<?php

namespace  App\Models;

use App\Models\UNHLSFacility;
use App\Models\UNHLSStaff;
use App\Models\UNHLSWarehouse;
use Illuminate\Database\Eloquent\Model;

class UNHLSStockcardIn extends Model
{
	protected $table = "unhls_stockcard_in";


	public function district()
	{
		return $this->belongsTo('District');
	}

		public function facility()
	{
		return $this->belongsTo('UNHLSFacility');
	}

	public function commodity()
	{
		return $this->belongsTo('Commodity');
	}

	public function year()
	{
		return $this->belongsTo('UNHLSFinancialYear');
	}

	public function sourceOfStock($sourceType, $sourceId)
	{
		if($sourceType==\Config::get('constants.FROM_FACILITY'))
		{
			return UNHLSFacility::Find($sourceId);
		}else
		{
			return UNHLSWarehouse::Find($sourceId);;
		}
	}

	public function destinationOfStock($destinationType, $destinationId)
	{
		if($destinationType==\Config::get('constants.TO_FACILITY'))
		{
			return UNHLSFacility::Find($destinationId);
		}else
		{
			return UNHLSStaff::Find($destinationId);
		}
	}

}
