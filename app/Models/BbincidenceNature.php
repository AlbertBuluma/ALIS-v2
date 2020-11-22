<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BbincidenceNature extends Model
{
	/**
	 * Enabling soft deletes for specimen type details.
	 *
	 */
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'unhls_bbnatures';


	public function bbincidence()
	{
		return $this->belongsToMany('App\Models\Bbincidence', 'unhls_bbincidences_nature', 'nature_id', 'bbincidence_id');
	}


}
