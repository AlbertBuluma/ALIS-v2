<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultInterpretation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'result_interpretations';

	const HIGH = 1;
	const NORMAL = 2;
	const LOW = 3;

	const HGBLESS8 = 4;
	const HBGEQUAL8 = 5;

	const POSITIVE = 6;
	const NEGATIVE = 7;

    public $timestamps = false;

    public function dailyOrganismCounts()
    {
      return $this->hasMany('DailyOrganismCount');
    }

    public function dailyNumericRangeCounts()
    {
      return $this->hasMany('DailyNumericRangeCount');
    }

    public function dailyAlphanumericCounts()
    {
      return $this->hasMany('DailyAlphanumericCount');
    }
}
