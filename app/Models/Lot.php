<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Lot extends Model {

	/**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = "lots";

	//Soft deletes
    use SoftDeletes;
    protected $dates = ['deleted_at'];

	/**
	* Relationship between lot and instrument
	*/
	public function instrument(){
		return $this->belongsTo('App\Models\Instrument');
	}
}
