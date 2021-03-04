<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class MeasureNameMapping extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'measure_name_mappings';

    public $timestamps = false;

    public function testNameMapping()
    {
      return $this->belongsTo('App\Models\TestNameMapping');
    }

    public function measure()
    {
      return $this->belongsTo('App\Models\Measure');
    }
}
