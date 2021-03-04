<?php

namespace  App\Models;

# functions to create and manage drop down lists
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LookupTypeValue extends Model
{
	protected $table = "look_up_values";

		/**
	* Relationship with districts
	*/
	public function lookuptype()
	{
		return $this->belongsTo('App\LookupType','lookuptypeid','id');
	}
}

