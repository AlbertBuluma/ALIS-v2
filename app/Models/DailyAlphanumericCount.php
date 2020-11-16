<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyAlphanumericCount extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'daily_alphanumeric_counts';

    public $timestamps = false;

    public function dailyTestTypeCount()
    {
      return $this->belongsTo('DailyTestTypeCount');
    }

    public function resultInterpretation()
    {
      return $this->belongsTo('ResultInterpretation');
    }
}
