<?php

namespace  App\Models;
use Illuminate\Database\Eloquent\Model;

class DailySusceptibilityCount extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'daily_susceptibility_counts';

    public $timestamps = false;

    /**
     *
     */
    public function dailyTestResultCount()
    {
      return $this->belongsTo('App\Models\DailyTestResultCount');
    }
    /**
     *
     */
    public function disease()
    {
      return $this->belongsTo('App\Models\Disease');
    }
}
