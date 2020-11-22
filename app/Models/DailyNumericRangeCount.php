<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyNumericRangeCount extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'daily_numeric_range_counts';

    public $timestamps = false;

    public function resultInterpretation()
    {
      return $this->belongsTo('App\Models\ResultInterpretation');
    }

    public function dailyTestTypeCount()
    {
      return $this->belongsTo('App\Models\DailyTestTypeCount');
    }
}
