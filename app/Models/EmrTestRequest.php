<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmrTestRequest extends Model
{
	/**
	 * Enabling soft deletes for emr_test_requests.
	 *
	 */
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'emr_test_request';

	protected $fillable = [];


}
