<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyRejectionReasonCount extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'daily_rejection_reason_counts';

    public $timestamps = false;

    /**
     *
     */
    public function dailySpecimenCount()
    {
      return $this->belongsTo('App\Models\DailySpecimenCount');
    }
}
