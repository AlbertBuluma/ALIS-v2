<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportDisease extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'report_diseases';

	public $timestamps = false;

	/**
	 * TestType relationship
	 */
	public function testTypes()
	{
	  return $this->hasMany('App\Models\TestType');
	}

	/**
	 * Disease relationship
	 */
	public function disease()
	{
	  return $this->belongsTo('App\Models\Disease');
	}
}
