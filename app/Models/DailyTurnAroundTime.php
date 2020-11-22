<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyTurnAroundTime extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'daily_turn_around_time';

    public $timestamps = false;

    /**
     *
     */
    public function dailyTestCount()
    {
      return $this->belongsTo('App\Models\DailyTestCount');
    }
}
