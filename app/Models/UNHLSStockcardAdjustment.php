<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class UNHLSStockcardAdjustment extends Model
{
	protected $table = "unhls_stockcard_adjustments";


	public function district()
	{
		return $this->belongsTo('App\Models\District');
	}

		public function facility()
	{
		return $this->belongsTo('App\Models\UNHLSFacility');
	}

	public function commodity()
	{
		return $this->belongsTo('App\Models\Commodity');
	}

	public function year()
	{
		return $this->belongsTo('App\Models\UNHLSFinancialYear');
	}

	public function sourceOfStock($sourceType, $sourceId)
	{
		if($sourceType==config('constants.FROM_FACILITY'))
		{
			return UNHLSFacility::Find($sourceId);
		}else
		{
			return UNHLSWarehouse::Find($sourceId);;
		}
	}

	public function destinationOfStock($destinationType, $destinationId)
	{
		if($destinationType==config('constants.TO_FACILITY'))
		{
			return UNHLSFacility::Find($destinationId);
		}else
		{
			return UNHLSStaff::Find($destinationId);
		}
	}

}
