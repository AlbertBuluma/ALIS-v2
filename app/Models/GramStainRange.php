<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class GramStainRange extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gram_stain_ranges';

    public $timestamps = false;

    /**
     * gram stain result relationship
     */
    public function gramStainResult()
    {
      return $this->hasMany('App\Models\GramStainResults');
    }
}
