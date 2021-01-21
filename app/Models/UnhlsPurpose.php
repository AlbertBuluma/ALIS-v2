<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class UnhlsPurpose extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'unhls_testpurposes';

	public $timestamps = true;

	/**
	 * Specimen relationship
	 */
	public function specimen()
	{
	  return $this->hasMany('App\Models\UnhlsSpecimen');
	}
}
