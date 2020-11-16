<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class WardType extends Model {


	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ward_type';
    protected $fillable = [];

    public $timestamps = false;
}
