<?php

namespace  App\Models;

use DateInterval;
use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\UnhlsTestResult;
use Illuminate\Support\Facades\Log;
use stdClass;

class Measure extends Model
{
    /**
     * Enabling soft deletes for MeaApp\Models\sures.
     *
     */

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'measures';

    /**
     * Measure constants
     */
    const NUMERIC = 1;
    const ALPHANUMERIC = 2;
    const AUTOCOMPLETE = 3;
    const FREETEXT = 4;

    /**
     * Measure Range relationship
     */
    public function measureRanges()
    {
        return $this->hasMany('App\Models\MeasureRange');
    }

    /**
     * Measure Type relationship
     */
    public function measureType()
    {
        return $this->belongsTo('App\Models\MeasureType');
    }

    /**
     * TestType relationship
     */
    public function testTypes()
    {
        return $this->belongsToMany('App\Models\TestType', 'testtype_measures');
    }
    public function getResultInterpretation($result)
    {
        $measure = Measure::find($result['measureid']);

        try {
            $measurerange = MeasureRange::where('measure_id', '=', $result['measureid']);
            // there is a miscalculation here!!! what happens when the measure range gender is both male and female : 2
            // also the measure value does not have to necessarily lie within it's proper reference range
            // to identify it's reference range what is required is to match the age_min, age_max and gender against each other
            // then after the high the low the normal can be determined

            if ($measure->isNumeric()) {
                $birthDate = new DateTime($result['birthdate']);
                $now = new DateTime();
                $interval = $birthDate->diff($now);
                $seconds = ($interval->days * 24 * 3600) + ($interval->h * 3600) + ($interval->i * 60) + ($interval->s);
                $age = $seconds/(365*24*60*60);
                $measurerange = $measurerange->where('gender', '=', $result['gender'])
                    ->where('age_min', '<=', $age)
                    ->where('age_max', '>=', $age)
                    ->where('range_lower', '<=', $result['measurevalue'])
                    ->where('range_upper', '>=', $result['measurevalue']);
            } else{
                $measurerange = $measurerange->where('alphanumeric', '=', $result['measurevalue']);
            }
            $measurerange = $measurerange->get()->toArray();

            $interpretation = $measurerange[0]['interpretation'];

        } catch (Exception $e) {
            $interpretation = null;
        }
        return $interpretation;
    }

    /**
     *  Check to if the Measure Type is Numeric
     *
     * @return boolean
     */
    public function isNumeric()
    {
        if($this->measureType->id == Measure::NUMERIC){
            return true;
        }
        else
            return false;
    }

    /**
     *  Check to if the Measure Type is Alphanumeric
     *
     * @return boolean
     */
    public function isAlphanumeric()
    {
        if($this->measureType->id == Measure::ALPHANUMERIC){
            return true;
        }
        else
            return false;
    }

    /**
     *  Check to if the Measure Type is Autocomplete
     *
     * @return boolean
     */
    public function isAutocomplete()
    {
        if($this->measureType->id == Measure::AUTOCOMPLETE){
            return true;
        }
        else
            return false;
    }

    /**
     *  Check to if the Measure Type is Free Text
     *
     * @return boolean
     */
    public function isFreeText()
    {
        if($this->measureType->id == Measure::FREETEXT){
            return true;
        }
        else
            return false;
    }

    /**
     *  Get measure range with given patient patient details
     *
     * @return boolean
     */
    public static function getRange($patient, $measureId)
    {
        $age = $patient->getAge('ref_range_Y');
        // if for particular gender is zero, check for both genders
        $rangeValidity = MeasureRange::where('measure_id', '=', $measureId)
            ->where('age_min', '<=', $age)->where('age_max', '>=', $age)
            ->where('gender', '=', $patient->gender);
        $measureRange = new stdClass();

        if ($rangeValidity->count()==0) {
            $measureRange = MeasureRange::where('measure_id', '=', $measureId)
                ->where('age_min', '<=', $age)->where('age_max', '>=', $age)
                ->where('gender', '=', UnhlsPatient::BOTH)->first();
            if (is_null($measureRange)) {
                // age is outside the provided reference ranges
                return null;
            }
        }else{
            $measureRange = $rangeValidity->first();
        }
        return "(".substr($measureRange->range_lower, 0, -2)." - ".substr($measureRange->range_upper, 0, -2).")";
    }
    /**
     *  Get test result count for the given measure and parameters
     *
     * @return count
     */
    public function totalTestResults($gender=null, $ageRange=null, $from=null, $to=null, $range=null, $positive=null){
        $testResults = UnhlsTestResult::where('unhls_test_results.measure_id', $this->id)
            ->join('unhls_tests', 'unhls_tests.id', '=', 'unhls_test_results.test_id')
            ->join('test_types', 'unhls_tests.test_type_id', '=', 'test_types.id')
            ->join('testtype_measures', 'testtype_measures.test_type_id', '=', 'test_types.id')
            ->where('testtype_measures.measure_id', $this->id)
            ->whereIn('test_status_id', [UnhlsTest::COMPLETED, UnhlsTest::VERIFIED]);
        if($to && $from){
            $testResults = $testResults->whereBetween('time_created', [$from, $to]);
        }
        if($ageRange || $gender){
            $testResults = $testResults->join('unhls_visits', 'unhls_tests.visit_id', '=', 'unhls_visits.id')
                ->join('unhls_patients', 'unhls_visits.patient_id', '=', 'unhls_patients.id');
            if($gender){
                $testResults = $testResults->whereIn('gender', $gender);
            }
            if($ageRange){
                $age = explode('-', $ageRange);
                $ageStart = $age[0];
                $ageEnd = $age[1];
                $now = new DateTime('now');
                $clonedDate = clone $now;
                $finishDate = $clonedDate->sub(new DateInterval('P'.$ageStart.'Y'))->format('Y-m-d');
                $clonedDate = clone $now;
                $startDate = $clonedDate->sub(new DateInterval('P'.$ageEnd.'Y'))->format('Y-m-d');
                $testResults = $testResults->whereBetween('dob', [$startDate, $finishDate]);
            }
        }
        if($range){
            if ($this->isNumeric())
            {
                $mRange = null;
                if($gender)
                    dd($gender[0]);
                // $mRange = $this->measureRanges()->where('gender', $gender)->first();
                else
                    $mRange = $this->measureRanges->first();
                $testResults = $testResults->whereRaw("result REGEXP '^[0-9]+\\.?[0-9]*$'");
                if($range[0] == 'Low')
                {
                    $testResults = $testResults->where('result', '<', $mRange->range_lower);
                }
                else if($range[0] == 'Normal')
                {
                    $testResults = $testResults->where('result', '>=', $mRange->range_lower)->where('result', '<=', $mRange->range_upper);
                }
                else if($range[0] == 'High')
                {
                    $testResults = $testResults->where('result', '>', $mRange->range_upper);
                }
            }
            else
            {
                $testResults = $testResults->whereIn('result', $range);
            }
        }
        if($positive)
        {
            $testResults = $testResults->whereNotIn('result', ['nil', 'nill', 'not seen']);
        }
        return $testResults->count();
    }
    /**
     * Given the measure name we return the measure ID
     *
     * @param $measureName the name of the measure
     */
    public static function getMeasureIdByName($measureName)
    {
        try
        {
            $measure = Measure::where('name', 'like', $measureName)->firstOrFail();
            return $measure->id;
        } catch (ModelNotFoundException $e)
        {
            Log::error("The measure ` $measureName ` does not exist:  ". $e->getMessage());
            //TODO: send email?
            return null;
        }
    }

    public function measureNameMapping()
    {
        return $this->hasOne('App\Models\MeasureNameMapping');
    }

    /*
    * Returns diagnostic flags for measures --High, Normal, Low
    *
    */

    public static function measureFlag($patient, $measureId, $result){
        $age = $patient->getAge('ref_range_Y');
        // if for particular gender is zero, check for both genders
        $rangeValidity = MeasureRange::where('measure_id', '=', $measureId)
            ->where('age_min', '<=', $age)->where('age_max', '>=', $age)
            ->where('gender', '=', $patient->gender);
        $measureRange = new stdClass();

        if ($rangeValidity->count()==0) {
            $measureRange = MeasureRange::where('measure_id', '=', $measureId)
                ->where('age_min', '<=', $age)->where('age_max', '>=', $age)
                ->where('gender', '=', UnhlsPatient::BOTH)->first();
            if (is_null($measureRange)) {
                // age is outside the provided reference ranges
                return null;
            }
        }else{
            $measureRange = $rangeValidity->first();
        }

        $rangeUp = $measureRange->range_upper;
        $rangeLow = $measureRange->range_lower;

        if( $result < $rangeLow){
            $flag = 'Low';
        }
        elseif ($result > $rangeUp ) {
            $flag = 'High';
        }
        else{
            $flag = 'Normal';
        }

        return $flag;
    }
}
