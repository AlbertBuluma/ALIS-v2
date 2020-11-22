<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyNegativeGramStain extends Model
{
	protected $table = 'daily_negative_gram_stains';

	public $timestamps = false;

    public function gramStainRange()
    {
      return $this->belongsTo('App\Models\GramStainRange');
    }
}
