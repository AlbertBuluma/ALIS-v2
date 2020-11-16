<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyOrganismCount extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'daily_organism_counts';

    public $timestamps = false;

    /**
     *
     */
    public function dailyTestCount()
    {
      return $this->belongsTo('DailyTestCount');
    }
    /**
     *
     */
    public function organism()
    {
      return $this->belongsTo('Organism');
    }
    /**
     *
     */
    public function antibiotics()
    {
      return $this->belongsTo('Antibiotic');
    }

    public function susceptibilityInterpretation()
    {
      return $this->belongsTo('DrugSusceptibilityMeasure');
    }

    public function resultInterpretation()
    {
      return $this->belongsTo('ResultInterpretation');
    }
}
