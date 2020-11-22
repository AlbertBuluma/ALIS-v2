<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BbincidenceNatureIntermediate extends Model
{
    use SoftDeletes;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'unhls_bbincidences_nature';

	public function bbnature()
	{
		return $this->belongsTo('App\Models\BbincidenceNature', 'nature_id', 'id');
	}

	public function bbincidence()
	{
		return $this->belongsTo('App\Models\Bbincidence', 'bbincidence_id', 'id');
	}
}
