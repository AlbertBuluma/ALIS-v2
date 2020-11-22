<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyTestCount extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'daily_test_counts';

    public $timestamps = false;

    public function dailyTestTypeCount()
    {
      return $this->hasMany('App\Models\DailyTestTypeCount');
    }

}
