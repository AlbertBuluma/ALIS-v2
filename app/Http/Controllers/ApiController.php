<?php

namespace App\Http\Controllers;

use App\Models\UnhlsVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

    /**
     * Display a listing of the facilities by district.
     *
     * @return Response
     */
    public function facility()
    {
        $id = Input::get('districtId');

        $patients = DB::table('unhls_patients')->limit(5)->get();

        return response()->json($patients);
    }

    /**
     * Fetch IDs of latest record from all tables.
     *
     * @return Response
     */
    public static function fetchAllTableIDs()
    {
        //TODO Add id column for migrations, instrument_types and tokens tables
        $table_names = $data = [];
        $tables = DB::select('show tables');
        foreach ($tables as $table) {
            $table_names[] = $table->Tables_in_alis;
        }
        foreach ($table_names as $tab_name) {
            $data[$tab_name] = DB::table($tab_name)
                ->select('id')
                ->orderBy('id', 'desc')
                ->pluck('id');
        }

        return response()->json($data);
    }

    // Receive IDs of all warehouse tables
    public function warehouseIds()
    {
        dd(\Illuminate\Support\Facades\Input::all());
//        $data = \Illuminate\Support\Facades\Input::get('wards');
//        return Response::json($data, 200);

    }

    /**
     * Fetch latest 10 records from table.
     *
     * @return Response
     */
    public static function fetchTableRecords($table)
    {
        $records = DB::table($table)->paginate(10);

        return response()->json($records);
    }


    public static function unhlsPatients()
    {

    }

    /**
     * Display a listing of the fetch Isolated Organisms.
     *
     * @return Response
     */
    public function fetchIsolatedOrganisms($test_id)
    {

        $results = DB::table('isolated_organisms AS io')
            ->where('test_id', '=', $test_id)
            ->leftJoin('organisms AS og', function ($join) {
                $join->on('io.organism_id', '=', 'og.id');
            })
            ->leftJoin('drug_susceptibility AS ds', function ($join) {
                $join->on('io.id', '=', 'ds.isolated_organism_id');
            })
            ->leftJoin('drug_susceptibility_measures AS dsm', function ($join) {
                $join->on('ds.drug_susceptibility_measure_id', '=', 'dsm.id');
            })
            ->leftJoin('drugs AS dg', function ($join) {
                $join->on('ds.drug_id', '=', 'dg.id');
            })
            ->where('io.organism_id', '!=', 'NULL')
            ->select('io.id AS isolatedOrganismsId', 'io.user_id AS isolatedOrganismsUserId', 'io.test_id AS isolatedOrganismsTestId',
                'io.organism_id AS isolatedOrganismsOrganismId', 'io.created_at AS isolatedOrganismsCreatedAt',
                'io.updated_at AS isolatedOrganismsUpdatedAt',
                'og.id AS organismsId', 'og.name AS organismsName', 'og.description AS organismsDescription',
                'og.deleted_at AS organismsDeletedAt', 'og.created_at AS organismsCreatedAt', 'og.updated_at AS organismsUpdatedAt',
                'ds.id AS drugSusceptibilityId', 'ds.user_id AS drugSusceptibilityUserId', 'ds.drug_id AS drugSusceptibilityDrugId',
                'ds.isolated_organism_id AS drugSusceptibilityIsolatedOrganismId', 'ds.drug_susceptibility_measure_id AS drugSusceptibilityDrugSusceptibilityMeasureId',
                'ds.zone_diameter AS zoneDiameter', 'ds.deleted_at AS drugSusceptibilityDeletedAt', 'ds.created_at AS drugSusceptibilityCreatedAt',
                'ds.updated_at AS drugSusceptibilityUpdatedAt',
                'dsm.id AS drugSusceptibilityMeasuresId', 'dsm.symbol AS symbol', 'dsm.interpretation AS interpretation',
                'dg.id AS drugsId', 'dg.name AS drugsName', 'dg.description AS drugsDescription',
                'dg.deleted_at AS drugsDeletedAt', 'dg.created_at AS drugsCreatedAt', 'dg.updated_at AS drugsUpdatedAt'
            )
            ->orderBy('io.id', 'asc')
            ->get();

        return $results;

    }   //Microorganism POJO


    /**
     * Display a listing of the UNHLS Test Results.
     *
     * @return Response
     */
    public function unhlsResults($test_id)
    {

        $results = DB::table('unhls_test_results')
            ->where('test_id', '=', $test_id)
            ->leftJoin('measures', function ($join) {
                $join->on('unhls_test_results.measure_id', '=', 'measures.id');
            })
            ->leftjoin('measure_types', function ($join) {
                $join->on('measures.measure_type_id', '=', 'measure_types.id');
            })
            ->select('unhls_test_results.id AS unhlsTestResultsId', 'unhls_test_results.test_id AS unhlsTestResultsTestId',
                'unhls_test_results.measure_id AS unhlsTestResultsMeasureId', 'unhls_test_results.result AS unhlsTestResultsResult',
                'unhls_test_results.time_entered AS timeEntered', 'unhls_test_results.sample_id AS sampleId', 'unhls_test_results.revised_result AS revisedResult',
                'unhls_test_results.revised_by AS revisedBy', 'unhls_test_results.revised_by2 AS revisedBy2', 'unhls_test_results.time_revised AS timeRevised',
                'measures.id AS measuresId', 'measures.measure_type_id AS measuresMeasureTypeId', 'measures.name AS measuresName',
                'measures.unit AS unit', 'measures.description AS measuresDescription', 'measures.created_at AS measuresCreatedAt',
                'measures.updated_at AS measuresUpdatedAt', 'measures.deleted_at AS measuresDeletedAt',
                'measure_types.id AS measureTypesId', 'measure_types.name AS measureTypesName', 'measure_types.deleted_at AS measureTypesDeletedAt',
                'measure_types.created_at AS measureTypesCreatedAt', 'measure_types.updated_at AS measureTypesUpdatedAt')
            ->orderBy('unhls_test_results.id', 'asc')
            ->get();

        //TODO measure_types.name to select column results

        return $results;
    }


    /**
     * Display a listing of the Specimen Rejection warehouse data.
     *
     * @return Response
     */
    public function rejectReason($test_id) // rejectreasonList POJO
    {

        $results = DB::table('analytic_specimen_rejections AS asr')
            ->where('test_id', '=', $test_id)
            ->leftJoin('analytic_specimen_rejection_reasons AS asrr', function ($join) {
                $join->on('asr.rejection_reason_id', '=', 'asrr.rejection_id');
            })
            ->leftJoin('rejection_reasons AS rr', function ($join) {
                $join->on('rr.id', '=', 'asr.rejection_reason_id');
            })
            ->select('asrr.id AS analyticSpecimenRejectionReasonsId',
                'asrr.specimen_id AS analyticSpecimenRejectionReasonsSpecimenId',
                'asrr.rejection_id AS analyticSpecimenRejectionReasonsRejectionId',
                'asrr.reason_id AS analyticSpecimenRejectionReasonsReasonId',
                'asrr.created_at AS analyticSpecimenRejectionReasonsCreatedAt',
                'asrr.updated_at AS analyticSpecimenRejectionReasonsUpdatedAt',
                'asrr.deleted_at AS analyticSpecimenRejectionReasonsDeletedAt',
                'rr.id AS rejectionReasonsId',
                'rr.reason AS rejectionReasonsReason')
            ->orderBy('asrr.id', 'asc')
            ->get();

        return $results;
    }


    public function specimenReject($test_id)  // Specimenreject POJO
    {
        $results = DB::table('analytic_specimen_rejections AS asr')
            ->where('test_id', '=', $test_id)
            ->leftJoin('analytic_specimen_rejection_reasons AS asrr', function ($join) {
                $join->on('asr.rejection_reason_id', '=', 'asrr.reason_id');
            })
            ->leftJoin('rejection_reasons AS rr', function ($join) {
                $join->on('rr.id', '=', 'asr.rejection_reason_id');
            })
            ->select('asr.id AS analyticSpecimenRejectionsId',
                'asr.test_id AS testId',
                'asr.specimen_id AS specimenId',
                'asr.rejected_by AS rejectedBy',
                'asr.rejection_reason_id AS rejectionReasonId',
                'asr.reject_explained_to AS rejectExplainedTo',
                'asr.time_rejected AS timeRejected'
            )
            ->orderBy('asr.id', 'asc')
            ->get();

        return $results;

    }


    public function measureRanges($measure_id)
    {
        $results = DB::table('measure_ranges AS mr')
            ->where('measure_id', '=', $measure_id)
            ->select('mr.id AS measureRangesId', 'mr.measure_id AS measureRangesMeasureId', 'mr.age_min AS ageMin',
                'mr.age_max AS ageMax', 'mr.gender AS gender', 'mr.flag_min AS flagMin', 'mr.flag_max AS flagMax',
                'mr.range_lower AS rangeLower', 'mr.range_upper AS rangeUpper', 'mr.flag_lower AS flagLower',
                'mr.flag_upper AS flagUpper', 'mr.alphanumeric AS alphanumeric', 'mr.interpretation AS interpretation',
                'mr.deleted_at AS measureRangesDeletedAt', 'mr.result_interpretation_id AS resultInterpretationId')
            ->orderBy('mr.id', 'asc')
            ->get();

        return $results;
    }


    /**
     * Display a listing of UNHLS Patient visits.
     *
     * @return Response
     */

    public function unhlsVisits()   //PatientVisit POJO
    {
        $results = DB::table('unhls_patients AS up')
            ->leftJoin('micro_patients_details AS mp', function ($join) {
                $join->on('mp.patient_id', '=', 'up.id');
            })
            ->leftJoin('unhls_visits AS uv', function ($join) {
                $join->on('up.id', '=', 'uv.patient_id');
            })
            ->leftJoin('unhls_districts AS ud', function ($join) {
                $join->on('up.district_residence', '=', 'ud.id');
            })
            ->leftJoin('wards AS w', function ($join) {
                $join->on('uv.ward_id', '=', 'w.id');
            })
            ->leftJoin('ward_type AS wt', function ($join) {
                $join->on('w.ward_type_id', '=', 'wt.id');
            })
            ->select('up.id AS unhlsPatientsId', 'up.patient_number AS patientNumber', 'up.ulin AS ulin',
                'up.nin AS nin', 'up.name AS name', 'up.dob as dob', 'up.age AS age', 'up.gender AS gender', 'up.nationality AS nationality',
                'up.email AS email', 'up.address AS address', 'up.village_residence AS villageResidence', 'up.district_residence AS districtResidence',
                'up.village_workplace AS villageWorkplace', 'up.phone_number AS phoneNumber', 'up.occupation AS occupation',
                'up.external_patient_number AS externalPatientNumber', 'up.created_by AS unhlsPatientsCreatedBy',
                'up.deleted_at AS unhlsPatientsDeletedAt', 'up.created_at AS unhlsPatientsCreatedAt',
                'up.updated_at AS unhlsPatientsUpdatedAt', 'up.is_micro AS isMicro',
                'mp.id AS microPatientsDetailsId', 'mp.patient_id AS patientId', 'mp.sub_county_residence AS subCountyResidence',
                'mp.sub_county_workplace AS subCountyWorkplace', 'mp.name_next_kin AS nameNextKin', 'mp.contact_next_kin AS contactNextKin',
                'mp.residence_next_kin AS residenceNextKin', 'mp.admission_date AS admissionDate', 'mp.transfered AS transfered',
                'mp.facility_transfered AS facilityTransfered', 'mp.clinical_notes AS clinicalNotes',
                'mp.days_on_antibiotic AS daysOnAntibiotic', 'mp.requested_by AS requestedBy', 'mp.clinician_contact AS clinicianContact',
                'mp.deleted_at AS microPatientsDetailsDeletedAt', 'mp.created_at AS microPatientsDetailsCreatedAt',
                'mp.updated_at AS microPatientsDetailsUpdatedAt',
                'ud.id AS unhlsDistrictsId', 'ud.name AS unhlsDistrictsName', 'ud.created_at AS unhlsDistrictsCreatedAt',
                'ud.updated_at AS unhlsDistrictsUpdatedAt',
                'uv.id AS unhlsVisitsId', 'uv.patient_id AS unhlsVisitsPatientId', 'uv.visit_type AS visitType',
                'uv.visit_number AS visitNumber', 'uv.visit_lab_number AS visitLabNumber', 'uv.facility_id AS facilityId',
                'uv.facility_lab_number AS facilityLabNumber', 'uv.created_at AS unhlsVisitsCreatedAt',
                'uv.updated_at AS unhlsVisitsUpdatedAt', 'uv.ward_id AS wardId', 'uv.bed_no AS bedNo',
                'uv.visit_status_id AS visitStatusId', 'uv.hospitalized AS hospitalized', 'uv.urgency AS urgency',
                'uv.on_antibiotics AS onAntibiotics',
                'w.id AS wardsId', 'w.name AS wardsName', 'w.description AS wardsDescription', 'w.ward_type_id AS wardsWardTypeId',
                'wt.id AS wardTypeId', 'wt.name AS wardTypeName')
            ->orderBy('uv.id', 'asc')
            ->get();

        return $results;

    }


    public function updateunhlsVisits($visit_id = 11)   //PatientVisit POJO
    {
        $results = DB::table('unhls_patients AS up')
            ->leftJoin('micro_patients_details AS mp', function ($join) {
                $join->on('mp.patient_id', '=', 'up.id');
            })
            ->leftJoin('unhls_visits AS uv', function ($join) use($visit_id){
                $join->on('uv.id', '=', $visit_id);
//                $join->on('uv.id', '=', DB::raw($var));
            })
            ->leftJoin('unhls_districts AS ud', function ($join) {
                $join->on('up.district_residence', '=', 'ud.id');
            })
            ->leftJoin('wards AS w', function ($join) {
                $join->on('uv.ward_id', '=', 'w.id');
            })
            ->leftJoin('ward_type AS wt', function ($join) {
                $join->on('w.ward_type_id', '=', 'wt.id');
            })
            ->select('up.id AS unhlsPatientsId', 'up.patient_number AS patientNumber', 'up.ulin AS ulin',
                'up.nin AS nin', 'up.name AS name', 'up.dob as dob', 'up.age AS age', 'up.gender AS gender', 'up.nationality AS nationality',
                'up.email AS email', 'up.address AS address', 'up.village_residence AS villageResidence', 'up.district_residence AS districtResidence',
                'up.village_workplace AS villageWorkplace', 'up.phone_number AS phoneNumber', 'up.occupation AS occupation',
                'up.external_patient_number AS externalPatientNumber', 'up.created_by AS unhlsPatientsCreatedBy',
                'up.deleted_at AS unhlsPatientsDeletedAt', 'up.created_at AS unhlsPatientsCreatedAt',
                'up.updated_at AS unhlsPatientsUpdatedAt', 'up.is_micro AS isMicro',
                'mp.id AS microPatientsDetailsId', 'mp.patient_id AS patientId', 'mp.sub_county_residence AS subCountyResidence',
                'mp.sub_county_workplace AS subCountyWorkplace', 'mp.name_next_kin AS nameNextKin', 'mp.contact_next_kin AS contactNextKin',
                'mp.residence_next_kin AS residenceNextKin', 'mp.admission_date AS admissionDate', 'mp.transfered AS transfered',
                'mp.facility_transfered AS facilityTransfered', 'mp.clinical_notes AS clinicalNotes',
                'mp.days_on_antibiotic AS daysOnAntibiotic', 'mp.requested_by AS requestedBy', 'mp.clinician_contact AS clinicianContact',
                'mp.deleted_at AS microPatientsDetailsDeletedAt', 'mp.created_at AS microPatientsDetailsCreatedAt',
                'mp.updated_at AS microPatientsDetailsUpdatedAt',
                'ud.id AS unhlsDistrictsId', 'ud.name AS unhlsDistrictsName', 'ud.created_at AS unhlsDistrictsCreatedAt',
                'ud.updated_at AS unhlsDistrictsUpdatedAt',
                'uv.id AS unhlsVisitsId', 'uv.patient_id AS unhlsVisitsPatientId', 'uv.visit_type AS visitType',
                'uv.visit_number AS visitNumber', 'uv.visit_lab_number AS visitLabNumber', 'uv.facility_id AS facilityId',
                'uv.facility_lab_number AS facilityLabNumber', 'uv.created_at AS unhlsVisitsCreatedAt',
                'uv.updated_at AS unhlsVisitsUpdatedAt', 'uv.ward_id AS wardId', 'uv.bed_no AS bedNo',
                'uv.visit_status_id AS visitStatusId', 'uv.hospitalized AS hospitalized', 'uv.urgency AS urgency',
                'uv.on_antibiotics AS onAntibiotics',
                'w.id AS wardsId', 'w.name AS wardsName', 'w.description AS wardsDescription', 'w.ward_type_id AS wardsWardTypeId',
                'wt.id AS wardTypeId', 'wt.name AS wardTypeName')
            ->orderBy('unhlsVisitsId', 'asc')
            ->get();

        return $results;

    }


    public function pocResults($patient_id)
    {

        $results = DB::table('poc_results AS pr')
            ->where('patient_id', '=', $patient_id)
            ->select('pr.id AS pocResultsId', 'pr.patient_id AS patientId', 'pr.results AS results', 'pr.test_date AS testDate',
                'pr.tested_by AS testedBy', 'pr.dispatched_by AS dispatchedBy', 'pr.dispatched_date AS dispatchedDate',
                'pr.test_time AS testTime', 'pr.equipment_used AS equipmentUsed', 'pr.created_at AS createdAt',
                'pr.updated_at AS updatedAt', 'pr.error_code AS errorCode')
            ->orderBy('pr.id', 'asc')
            ->get();

        return $results;

    }


    public function pocTable()
    {
        $results = DB::table('poc_tables AS pt')
            ->select('id AS pocId', 'facility_id AS facilityId', 'district_id AS districtId', 'gender AS gender', 'age AS age', 'exp_no AS expNo',
                'provisional_diagnosis AS provisionalDiagnosis', 'caretaker_number AS caretakerNumber', 'entry_point AS entryPoint', 'mother_name AS motherName',
                'infant_name AS infantName', 'breastfeeding_status AS breastfeedingStatus', 'mother_hiv_status AS motherHivStatus', 'collection_date AS collectionDate',
                'pcr_level AS pcrLevel', 'created_by AS createdBy', 'pmtct_antenatal AS pmtctAntenatal', 'pmtct_delivery AS pmtctDelivery', 'pmtct_postnatal AS pmtctPostnatal',
                'admission_date AS admissionDate', 'sample_id AS sampleId', 'infant_pmtctarv AS infantPmtctarv', 'mother_pmtctarv AS motherPmtctarv', 'other_entry_point AS otherEntryPoint',
                'deleted_at AS deletedAt', 'created_at AS createdAt', 'updated_at AS updatedAt', 'ulin AS ulin',
                'given_contrimazole AS givenContrimazole', 'delivered_at AS deliveredAt', 'nin AS nin',
                'feeding_status AS feedingStatus')
            ->orderBy('id', 'asc')
            ->get();

        return $results;
    }


    public function users()
    {
        $results = DB::table('users AS u')
            ->select('u.id AS usersId', 'u.username AS username', 'u.password AS password',
                'u.email AS email', 'u.name AS name', 'u.gender AS gender', 'u.designation',
                'u.image AS image', 'u.remember_token AS rememberToken', 'u.facility_id AS facilityId',
                'u.deleted_at AS deletedAt', 'u.created_at AS createdAt', 'u.updated_at AS updatedAt',
                'u.phone_contact AS phoneContact')
            ->orderBy('u.id', 'asc')
            ->get();

        return $results;
    }


    public function clinicians()
    {
        $results = DB::table('clinicians AS c')
            ->select('c.id AS cliniciansId', 'c.name AS name', 'c.cadre AS cadre',
                'c.phone AS phone', 'c.email AS email', 'c.created_at AS createdAt',
                'c.active AS active','c.updated_at AS updatedAt')
            ->orderBy('c.id', 'asc')
            ->get();

        return $results;
    }


    public function referrals($test_id)
    {
        $results = DB::table('referrals AS rf')
            ->where('test_id', '=', $test_id)
            ->leftJoin('facilities AS f', function ($join) {
                $join->on('rf.facility_id', '=', 'f.id');
            })
            ->leftJoin('referral_reasons AS rr', function ($join) {
                $join->on('rf.referral_reason', '=', 'rr.id');
            })
            ->select('rf.id AS referralsId', 'rf.test_id AS testId', 'rf.sample_obtainer AS sampleObtainer',
                'rf.cadre_obtainer AS cadreObtainer', 'rf.sample_date AS sampleDate', 'rf.sample_time AS sampleTime',
                'rf.time_dispatch AS timeDispatch', 'rf.storage_condition AS storageCondition',
                'rf.transport_type AS transportType', 'rf.status AS referralsStatus',
                'rf.referral_reason AS referralReason', 'rf.priority_specimen AS prioritySpecimen',
                'rf.facility_id AS refferalFacilityId', 'rf.person AS person',
                'rf.contacts AS contacts', 'rf.user_id AS userId', 'rf.created_at AS createdAt',
                'rf.updated_at AS updatedAt', 'f.id AS facilitiesId', 'f.name AS facilitiesName',
                'f.facility_contact AS facilityContact', 'f.facility_email AS facilityEmail',
                'f.active AS facilitiesActive', 'f.code AS facilitiesCode', 'f.dhis2_name AS dhis2Name',
                'f.dhis2_uid AS dhis2Uid', 'f.created_at AS facilitiesCreatedAt', 'f.updated_at AS facilitiesUpdatedAt',
                'rr.id AS referralReasonsId', 'rr.reason AS referralReasonsReason'
            )
            ->orderBy('rf.id', 'asc')
            ->get();

        return $results;
    }

    /**
     * Display a listing of UNHLS Tests.
     *
     * @return Response
     */
    public function specimenTest($visit_id)
    {
        $results = DB::table('unhls_tests AS ut')
            ->where('ut.visit_id', '=', $visit_id)
            ->leftJoin('test_types AS tt', function ($join) {
                $join->on('ut.test_type_id', '=', 'tt.id');
            })
            ->leftJoin('test_categories AS tc', function ($join) {
                $join->on('tc.id', '=', 'tt.test_category_id');
            })
            ->leftJoin('test_statuses AS ts', function ($join) {
                $join->on('ut.test_status_id', '=', 'ts.id');
            })
            ->leftJoin('test_phases AS tp', function ($join) {
                $join->on('ts.test_phase_id', '=', 'tp.id');
            })
            ->leftJoin('specimens AS sp', function ($join) {
                $join->on('ut.specimen_id', '=', 'sp.id');
            })
            ->leftJoin('specimen_types AS spt', function ($join) {
                $join->on('sp.specimen_type_id', '=', 'spt.id');
            })
            ->leftJoin('specimen_statuses AS sps', function ($join) {
                $join->on('sps.id', '=', 'sp.specimen_status_id');
            })
            ->select('ut.id AS unhlsTestsId', 'ut.visit_id AS unhlsTestsVisitId', 'ut.urgency_id AS urgencyId',
                'ut.test_type_id AS testTypeId', 'ut.specimen_id AS unhlsTestsSpecimenId', 'ut.interpretation AS interpretation',
                'ut.test_status_id AS testStatusId', 'ut.created_by AS unhlsTestsCreatedBy', 'ut.tested_by AS unhlsTestsTestedBy',
                'ut.verified_by AS unhlsTestsVerifiedBy', 'ut.requested_by AS unhlsTestsRequestedBy',
                'ut.clinician_id AS unhlsTestsClinicianId', 'ut.purpose AS purpose', 'ut.time_created AS timeCreated',
                'ut.time_started AS timeStarted', 'ut.time_completed AS timeCompleted', 'ut.time_verified AS timeVerified',
                'ut.time_sent AS timeSent', 'ut.external_id AS externalId', 'ut.instrument AS instrument', 'ut.approved_by AS approvedBy',
                'ut.approved_by AS timeApproved', 'ut.revised_by AS unhlsTestsRevisedBy', 'ut.time_revised AS timeRevised',
                'tt.id AS testTypesId', 'tt.name AS testTypesName', 'tt.description AS testTypesDescription',
                'tt.test_category_id AS testTypesTestCategoryId', 'tt.targetTAT AS targetTAT', 'tt.targetTAT_unit AS targetTATunit',
                'tt.orderable_test AS orderableTest', 'tt.prevalence_threshold AS prevalenceThreshold',
                'tt.accredited AS testTypesAccredited', 'tt.deleted_at AS testTypesDeletedAt', 'tt.created_at AS testTypesCreatedAt',
                'tt.updated_at AS testTypesUpdatedAt', 'tc.id AS testCategoriesId', 'tc.name AS testCategoriesName',
                'tc.description AS testCategoriesDescription', 'tc.deleted_at AS testCategoriesDeletedAt',
                'tc.created_at AS testCategoriesCreatedAt', 'tc.updated_at AS testCategoriesUpdatedAt',
                'ts.id AS testStatusesId', 'ts.name AS testStatusesName', 'ts.test_phase_id AS testStatusesTestPhaseId',
                'tp.id AS testPhasesId', 'tp.name AS testPhasesName',
                'sp.id AS specimensId', 'sp.specimen_type_id AS specimentestSpecimenTypeId', 'sp.specimen_status_id AS specimenStatusId',
                'sp.accepted_by AS specimentestAcceptedBy', 'sp.referral_id AS referralId', 'sp.time_collected AS specimentestTimeCollected',
                'sp.time_accepted AS specimentestTimeAccepted',
                'spt.id AS specimenTypesId', 'spt.name AS specimenTypesName', 'spt.description AS specimenTypesDescription',
                'spt.deleted_at AS specimenTypesDeletedAt', 'spt.created_at AS specimenTypesCreatedAt', 'spt.updated_at AS specimenTypesUpdatedAt',
                'sps.id AS specimenStatusesId', 'sps.name AS specimenStatusesName')
            ->orderBy('ut.id', 'asc')
            ->get();


        return $results;
//        return Response::json($results, 200);


    }


    public function chunkVisits($visit_id)
    {
        $results = UnhlsVisit::where('id', '>', $visit_id)
                            ->limit(5)
                            ->select('id')
                            ->get();

        return json_decode(json_encode($results), true);
    }


    public function getVisitDetails($visit_id)
    {
        $results = DB::table('unhls_visits AS uv')
            ->where('uv.id', '=', $visit_id)
            ->leftJoin('unhls_patients AS up', function ($join){
                $join->on('up.id', '=', 'uv.patient_id');
            })
            ->leftJoin('micro_patients_details AS mp', function ($join) {
                $join->on('mp.patient_id', '=', 'up.id');
            })
            ->leftJoin('unhls_districts AS ud', function ($join) {
                $join->on('up.district_residence', '=', 'ud.id');
            })
            ->leftJoin('wards AS w', function ($join) {
                $join->on('uv.ward_id', '=', 'w.id');
            })
            ->leftJoin('ward_type AS wt', function ($join) {
                $join->on('w.ward_type_id', '=', 'wt.id');
            })
            ->select('up.id AS unhlsPatientsId', 'up.patient_number AS patientNumber', 'up.ulin AS ulin',
                'up.nin AS nin', 'up.name AS name', 'up.dob as dob', 'up.age AS age', 'up.gender AS gender', 'up.nationality AS nationality',
                'up.email AS email', 'up.address AS address', 'up.village_residence AS villageResidence', 'up.district_residence AS districtResidence',
                'up.village_workplace AS villageWorkplace', 'up.phone_number AS phoneNumber', 'up.occupation AS occupation',
                'up.external_patient_number AS externalPatientNumber', 'up.created_by AS unhlsPatientsCreatedBy',
                'up.deleted_at AS unhlsPatientsDeletedAt', 'up.created_at AS unhlsPatientsCreatedAt',
                'up.updated_at AS unhlsPatientsUpdatedAt', 'up.is_micro AS isMicro',
                'mp.id AS microPatientsDetailsId', 'mp.patient_id AS patientId', 'mp.sub_county_residence AS subCountyResidence',
                'mp.sub_county_workplace AS subCountyWorkplace', 'mp.name_next_kin AS nameNextKin', 'mp.contact_next_kin AS contactNextKin',
                'mp.residence_next_kin AS residenceNextKin', 'mp.admission_date AS admissionDate', 'mp.transfered AS transfered',
                'mp.facility_transfered AS facilityTransfered', 'mp.clinical_notes AS clinicalNotes',
                'mp.days_on_antibiotic AS daysOnAntibiotic', 'mp.requested_by AS requestedBy', 'mp.clinician_contact AS clinicianContact',
                'mp.deleted_at AS microPatientsDetailsDeletedAt', 'mp.created_at AS microPatientsDetailsCreatedAt',
                'mp.updated_at AS microPatientsDetailsUpdatedAt',
                'ud.id AS unhlsDistrictsId', 'ud.name AS unhlsDistrictsName', 'ud.created_at AS unhlsDistrictsCreatedAt',
                'ud.updated_at AS unhlsDistrictsUpdatedAt',
                'uv.id AS unhlsVisitsId', 'uv.patient_id AS unhlsVisitsPatientId', 'uv.visit_type AS visitType',
                'uv.visit_number AS visitNumber', 'uv.visit_lab_number AS visitLabNumber', 'uv.facility_id AS facilityId',
                'uv.facility_lab_number AS facilityLabNumber', 'uv.created_at AS unhlsVisitsCreatedAt',
                'uv.updated_at AS unhlsVisitsUpdatedAt', 'uv.ward_id AS wardId', 'uv.bed_no AS bedNo',
                'uv.visit_status_id AS visitStatusId', 'uv.hospitalized AS hospitalized', 'uv.urgency AS urgency',
                'uv.on_antibiotics AS onAntibiotics',
                'w.id AS wardsId', 'w.name AS wardsName', 'w.description AS wardsDescription', 'w.ward_type_id AS wardsWardTypeId',
                'wt.id AS wardTypeId', 'wt.name AS wardTypeName')
            ->orderBy('uv.id', 'asc')
            ->get();
        return $results;
    }


    public function getPatientVisits($visit_id = null)
    {

//        $visits = $this->unhlsVisits();
        $visits = $this->getVisitDetails($visit_id);
        $visits = json_decode(json_encode($visits), true);

        // Add Specimentest key to each visit
        $patient_visits = [];
        $visits = json_decode(json_encode($visits), true);

        $visits2 = [];
        $test_results = [];
        foreach ($visits as $visit) {
            $visit['specimentestList'] = [];

            $visit_tests = [];
            $visit_tests = json_decode(json_encode($this->specimenTest($visit['unhlsVisitsId'])), true);

            $visit['specimentestList'] = $visit_tests;

            $visits2[] = $visit;

        }
//        dd(json_encode($visits2));

        $visit3 = [];
        foreach ($visits2 as $patient_visit) {
            if (!empty($patient_visit['specimentestList'])) {
                $updated_patient_visit = [];
                $updated_tests = [];
                $test_results = [];
                $test_organisms = [];
                $test_rejects = [];
                $test_referrals = [];

                foreach ($patient_visit['specimentestList'] as $spec_test) {
                    // Appending test results to specimentest
                    $spec_test['testresultList'] = [];
                    $test_results = json_decode(json_encode($this->unhlsResults($spec_test['unhlsTestsId'])), true);
                    $spec_test['testresultList'] = $test_results;


                    // Appending microorganisms to specimentest
                    $spec_test['microorganismList'] = [];
                    $test_organisms = json_decode(json_encode($this->fetchIsolatedOrganisms($spec_test['unhlsTestsId'])), true);
                    $spec_test['microorganismList'] = $test_organisms;


                    // Appending specimenrejectList to specimentest
                    $spec_test['specimenrejectList'] = [];
                    $test_rejects = json_decode(json_encode($this->specimenReject($spec_test['unhlsTestsId'])), true);
                    $spec_test['specimenrejectList'] = $test_rejects;

                    // Appending test referrals to specimentest
                    $spec_test['referralList'] = [];
                    $test_referrals = json_decode(json_encode($this->referrals($spec_test['unhlsTestsId'])), true);
                    $spec_test['referralList'] = $test_referrals;

                    $updated_tests[] = $spec_test;
                }

                $patient_visit['specimentestList'] = $updated_tests;
                $visit3[] = $patient_visit;
//                dd(json_encode($patient_visit));
            }
//            }
            $specimen[] = $patient_visit;
        }
//        dd(json_encode($visit3));

        $visit4 = [];
        foreach ($visit3 as $visit) {
//            dd(json_encode($visit['specimentestList']));
            $result_ranges = [];
            $updated_tests = [];

            foreach ($visit['specimentestList'] as $visit_test) {
                $updated_result_list = [];
                $ranges_list = [];
                foreach ($visit_test['testresultList'] as $test_result) {
                    $test_result['measurerangeList'] = [];
                    $ranges_list = json_decode(json_encode($this->measureRanges($test_result['measuresId'])), true);

                    $test_result['measurerangeList'] = $ranges_list;
                    $updated_result_list[] = $test_result;

                }

                $updated_rejections = [];
                $reasons_list = [];
                foreach ($visit_test['specimenrejectList'] as $test_reject) {
//                    dd($test_reject);
                    $test_reject['rejectreasonList'] = [];
//                    $reasons_list = json_decode(json_encode($this->rejectReason($test_reject['analyticSpecimenRejectionsTestId'])), true);
//                    $reasons_list = json_decode(json_encode($this->rejectReason($test_reject['analyticSpecimenRejectionsTestId'])), true);
                    $reasons_list = json_decode(json_encode($this->rejectReason($test_reject['testId'])), true);

                    $test_reject['rejectreasonList'] = $reasons_list;
                    $updated_rejections[] = $test_reject;

                }


//                dd(json_encode($updated_result_list));
                $visit_test['testresultList'] = $updated_result_list;
                $visit_test['specimenrejectList'] = $updated_rejections;

                $updated_tests[] = $visit_test;

//                dd(json_encode($visit_test));
            }
//                dd(json_encode($updated_tests));
            $visit['specimentestList'] = $updated_tests;
//            dd(json_encode($visit));


            $visit4[] = $visit;
//            dd(json_encode($updated_result_list));
//
        }

//        dd(json_encode($visit4));
        $all_visits['patientvisit'] = $visit4;
        $all_visits = $visit4;
//
//
//        // Add POC table
//        $all_visits['poc'] = json_decode(json_encode($this->pocTable()), true);
//
//        // Add poc_result to each POC
//        $poc_visits = [];
//        $poc_results = [];
//        foreach ($all_visits['poc'] as $poc) {
//            $poc['pocresultList'] = [];
//            $poc['pocresultList'] = json_decode(json_encode($this->pocResults($poc['pocId'])), true);
//
//            $poc_results[] = $poc;
//
//        }
//
//        $all_visits['poc'] = $poc_results;
//
//        // Add users
//        $all_visits['users'] = json_decode(json_encode($this->users()));
//
//        $all_visits['clinicians'] = json_decode(json_encode($this->clinicians()), true);

        $all_visits = str_replace("0000-00-00 00:00:00",null, json_encode($all_visits), $i);

        $all_visits = json_decode(json_encode($all_visits), true);

        $all_visits = str_replace("0000-00-00",null, json_encode($all_visits), $i);

        $all_visits = json_decode(json_encode($all_visits), true);

        $all_visits = str_replace("00:00:00",null, $all_visits,$i);

        $all_visits = json_decode($all_visits, true);
//        dd(json_decode($all_visits, true));

        return response()->json(json_decode($all_visits, true), 200);
//        return dd(json_decode($all_visits, true));

    }


    public function getChunkedVisits($id)
    {
        $visit_ids = $this->chunkVisits($id);
        $vis = [];

        foreach ($visit_ids as $id){
            $result = [];
            $visits = json_decode(json_encode($id), true);
            $result = json_decode($this->getPatientVisits($id)->getContent(), true);
            $vis['patientvisit'][] = $result;
        }

        // Add POC table
        $vis['poc'] = json_decode(json_encode($this->pocTable()), true);

        // Add poc_result to each POC
        $poc_visits = [];
        $poc_results = [];
        foreach ($vis['poc'] as $poc) {
            $poc['pocresultList'] = [];
            $poc['pocresultList'] = json_decode(json_encode($this->pocResults($poc['pocId'])), true);

            $poc_results[] = $poc;

        }

        $vis['poc'] = $poc_results;

        // Add users
        $vis['users'] = json_decode(json_encode($this->users()));

        // Add clinicians
        $vis['clinicians'] = json_decode(json_encode($this->clinicians()), true);

        return $vis;
    }

    public function facilitySettings()
    {
        $settings = file_get_contents('config.properties');
        return json_decode($settings, true);
    }


    public function recentVisits()
    {
        $visit_id = Input::get('visit_id');
//            dd(intval($visit_id));
        $results = $this->getPatientVisits(intval($visit_id));

        return Response::json($results);

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

    }

    function dd()
    {
        array_map(function ($x) {
            var_dump($x);
        }, func_get_args());
        die;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
