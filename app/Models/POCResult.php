<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class POCResult extends Model {
	protected $fillable = [];

	protected $table = 'poc_results';

	public function poc(){
		return $this->belongsTo('App\Models\POC', 'patient_id');
	}

}
