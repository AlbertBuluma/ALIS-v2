<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyGramStainResultCount extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'daily_gram_stain_result_counts';

    public $timestamps = false;

    /**
     *
     */
    public function dailyMeasureCount()
    {
      return $this->belongsTo('App\Models\DailyMeasureCount');
    }
    /**
     *
     */
    public function gramStainRange()
    {
      return $this->belongsTo('App\Models\GramStainRange');
    }
}
