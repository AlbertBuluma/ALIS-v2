<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class DailySpecimenTypeCount extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'daily_specimen_type_counts';

    public $timestamps = false;

    /**
     *
     */
    public function specimenType()
    {
      return $this->belongsTo('App\Models\SpecimenType');
    }
}
