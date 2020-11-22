<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class ZoneDiameter extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    // todo: change this table name to zone_diameter_refs
    protected $table = 'zone_diameters';

    public $timestamps = false;

    // todo: move to a place where the seeding will use the same resource
    const SENSITIVE = 1;
    const INTERMEDIATE = 2;
    const RESISTANT = 3;

    /**
     * drug relationship
     */
    public function drug()
    {
      return $this->belongsTo('App\Models\Drug');
    }

    /**
     * organism relationship
     */
    public function organism()
    {
      return $this->belongsTo('App\Models\Organism');
    }

    /**
     * zone diameter interpretation
     */
    public function getZoneDiameterInterpretation($diameter)
    {
        if ($diameter <= $this->resistant_max) {
            return DrugSusceptibilityMeasure::find(ZoneDiameter::RESISTANT)->id;
        }elseif ($diameter >= $this->sensitive_min) {
            return DrugSusceptibilityMeasure::find(ZoneDiameter::SENSITIVE)->id;
        }elseif ($diameter >= $this->intermediate_min) {
            return DrugSusceptibilityMeasure::find(ZoneDiameter::INTERMEDIATE)->id;
        }elseif ($diameter <= $this->intermediate_max) {
            return DrugSusceptibilityMeasure::find(ZoneDiameter::INTERMEDIATE)->id;
        }else{
            /*todo: if the caller gets this reply tell the user the diameter is not valid,
            so they can insist problematic range, what do we do?
            ask user to configure, send message to the front
            return null;
            with a link to the place where to make changes, if you have rights
            */
        }
    }
}
