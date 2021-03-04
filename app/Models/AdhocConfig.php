<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class AdhocConfig extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'adhoc_configs';

    protected $fillable = ['name', 'option'];

    public $timestamps = false;

    public static $constants = [
        'Report' => [
            'Standard' => 1,
            'Jinja_SLMPTA' => 2,
            'Kayunga_ISO' => 3,
        ],
        'ULIN' => [
            'Standard' => 1,
            'Jinja_SOP' => 2,
            'Mityana_SOP' => 3,
            'Manual' => 4,
            'Rukunyu_SOP' => 5,
        ],
        // if clinician will use the system
        'Clinician_UI' => [
            'Yes' => 1,
            'No' => 2,
        ],
    ];

    public function getReportTemplate()
    {
        switch ($this->option) {
            case AdhocConfig::$constants['Report']['Jinja_SLMPTA']:
                $template = 'reports.patient.jinja_slmpta';
                break;

            case AdhocConfig::$constants['Report']['Kayunga_ISO']:
                $template = 'reports.patient.kayunga_iso';
                break;

            default:
                $template = 'reports.patient.standard';
                break;
        }
        return $template;
    }

    public function getULINFormat()
    {
        switch ($this->option) {
            case AdhocConfig::$constants['ULIN']['Jinja_SOP']:
                $format = 'Jinja_SOP';
                break;

            case AdhocConfig::$constants['ULIN']['Mityana_SOP']:
                $format = 'Mityana_SOP';
                break;

            case AdhocConfig::$constants['ULIN']['Manual']:
                $format = 'Manual';
                break;
            case AdhocConfig::$constants['ULIN']['Rukunyu_SOP']:
                $format = 'Rukunyu_SOP';
                break;
            default:
                $format = 'Standard';
                break;
        }
        return $format;
    }

    public function activateClinicianUI()
    {
        switch ($this->option) {
            case AdhocConfig::$constants['Clinician_UI']['Yes']:
                $binary = true;
                break;

            default:
                $binary = false;
                break;
        }
        return $binary;
    }
}
