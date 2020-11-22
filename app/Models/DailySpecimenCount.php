<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class DailySpecimenCount extends Model

{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'daily_specimen_counts';

    public $timestamps = false;

    /**
     *
     */
    public function specimenType()
    {
      return $this->belongsTo('App\Models\SpecimenType');
    }
}
