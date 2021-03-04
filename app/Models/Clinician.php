<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class Clinician extends Model {
	protected $fillable = [];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clinicians';

    public $timestamps = false;


    /**
     *
     *
     */
    public function tests()
    {
        return $this->hasMany('App\Models\UnhlsTest');
    }
}
