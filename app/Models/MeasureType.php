<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class MeasureType extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'measure_types';

	/**
	 * Measure relationship
	 */
    public function measures()
    {
        return $this->hasMany('App\Models\Measure');
    }

}
