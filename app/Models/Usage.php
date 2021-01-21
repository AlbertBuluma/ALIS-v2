<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usage extends Model
{
	protected $table = 'inv_usage';
	/*
    *   Relationship with stock
    */
    public function stock()
    {
        return $this->belongsTo('App\Models\Stock');
    }
    /*
    *   Relationship with request
    */
    public function request()
    {
        return $this->belongsTo('App\Models\Topup');
    }
}
