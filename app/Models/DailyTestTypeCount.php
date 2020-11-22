<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyTestTypeCount extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'daily_test_type_counts';

    public $timestamps = false;

    /**
     *
     */
    public function testType()
    {
      return $this->belongsTo('App\Models\TestType');
    }

    public function dailyAlphanumericCount()
    {
      return $this->hasMany('App\Models\DailyAlphanumericCount');
    }
    public function dailyGramStainResultCount()
    {
      return $this->hasMany('App\Models\DailyGramStainResultCount');
    }
    public function dailyOrganismCount()
    {
      return $this->hasMany('App\Models\DailyOrganismCount');
    }
    public function dailyHIVCount()
    {
      return $this->hasMany('App\Models\DailyHIVCount');
    }

}
