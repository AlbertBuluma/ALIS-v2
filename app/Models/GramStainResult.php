<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class GramStainResult extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gram_stain_results';

    public $timestamps = false;

    /**
     * test relationship
     */
    public function test()
    {
      return $this->belongsTo('App\Models\UnhlsTest','test_id','id');
    }

    /**
     * gram stain range relationship
     */
    public function gramStainRange()
    {
      return $this->belongsTo('App\Models\GramStainRange');
    }
}
