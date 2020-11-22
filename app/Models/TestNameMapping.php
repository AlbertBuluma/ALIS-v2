<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class TestNameMapping extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'test_name_mappings';

    public $timestamps = false;

    public function testType()
    {
      return $this->belongsTo('App\Models\TestType');
    }

    public function measureNameMappings()
    {
      return $this->hasMany('App\Models\MeasureNameMapping');
    }
}
