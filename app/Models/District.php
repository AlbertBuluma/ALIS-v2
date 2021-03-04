<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = "unhls_districts";

    // Microbiology Patient Relationship

    public function microPatient()
    {
        return $this->belongsTo('App\Models\MicroPatientDetail', 'id');
    }
}
