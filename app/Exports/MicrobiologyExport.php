<?php

namespace App\Exports;

use App\Models\UnhlsTest;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\Log;

class MicrobiologyExport implements FromQuery, WithHeadings, WithMapping
{
    /**
     * @return array
     */
    use Exportable;



    public function query($dateFrom='', $dateTo='')
    {
         $isolatedOrganisms = UnhlsTest::query()->selectRaw('specimens.time_accepted as Recieved, specimens.time_collected as collected,
            unhls_patients.patient_number as number, unhls_patients.ulin as labID,  unhls_patients.name as PatientName,unhls_patients.admission_date,
            unhls_districts.name as DistrictofResident,unhls_visits.hospitalized, unhls_patients.gender, unhls_patients.dob as age,
            unhls_visits.visit_type,unhls_visits.on_antibiotics as onAntibiotics ,wards.name as Ward,micro_patients_details.clinical_notes as diagnosis, specimen_types.name as SpecimenType,
            unhls_tests.test_type_id, micro_patients_details.days_on_antibiotic as DonAntibiotics,unhls_tests.id as testID,
            group_concat(distinct drugs.name) as Drugs, organisms.name as IsolatedOrganism, isolated_organisms.id as isoID' )

            ->leftjoin('unhls_visits', 'unhls_visits.id', '=', 'unhls_tests.visit_id')
            ->leftjoin('wards', 'wards.id', '=', 'unhls_visits.ward_id')
            ->leftjoin('unhls_patients', 'unhls_patients.id', '=', 'unhls_visits.patient_id')
            ->leftjoin('unhls_districts', 'unhls_districts.id', '=', 'unhls_patients.district_residence')
            ->leftjoin('micro_patients_details', 'unhls_patients.id', '=', 'micro_patients_details.patient_id')
            ->leftjoin('patient_antibiotics', 'patient_antibiotics.patient_id', '=', 'unhls_patients.id')
            ->leftjoin('drugs', 'drugs.id', '=', 'patient_antibiotics.drug_id')
            ->leftjoin('specimens', 'specimens.id', '=', 'unhls_tests.specimen_id')
            ->leftjoin('specimen_types', 'specimen_types.id', '=', 'specimens.specimen_type_id')
            ->leftjoin('isolated_organisms', 'unhls_tests.id', '=', 'isolated_organisms.test_id')
            ->leftjoin('organisms', 'organisms.id', '=', 'isolated_organisms.organism_id')
            ->leftjoin('drug_susceptibility', 'isolated_organisms.id', '=', 'drug_susceptibility.isolated_organism_id')
            ->leftjoin('drug_susceptibility_measures', 'drug_susceptibility_measures.id', '=', 'drug_susceptibility.drug_susceptibility_measure_id')
            ->where('unhls_tests.test_type_id', '=', 18)
            ->where('unhls_tests.test_status_id', '!=', UnhlsTest::REJECTED)
            ->where(function($q) use ($dateFrom, $dateTo){
                // $dateTo = $dateTo . ' 23:59:59';
                $q->where('specimens.time_accepted', '>=', $dateFrom);
                $q->where('specimens.time_accepted', '<=', $dateTo);
            })->orderBy('specimens.time_accepted', 'DESC')
            ->groupBy('unhls_patients.name','specimens.time_accepted','specimens.time_collected','unhls_patients.patient_number',
                'unhls_patients.ulin','unhls_patients.admission_date','unhls_districts.name','unhls_patients.gender',
                'unhls_visits.hospitalized','unhls_patients.dob','unhls_visits.visit_type','onAntibiotics','Ward','diagnosis','SpecimenType','unhls_tests.test_type_id','DonAntibiotics','testID','drugs.name','IsolatedOrganism','isoID')
            ->groupBy('isolated_organisms.id')
            ->orderBy('specimens.time_accepted', 'DESC');

        return $isolatedOrganisms;
    }

    public function map($isolatedOrganisms): array
    {

        return [

            substr($isolatedOrganism->Recieved,0,-9),
            substr($isolatedOrganism->collected,0,-9),
            $isolatedOrganism->number,
            $isolatedOrganism->labID,
            $isolatedOrganism->PatientName,
            $isolatedOrganism->Ward,
            ($isolatedOrganism->gender == 1) ? 'F' : 'M',//sex
           // \newAge($isolatedOrganism->age);//age
            ($isolatedOrganism->hospitalized == 1) ? 'Yes' : (($isolatedOrganism->hospitalized == '0') ? 'No' : ''),//$hospitalized_value; tenary operator//48hrs
            ($isolatedOrganism->onAntibiotics == 1) ? 'Yes' : '',
            $isolatedOrganism->DonAntibiotics,
            $isolatedOrganism->Drugs,
            $isolatedOrganism->diagnosis,//specimen_date
            $isolatedOrganism->SpecimenType,//specimen_type
            $isolatedOrganism->admission_date,//Admission Date
            $isolatedOrganism->IsolatedOrganism
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Date Recieved',
            'Date Collected',
            'Patient ID',
            'Lab ID',
            'Patient Name',
            'Ward',
            'Sex',
            'Age',
            'Hospitalized for more than 2 days (48 hours) at time of specimen collection?',
            'On Antibiotics',
            'Days on Antibiotics',
            'List of Drugs',
            'Diagnosis',
            'Specimen Type',
            'Admission Date',
            'Organism'
        ];
    }
}


