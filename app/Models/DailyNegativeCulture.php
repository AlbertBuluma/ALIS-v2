<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyNegativeCulture extends Model
{
	protected $table = 'daily_negative_cultures';
	public $timestamps = false;

    public function organism()
    {
      return $this->belongsTo('App\Models\Organism');
    }
}
