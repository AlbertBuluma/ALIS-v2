<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class UNHLSEquipmentBreakdown extends Model
{
	protected $table = "unhls_equipment_breakdown";



	public function equipment()
	{
		return $this->belongsTo('App\Models\UNHLSEquipmentInventory');
	}

	public function staff($id)
	{

		$staff = UNHLSStaff::find($id);
		// return $staff->name." ".$staff->name;

	}

}
