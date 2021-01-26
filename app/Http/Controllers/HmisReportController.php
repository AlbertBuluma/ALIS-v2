<?php

namespace App\Http\Controllers;

use App\Models\TestType;
use Illuminate\Support\Facades\DB;

set_time_limit(0); //60 seconds = 1 minute
class HmisReportController extends Controller {
	public function hmis105($month = '')
	{
		$month = ($month == '') ? date('Y-m') : $month ;
		$testTypes = TestType::all();

		$visits = $this->getVisistsByMonth($month);
		$sepecimen_counts = $this->getSpecimenTotals($month);
		$total_test_count = $this->getHematologyCounts($month);
		$serology_test_counts = $this->getSerologyCounts($month);
		$microbiology_test_counts = $this->getMicrobiologyCounts($month);
		$parasitology_test_counts = $this->getParasitologyCounts($month);
		$stoolmicroscopy_test_counts = $this->getStoolmicroscopyCounts($month);
		$chemistry_test_counts = $this->getChemistryCounts($month);
		$blood_transfussion_test_counts  = $this->getBloodTransfusionCounts($month);
		$culture_and_sensitivity_counts  = $this->getCultureAndSensitivityCounts($month);
		$immunology_counts = $this->getImmunologyCounts($month);
		$molecular_counts = $this->getMolecularCounts($month);
		$hiv_by_purpose = $this->getHivTestByPurpose($month);
		$referral_tests = $this->getReferredTestCounts($month);
		$referred_microbiology = $this->getReferredMicrobiologyCounts($month);
		$referred_virology = $this->getReferredVirologyCounts($month);
		$referred_parasitology = $this->getReferredParasitologyCounts($month);
		$equipment_breakdown = $this->getEquipmentBreakdownCounts($month);
		$reagent_stockout = $this->getReagentStockoutCounts($month);
		$supplies_stockout = $this->getSuppliesStockoutCounts($month);
		$power_outage = $this->getPowerOutageCounts($month);
		$no_testing_expertise = $this->getTestingExpertiseCounts($month);
		$required_equipment = $this->getRequiredEquipmentCounts($month);
		$confirmatory_testing = $this->getConfirmatoryTestingCounts($month);
		$qa_retesting = $this->getQaRetestingCounts($month);
		$other_referral_reasons = $this->getOtherReferralReasonsCounts($month);
		$KlebsiellaOrganism = $this->getKlebsiellaOrganismCounts($month);
		$EscherichiaOrganism = $this->getEscherichiaOrganismCounts($month);
		$salmonellaOrganism = $this->getsalmonellaOrganismCounts($month);
		$ShigellaOrganism = $this->getShigellaOrganismCounts($month);
		$NeisseriaOrganism = $this->getNeisseriaOrganismCounts($month);
		$StaphylococcusOrganism = $this->getStaphylococcusOrganismCounts($month);
		$StreptococcusOrganism = $this->getStreptococcusOrganismCounts($month);
		$AcinetobacterOrganism = $this->getAcinetobacterOrganismCounts($month);
		$VibrioOrganism = $this->getVibrioOrganismCounts($month);
		$EnterococcusOrganism = $this->getEnterococcusOrganismCounts($month);
		$HaemophilusOrganism = $this->getHaemophilusOrganismCounts($month);
		$NeisseriamOrganism = $this->getNeisseriamOrganismCounts($month);
		$CampylobacterOrganism = $this->getCampylobacterOrganismCounts($month);
		$OthersOrganism = $this->getOthersOrganismCounts($month);
		$blood_specimen_rejection = $this->getBloodSpecimenRejectionCounts($month);
		$stool_specimen_rejection = $this->getStoolSpecimenRejectionCounts($month);
		$urine_specimen_rejection = $this->getUrineSpecimenRejectionCounts($month);
		$sputum_specimen_rejection = $this->getSputumSpecimenRejectionCounts($month);
		$pus_specimen_rejection = $this->getPusSpecimenRejectionCounts($month);
		$genital_specimen_rejection = $this->getGenitalSpecimenRejectionCounts($month);
		$skin_specimen_rejection = $this->getSkinSpecimenRejectionCounts($month);
		$other_specimen_rejection = $this->getOtherSpecimenRejectionCounts($month);
		$isolates = $this->getIsolateCounts($month);
		$hct_test = $this->getHCTCounts($month);
		$emtct_test = $this->geteMTCTCounts($month);
		$smc_test = $this->getSMCCounts($month);
		$clinical_diagnosis_test = $this->getclinicalDiagnosisCounts($month);
		$repeat_test = $this->getrepeatTestCounts($month);
		$verification_test = $this->getVerificationTestCounts($month);
		$inconclusive_test = $this->getinconclusiveCounts($month);
		$dna_confirmatory_test = $this->getdnaConfirmedTestCounts($month);
		$iqc_test = $this->getIQCCounts($month);
		$eqa_test = $this->getEQACounts($month);

		// $test_request_information  = array(
		// 	'tests' => $testTypes
		// 	);
		// $pdf = new RevisedReportPdf;
		// $pdf->setTestRequestInformation($test_request_information);

		// $pdf->SetAutoPageBreak(TRUE, 15);
		// $pdf->AddPage();
		// $pdf->SetFont('times','','11');
		// $pdf->writeHTML($content, 'true', 'false', 'false', 'false', '');

		// return $pdf->output('report.pdf');
		return view('reports.hmis.hmis05')
							->with('month', $month)
							->with('isolates', $isolates)
							->with('sepecimen_counts', $sepecimen_counts)
							->with('KlebsiellaOrganism', $KlebsiellaOrganism)
							->with('EscherichiaOrganism', $EscherichiaOrganism)
							->with('salmonellaOrganism', $salmonellaOrganism)
							->with('ShigellaOrganism', $ShigellaOrganism)
							->with('NeisseriaOrganism', $NeisseriaOrganism)
							->with('StaphylococcusOrganism', $StaphylococcusOrganism)
							->with('StreptococcusOrganism', $StreptococcusOrganism)
							->with('AcinetobacterOrganism', $AcinetobacterOrganism)
							->with('VibrioOrganism', $VibrioOrganism)
							->with('EnterococcusOrganism', $EnterococcusOrganism)
							->with('HaemophilusOrganism', $HaemophilusOrganism)
							->with('NeisseriamOrganism', $NeisseriamOrganism)
							->with('CampylobacterOrganism', $CampylobacterOrganism)
							->with('OthersOrganism', $OthersOrganism)
							->with('blood_specimen_rejection', $blood_specimen_rejection)
							->with('stool_specimen_rejection', $stool_specimen_rejection)
							->with('urine_specimen_rejection', $urine_specimen_rejection)
							->with('sputum_specimen_rejection', $sputum_specimen_rejection)
							->with('pus_specimen_rejection', $pus_specimen_rejection)
							->with('genital_specimen_rejection', $genital_specimen_rejection)
							->with('skin_specimen_rejection', $skin_specimen_rejection)
							->with('other_specimen_rejection', $other_specimen_rejection)
							->with('equipment_breakdown', $equipment_breakdown)
							->with('other_referral_reasons', $other_referral_reasons)
							->with('qa_retesting', $qa_retesting)
							->with('confirmatory_testing', $confirmatory_testing)
							->with('required_equipment', $required_equipment)
							->with('no_testing_expertise', $no_testing_expertise)
							->with('power_outage', $power_outage)
							->with('supplies_stockout', $supplies_stockout)
							->with('reagent_stockout', $reagent_stockout)
							->with('total_test_count', $total_test_count)
							->with('serology_test_counts', $serology_test_counts)
							->with('parasitology_test_counts', $parasitology_test_counts)
							->with('stoolmicroscopy_test_counts', $stoolmicroscopy_test_counts)
							->with('chemistry_test_counts', $chemistry_test_counts)
							->with('microbiology_test_counts', $microbiology_test_counts)
							->with('visits', $visits)
							->with('blood_transfussion_test_counts', $blood_transfussion_test_counts)
							->with('culture_and_sensitivity_counts',$culture_and_sensitivity_counts)
							->with('immunology_counts', $immunology_counts)
							->with('molecular_counts',$molecular_counts)
							->with('referral_tests',$referral_tests)
							->with('referred_microbiology',$referred_microbiology)
							->with('referred_virology',$referred_virology)
							->with('referred_parasitology',$referred_parasitology)
							->with('hct_test',$hct_test)
							->with('emtct_test',$emtct_test)
							->with('clinical_diagnosis_test',$clinical_diagnosis_test)
							->with('smc_test',$smc_test)
							->with('repeat_test',$repeat_test)
							->with('verification_test',$verification_test)
							->with('inconclusive_test',$inconclusive_test)
							->with('dna_confirmatory_test',$dna_confirmatory_test)
							->with('iqc_test',$iqc_test)
							->with('eqa_test',$eqa_test)
							->with('hiv_by_purpose',$hiv_by_purpose);
	}

	/*
	* @parameters - $month - the period of consideration
	* Uses mysql query to get the counts of specimen collected out and those collected in
	* @Return - array of total counts for the period for specimen of interest
	*/
	private function getVisistsByMonth($month){
		$visits_counts = ['in_patients' => 0, 'out_patients' => 0];
		$query = "SELECT SUM(IF(`visit_type` LIKE '%In-patient%', 1, 0)) AS 'in_patients',SUM(IF(`visit_type` LIKE '%Out-patient%', 1, 0)) AS 'out_patients'
				FROM `unhls_visits`
				WHERE `created_at` LIKE '%".$month."%' ";
		$results = DB::select($query);
		if(!empty($results[0]->out_patients)){
			$visits_counts['in_patients'] = $results[0]->in_patients;
			$visits_counts['out_patients'] = $results[0]->out_patients;
		}
		return  $visits_counts;
	}

	/*
	* @parameters - $month - the period of consideration
	* Uses mysql query to get the counts of specimen collected out and those collected in
	* @Return - array of total counts for the period for specimen of interest
	*/
	private function getSpecimenTotals($month){
		$query = "select t.specimen_id, st.name, v.visit_type, st.id, v.id as visit_id from unhls_tests as t
INNER JOIN  unhls_visits v ON(v.id = t.visit_id)
INNER JOIN specimens s ON(t.specimen_id = s.id)
INNER JOIN specimen_types st ON(s.specimen_type_id = st.id)
WHERE `v`.`created_at` LIKE '%".$month."%' ";
// GROUP BY t.specimen_id";
	 $samples_on_visit = DB::select($query);
	 //define varialbe to hold the various counts
	 $blood_collected_in = 0; $blood_collected_out = 0;
	 $stool_collected_in = 0; $stool_collected_out = 0;
	 $urine_collected_in = 0; $urine_collected_out = 0;
	 $sputum_collected_in = 0; $sputum_collected_out = 0;
	 $csf_collected_in = 0; $csf_collected_out = 0;
	 $csf_collected_in = 0; $csf_collected_out = 0;
	 $biopsy_collected_in = 0; $biopsy_collected_out = 0;
	 $pus_swab_collected_in = 0; $pus_swab_collected_out = 0;
	 $genital_swab_collected_in = 0; $genital_swab_collected_out = 0;
	 $skin_collected_in = 0; $skin_collected_out = 0;
	 $others_collected_in = 0; $others_collected_out = 0;
	 $specimen_of_interest = array(22,13,26,24,27,14,17,16,11,7);
	 foreach ($samples_on_visit as $sample_on_visit){
	 	//samples in = out-patient + in-patients visit_types
	 	//the id is the specimen_type
	 	if(in_array($sample_on_visit->id, $specimen_of_interest)){
		 	if(($sample_on_visit->visit_type == 'Out-patient' || $sample_on_visit->visit_type == 'In-patient') && $sample_on_visit->id == 22){
		 		$blood_collected_in++;
		 	}else if($sample_on_visit->visit_type == 'Referral' && $sample_on_visit->id == 22){
		 		$blood_collected_out++;
		 	}else if(($sample_on_visit->visit_type == 'Out-patient' || $sample_on_visit->visit_type == 'In-patient') && $sample_on_visit->id == 13){
		 		$stool_collected_in++;
		 	}else if($sample_on_visit->visit_type == 'Referral' && $sample_on_visit->id == 13){
		 		$stool_collected_out++;
		 	}else if(($sample_on_visit->visit_type == 'Out-patient' || $sample_on_visit->visit_type == 'In-patient') && $sample_on_visit->id == 26){
		 		$urine_collected_in++;
		 	}else if($sample_on_visit->visit_type == 'Referral' && $sample_on_visit->id == 26){
		 		$urine_collected_out++;
		 	}else if(($sample_on_visit->visit_type == 'Out-patient' || $sample_on_visit->visit_type == 'In-patient') && $sample_on_visit->id == 24){
		 		$sputum_collected_in++;
		 	}else if($sample_on_visit->visit_type == 'Referral' && $sample_on_visit->id == 24){
		 		$sputum_collected_out++;
		 	}else if(($sample_on_visit->visit_type == 'Out-patient' || $sample_on_visit->visit_type == 'In-patient') && $sample_on_visit->id == 27){
		 		$csf_collected_in++;
		 	}else if($sample_on_visit->visit_type == 'Referral' && $sample_on_visit->id == 27){
		 		$csf_collected_out++;
		 	}else if(($sample_on_visit->visit_type == 'Out-patient' || $sample_on_visit->visit_type == 'In-patient') && $sample_on_visit->id == 14){
		 		$biopsy_collected_in++;
		 	}else if($sample_on_visit->visit_type == 'Referral' && $sample_on_visit->id == 14){
		 		$biopsy_collected_out++;
		 	}else if(($sample_on_visit->visit_type == 'Out-patient' || $sample_on_visit->visit_type == 'In-patient') && $sample_on_visit->id == 17){
		 		$pus_swab_collected_in++;
		 	}else if($sample_on_visit->visit_type == 'Referral' && $sample_on_visit->id == 17){
		 		$pus_swab_collected_out++;
		 	}else if(($sample_on_visit->visit_type == 'Out-patient' || $sample_on_visit->visit_type == 'In-patient') && $sample_on_visit->id == 16){
		 		$genital_swab_collected_in++;
		 	}else if($sample_on_visit->visit_type == 'Referral' && $sample_on_visit->id == 16){
		 		$genital_swab_collected_out++;
		 	}else if(($sample_on_visit->visit_type == 'Out-patient' || $sample_on_visit->visit_type == 'In-patient') && $sample_on_visit->id == 7){
		 		$skin_collected_in++;
		 	}else if($sample_on_visit->visit_type == 'Referral' && $sample_on_visit->id == 7){
		 		$skin_collected_out++;
		 	}
		 }else{
		 	if($sample_on_visit->visit_type == 'Out-patient' || $sample_on_visit->visit_type == 'In-patient'){
		 		$others_collected_in++;
		 	}else{
		 		$others_collected_out++;
		 	}
		 }
	 }
	 $sample_counts_array = ['blood_collected_in' => $blood_collected_in,
	 					   'blood_collected_out' => $blood_collected_out,
	 					   'stool_collected_in' => $stool_collected_in,
	 					   'stool_collected_out' => $stool_collected_out,
	 					   'urine_collected_in' => $urine_collected_in,
	 					   'urine_collected_out' => $urine_collected_out,
	 					   'sputum_collected_in' => $sputum_collected_in,
	 					   'sputum_collected_out' => $sputum_collected_out,
	 					   'csf_collected_in' => $csf_collected_in,
	 					   'csf_collected_out' => $csf_collected_out,
	 					   'biopsy_collected_in' => $biopsy_collected_in,
	 					   'biopsy_collected_out' => $biopsy_collected_out,
	 					   'pus_swab_collected_in' => $pus_swab_collected_in,
	 					   'pus_swab_collected_out' => $pus_swab_collected_out,
	 					   'genital_swab_collected_in' => $genital_swab_collected_in,
	 					   'genital_swab_collected_out' => $genital_swab_collected_out,
	 					   'skin_collected_in' => $skin_collected_in,
	 					   'skin_collected_out' => $skin_collected_out,
	 					   'others_collected_in' => $others_collected_in,
	 					   'others_collected_out' => $others_collected_out,
						];
	//dd($sample_counts_array);
	return $sample_counts_array;
	}
	private function getTestCountsByLabSection($lab_section_id, $month){
		$query = "select ut.test_type_id, tt.name, utr.measure_id, mnm.measure_id as M2, mnm.system_name, tt.test_category_id as lab_section, count(DISTINCT ut.id) as total FROM unhls_tests ut INNER JOIN test_types tt ON(ut.test_type_id = tt.id) INNER JOIN test_categories tc ON(tc.id = tt.test_category_id AND tt.test_category_id = $lab_section_id) INNER JOIN unhls_test_results utr ON(utr.test_id = ut.id)
			LEFT JOIN measure_name_mappings mnm ON(utr.measure_id = mnm.measure_id)
			 WHERE `ut`.`time_created` LIKE '%".$month."%'
			 GROUP BY measure_id";

	 	$rows = DB::select($query);
	 	return $rows;
	}

	private function getHIVTestCounts($lab_section_id, $month){
		$query = "select ut.test_type_id, tt.name, utr.measure_id, ut.purpose, mnm.measure_id as M2, mnm.system_name, tt.test_category_id as lab_section, count(DISTINCT ut.id) as total, SUM(case when utr.result = 'Reactive' then 1 else 0 end) as Positive, SUM(case when ut.purpose = 'hct' then 1 else 0 end) as hct, SUM(case when ut.purpose = 'smc' then 1 else 0 end) as smc, SUM(case when ut.purpose = 'pmtct' then 1 else 0 end) as pmtct, SUM(case when ut.purpose = 'qc' then 1 else 0 end) as qc, SUM(case when ut.purpose = 'clinical_diagnosis' then 1 else 0 end) as clinical_diagnosis, SUM(case when ut.purpose = 'repeat_test' then 1 else 0 end) as repeat_test, SUM(case when ut.purpose = 'test_for_verification' then 1 else 0 end) as test_for_verification, SUM(case when ut.purpose = 'inconclusive_result' then 1 else 0 end) as inconclusive_result, SUM(case when ut.purpose = 'dna_confirmed_test' then 1 else 0 end) as dna_confirmed_test, SUM(case when ut.purpose = 'eqa' then 1 else 0 end) as eqa FROM unhls_tests ut INNER JOIN test_types tt ON(ut.test_type_id = tt.id) INNER JOIN test_categories tc ON(tc.id = tt.test_category_id) INNER JOIN unhls_test_results utr ON(utr.test_id = ut.id) INNER JOIN testtype_measures ttm ON(ttm.measure_id = utr.measure_id) INNER JOIN measure_ranges mr ON(mr.measure_id = utr.measure_id AND mr.alphanumeric = utr.result)
		LEFT JOIN measure_name_mappings mnm ON(utr.measure_id = mnm.measure_id)
		WHERE `ut`.`time_created` LIKE '%".$month."%'
		GROUP BY measure_id";

	 	$rows = DB::select($query);
	 	return $rows;
	}

	private function getAlphanumericTestCountsByLabSection($lab_section_id, $month){
		$query = "select ut.test_type_id, tt.name, utr.measure_id, mnm.measure_id as M2, mnm.system_name, tt.test_category_id as lab_section, count(DISTINCT ut.id) as total, SUM(case when mr.interpretation = 'Positive' then 1 else 0 end) as Positive, SUM(case when mr.interpretation = 'Negative' then 1 else 0 end) as Negative FROM unhls_tests ut INNER JOIN test_types tt ON(ut.test_type_id = tt.id) INNER JOIN test_categories tc ON(tc.id = tt.test_category_id) INNER JOIN unhls_test_results utr ON(utr.test_id = ut.id) INNER JOIN testtype_measures ttm ON(ttm.measure_id = utr.measure_id) INNER JOIN measure_ranges mr ON(mr.measure_id = utr.measure_id AND mr.alphanumeric = utr.result)
		LEFT JOIN measure_name_mappings mnm ON(utr.measure_id = mnm.measure_id)
		WHERE `ut`.`time_created` LIKE '%".$month."%'
		GROUP BY measure_id";

	 	$rows = DB::select($query);
	 	return $rows;
	}

	private function getReferralTestCountsByLabSection($lab_section_id, $month){
		$query = "select test_type_id, utr.test_id, utr.measure_id, mnm.measure_id as M2, mnm.system_name, tt.test_category_id as lab_section, count(DISTINCT rr.id) as total, count(rr.id)-count(utr.id) as Pending, DATE_FORMAT(rr.created_at,'%Y%m') year_month_created, ut.time_started,
						ut.time_verified, ut.time_approved,
						TIMESTAMPDIFF(MINUTE, ut.time_created, ut.time_approved) as waiting_time,
						TIMESTAMPDIFF(MINUTE, rr.created_at, ut.time_verified) as testing_time,
                        SUM(TIMESTAMPDIFF(MINUTE, rr.created_at, ut.time_approved)) / count(rr.id) as AverageTAT  FROM referrals rr
			LEFT JOIN unhls_test_results utr ON(rr.test_id = utr.test_id AND rr.status = $lab_section_id)
			LEFT JOIN measure_name_mappings mnm ON(utr.measure_id = mnm.measure_id)
			INNER JOIN unhls_tests ut ON(rr.test_id = ut.id)
			INNER JOIN test_types tt ON(ut.test_type_id = tt.id)
			WHERE `ut`.`time_created` LIKE '%".$month."%' GROUP BY test_type_id";


	 	$rows = DB::select($query);
	 	return $rows;
	}

	//Input the id for the specified tests within this section e.g cd4, tb, cbc, hiv_screening and vdrl

	private function getReferralTestCountsByReasons($lab_section_id, $month){
		$query = "select ut.test_type_id, tt.test_category_id, count(DISTINCT rr.id) as total, SUM(case when tnm.system_name = 'cd4' then 1 else 0 end) as cd4_total, SUM(case when tnm.system_name = 'tb_genexpert' then 1 else 0 end) as tb_total, SUM(case when tnm.system_name = 'hiv' then 1 else 0 end) as hiv_total, SUM(case when tnm.system_name = 'vdrl_rpr' then 1 else 0 end) as vdrl_total, SUM(case when tnm.system_name = 'cbc' then 1 else 0 end) as cbc_total FROM referrals rr
		INNER JOIN referral_reasons rrs ON(rr.referral_reason = rrs.id AND rr.referral_reason = $lab_section_id)
		INNER JOIN unhls_tests ut ON(rr.test_id = ut.id)
		LEFT JOIN test_name_mappings tnm ON(ut.test_type_id = tnm.test_type_id)
		INNER JOIN test_types tt ON(ut.test_type_id = tt.id)
		WHERE `rr`.`sample_date` LIKE '%".$month."%'
		GROUP BY test_category_id";

	 	$rows = DB::select($query);
	 	return $rows;
	}

	private function getAMRservillence($lab_section_id, $month){
		$query = "select rr.drug_id, rr.drug_susceptibility_measure_id as lab_section, SUM(case when rr.drug_susceptibility_measure_id = 1 then 1 else 0 end) as Sesitive, SUM(case when rr.drug_susceptibility_measure_id = 2 then 1 else 0 end) as Intermediate, SUM(case when rr.drug_susceptibility_measure_id = 3 then 1 else 0 end) as Resistant, count(rr.id) as total FROM drug_susceptibility rr
		INNER JOIN drugs ut ON(rr.drug_id = ut.id)
		INNER JOIN isolated_organisms tt ON(rr.isolated_organism_id = tt.id)
		INNER JOIN organisms org ON(tt.organism_id = org.id AND tt.organism_id = $lab_section_id)
		INNER JOIN drug_susceptibility_measures dsm ON(rr.drug_susceptibility_measure_id = dsm.id)
		WHERE `rr`.`created_at` LIKE '%".$month."%'
		GROUP BY rr.drug_id";

	 	$rows = DB::select($query);
	 	return $rows;
	}

	private function getSpecimenRejectionTotalBySampleType($lab_section_id, $month){
		$query = "select reason_id, count(srr.id) as total FROM analytic_specimen_rejection_reasons srr
		INNER JOIN rejection_reasons rr ON(srr.reason_id = rr.id)
		INNER JOIN specimens ss ON(srr.specimen_id = ss.id)
		INNER JOIN specimen_types st ON(ss.specimen_type_id = st.id AND ss.specimen_type_id = $lab_section_id)
		WHERE `srr`.`created_at` LIKE '%".$month."%'
		GROUP BY reason_id";

	 	$rows = DB::select($query);
	 	return $rows;
	}

	private function getTotalNumberOfIsolates($lab_section_id, $month){
		$query = "select tt.id, tt.organism_id, ty.test_category_id as lab_section, count(tt.id) as total FROM isolated_organisms tt INNER JOIN organisms org ON(tt.organism_id = org.id) INNER JOIN unhls_tests ut ON (ut.id = tt.test_id) INNER JOIN test_types ty ON (ty.id = ut.test_type_id AND ty.test_category_id = $lab_section_id)
		WHERE `tt`.`created_at` LIKE '%".$month."%'
		GROUP BY tt.organism_id";
		//set variables for the target tests -from
		//also get array of test_type ids to use in condition
	 	$rows = DB::select($query);
	 	return $rows;
	}

	private function getIsolateCounts($month){
		$test_type_ids = $this->getTestTypeIDs('isolate');
		$rows = $this->getTotalNumberOfIsolates($test_type_ids['test_category_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['Klebsiella_pneumoniae'] = 0;
		$test_type_counts['Escherichia_coli'] = 0;
		$test_type_counts['Salmonella_spp'] = 0;
		$test_type_counts['Shigella_spp'] = 0;
		$test_type_counts['Neisseria_gonorrhoeae'] = 0;
		$test_type_counts['Staphylococcus_aureus'] = 0;
		// $test_type_counts['shigella_dysentery'] = 0;
		$test_type_counts['Streptococcus_pneumoniae'] = 0;
		$test_type_counts['Acinetobacter_baumannii'] = 0;
		$test_type_counts['Vibrio_cholerae'] = 0;
		$test_type_counts['Enterococcus_spp'] = 0;
		$test_type_counts['Haemophilus_influenzae'] = 0;
		$test_type_counts['Neisseria_meningitides'] = 0;
		$test_type_counts['Campylobacter'] = 0;
		$test_type_counts['others'] = 0;
	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->organism_id == $test_type_ids['Klebsiella_pneumoniae']){
	 			$test_type_counts['Klebsiella_pneumoniae'] = $row->total;
	 		}else if((int)$row->organism_id == $test_type_ids['Escherichia_coli']){
	 			$test_type_counts['Escherichia_coli'] = $row->total;
	 		}else if((int)$row->organism_id == $test_type_ids['Salmonella_spp']){
	 			$test_type_counts['Salmonella_spp'] = $row->total;
	 		}else if((int)$row->organism_id == $test_type_ids['Shigella_spp']){
	 			$test_type_counts['Shigella_spp'] = $row->total;
	 		}else if((int)$row->organism_id == $test_type_ids['Neisseria_gonorrhoeae']){
	 			$test_type_counts['Neisseria_gonorrhoeae'] = $row->total;
	 		}else if((int)$row->organism_id == $test_type_ids['Staphylococcus_aureus']){
	 			$test_type_counts['Staphylococcus_aureus'] = $row->total;
	 		}else if((int)$row->organism_id == $test_type_ids['Streptococcus_pneumoniae']){
	 			$test_type_counts['Streptococcus_pneumoniae'] = $row->total;
	 		}else if((int)$row->organism_id == $test_type_ids['Acinetobacter_baumannii']){
	 			$test_type_counts['Acinetobacter_baumannii'] = $row->total;
	 		}else if((int)$row->organism_id == $test_type_ids['Vibrio_cholerae']){
	 			$test_type_counts['Vibrio_cholerae'] = $row->total;
	 		}else if((int)$row->organism_id == $test_type_ids['Enterococcus_spp']){
	 			$test_type_counts['Enterococcus_spp'] = $row->total;
	 		}else if((int)$row->organism_id == $test_type_ids['Haemophilus_influenzae']){
	 			$test_type_counts['Haemophilus_influenzae'] = $row->total;
	 		}else if((int)$row->organism_id == $test_type_ids['Neisseria_meningitides']){
	 			$test_type_counts['Neisseria_meningitides'] = $row->total;
	 		}else if((int)$row->organism_id == $test_type_ids['Campylobacter']){
	 			$test_type_counts['Campylobacter'] = $row->total;
	 		}else{
	 			$test_type_counts['others'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getHCTCounts($month){
		$test_type_ids = $this->getTestTypeIDs('hctcount');
		$rows = $this->getHIVTestCounts($test_type_ids['test_category_id'],$month);
		$test_type_counts['determine'] = 0;$test_type_counts['determine_h'] = 0;$test_type_counts['statpak'] = 0;$test_type_counts['statpak_h'] = 0;
		$test_type_counts['sdbioline'] = 0;
		$test_type_counts['sdbioline_h'] = 0;$test_type_counts['hiv_syphilis_duo'] = 0;$test_type_counts['hiv_syphilis_duo_h'] = 0;
		$test_type_counts['oraquick'] = 0;$test_type_counts['oraquick_h'] = 0;$test_type_counts['others'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if($row->system_name == $test_type_ids['determine']){
	 			$test_type_counts['determine'] = $row->total;
	 			$test_type_counts['determine_h'] = $row->hct;
	 		}else if($row->system_name == $test_type_ids['statpak']){
	 			$test_type_counts['statpak'] = $row->total;
	 			$test_type_counts['statpak_h'] = $row->hct;
	 		}else if($row->system_name == $test_type_ids['sdbioline']){
	 			$test_type_counts['sdbioline'] = $row->total;
	 			$test_type_counts['sdbioline_h'] = $row->hct;
	 		}else if($row->system_name == $test_type_ids['hiv_syphilis_duo']){
	 			$test_type_counts['hiv_syphilis_duo'] = $row->total;
	 			$test_type_counts['hiv_syphilis_duo_h'] = $row->hct;
	 		}else if($row->system_name == $test_type_ids['oraquick']){
	 			$test_type_counts['oraquick'] = $row->total;
	 			$test_type_counts['oraquick_h'] = $row->hct;
	 		}else{
	 			$test_type_counts['others'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function geteMTCTCounts($month){
		$test_type_ids = $this->getTestTypeIDs('eMTCTcount');
		$rows = $this->getHIVTestCounts($test_type_ids['test_category_id'],$month);
		$test_type_counts['determine'] = 0;
		$test_type_counts['determine_p'] = 0;
		$test_type_counts['statpak'] = 0;$test_type_counts['statpak_p'] = 0;$test_type_counts['sdbioline'] = 0;
		$test_type_counts['sdbioline_p'] = 0;$test_type_counts['hiv_syphilis_duo'] = 0;$test_type_counts['hiv_syphilis_duo_p'] = 0;$test_type_counts['oraquick'] = 0;$test_type_counts['oraquick_p'] = 0;$test_type_counts['others'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if($row->system_name == $test_type_ids['determine']){
	 			$test_type_counts['determine'] = $row->total;
	 			$test_type_counts['determine_p'] = $row->pmtct;
	 		}else if($row->system_name == $test_type_ids['statpak']){
	 			$test_type_counts['statpak'] = $row->total;
	 			$test_type_counts['statpak_p'] = $row->pmtct;
	 		}else if($row->system_name == $test_type_ids['sdbioline']){
	 			$test_type_counts['sdbioline'] = $row->total;
	 			$test_type_counts['sdbioline_p'] = $row->pmtct;
	 		}else if($row->system_name == $test_type_ids['hiv_syphilis_duo']){
	 			$test_type_counts['hiv_syphilis_duo'] = $row->total;
	 			$test_type_counts['hiv_syphilis_duo_p'] = $row->pmtct;
	 		}else if($row->system_name == $test_type_ids['oraquick']){
	 			$test_type_counts['oraquick'] = $row->total;
	 			$test_type_counts['oraquick_p'] = $row->pmtct;
	 		}else{
	 			$test_type_counts['others'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getclinicalDiagnosisCounts($month){
		$test_type_ids = $this->getTestTypeIDs('clinicalDiagnosiscount');
		$rows = $this->getHIVTestCounts($test_type_ids['test_category_id'],$month);
		$test_type_counts['determine'] = 0;$test_type_counts['determine_cd'] = 0;$test_type_counts['statpak'] = 0;$test_type_counts['statpak_cd'] = 0;$test_type_counts['sdbioline'] = 0;
		$test_type_counts['sdbioline_cd'] = 0;$test_type_counts['hiv_syphilis_duo'] = 0;$test_type_counts['hiv_syphilis_duo_cd'] = 0;$test_type_counts['oraquick'] = 0;$test_type_counts['oraquick_cd'] = 0;
		$test_type_counts['others'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if($row->system_name == $test_type_ids['determine']){
	 			$test_type_counts['determine'] = $row->total;
	 			$test_type_counts['determine_cd'] = $row->clinical_diagnosis;
	 		}else if($row->system_name == $test_type_ids['statpak']){
	 			$test_type_counts['statpak'] = $row->total;
	 			$test_type_counts['statpak_cd'] = $row->clinical_diagnosis;
	 		}else if($row->system_name == $test_type_ids['sdbioline']){
	 			$test_type_counts['sdbioline'] = $row->total;
	 			$test_type_counts['sdbioline_cd'] = $row->clinical_diagnosis;
	 		}else if($row->system_name == $test_type_ids['hiv_syphilis_duo']){
	 			$test_type_counts['hiv_syphilis_duo'] = $row->total;
	 			$test_type_counts['hiv_syphilis_duo_cd'] = $row->clinical_diagnosis;
	 		}else if($row->system_name == $test_type_ids['oraquick']){
	 			$test_type_counts['oraquick'] = $row->total;
	 			$test_type_counts['oraquick_cd'] = $row->clinical_diagnosis;
	 		}else{
	 			$test_type_counts['others'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getSMCCounts($month){
		$test_type_ids = $this->getTestTypeIDs('SMCcount');
		$rows = $this->getHIVTestCounts($test_type_ids['test_category_id'],$month);
		$test_type_counts['determine'] = 0;$test_type_counts['determine_s'] = 0;
		$test_type_counts['statpak'] = 0;
		$test_type_counts['statpak_s'] = 0;$test_type_counts['sdbioline'] = 0;$test_type_counts['sdbioline_s'] = 0;
		$test_type_counts['hiv_syphilis_duo'] = 0;
		$test_type_counts['hiv_syphilis_duo_s'] = 0;$test_type_counts['oraquick'] = 0;$test_type_counts['oraquick_s'] = 0;$test_type_counts['others'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if($row->system_name == $test_type_ids['determine']){
	 			$test_type_counts['determine'] = $row->total;
	 			$test_type_counts['determine_s'] = $row->smc;
	 		}else if($row->system_name == $test_type_ids['statpak']){
	 			$test_type_counts['statpak'] = $row->total;
	 			$test_type_counts['statpak_s'] = $row->smc;
	 		}else if($row->system_name == $test_type_ids['sdbioline']){
	 			$test_type_counts['sdbioline'] = $row->total; $test_type_counts['sdbioline_s'] = $row->smc;
	 		}else if($row->system_name == $test_type_ids['hiv_syphilis_duo']){
	 			$test_type_counts['hiv_syphilis_duo'] = $row->total;
	 			$test_type_counts['hiv_syphilis_duo_s'] = $row->smc;
	 		}else if($row->system_name == $test_type_ids['oraquick']){
	 			$test_type_counts['oraquick'] = $row->total;
	 			$test_type_counts['oraquick_s'] = $row->smc;
	 		}else{
	 			$test_type_counts['others'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getrepeatTestCounts($month){
		$test_type_ids = $this->getTestTypeIDs('repeatTestcount');
		$rows = $this->getHIVTestCounts($test_type_ids['test_category_id'],$month);
		$test_type_counts['determine'] = 0;$test_type_counts['determine_rt'] = 0;$test_type_counts['statpak'] = 0;$test_type_counts['statpak_rt'] = 0;$test_type_counts['sdbioline'] = 0;
		$test_type_counts['sdbioline_rt'] = 0;$test_type_counts['hiv_syphilis_duo'] = 0;$test_type_counts['hiv_syphilis_duo_rt'] = 0;$test_type_counts['oraquick'] = 0;$test_type_counts['oraquick_rt'] = 0;
		$test_type_counts['others'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if($row->system_name == $test_type_ids['determine']){
	 			$test_type_counts['determine'] = $row->total;
	 			$test_type_counts['determine_rt'] = $row->repeat_test;
	 		}else if($row->system_name == $test_type_ids['statpak']){
	 			$test_type_counts['statpak'] = $row->total;
	 			$test_type_counts['statpak_rt'] = $row->repeat_test;
	 		}else if($row->system_name == $test_type_ids['sdbioline']){
	 			$test_type_counts['sdbioline'] = $row->total;
	 			$test_type_counts['sdbioline_rt'] = $row->repeat_test;
	 		}else if($row->system_name == $test_type_ids['hiv_syphilis_duo']){
	 			$test_type_counts['hiv_syphilis_duo'] = $row->total;
	 			$test_type_counts['hiv_syphilis_duo_rt'] = $row->repeat_test;
	 		}else if($row->system_name == $test_type_ids['oraquick']){
	 			$test_type_counts['oraquick'] = $row->total;
	 			$test_type_counts['oraquick_rt'] = $row->repeat_test;
	 		}else{
	 			$test_type_counts['others'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getVerificationTestCounts($month){
		$test_type_ids = $this->getTestTypeIDs('VerificationTestcount');
		$rows = $this->getHIVTestCounts($test_type_ids['test_category_id'],$month);
		$test_type_counts['determine'] = 0;$test_type_counts['determine_tv'] = 0;$test_type_counts['statpak'] = 0;$test_type_counts['statpak_tv'] = 0;$test_type_counts['sdbioline'] = 0;
		$test_type_counts['sdbioline_tv'] = 0;$test_type_counts['hiv_syphilis_duo'] = 0;$test_type_counts['hiv_syphilis_duo_tv'] = 0;$test_type_counts['oraquick'] = 0;$test_type_counts['oraquick_tv'] = 0;$test_type_counts['others'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if($row->system_name == $test_type_ids['determine']){
	 			$test_type_counts['determine'] = $row->total;
	 			$test_type_counts['determine_tv'] = $row->test_for_verification;
	 		}else if($row->system_name == $test_type_ids['statpak']){
	 			$test_type_counts['statpak'] = $row->total;
	 			$test_type_counts['statpak_tv'] = $row->test_for_verification;
	 		}else if($row->system_name == $test_type_ids['sdbioline']){
	 			$test_type_counts['sdbioline'] = $row->total;
	 			$test_type_counts['sdbioline_tv'] = $row->test_for_verification;
	 		}else if($row->system_name == $test_type_ids['hiv_syphilis_duo']){
	 			$test_type_counts['hiv_syphilis_duo'] = $row->total;
	 			$test_type_counts['hiv_syphilis_duo_tv'] = $row->test_for_verification;
	 		}else if($row->system_name == $test_type_ids['oraquick']){
	 			$test_type_counts['oraquick'] = $row->total;
	 			$test_type_counts['oraquick_tv'] = $row->test_for_verification;
	 		}else{
	 			$test_type_counts['others'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getinconclusiveCounts($month){
		$test_type_ids = $this->getTestTypeIDs('inconclusivecount');
		$rows = $this->getHIVTestCounts($test_type_ids['test_category_id'],$month);
		$test_type_counts['determine'] = 0;$test_type_counts['determine_ir'] = 0;$test_type_counts['statpak'] = 0;$test_type_counts['statpak_ir'] = 0;$test_type_counts['sdbioline'] = 0;
		$test_type_counts['sdbioline_ir'] = 0;$test_type_counts['hiv_syphilis_duo'] = 0;$test_type_counts['hiv_syphilis_duo_ir'] = 0;$test_type_counts['oraquick'] = 0;$test_type_counts['oraquick_ir'] = 0;
		$test_type_counts['others'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if($row->system_name == $test_type_ids['determine']){
	 			$test_type_counts['determine'] = $row->total;
	 			$test_type_counts['determine_ir'] = $row->inconclusive_result;
	 		}else if($row->system_name == $test_type_ids['statpak']){
	 			$test_type_counts['statpak'] = $row->total;
	 			$test_type_counts['statpak_ir'] = $row->inconclusive_result;
	 		}else if($row->system_name == $test_type_ids['sdbioline']){
	 			$test_type_counts['sdbioline'] = $row->total;
	 			$test_type_counts['sdbioline_ir'] = $row->inconclusive_result;
	 		}else if($row->system_name == $test_type_ids['hiv_syphilis_duo']){
	 			$test_type_counts['hiv_syphilis_duo'] = $row->total;
	 			$test_type_counts['hiv_syphilis_duo_ir'] = $row->inconclusive_result;
	 		}else if($row->system_name == $test_type_ids['oraquick']){
	 			$test_type_counts['oraquick'] = $row->total;
	 			$test_type_counts['oraquick_ir'] = $row->inconclusive_result;
	 		}else{
	 			$test_type_counts['others'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getdnaConfirmedTestCounts($month){
		$test_type_ids = $this->getTestTypeIDs('dnaConfirmedTestcount');
		$rows = $this->getHIVTestCounts($test_type_ids['test_category_id'],$month);
		$test_type_counts['determine'] = 0;$test_type_counts['determine_dct'] = 0;$test_type_counts['statpak'] = 0;$test_type_counts['statpak_dct'] = 0;$test_type_counts['sdbioline'] = 0;
		$test_type_counts['sdbioline_dct'] = 0;$test_type_counts['hiv_syphilis_duo'] = 0;$test_type_counts['hiv_syphilis_duo_dct'] = 0;$test_type_counts['oraquick'] = 0;$test_type_counts['oraquick_dct'] = 0;$test_type_counts['others'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if($row->system_name == $test_type_ids['determine']){
	 			$test_type_counts['determine'] = $row->total;
	 			$test_type_counts['determine_dct'] = $row->dna_confirmed_test;
	 		}else if($row->system_name == $test_type_ids['statpak']){
	 			$test_type_counts['statpak'] = $row->total;
	 			$test_type_counts['statpak_dct'] = $row->dna_confirmed_test;
	 		}else if($row->system_name == $test_type_ids['sdbioline']){
	 			$test_type_counts['sdbioline'] = $row->total;
	 			$test_type_counts['sdbioline_dct'] = $row->dna_confirmed_test;
	 		}else if($row->system_name == $test_type_ids['hiv_syphilis_duo']){
	 			$test_type_counts['hiv_syphilis_duo'] = $row->total;
	 			$test_type_counts['hiv_syphilis_duo_dct'] = $row->dna_confirmed_test;
	 		}else if($row->system_name == $test_type_ids['oraquick']){
	 			$test_type_counts['oraquick'] = $row->total;
	 			$test_type_counts['oraquick_dct'] = $row->dna_confirmed_test;
	 		}else{
	 			$test_type_counts['others'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getIQCCounts($month){
		$test_type_ids = $this->getTestTypeIDs('IQCcount');
		$rows = $this->getHIVTestCounts($test_type_ids['test_category_id'],$month);
		$test_type_counts['determine'] = 0;$test_type_counts['determine_qc'] = 0;$test_type_counts['statpak'] = 0;$test_type_counts['statpak_qc'] = 0;$test_type_counts['sdbioline'] = 0;
		$test_type_counts['sdbioline_qc'] = 0;$test_type_counts['hiv_syphilis_duo'] = 0;$test_type_counts['hiv_syphilis_duo_qc'] = 0;$test_type_counts['oraquick'] = 0;$test_type_counts['oraquick_qc'] = 0;$test_type_counts['others'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if($row->system_name == $test_type_ids['determine']){
	 			$test_type_counts['determine'] = $row->total;
	 			$test_type_counts['determine_qc'] = $row->qc;
	 		}else if($row->system_name == $test_type_ids['statpak']){
	 			$test_type_counts['statpak'] = $row->total;
	 			$test_type_counts['statpak_qc'] = $row->qc;
	 		}else if($row->system_name == $test_type_ids['sdbioline']){
	 			$test_type_counts['sdbioline'] = $row->total;
	 			$test_type_counts['sdbioline_qc'] = $row->qc;
	 		}else if($row->system_name == $test_type_ids['hiv_syphilis_duo']){
	 			$test_type_counts['hiv_syphilis_duo'] = $row->total;
	 			$test_type_counts['hiv_syphilis_duo_qc'] = $row->qc;
	 		}else if($row->system_name == $test_type_ids['oraquick']){
	 			$test_type_counts['oraquick'] = $row->total;
	 			$test_type_counts['oraquick_qc'] = $row->qc;
	 		}else{
	 			$test_type_counts['others'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getEQACounts($month){
		$test_type_ids = $this->getTestTypeIDs('EQAcount');
		$rows = $this->getHIVTestCounts($test_type_ids['test_category_id'],$month);
		$test_type_counts['determine'] = 0;$test_type_counts['determine_eqa'] = 0;$test_type_counts['statpak'] = 0;$test_type_counts['statpak_eqa'] = 0;$test_type_counts['sdbioline'] = 0;
		$test_type_counts['sdbioline_eqa'] = 0;$test_type_counts['hiv_syphilis_duo'] = 0;$test_type_counts['hiv_syphilis_duo_eqa'] = 0;$test_type_counts['oraquick'] = 0;$test_type_counts['oraquick_eqa'] = 0;$test_type_counts['others'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if($row->system_name == $test_type_ids['determine']){
	 			$test_type_counts['determine'] = $row->total;
	 			$test_type_counts['determine_eqa'] = $row->eqa;
	 		}else if($row->system_name == $test_type_ids['statpak']){
	 			$test_type_counts['statpak'] = $row->total;
	 			$test_type_counts['statpak_eqa'] = $row->eqa;
	 		}else if($row->system_name == $test_type_ids['sdbioline']){
	 			$test_type_counts['sdbioline'] = $row->total;
	 			$test_type_counts['sdbioline_eqa'] = $row->eqa;
	 		}else if($row->system_name == $test_type_ids['hiv_syphilis_duo']){
	 			$test_type_counts['hiv_syphilis_duo'] = $row->total;
	 			$test_type_counts['hiv_syphilis_duo_eqa'] = $row->eqa;
	 		}else if($row->system_name == $test_type_ids['oraquick']){
	 			$test_type_counts['oraquick'] = $row->total;
	 			$test_type_counts['oraquick_eqa'] = $row->eqa;
	 		}else{
	 			$test_type_counts['others'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getHematologyCounts($month){
		$test_type_ids = $this->getTestTypeIDs('hematology');
		$rows = $this->getTestCountsByLabSection($test_type_ids['test_category_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['hb_non_automated'] = 0;
		$test_type_counts['cbc'] = 0;
		$test_type_counts['film_comment'] = 0;
		$test_type_counts['esr'] = 0;
		$test_type_counts['bleeding_time'] = 0;
		$test_type_counts['prothrombin_time'] = 0;
		$test_type_counts['clotting_time'] = 0;
		$test_type_counts['sickle_cell'] = 0;
		$test_type_counts['others'] = 0;
	 	foreach($rows as $row){
	 		//dd($row);
	 		if($row->system_name == $test_type_ids['hb_non_automated']){
	 			$test_type_counts['hb_non_automated'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['cbc']){
	 			$test_type_counts['cbc'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['film_comment']){
	 			$test_type_counts['film_comment'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['esr']){
	 			$test_type_counts['esr'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['bleeding_time']){
	 			$test_type_counts['bleeding_time'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['prothrombin_time']){
	 			$test_type_counts['prothrombin_time'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['clotting_time']){
	 			$test_type_counts['clotting_time'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['sickle_cell']){
	 			$test_type_counts['sickle_cell'] = $row->total;
	 		}else{
	 			$test_type_counts['others'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}
	private function getSerologyCounts($month){
		$test_type_ids = $this->getTestTypeIDs('serology');
		$rows = $this->getAlphanumericTestCountsByLabSection($test_type_ids['test_category_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['vdrl_rpr'] = 0;
		$test_type_counts['vdrl_rpr1'] = 0;
		$test_type_counts['tpha'] = 0;
		$test_type_counts['tpha1'] = 0;
		$test_type_counts['shigella_dysentery'] = 0;
		$test_type_counts['shigella_dysentery1'] = 0;
		$test_type_counts['hepatitisb_sags'] = 0;
		$test_type_counts['hepatitisb_sags1'] = 0;
		$test_type_counts['brucella'] = 0;
		$test_type_counts['brucella1'] = 0;
		$test_type_counts['pregnancy_test'] = 0;
		$test_type_counts['pregnancy_test1'] = 0;
		$test_type_counts['crag'] = 0;
		$test_type_counts['crag1'] = 0;
		$test_type_counts['rheumatoid_factor'] = 0;
		$test_type_counts['rheumatoid_factor1'] = 0;
		$test_type_counts['hepb_core_ag'] = 0;
		$test_type_counts['hepb_core_ag1'] = 0;
		$test_type_counts['hepa'] = 0;
		$test_type_counts['hepa1'] = 0;
		$test_type_counts['hepc'] = 0;
		$test_type_counts['hepc1'] = 0;
		$test_type_counts['other'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if($row->system_name == $test_type_ids['vdrl_rpr']){
	 			$test_type_counts['vdrl_rpr'] = $row->total;
	 			$test_type_counts['vdrl_rpr1'] = $row->Positive;
	 		}else if($row->system_name == $test_type_ids['tpha']){
	 			$test_type_counts['tpha'] = $row->total;
	 			$test_type_counts['tpha1'] = $row->Positive;
	 		}else if($row->system_name == $test_type_ids['hepatitisb_sags']){
	 			$test_type_counts['hepatitisb_sags'] = $row->total;
	 			$test_type_counts['hepatitisb_sags1'] = $row->Positive;
	 		}else if($row->system_name == $test_type_ids['brucella']){
	 			$test_type_counts['brucella'] = $row->total;
	 			$test_type_counts['brucella1'] = $row->Positive;
	 		}else if($row->system_name == $test_type_ids['pregnancy_test']){
	 			$test_type_counts['pregnancy_test'] = $row->total;
	 			$test_type_counts['pregnancy_test1'] = $row->Positive;
	 		}else if($row->system_name == $test_type_ids['crag']){
	 			$test_type_counts['crag'] = $row->total;
	 			$test_type_counts['crag1'] = $row->Positive;
	 		}else if($row->system_name == $test_type_ids['shigella_dysentery']){
	 			$test_type_counts['shigella_dysentery'] = $row->total;
	 			$test_type_counts['shigella_dysentery1'] = $row->Positive;
	 		}else if($row->system_name == $test_type_ids['rheumatoid_factor']){
	 			$test_type_counts['rheumatoid_factor'] = $row->total;
	 			$test_type_counts['rheumatoid_factor1'] = $row->Positive;
	 		}else if($row->system_name == $test_type_ids['hepb_core_ag']){
	 			$test_type_counts['hepb_core_ag'] = $row->total;
	 			$test_type_counts['hepb_core_ag1'] = $row->Positive;
	 		}else if($row->system_name == $test_type_ids['hepa']){
	 			$test_type_counts['hepa'] = $row->total;
	 			$test_type_counts['hepa1'] = $row->Positive;
	 		}else if($row->system_name == $test_type_ids['hepc']){
	 			$test_type_counts['hepc'] = $row->total;
	 			$test_type_counts['hepc1'] = $row->Positive;
	 		}else{
	 			$test_type_counts['other'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getMicrobiologyCounts($month){
		$test_type_ids = $this->getTestTypeIDs('microbiology');
		$rows = $this->getTestCountsByLabSection($test_type_ids['test_category_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['auramine_fm'] = 0;
		$test_type_counts['auramine_fm1'] = 0;
		$test_type_counts['zn_for_afb'] = 0;
		$test_type_counts['zn_for_afb1'] = 0;
		$test_type_counts['leishman_stain'] = 0;
		$test_type_counts['leishman_stain1'] = 0;
		$test_type_counts['gram'] = 0;
		$test_type_counts['gram1'] = 0;
		$test_type_counts['india_ink'] = 0;
		$test_type_counts['india_ink1'] = 0;
		$test_type_counts['urine_microscopy'] = 0;
		$test_type_counts['urine_microscopy1'] = 0;
		$test_type_counts['wet_prep'] = 0;
		$test_type_counts['wet_prep1'] = 0;
		$test_type_counts['others'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if($row->system_name == $test_type_ids['auramine_fm']){
	 			$test_type_counts['auramine_fm'] = $row->total;
	 			// $test_type_counts['auramine_fm1'] = $row->Positive;
	 		}else if($row->system_name == $test_type_ids['zn_for_afb']){
	 			$test_type_counts['zn_for_afb'] = $row->total;
	 			$test_type_counts['zn_for_afb1'] = $row->Positive;
	 		}else if($row->system_name == $test_type_ids['gram']){
	 			$test_type_counts['gram'] = $row->total;
	 			$test_type_counts['gram1'] = $row->Positive;
	 		}else if($row->system_name == $test_type_ids['india_ink']){
	 			$test_type_counts['india_ink'] = $row->total;
	 			$test_type_counts['india_ink1'] = $row->Positive;
	 		}else if($row->system_name == $test_type_ids['urine_microscopy']){
	 			$test_type_counts['urine_microscopy'] = $row->total;
	 			$test_type_counts['urine_microscopy1'] = $row->Positive;
	 		}else if($row->system_name == $test_type_ids['wet_prep']){
	 			$test_type_counts['wet_prep'] = $row->total;
	 			// $test_type_counts['wet_prep1'] = $row->Positive;
	 		}else if($row->system_name == $test_type_ids['leishman_stain']){
	 			$test_type_counts['leishman_stain'] = $row->total;
	 			$test_type_counts['leishman_stain1'] = $row->Positive;
	 		}else{
	 			$test_type_counts['others'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getParasitologyCounts($month){
		$test_type_ids = $this->getTestTypeIDs('parasitology');
		$rows = $this->getAlphanumericTestCountsByLabSection($test_type_ids['test_category_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['malaria_microscopy'] = 0;
		$test_type_counts['malaria_microscopy1'] = 0;
		$test_type_counts['malaria_rdts'] = 0;
		$test_type_counts['malaria_rdts1'] = 0;
		$test_type_counts['trypasonoma'] = 0;
		$test_type_counts['micro_filaria'] = 0;
		$test_type_counts['leishmania'] = 0;
		$test_type_counts['trichinella'] = 0;
		$test_type_counts['borrellia'] = 0;
		$test_type_counts['other'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if($row->system_name == $test_type_ids['malaria_microscopy']){
	 			$test_type_counts['malaria_microscopy'] = $row->total;
	 			$test_type_counts['malaria_microscopy1'] = $row->Positive;
	 		}else if($row->system_name == $test_type_ids['malaria_rdts']){
	 			$test_type_counts['malaria_rdts'] = $row->total;
	 			$test_type_counts['malaria_rdts1'] = $row->Positive;
	 		}else if($row->system_name == $test_type_ids['micro_filaria']){
	 			$test_type_counts['micro_filaria'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['leishmania']){
	 			$test_type_counts['leishmania'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['trichinella']){
	 			$test_type_counts['trichinella'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['borrellia']){
	 			$test_type_counts['borrellia'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['trypasonoma']){
	 			$test_type_counts['trypasonoma'] = $row->total;
	 		}else{
	 			$test_type_counts['other'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getStoolmicroscopyCounts($month){
		$test_type_ids = $this->getTestTypeIDs('stoolmicroscopy');
		$rows = $this->getTestCountsByLabSection($test_type_ids['test_category_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['entamoeba'] = 0;
		$test_type_counts['giardia'] = 0;
		$test_type_counts['cryptosporidium'] = 0;
		$test_type_counts['isospora'] = 0;
		$test_type_counts['cyclospora'] = 0;
		$test_type_counts['strongyloides'] = 0;
		$test_type_counts['shistosoma'] = 0;
		$test_type_counts['taenia'] = 0;
		$test_type_counts['askaris'] = 0;
		$test_type_counts['hookworm'] = 0;
		$test_type_counts['trichuris'] = 0;
		$test_type_counts['other_parasites'] = 0;
	 	foreach($rows as $row){
	 		//dd($row);
	 		if($row->system_name == $test_type_ids['entamoeba']){
	 			$test_type_counts['entamoeba'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['giardia']){
	 			$test_type_counts['giardia'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['cryptosporidium']){
	 			$test_type_counts['cryptosporidium'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['isospora']){
	 			$test_type_counts['isospora'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['cyclospora']){
	 			$test_type_counts['cyclospora'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['strongyloides']){
	 			$test_type_counts['strongyloides'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['shistosoma']){
	 			$test_type_counts['shistosoma'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['taenia']){
	 			$test_type_counts['taenia'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['askaris']){
	 			$test_type_counts['askaris'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['hookworm']){
	 			$test_type_counts['hookworm'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['trichuris']){
	 			$test_type_counts['trichuris'] = $row->total;
	 		}else{
	 			$test_type_counts['other_parasites'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getChemistryCounts($month){
		$test_type_ids = $this->getTestTypeIDs('chemistry');
		$rows = $this->getTestCountsByLabSection($test_type_ids['test_category_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['urea'] = 0;
		$test_type_counts['calcium'] = 0;
		$test_type_counts['potassium'] = 0;
		$test_type_counts['sodium'] = 0;
		$test_type_counts['creatinine'] = 0;
		$test_type_counts['alt'] = 0;
		$test_type_counts['ast'] = 0;
		$test_type_counts['albumin'] = 0;
		$test_type_counts['total_protein'] = 0;
		$test_type_counts['triglycerides'] = 0;
		$test_type_counts['cholesterol'] = 0;
		$test_type_counts['free_t3'] = 0;
		$test_type_counts['free_t4'] = 0;
		$test_type_counts['tsh'] = 0;
		$test_type_counts['alkaline_phosphate'] = 0;
		$test_type_counts['amylase'] = 0;
		$test_type_counts['glucose'] = 0;
		$test_type_counts['total_bilirubin'] = 0;
		$test_type_counts['lipase'] = 0;
		$test_type_counts['afp'] = 0;
		$test_type_counts['others'] = 0;
	 	foreach($rows as $row){
	 		//dd($row);
	 		if($row->system_name == $test_type_ids['urea']){
	 			$test_type_counts['urea'] =$row->total;
	 		}else if($row->system_name == $test_type_ids['calcium']){
	 			$test_type_counts['calcium'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['potassium']){
	 			$test_type_counts['potassium'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['sodium']){
	 			$test_type_counts['sodium'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['creatinine']){
	 			$test_type_counts['creatinine'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['alt']){
	 			$test_type_counts['alt'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['ast']){
	 			$test_type_counts['ast'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['albumin']){
	 			$test_type_counts['albumin'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['total_protein']){
	 			$test_type_counts['total_protein'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['triglycerides']){
	 			$test_type_counts['triglycerides'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['cholesterol']){
	 			$test_type_counts['cholesterol'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['free_t3']){
	 			$test_type_counts['free_t3'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['free_t4']){
	 			$test_type_counts['free_t4'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['tsh']){
	 			$test_type_counts['tsh'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['alkaline_phosphate']){
	 			$test_type_counts['alkaline_phosphate'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['amylase']){
	 			$test_type_counts['amylase'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['glucose']){
	 			$test_type_counts['glucose'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['total_bilirubin']){
	 			$test_type_counts['total_bilirubin'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['lipase']){
	 			$test_type_counts['lipase'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['afp']){
	 			$test_type_counts['afp'] = $row->total;
	 		}else{
	 			$test_type_counts['others'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getBloodTransfusionCounts($month){
		$test_type_ids = $this->getTestTypeIDs('blood_transfusion');
		$rows = $this->getTestCountsByLabSection($test_type_ids['test_category_id'],$month);
		$test_type_counts = $this->getTestTypeInitialCounts('blood_transfusion');
	 	foreach($rows as $row){
	 		//dd($row);
	 		if($row->system_name == $test_type_ids['ahb_combs_test']){
	 			$test_type_counts['ahb_combs_test'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['abo_grouping']){
	 			$test_type_counts['abo_grouping'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['cross_matching']){
	 			$test_type_counts['cross_matching'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}
	private function getCultureAndSensitivityCounts($month){
		$test_type_ids = $this->getTestTypeIDs('culture_and_sensitivity_specimen');
		$test_type_counts = $this->getTestTypeInitialCounts('culture_and_sensitivity_specimen');
		$query = "SELECT specimen_id, test_status_id FROM unhls_tests WHERE specimen_id = ".$test_type_ids['test_type_id']." AND time_created LIKE '%".$month."%'";
		//set variables for the target tests -from
		//also get array of test_type ids to use in condition
	 	$rows = DB::select($query);
	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->specimen_id = $test_type_ids['blood']){
	 			$test_type_counts['blood'] = $test_type_counts['blood'] + 1;
	 		}else if((int)$row->specimen_id = $test_type_ids['urine']){
	 			$test_type_counts['urine'] = $test_type_counts['urine'] + 1;
	 		}else if((int)$row->specimen_id = $test_type_ids['stool']){
	 			$test_type_counts['stool'] = $test_type_counts['stool'] + 1;
	 		}else if((int)$row->specimen_id = $test_type_ids['sputum']){
	 			$test_type_counts['sputum'] = $test_type_counts['sputum'] + 1;
	 		}else if((int)$row->specimen_id = $test_type_ids['nosal_swab']){
	 			$test_type_counts['nosal_swab'] = $test_type_counts['nosal_swab'] + 1;
	 		}else if((int)$row->specimen_id = $test_type_ids['rectal_swab']){
	 			$test_type_counts['rectal_swab'] = $test_type_counts['rectal_swab'] + 1;
	 		}else if((int)$row->specimen_id = $test_type_ids['wound_swab']){
	 			$test_type_counts['wound_swab'] = $test_type_counts['wound_swab'] + 1;
	 		}else if((int)$row->specimen_id = $test_type_ids['pus_swab']){
	 			$test_type_counts['pus_swab'] = $test_type_counts['pus_swab'] + 1;
	 		}else if((int)$row->specimen_id = $test_type_ids['eye_swab']){
	 			$test_type_counts['eye_swab'] = $test_type_counts['eye_swab'] + 1;
	 		}else if((int)$row->specimen_id = $test_type_ids['ear_swab']){
	 			$test_type_counts['ear_swab'] = $test_type_counts['ear_swab'] + 1;
	 		}else if((int)$row->specimen_id = $test_type_ids['throat_swab']){
	 			$test_type_counts['throat_swab'] = $test_type_counts['throat_swab'] + 1;
	 		}else if((int)$row->specimen_id = $test_type_ids['uretheral_swab']){
	 			$test_type_counts['uretheral_swab'] = $test_type_counts['uretheral_swab'] + 1;
	 		}

	 	}
	 	return $test_type_counts;
	}
	private function getImmunologyCounts($month){
		$test_type_ids = $this->getTestTypeIDs('immunology');
		$rows = $this->getTestCountsByLabSection($test_type_ids['test_category_id'],$month);
	 	$test_type_counts['cd4'] = 0;
		$test_type_counts['hiv_viral_load'] = 0;
		$test_type_counts['hepb'] = 0;
	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->test_type_id == $test_type_ids['cd4']){
	 			$test_type_counts['cd4'] = $row->total;
	 		}else if((int)$row->test_type_id == $test_type_ids['hiv_viral_load']){
	 			$test_type_counts['hiv_viral_load'] = $row->total;
	 		}else if((int)$row->test_type_id == $test_type_ids['hepb']){
	 			$test_type_counts['hepb'] = $row->total;
	 		}
	 	}
	 	return $test_type_counts;
	}
	private function getMolecularCounts($month){
		$test_type_ids = $this->getTestTypeIDs('molecular');
		$test_type_counts = $this->getTestTypeInitialCounts('molecular');
		$rows = $this->getTestCountsByLabSection($test_type_ids['test_category_id'],$month);
	 	foreach($rows as $row){
	 		if($row->system_name == $test_type_ids['tb_genexpert']){
	 			$test_type_counts['tb_genexpert'] = $row->total;
	 			$test_type_counts['tb_genexpert1'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['latent_tb']){
	 			$test_type_counts['latent_tb'] = $row->total;
	 			$test_type_counts['latent_tb1'] = $row->total;
	 		}else if($row->system_name == $test_type_ids['tb_lam']){
	 			$test_type_counts['tb_lam'] = $row->total;
	 			$test_type_counts['tb_lam1'] = $row->total;
	 		}
	 	}
	 	return $test_type_counts;
	}

	private function getReferredTestCounts($month){
		$test_type_ids = $this->getTestTypeIDs('referralTests');
		$rows = $this->getReferralTestCountsByLabSection($test_type_ids['status'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['eid'] = 0;
		$test_type_counts['eid1'] = 0;
		$test_type_counts['eid2'] = 0;
		$test_type_counts['hiv_viral_load'] = 0;
		$test_type_counts['hiv_viral_load1'] = 0;
		$test_type_counts['hiv_viral_load2'] = 0;
		$test_type_counts['cd4'] = 0;
		$test_type_counts['cd41'] = 0;
		$test_type_counts['cd42'] = 0;
		$test_type_counts['sickle_cell_confirmation'] = 0;
		$test_type_counts['sickle_cell_confirmation1'] = 0;
		$test_type_counts['sickle_cell_confirmation2'] = 0;
		$test_type_counts['histology'] = 0;
		$test_type_counts['histology1'] = 0;
		$test_type_counts['histology2'] = 0;
		$test_type_counts['polio'] = 0;
		$test_type_counts['polio1'] = 0;
		$test_type_counts['polio2'] = 0;
		$test_type_counts['sars'] = 0;
		$test_type_counts['sars1'] = 0;
		$test_type_counts['sars2'] = 0;
		$test_type_counts['tb_genexpert'] = 0;
		$test_type_counts['tb_genexpert1'] = 0;
		$test_type_counts['tb_genexpert2'] = 0;
		$test_type_counts['mdr_tb'] = 0;
		$test_type_counts['mdr_tb1'] = 0;
		$test_type_counts['mdr_tb2'] = 0;
		$test_type_counts['Other_reasons'] = 0;
	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->test_type_id == $test_type_ids['eid']){
	 			$test_type_counts['eid'] = $row->total;
	 			$test_type_counts['eid1'] = $row->AverageTAT;
	 			$test_type_counts['eid2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['hiv_viral_load']){
	 			$test_type_counts['hiv_viral_load'] = $row->total;
	 			$test_type_counts['hiv_viral_load1'] = $row->AverageTAT;
	 			$test_type_counts['hiv_viral_load2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['cd4']){
	 			$test_type_counts['cd4'] = $row->total;
	 			$test_type_counts['cd41'] = $row->AverageTAT;
	 			$test_type_counts['cd42'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['sickle_cell_confirmation']){
	 			$test_type_counts['sickle_cell_confirmation'] = $row->total;
	 			$test_type_counts['sickle_cell_confirmation1'] = $row->AverageTAT;
	 			$test_type_counts['sickle_cell_confirmation2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['histology']){
	 			$test_type_counts['histology'] = $row->total;
	 			$test_type_counts['histology1'] = $row->AverageTAT;
	 			$test_type_counts['histology2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['polio']){
	 			$test_type_counts['polio'] = $row->total;
	 			$test_type_counts['polio1'] = $row->AverageTAT;
	 			$test_type_counts['polio2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['sars']){
	 			$test_type_counts['sars'] = $row->total;
	 			$test_type_counts['sars1'] = $row->AverageTAT;
	 			$test_type_counts['sars2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['tb_genexpert']){
	 			$test_type_counts['tb_genexpert'] = $row->total;
	 			$test_type_counts['tb_genexpert1'] = $row->AverageTAT;
	 			$test_type_counts['tb_genexpert2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['mdr_tb']){
	 			$test_type_counts['mdr_tb'] = $row->total;
	 			$test_type_counts['mdr_tb1'] = $row->AverageTAT;
	 			$test_type_counts['mdr_tb2'] = $row->Pending;
	 		}else{
	 			$test_type_counts['Other_reasons'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getReferredMicrobiologyCounts($month){
		$test_type_ids = $this->getTestTypeIDs('referred_microbiology');
		$rows = $this->getReferralTestCountsByLabSection($test_type_ids['status'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['typhoid_fever'] = 0;
		$test_type_counts['typhoid_fever1'] = 0;
		$test_type_counts['typhoid_fever2'] = 0;
		$test_type_counts['cholera'] = 0;
		$test_type_counts['cholera1'] = 0;
		$test_type_counts['cholera2'] = 0;
		$test_type_counts['dysentry'] = 0;
		$test_type_counts['dysentry1'] = 0;
		$test_type_counts['dysentry2'] = 0;
		$test_type_counts['rota_virus'] = 0;
		$test_type_counts['rota_virus1'] = 0;
		$test_type_counts['rota_virus2'] = 0;
		$test_type_counts['meningitis'] = 0;
		$test_type_counts['meningitis1'] = 0;
		$test_type_counts['meningitis2'] = 0;
		$test_type_counts['neonatal_tetanus'] = 0;
		$test_type_counts['neonatal_tetanus1'] = 0;
		$test_type_counts['neonatal_tetanus2'] = 0;
		$test_type_counts['plague'] = 0;
		$test_type_counts['plague1'] = 0;
		$test_type_counts['plague2'] = 0;
		$test_type_counts['isolates'] = 0;
		$test_type_counts['isolates1'] = 0;
		$test_type_counts['isolates2'] = 0;
		$test_type_counts['Other_reasons'] = 0;
	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->test_type_id == $test_type_ids['typhoid_fever']){
	 			$test_type_counts['typhoid_fever'] = $row->total;
	 			$test_type_counts['typhoid_fever1'] = $row->AverageTAT;
	 			$test_type_counts['typhoid_fever2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['cholera']){
	 			$test_type_counts['cholera'] = $row->total;
	 			$test_type_counts['cholera1'] = $row->AverageTAT;
	 			$test_type_counts['cholera2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['dysentry']){
	 			$test_type_counts['dysentry'] = $row->total;
	 			$test_type_counts['dysentry1'] = $row->AverageTAT;
	 			$test_type_counts['dysentry2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['rota_virus']){
	 			$test_type_counts['rota_virus'] = $row->total;
	 			$test_type_counts['rota_virus1'] = $row->AverageTAT;
	 			$test_type_counts['rota_virus2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['meningitis']){
	 			$test_type_counts['meningitis'] = $row->total;
	 			$test_type_counts['meningitis1'] = $row->AverageTAT;
	 			$test_type_counts['meningitis2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['neonatal_tetanus']){
	 			$test_type_counts['neonatal_tetanus'] = $row->total;
	 			$test_type_counts['neonatal_tetanus1'] = $row->AverageTAT;
	 			$test_type_counts['neonatal_tetanus2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['plague']){
	 			$test_type_counts['plague'] = $row->total;
	 			$test_type_counts['plague1'] = $row->AverageTAT;
	 			$test_type_counts['plague2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['isolates']){
	 			$test_type_counts['isolates'] = $row->total;
	 			$test_type_counts['isolates1'] = $row->AverageTAT;
	 			$test_type_counts['isolates2'] = $row->Pending;
	 		}else{
	 			$test_type_counts['Other_reasons'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getReferredVirologyCounts($month){
		$test_type_ids = $this->getTestTypeIDs('referred_virology');
		$rows = $this->getReferralTestCountsByLabSection($test_type_ids['status'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['measles'] = 0;
		$test_type_counts['measles1'] = 0;
		$test_type_counts['measles2'] = 0;
		$test_type_counts['vhf'] = 0;
		$test_type_counts['vhf1'] = 0;
		$test_type_counts['vhf2'] = 0;
		$test_type_counts['animal_bites'] = 0;
		$test_type_counts['animal_bites1'] = 0;
		$test_type_counts['animal_bites2'] = 0;
		$test_type_counts['suspected_outbreak_sample'] = 0;
		$test_type_counts['suspected_outbreak_sample1'] = 0;
		$test_type_counts['suspected_outbreak_sample2'] = 0;
		$test_type_counts['hepbAg'] = 0;
		$test_type_counts['hepbAg1'] = 0;
		$test_type_counts['hepbAg2'] = 0;
		$test_type_counts['hepb_vl'] = 0;
		$test_type_counts['hepb_vl1'] = 0;
		$test_type_counts['hepb_vl2'] = 0;
		$test_type_counts['hepc_vl'] = 0;
		$test_type_counts['hepc_vl1'] = 0;
		$test_type_counts['hepc_vl2'] = 0;
		$test_type_counts['Other_reasons'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->test_type_id == $test_type_ids['measles']){
	 			$test_type_counts['measles'] = $row->total;
	 			$test_type_counts['measles1'] = $row->AverageTAT;
	 			$test_type_counts['measles2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['vhf']){
	 			$test_type_counts['vhf'] = $row->total;
	 			$test_type_counts['vhf1'] = $row->AverageTAT;
	 			$test_type_counts['vhf2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['animal_bites']){
	 			$test_type_counts['animal_bites'] = $row->total;
	 			$test_type_counts['animal_bites1'] = $row->AverageTAT;
	 			$test_type_counts['animal_bites2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['suspected_outbreak_sample']){
	 			$test_type_counts['suspected_outbreak_sample'] = $row->total;
	 			$test_type_counts['suspected_outbreak_sample1'] = $row->AverageTAT;
	 			$test_type_counts['suspected_outbreak_sample2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['hepbAg']){
	 			$test_type_counts['hepbAg'] = $row->total;
	 			$test_type_counts['hepbAg1'] = $row->AverageTAT;
	 			$test_type_counts['hepbAg2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['hepb_vl']){
	 			$test_type_counts['hepb_vl'] = $row->total;
	 			$test_type_counts['hepb_vl1'] = $row->AverageTAT;
	 			$test_type_counts['hepb_vl2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['hepc_vl']){
	 			$test_type_counts['hepc_vl'] = $row->total;
	 			$test_type_counts['hepc_vl1'] = $row->AverageTAT;
	 			$test_type_counts['hepc_vl2'] = $row->Pending;
	 		}else{
	 			$test_type_counts['Other_reasons'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getReferredParasitologyCounts($month){
		$test_type_ids = $this->getTestTypeIDs('referred_parasitology');
		$rows = $this->getReferralTestCountsByLabSection($test_type_ids['status'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['hemo_parasites'] = 0;
		$test_type_counts['hemo_parasites1'] = 0;
		$test_type_counts['hemo_parasites2'] = 0;
		$test_type_counts['intestinal_parasites'] = 0;
		$test_type_counts['intestinal_parasites1'] = 0;
		$test_type_counts['intestinal_parasites2'] = 0;
		$test_type_counts['tissue_parasites'] = 0;
		$test_type_counts['tissue_parasites1'] = 0;
		$test_type_counts['tissue_parasites2'] = 0;
		$test_type_counts['Other_reasons'] = 0;
	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->test_type_id == $test_type_ids['hemo_parasites']){
	 			$test_type_counts['hemo_parasites'] = $row->total;
	 			$test_type_counts['hemo_parasites1'] = $row->AverageTAT;
	 			$test_type_counts['hemo_parasites2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['intestinal_parasites']){
	 			$test_type_counts['intestinal_parasites'] = $row->total;
	 			$test_type_counts['intestinal_parasites1'] = $row->AverageTAT;
	 			$test_type_counts['intestinal_parasites2'] = $row->Pending;
	 		}else if((int)$row->test_type_id == $test_type_ids['tissue_parasites']){
	 			$test_type_counts['tissue_parasites'] = $row->total;
	 			$test_type_counts['tissue_parasites1'] = $row->AverageTAT;
	 			$test_type_counts['tissue_parasites2'] = $row->Pending;
	 		}else{
	 			$test_type_counts['Other_reasons'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getEquipmentBreakdownCounts($month){
		$test_type_ids = $this->getTestTypeIDs('equipmentBreakdown');
		$rows = $this->getReferralTestCountsByReasons($test_type_ids['referral_reason'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['CD4'] = 0;
		$test_type_counts['TB'] = 0;
		$test_type_counts['CBC'] = 0;
		$test_type_counts['Chemistry'] = 0;
		$test_type_counts['Microbiology'] = 0;
		$test_type_counts['hiv'] = 0;
		$test_type_counts['VDRL'] = 0;
		$test_type_counts['Haematology'] = 0;
		$test_type_counts['Parasitolog'] = 0;
		$test_type_counts['other'] = 0;
	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->test_category_id == $test_type_ids['CD4']){
	 			$test_type_counts['CD4'] = $row->cd4_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['TB']){
	 			$test_type_counts['TB'] = $row->tb_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['CBC']){
	 			$test_type_counts['CBC'] = $row->cbc_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Chemistry']){
	 			$test_type_counts['Chemistry'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Microbiology']){
	 			$test_type_counts['Microbiology'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['hiv']){
	 			$test_type_counts['hiv'] = $row->hiv_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['VDRL']){
	 			$test_type_counts['VDRL'] = $row->vdrl_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Haematology']){
	 			$test_type_counts['Haematology'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Parasitolog']){
	 			$test_type_counts['Parasitolog'] = $row->total;
	 		}else{
	 			$test_type_counts['other'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getReagentStockoutCounts($month){
		$test_type_ids = $this->getTestTypeIDs('reagent_stockout');
		$rows = $this->getReferralTestCountsByReasons($test_type_ids['referral_reason'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['CD4'] = 0;
		$test_type_counts['TB'] = 0;
		$test_type_counts['CBC'] = 0;
		$test_type_counts['Chemistry'] = 0;
		$test_type_counts['Microbiology'] = 0;
		$test_type_counts['hiv'] = 0;
		$test_type_counts['VDRL'] = 0;
		$test_type_counts['Haematology'] = 0;
		$test_type_counts['Parasitolog'] = 0;
		$test_type_counts['other'] = 0;
	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->test_category_id == $test_type_ids['CD4']){
	 			$test_type_counts['CD4'] = $row->cd4_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['TB']){
	 			$test_type_counts['TB'] = $row->tb_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['CBC']){
	 			$test_type_counts['CBC'] = $row->cbc_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Chemistry']){
	 			$test_type_counts['Chemistry'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Microbiology']){
	 			$test_type_counts['Microbiology'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['hiv']){
	 			$test_type_counts['hiv'] = $row->hiv_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['VDRL']){
	 			$test_type_counts['VDRL'] = $row->vdrl_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Haematology']){
	 			$test_type_counts['Haematology'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Parasitolog']){
	 			$test_type_counts['Parasitolog'] = $row->total;
	 		}else{
	 			$test_type_counts['other'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getSuppliesStockoutCounts($month){
		$test_type_ids = $this->getTestTypeIDs('supplies_stockout');
		$rows = $this->getReferralTestCountsByReasons($test_type_ids['referral_reason'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['CD4'] = 0;
		$test_type_counts['TB'] = 0;
		$test_type_counts['CBC'] = 0;
		$test_type_counts['Chemistry'] = 0;
		$test_type_counts['Microbiology'] = 0;
		$test_type_counts['hiv'] = 0;
		$test_type_counts['VDRL'] = 0;
		$test_type_counts['Haematology'] = 0;
		$test_type_counts['Parasitolog'] = 0;
		$test_type_counts['other'] = 0;
	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->test_category_id == $test_type_ids['CD4']){
	 			$test_type_counts['CD4'] = $row->cd4_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['TB']){
	 			$test_type_counts['TB'] = $row->tb_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['CBC']){
	 			$test_type_counts['CBC'] = $row->cbc_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Chemistry']){
	 			$test_type_counts['Chemistry'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Microbiology']){
	 			$test_type_counts['Microbiology'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['hiv']){
	 			$test_type_counts['hiv'] = $row->hiv_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['VDRL']){
	 			$test_type_counts['VDRL'] = $row->vdrl_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Haematology']){
	 			$test_type_counts['Haematology'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Parasitolog']){
	 			$test_type_counts['Parasitolog'] = $row->total;
	 		}else{
	 			$test_type_counts['other'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getPowerOutageCounts($month){
		$test_type_ids = $this->getTestTypeIDs('power_outage');
		$rows = $this->getReferralTestCountsByReasons($test_type_ids['referral_reason'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['CD4'] = 0;
		$test_type_counts['TB'] = 0;
		$test_type_counts['CBC'] = 0;
		$test_type_counts['Chemistry'] = 0;
		$test_type_counts['Microbiology'] = 0;
		$test_type_counts['hiv'] = 0;
		$test_type_counts['VDRL'] = 0;
		$test_type_counts['Haematology'] = 0;
		$test_type_counts['Parasitolog'] = 0;
		$test_type_counts['other'] = 0;
	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->test_category_id == $test_type_ids['CD4']){
	 			$test_type_counts['CD4'] = $row->cd4_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['TB']){
	 			$test_type_counts['TB'] = $row->tb_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['CBC']){
	 			$test_type_counts['CBC'] = $row->cbc_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Chemistry']){
	 			$test_type_counts['Chemistry'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Microbiology']){
	 			$test_type_counts['Microbiology'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['hiv']){
	 			$test_type_counts['hiv'] = $row->hiv_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['VDRL']){
	 			$test_type_counts['VDRL'] = $row->vdrl_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Haematology']){
	 			$test_type_counts['Haematology'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Parasitolog']){
	 			$test_type_counts['Parasitolog'] = $row->total;
	 		}else{
	 			$test_type_counts['other'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getTestingExpertiseCounts($month){
		$test_type_ids = $this->getTestTypeIDs('no_testing_expertise');
		$rows = $this->getReferralTestCountsByReasons($test_type_ids['referral_reason'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['CD4'] = 0;
		$test_type_counts['TB'] = 0;
		$test_type_counts['CBC'] = 0;
		$test_type_counts['Chemistry'] = 0;
		$test_type_counts['Microbiology'] = 0;
		$test_type_counts['hiv'] = 0;
		$test_type_counts['VDRL'] = 0;
		$test_type_counts['Haematology'] = 0;
		$test_type_counts['Parasitolog'] = 0;
		$test_type_counts['other'] = 0;
	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->test_category_id == $test_type_ids['CD4']){
	 			$test_type_counts['CD4'] = $row->cd4_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['TB']){
	 			$test_type_counts['TB'] = $row->tb_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['CBC']){
	 			$test_type_counts['CBC'] = $row->cbc_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Chemistry']){
	 			$test_type_counts['Chemistry'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Microbiology']){
	 			$test_type_counts['Microbiology'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['hiv']){
	 			$test_type_counts['hiv'] = $row->hiv_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['VDRL']){
	 			$test_type_counts['VDRL'] = $row->vdrl_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Haematology']){
	 			$test_type_counts['Haematology'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Parasitolog']){
	 			$test_type_counts['Parasitolog'] = $row->total;
	 		}else{
	 			$test_type_counts['other'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getRequiredEquipmentCounts($month){
		$test_type_ids = $this->getTestTypeIDs('required_equipment');
		$rows = $this->getReferralTestCountsByReasons($test_type_ids['referral_reason'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['CD4'] = 0;
		$test_type_counts['TB'] = 0;
		$test_type_counts['CBC'] = 0;
		$test_type_counts['Chemistry'] = 0;
		$test_type_counts['Microbiology'] = 0;
		$test_type_counts['hiv'] = 0;
		$test_type_counts['VDRL'] = 0;
		$test_type_counts['Haematology'] = 0;
		$test_type_counts['Parasitolog'] = 0;
		$test_type_counts['other'] = 0;
	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->test_category_id == $test_type_ids['CD4']){
	 			$test_type_counts['CD4'] = $row->cd4_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['TB']){
	 			$test_type_counts['TB'] = $row->tb_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['CBC']){
	 			$test_type_counts['CBC'] = $row->cbc_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Chemistry']){
	 			$test_type_counts['Chemistry'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Microbiology']){
	 			$test_type_counts['Microbiology'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['hiv']){
	 			$test_type_counts['hiv'] = $row->hiv_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['VDRL']){
	 			$test_type_counts['VDRL'] = $row->vdrl_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Haematology']){
	 			$test_type_counts['Haematology'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Parasitolog']){
	 			$test_type_counts['Parasitolog'] = $row->total;
	 		}else{
	 			$test_type_counts['other'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getConfirmatoryTestingCounts($month){
		$test_type_ids = $this->getTestTypeIDs('confirmatory_testing');
		$rows = $this->getReferralTestCountsByReasons($test_type_ids['referral_reason'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['CD4'] = 0;
		$test_type_counts['TB'] = 0;
		$test_type_counts['CBC'] = 0;
		$test_type_counts['Chemistry'] = 0;
		$test_type_counts['Microbiology'] = 0;
		$test_type_counts['hiv'] = 0;
		$test_type_counts['VDRL'] = 0;
		$test_type_counts['Haematology'] = 0;
		$test_type_counts['Parasitolog'] = 0;
		$test_type_counts['other'] = 0;
	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->test_category_id == $test_type_ids['CD4']){
	 			$test_type_counts['CD4'] = $row->cd4_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['TB']){
	 			$test_type_counts['TB'] = $row->tb_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['CBC']){
	 			$test_type_counts['CBC'] = $row->cbc_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Chemistry']){
	 			$test_type_counts['Chemistry'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Microbiology']){
	 			$test_type_counts['Microbiology'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['hiv']){
	 			$test_type_counts['hiv'] = $row->hiv_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['VDRL']){
	 			$test_type_counts['VDRL'] = $row->vdrl_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Haematology']){
	 			$test_type_counts['Haematology'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Parasitolog']){
	 			$test_type_counts['Parasitolog'] = $row->total;
	 		}else{
	 			$test_type_counts['other'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getQaRetestingCounts($month){
		$test_type_ids = $this->getTestTypeIDs('qa_retesting');
		$rows = $this->getReferralTestCountsByReasons($test_type_ids['referral_reason'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['CD4'] = 0;
		$test_type_counts['TB'] = 0;
		$test_type_counts['CBC'] = 0;
		$test_type_counts['Chemistry'] = 0;
		$test_type_counts['Microbiology'] = 0;
		$test_type_counts['hiv'] = 0;
		$test_type_counts['VDRL'] = 0;
		$test_type_counts['Haematology'] = 0;
		$test_type_counts['Parasitolog'] = 0;
		$test_type_counts['other'] = 0;
	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->test_category_id == $test_type_ids['CD4']){
	 			$test_type_counts['CD4'] = $row->cd4_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['TB']){
	 			$test_type_counts['TB'] = $row->tb_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['CBC']){
	 			$test_type_counts['CBC'] = $row->cbc_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Chemistry']){
	 			$test_type_counts['Chemistry'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Microbiology']){
	 			$test_type_counts['Microbiology'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['hiv']){
	 			$test_type_counts['hiv'] = $row->hiv_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['VDRL']){
	 			$test_type_counts['VDRL'] = $row->vdrl_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Haematology']){
	 			$test_type_counts['Haematology'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Parasitolog']){
	 			$test_type_counts['Parasitolog'] = $row->total;
	 		}else{
	 			$test_type_counts['other'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getOtherReferralReasonsCounts($month){
		$test_type_ids = $this->getTestTypeIDs('other_referral_reasons');
		$rows = $this->getReferralTestCountsByReasons($test_type_ids['referral_reason'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['CD4'] = 0;
		$test_type_counts['TB'] = 0;
		$test_type_counts['CBC'] = 0;
		$test_type_counts['Chemistry'] = 0;
		$test_type_counts['Microbiology'] = 0;
		$test_type_counts['hiv'] = 0;
		$test_type_counts['VDRL'] = 0;
		$test_type_counts['Haematology'] = 0;
		$test_type_counts['Parasitolog'] = 0;
		$test_type_counts['other'] = 0;
	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->test_category_id == $test_type_ids['CD4']){
	 			$test_type_counts['CD4'] = $row->cd4_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['TB']){
	 			$test_type_counts['TB'] = $row->tb_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['CBC']){
	 			$test_type_counts['CBC'] = $row->cbc_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Chemistry']){
	 			$test_type_counts['Chemistry'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Microbiology']){
	 			$test_type_counts['Microbiology'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['hiv']){
	 			$test_type_counts['hiv'] = $row->hiv_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['VDRL']){
	 			$test_type_counts['VDRL'] = $row->vdrl_total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Haematology']){
	 			$test_type_counts['Haematology'] = $row->total;
	 		}
	 		 if((int)$row->test_category_id == $test_type_ids['Parasitolog']){
	 			$test_type_counts['Parasitolog'] = $row->total;
	 		}else{
	 			$test_type_counts['other'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getKlebsiellaOrganismCounts($month){
		$test_type_ids = $this->getTestTypeIDs('klebsiella_organism');
		$rows = $this->getAMRservillence($test_type_ids['organism_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['ampicilin'] = 0;
		$test_type_counts['ampicilin2'] = 0;
		$test_type_counts['ampicilin3'] = 0;
		$test_type_counts['azithromycin'] = 0;
		$test_type_counts['azithromycin2'] = 0;
		$test_type_counts['azithromycin3'] = 0;
		$test_type_counts['amikacin'] = 0;
		$test_type_counts['amikacin2'] = 0;
		$test_type_counts['amikacin3'] = 0;
		$test_type_counts['ceftriaxone'] = 0;
		$test_type_counts['ceftriaxone2'] = 0;
		$test_type_counts['ceftriaxone3'] = 0;
		$test_type_counts['ceftazidime'] = 0;
		$test_type_counts['ceftazidime2'] = 0;
		$test_type_counts['ceftazidime3'] = 0;
		$test_type_counts['cefotaxime'] = 0;
		$test_type_counts['cefotaxime2'] = 0;
		$test_type_counts['cefotaxime3'] = 0;
		$test_type_counts['cefoxitin'] = 0;
		$test_type_counts['cefoxitin2'] = 0;
		$test_type_counts['cefoxitin3'] = 0;
		$test_type_counts['cefixime'] = 0;
		$test_type_counts['cefixime2'] = 0;
		$test_type_counts['cefixime3'] = 0;
		$test_type_counts['cotrimoxazole'] = 0;
		$test_type_counts['cotrimoxazole2'] = 0;
		$test_type_counts['cotrimoxazole3'] = 0;
		$test_type_counts['ciprofloxacin'] = 0;
		$test_type_counts['ciprofloxacin2'] = 0;
		$test_type_counts['ciprofloxacin3'] = 0;
		$test_type_counts['colistin'] = 0;
		$test_type_counts['colistin2'] = 0;
		$test_type_counts['colistin3'] = 0;
		$test_type_counts['gentamicin'] = 0;
		$test_type_counts['gentamicin2'] = 0;
		$test_type_counts['gentamicin3'] = 0;
		$test_type_counts['imipenem'] = 0;
		$test_type_counts['imipenem2'] = 0;
		$test_type_counts['imipenem3'] = 0;
		$test_type_counts['levofloxacin'] = 0;
		$test_type_counts['levofloxacin2'] = 0;
		$test_type_counts['levofloxacin3'] = 0;
		$test_type_counts['meropenem'] = 0;
		$test_type_counts['meropenem2'] = 0;
		$test_type_counts['meropenem3'] = 0;
		$test_type_counts['oxacillin'] = 0;
		$test_type_counts['oxacillin2'] = 0;
		$test_type_counts['oxacillin3'] = 0;
		$test_type_counts['penicillin_g'] = 0;
		$test_type_counts['penicillin_g2'] = 0;
		$test_type_counts['penicillin_g3'] = 0;
		$test_type_counts['vancomycin'] = 0;
		$test_type_counts['vancomycin2'] = 0;
		$test_type_counts['vancomycin3'] = 0;
		$test_type_counts['augmentin'] = 0;
		$test_type_counts['augmentin2'] = 0;
		$test_type_counts['augmentin3'] = 0;
		$test_type_counts['chloramphenicol'] = 0;
		$test_type_counts['chloramphenicol2'] = 0;
		$test_type_counts['chloramphenicol3'] = 0;
		$test_type_counts['clindamycin'] = 0;
		$test_type_counts['clindamycin2'] = 0;
		$test_type_counts['clindamycin3'] = 0;
		$test_type_counts['erythromycin'] = 0;
		$test_type_counts['erythromycin2'] = 0;
		$test_type_counts['erythromycin3'] = 0;
		$test_type_counts['nalidixic_acid'] = 0;
		$test_type_counts['nalidixic_acid2'] = 0;
		$test_type_counts['nalidixic_acid3'] = 0;
		$test_type_counts['nitrofurantoin'] = 0;
		$test_type_counts['nitrofurantoin2'] = 0;
		$test_type_counts['nitrofurantoin3'] = 0;
		$test_type_counts['piperacillin'] = 0;
		$test_type_counts['piperacillin2'] = 0;
		$test_type_counts['piperacillin3'] = 0;
		$test_type_counts['piperacillin_tazobactam'] = 0;
		$test_type_counts['piperacillin_tazobactam2'] = 0;
		$test_type_counts['piperacillin_tazobactam3'] = 0;
		$test_type_counts['tetracycline'] = 0;
		$test_type_counts['tetracycline2'] = 0;
		$test_type_counts['tetracycline3'] = 0;
		$test_type_counts['isolate_number'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->drug_id == $test_type_ids['ampicilin']){
	 			$test_type_counts['ampicilin'] = $row->Sesitive;
	 			$test_type_counts['ampicilin2'] = $row->Intermediate;
	 			$test_type_counts['ampicilin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['azithromycin']){
	 			$test_type_counts['azithromycin'] = $row->Sesitive;
	 			$test_type_counts['azithromycin2'] = $row->Intermediate;
	 			$test_type_counts['azithromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['amikacin']){
	 			$test_type_counts['amikacin'] = $row->Sesitive;
	 			$test_type_counts['amikacin2'] = $row->Intermediate;
	 			$test_type_counts['amikacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftriaxone']){
	 			$test_type_counts['ceftriaxone'] = $row->Sesitive;
	 			$test_type_counts['ceftriaxone2'] = $row->Intermediate;
	 			$test_type_counts['ceftriaxone3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftazidime']){
	 			$test_type_counts['ceftazidime'] = $row->Sesitive;
	 			$test_type_counts['ceftazidime2'] = $row->Intermediate;
	 			$test_type_counts['ceftazidime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefotaxime']){
	 			$test_type_counts['cefotaxime'] = $row->Sesitive;
	 			$test_type_counts['cefotaxime2'] = $row->Intermediate;
	 			$test_type_counts['cefotaxime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cotrimoxazole']){
	 			$test_type_counts['cotrimoxazole'] = $row->Sesitive;
	 			$test_type_counts['cotrimoxazole2'] = $row->Intermediate;
	 			$test_type_counts['cotrimoxazole3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ciprofloxacin']){
	 			$test_type_counts['ciprofloxacin'] = $row->Sesitive;
	 			$test_type_counts['ciprofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['ciprofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['colistin']){
	 			$test_type_counts['colistin'] = $row->Sesitive;
	 			$test_type_counts['colistin2'] = $row->Intermediate;
	 			$test_type_counts['colistin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefixime']){
	 			$test_type_counts['cefixime'] = $row->Sesitive;
	 			$test_type_counts['cefixime2'] = $row->Intermediate;
	 			$test_type_counts['cefixime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefoxitin']){
	 			$test_type_counts['cefoxitin'] = $row->Sesitive;
	 			$test_type_counts['cefoxitin2'] = $row->Intermediate;
	 			$test_type_counts['cefoxitin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['gentamicin']){
	 			$test_type_counts['gentamicin'] = $row->Sesitive;
	 			$test_type_counts['gentamicin2'] = $row->Intermediate;
	 			$test_type_counts['gentamicin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['imipenem']){
	 			$test_type_counts['imipenem'] = $row->Sesitive;
	 			$test_type_counts['imipenem2'] = $row->Intermediate;
	 			$test_type_counts['imipenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['levofloxacin']){
	 			$test_type_counts['levofloxacin'] = $row->Sesitive;
	 			$test_type_counts['levofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['levofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['meropenem']){
	 			$test_type_counts['meropenem'] = $row->Sesitive;
	 			$test_type_counts['meropenem2'] = $row->Intermediate;
	 			$test_type_counts['meropenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['oxacillin']){
	 			$test_type_counts['oxacillin'] = $row->Sesitive;
	 			$test_type_counts['oxacillin2'] = $row->Intermediate;
	 			$test_type_counts['oxacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['penicillin_g']){
	 			$test_type_counts['penicillin_g'] = $row->Sesitive;
	 			$test_type_counts['penicillin_g2'] = $row->Intermediate;
	 			$test_type_counts['penicillin_g3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['vancomycin']){
	 			$test_type_counts['vancomycin'] = $row->Sesitive;
	 			$test_type_counts['vancomycin2'] = $row->Intermediate;
	 			$test_type_counts['vancomycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['augmentin']){
	 			$test_type_counts['augmentin'] = $row->Sesitive;
	 			$test_type_counts['augmentin2'] = $row->Intermediate;
	 			$test_type_counts['augmentin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['chloramphenicol']){
	 			$test_type_counts['chloramphenicol'] = $row->Sesitive;
	 			$test_type_counts['chloramphenicol2'] = $row->Intermediate;
	 			$test_type_counts['chloramphenicol3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['clindamycin']){
	 			$test_type_counts['clindamycin'] = $row->Sesitive;
	 			$test_type_counts['clindamycin2'] = $row->Intermediate;
	 			$test_type_counts['clindamycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['erythromycin']){
	 			$test_type_counts['erythromycin'] = $row->Sesitive;
	 			$test_type_counts['erythromycin2'] = $row->Intermediate;
	 			$test_type_counts['erythromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nalidixic_acid']){
	 			$test_type_counts['nalidixic_acid'] = $row->Sesitive;
	 			$test_type_counts['nalidixic_acid2'] = $row->Intermediate;
	 			$test_type_counts['nalidixic_acid3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nitrofurantoin']){
	 			$test_type_counts['nitrofurantoin'] = $row->Sesitive;
	 			$test_type_counts['nitrofurantoin2'] = $row->Intermediate;
	 			$test_type_counts['nitrofurantoin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin']){
	 			$test_type_counts['piperacillin'] = $row->Sesitive;
	 			$test_type_counts['piperacillin2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin_tazobactam']){
	 			$test_type_counts['piperacillin_tazobactam'] = $row->Sesitive;
	 			$test_type_counts['piperacillin_tazobactam2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin_tazobactam3'] = $row->Resistant;
	 		}else{
	 			$test_type_counts['tetracycline'] = $row->Sesitive;
	 			$test_type_counts['tetracycline2'] = $row->Intermediate;
	 			$test_type_counts['tetracycline3'] = $row->Resistant;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getEscherichiaOrganismCounts($month){
		$test_type_ids = $this->getTestTypeIDs('escherichia_organism');
		$rows = $this->getAMRservillence($test_type_ids['organism_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['ampicilin'] = 0;
		$test_type_counts['ampicilin2'] = 0;
		$test_type_counts['ampicilin3'] = 0;
		$test_type_counts['azithromycin'] = 0;
		$test_type_counts['azithromycin2'] = 0;
		$test_type_counts['azithromycin3'] = 0;
		$test_type_counts['amikacin'] = 0;
		$test_type_counts['amikacin2'] = 0;
		$test_type_counts['amikacin3'] = 0;
		$test_type_counts['ceftriaxone'] = 0;
		$test_type_counts['ceftriaxone2'] = 0;
		$test_type_counts['ceftriaxone3'] = 0;
		$test_type_counts['ceftazidime'] = 0;
		$test_type_counts['ceftazidime2'] = 0;
		$test_type_counts['ceftazidime3'] = 0;
		$test_type_counts['cefotaxime'] = 0;
		$test_type_counts['cefotaxime2'] = 0;
		$test_type_counts['cefotaxime3'] = 0;
		$test_type_counts['cefoxitin'] = 0;
		$test_type_counts['cefoxitin2'] = 0;
		$test_type_counts['cefoxitin3'] = 0;
		$test_type_counts['cefixime'] = 0;
		$test_type_counts['cefixime2'] = 0;
		$test_type_counts['cefixime3'] = 0;
		$test_type_counts['cotrimoxazole'] = 0;
		$test_type_counts['cotrimoxazole2'] = 0;
		$test_type_counts['cotrimoxazole3'] = 0;
		$test_type_counts['ciprofloxacin'] = 0;
		$test_type_counts['ciprofloxacin2'] = 0;
		$test_type_counts['ciprofloxacin3'] = 0;
		$test_type_counts['colistin'] = 0;
		$test_type_counts['colistin2'] = 0;
		$test_type_counts['colistin3'] = 0;
		$test_type_counts['gentamicin'] = 0;
		$test_type_counts['gentamicin2'] = 0;
		$test_type_counts['gentamicin3'] = 0;
		$test_type_counts['imipenem'] = 0;
		$test_type_counts['imipenem2'] = 0;
		$test_type_counts['imipenem3'] = 0;
		$test_type_counts['levofloxacin'] = 0;
		$test_type_counts['levofloxacin2'] = 0;
		$test_type_counts['levofloxacin3'] = 0;
		$test_type_counts['meropenem'] = 0;
		$test_type_counts['meropenem2'] = 0;
		$test_type_counts['meropenem3'] = 0;
		$test_type_counts['oxacillin'] = 0;
		$test_type_counts['oxacillin2'] = 0;
		$test_type_counts['oxacillin3'] = 0;
		$test_type_counts['penicillin_g'] = 0;
		$test_type_counts['penicillin_g2'] = 0;
		$test_type_counts['penicillin_g3'] = 0;
		$test_type_counts['vancomycin'] = 0;
		$test_type_counts['vancomycin2'] = 0;
		$test_type_counts['vancomycin3'] = 0;
		$test_type_counts['augmentin'] = 0;
		$test_type_counts['augmentin2'] = 0;
		$test_type_counts['augmentin3'] = 0;
		$test_type_counts['chloramphenicol'] = 0;
		$test_type_counts['chloramphenicol2'] = 0;
		$test_type_counts['chloramphenicol3'] = 0;
		$test_type_counts['clindamycin'] = 0;
		$test_type_counts['clindamycin2'] = 0;
		$test_type_counts['clindamycin3'] = 0;
		$test_type_counts['erythromycin'] = 0;
		$test_type_counts['erythromycin2'] = 0;
		$test_type_counts['erythromycin3'] = 0;
		$test_type_counts['nalidixic_acid'] = 0;
		$test_type_counts['nalidixic_acid2'] = 0;
		$test_type_counts['nalidixic_acid3'] = 0;
		$test_type_counts['nitrofurantoin'] = 0;
		$test_type_counts['nitrofurantoin2'] = 0;
		$test_type_counts['nitrofurantoin3'] = 0;
		$test_type_counts['piperacillin'] = 0;
		$test_type_counts['piperacillin2'] = 0;
		$test_type_counts['piperacillin3'] = 0;
		$test_type_counts['piperacillin_tazobactam'] = 0;
		$test_type_counts['piperacillin_tazobactam2'] = 0;
		$test_type_counts['piperacillin_tazobactam3'] = 0;
		$test_type_counts['tetracycline'] = 0;
		$test_type_counts['tetracycline2'] = 0;
		$test_type_counts['tetracycline3'] = 0;
		$test_type_counts['isolate_number'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->drug_id == $test_type_ids['ampicilin']){
	 			$test_type_counts['ampicilin'] = $row->Sesitive;
	 			$test_type_counts['ampicilin2'] = $row->Intermediate;
	 			$test_type_counts['ampicilin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['azithromycin']){
	 			$test_type_counts['azithromycin'] = $row->Sesitive;
	 			$test_type_counts['azithromycin2'] = $row->Intermediate;
	 			$test_type_counts['azithromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['amikacin']){
	 			$test_type_counts['amikacin'] = $row->Sesitive;
	 			$test_type_counts['amikacin2'] = $row->Intermediate;
	 			$test_type_counts['amikacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftriaxone']){
	 			$test_type_counts['ceftriaxone'] = $row->Sesitive;
	 			$test_type_counts['ceftriaxone2'] = $row->Intermediate;
	 			$test_type_counts['ceftriaxone3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftazidime']){
	 			$test_type_counts['ceftazidime'] = $row->Sesitive;
	 			$test_type_counts['ceftazidime2'] = $row->Intermediate;
	 			$test_type_counts['ceftazidime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefotaxime']){
	 			$test_type_counts['cefotaxime'] = $row->Sesitive;
	 			$test_type_counts['cefotaxime2'] = $row->Intermediate;
	 			$test_type_counts['cefotaxime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cotrimoxazole']){
	 			$test_type_counts['cotrimoxazole'] = $row->Sesitive;
	 			$test_type_counts['cotrimoxazole2'] = $row->Intermediate;
	 			$test_type_counts['cotrimoxazole3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ciprofloxacin']){
	 			$test_type_counts['ciprofloxacin'] = $row->Sesitive;
	 			$test_type_counts['ciprofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['ciprofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['colistin']){
	 			$test_type_counts['colistin'] = $row->Sesitive;
	 			$test_type_counts['colistin2'] = $row->Intermediate;
	 			$test_type_counts['colistin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefixime']){
	 			$test_type_counts['cefixime'] = $row->Sesitive;
	 			$test_type_counts['cefixime2'] = $row->Intermediate;
	 			$test_type_counts['cefixime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefoxitin']){
	 			$test_type_counts['cefoxitin'] = $row->Sesitive;
	 			$test_type_counts['cefoxitin2'] = $row->Intermediate;
	 			$test_type_counts['cefoxitin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['gentamicin']){
	 			$test_type_counts['gentamicin'] = $row->Sesitive;
	 			$test_type_counts['gentamicin2'] = $row->Intermediate;
	 			$test_type_counts['gentamicin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['imipenem']){
	 			$test_type_counts['imipenem'] = $row->Sesitive;
	 			$test_type_counts['imipenem2'] = $row->Intermediate;
	 			$test_type_counts['imipenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['levofloxacin']){
	 			$test_type_counts['levofloxacin'] = $row->Sesitive;
	 			$test_type_counts['levofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['levofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['meropenem']){
	 			$test_type_counts['meropenem'] = $row->Sesitive;
	 			$test_type_counts['meropenem2'] = $row->Intermediate;
	 			$test_type_counts['meropenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['oxacillin']){
	 			$test_type_counts['oxacillin'] = $row->Sesitive;
	 			$test_type_counts['oxacillin2'] = $row->Intermediate;
	 			$test_type_counts['oxacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['penicillin_g']){
	 			$test_type_counts['penicillin_g'] = $row->Sesitive;
	 			$test_type_counts['penicillin_g2'] = $row->Intermediate;
	 			$test_type_counts['penicillin_g3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['vancomycin']){
	 			$test_type_counts['vancomycin'] = $row->Sesitive;
	 			$test_type_counts['vancomycin2'] = $row->Intermediate;
	 			$test_type_counts['vancomycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['augmentin']){
	 			$test_type_counts['augmentin'] = $row->Sesitive;
	 			$test_type_counts['augmentin2'] = $row->Intermediate;
	 			$test_type_counts['augmentin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['chloramphenicol']){
	 			$test_type_counts['chloramphenicol'] = $row->Sesitive;
	 			$test_type_counts['chloramphenicol2'] = $row->Intermediate;
	 			$test_type_counts['chloramphenicol3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['clindamycin']){
	 			$test_type_counts['clindamycin'] = $row->Sesitive;
	 			$test_type_counts['clindamycin2'] = $row->Intermediate;
	 			$test_type_counts['clindamycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['erythromycin']){
	 			$test_type_counts['erythromycin'] = $row->Sesitive;
	 			$test_type_counts['erythromycin2'] = $row->Intermediate;
	 			$test_type_counts['erythromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nalidixic_acid']){
	 			$test_type_counts['nalidixic_acid'] = $row->Sesitive;
	 			$test_type_counts['nalidixic_acid2'] = $row->Intermediate;
	 			$test_type_counts['nalidixic_acid3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nitrofurantoin']){
	 			$test_type_counts['nitrofurantoin'] = $row->Sesitive;
	 			$test_type_counts['nitrofurantoin2'] = $row->Intermediate;
	 			$test_type_counts['nitrofurantoin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin']){
	 			$test_type_counts['piperacillin'] = $row->Sesitive;
	 			$test_type_counts['piperacillin2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin_tazobactam']){
	 			$test_type_counts['piperacillin_tazobactam'] = $row->Sesitive;
	 			$test_type_counts['piperacillin_tazobactam2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin_tazobactam3'] = $row->Resistant;
	 		}else{
	 			$test_type_counts['tetracycline'] = $row->Sesitive;
	 			$test_type_counts['tetracycline2'] = $row->Intermediate;
	 			$test_type_counts['tetracycline3'] = $row->Resistant;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getsalmonellaOrganismCounts($month){
		$test_type_ids = $this->getTestTypeIDs('salmonella_organism');
		$rows = $this->getAMRservillence($test_type_ids['organism_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['ampicilin'] = 0;
		$test_type_counts['ampicilin2'] = 0;
		$test_type_counts['ampicilin3'] = 0;
		$test_type_counts['azithromycin'] = 0;
		$test_type_counts['azithromycin2'] = 0;
		$test_type_counts['azithromycin3'] = 0;
		$test_type_counts['amikacin'] = 0;
		$test_type_counts['amikacin2'] = 0;
		$test_type_counts['amikacin3'] = 0;
		$test_type_counts['ceftriaxone'] = 0;
		$test_type_counts['ceftriaxone2'] = 0;
		$test_type_counts['ceftriaxone3'] = 0;
		$test_type_counts['ceftazidime'] = 0;
		$test_type_counts['ceftazidime2'] = 0;
		$test_type_counts['ceftazidime3'] = 0;
		$test_type_counts['cefotaxime'] = 0;
		$test_type_counts['cefotaxime2'] = 0;
		$test_type_counts['cefotaxime3'] = 0;
		$test_type_counts['cefoxitin'] = 0;
		$test_type_counts['cefoxitin2'] = 0;
		$test_type_counts['cefoxitin3'] = 0;
		$test_type_counts['cefixime'] = 0;
		$test_type_counts['cefixime2'] = 0;
		$test_type_counts['cefixime3'] = 0;
		$test_type_counts['cotrimoxazole'] = 0;
		$test_type_counts['cotrimoxazole2'] = 0;
		$test_type_counts['cotrimoxazole3'] = 0;
		$test_type_counts['ciprofloxacin'] = 0;
		$test_type_counts['ciprofloxacin2'] = 0;
		$test_type_counts['ciprofloxacin3'] = 0;
		$test_type_counts['colistin'] = 0;
		$test_type_counts['colistin2'] = 0;
		$test_type_counts['colistin3'] = 0;
		$test_type_counts['gentamicin'] = 0;
		$test_type_counts['gentamicin2'] = 0;
		$test_type_counts['gentamicin3'] = 0;
		$test_type_counts['imipenem'] = 0;
		$test_type_counts['imipenem2'] = 0;
		$test_type_counts['imipenem3'] = 0;
		$test_type_counts['levofloxacin'] = 0;
		$test_type_counts['levofloxacin2'] = 0;
		$test_type_counts['levofloxacin3'] = 0;
		$test_type_counts['meropenem'] = 0;
		$test_type_counts['meropenem2'] = 0;
		$test_type_counts['meropenem3'] = 0;
		$test_type_counts['oxacillin'] = 0;
		$test_type_counts['oxacillin2'] = 0;
		$test_type_counts['oxacillin3'] = 0;
		$test_type_counts['penicillin_g'] = 0;
		$test_type_counts['penicillin_g2'] = 0;
		$test_type_counts['penicillin_g3'] = 0;
		$test_type_counts['vancomycin'] = 0;
		$test_type_counts['vancomycin2'] = 0;
		$test_type_counts['vancomycin3'] = 0;
		$test_type_counts['augmentin'] = 0;
		$test_type_counts['augmentin2'] = 0;
		$test_type_counts['augmentin3'] = 0;
		$test_type_counts['chloramphenicol'] = 0;
		$test_type_counts['chloramphenicol2'] = 0;
		$test_type_counts['chloramphenicol3'] = 0;
		$test_type_counts['clindamycin'] = 0;
		$test_type_counts['clindamycin2'] = 0;
		$test_type_counts['clindamycin3'] = 0;
		$test_type_counts['erythromycin'] = 0;
		$test_type_counts['erythromycin2'] = 0;
		$test_type_counts['erythromycin3'] = 0;
		$test_type_counts['nalidixic_acid'] = 0;
		$test_type_counts['nalidixic_acid2'] = 0;
		$test_type_counts['nalidixic_acid3'] = 0;
		$test_type_counts['nitrofurantoin'] = 0;
		$test_type_counts['nitrofurantoin2'] = 0;
		$test_type_counts['nitrofurantoin3'] = 0;
		$test_type_counts['piperacillin'] = 0;
		$test_type_counts['piperacillin2'] = 0;
		$test_type_counts['piperacillin3'] = 0;
		$test_type_counts['piperacillin_tazobactam'] = 0;
		$test_type_counts['piperacillin_tazobactam2'] = 0;
		$test_type_counts['piperacillin_tazobactam3'] = 0;
		$test_type_counts['tetracycline'] = 0;
		$test_type_counts['tetracycline2'] = 0;
		$test_type_counts['tetracycline3'] = 0;
		$test_type_counts['isolate_number'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->drug_id == $test_type_ids['ampicilin']){
	 			$test_type_counts['ampicilin'] = $row->Sesitive;
	 			$test_type_counts['ampicilin2'] = $row->Intermediate;
	 			$test_type_counts['ampicilin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['azithromycin']){
	 			$test_type_counts['azithromycin'] = $row->Sesitive;
	 			$test_type_counts['azithromycin2'] = $row->Intermediate;
	 			$test_type_counts['azithromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['amikacin']){
	 			$test_type_counts['amikacin'] = $row->Sesitive;
	 			$test_type_counts['amikacin2'] = $row->Intermediate;
	 			$test_type_counts['amikacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftriaxone']){
	 			$test_type_counts['ceftriaxone'] = $row->Sesitive;
	 			$test_type_counts['ceftriaxone2'] = $row->Intermediate;
	 			$test_type_counts['ceftriaxone3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftazidime']){
	 			$test_type_counts['ceftazidime'] = $row->Sesitive;
	 			$test_type_counts['ceftazidime2'] = $row->Intermediate;
	 			$test_type_counts['ceftazidime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefotaxime']){
	 			$test_type_counts['cefotaxime'] = $row->Sesitive;
	 			$test_type_counts['cefotaxime2'] = $row->Intermediate;
	 			$test_type_counts['cefotaxime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cotrimoxazole']){
	 			$test_type_counts['cotrimoxazole'] = $row->Sesitive;
	 			$test_type_counts['cotrimoxazole2'] = $row->Intermediate;
	 			$test_type_counts['cotrimoxazole3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ciprofloxacin']){
	 			$test_type_counts['ciprofloxacin'] = $row->Sesitive;
	 			$test_type_counts['ciprofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['ciprofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['colistin']){
	 			$test_type_counts['colistin'] = $row->Sesitive;
	 			$test_type_counts['colistin2'] = $row->Intermediate;
	 			$test_type_counts['colistin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefixime']){
	 			$test_type_counts['cefixime'] = $row->Sesitive;
	 			$test_type_counts['cefixime2'] = $row->Intermediate;
	 			$test_type_counts['cefixime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefoxitin']){
	 			$test_type_counts['cefoxitin'] = $row->Sesitive;
	 			$test_type_counts['cefoxitin2'] = $row->Intermediate;
	 			$test_type_counts['cefoxitin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['gentamicin']){
	 			$test_type_counts['gentamicin'] = $row->Sesitive;
	 			$test_type_counts['gentamicin2'] = $row->Intermediate;
	 			$test_type_counts['gentamicin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['imipenem']){
	 			$test_type_counts['imipenem'] = $row->Sesitive;
	 			$test_type_counts['imipenem2'] = $row->Intermediate;
	 			$test_type_counts['imipenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['levofloxacin']){
	 			$test_type_counts['levofloxacin'] = $row->Sesitive;
	 			$test_type_counts['levofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['levofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['meropenem']){
	 			$test_type_counts['meropenem'] = $row->Sesitive;
	 			$test_type_counts['meropenem2'] = $row->Intermediate;
	 			$test_type_counts['meropenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['oxacillin']){
	 			$test_type_counts['oxacillin'] = $row->Sesitive;
	 			$test_type_counts['oxacillin2'] = $row->Intermediate;
	 			$test_type_counts['oxacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['penicillin_g']){
	 			$test_type_counts['penicillin_g'] = $row->Sesitive;
	 			$test_type_counts['penicillin_g2'] = $row->Intermediate;
	 			$test_type_counts['penicillin_g3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['vancomycin']){
	 			$test_type_counts['vancomycin'] = $row->Sesitive;
	 			$test_type_counts['vancomycin2'] = $row->Intermediate;
	 			$test_type_counts['vancomycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['augmentin']){
	 			$test_type_counts['augmentin'] = $row->Sesitive;
	 			$test_type_counts['augmentin2'] = $row->Intermediate;
	 			$test_type_counts['augmentin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['chloramphenicol']){
	 			$test_type_counts['chloramphenicol'] = $row->Sesitive;
	 			$test_type_counts['chloramphenicol2'] = $row->Intermediate;
	 			$test_type_counts['chloramphenicol3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['clindamycin']){
	 			$test_type_counts['clindamycin'] = $row->Sesitive;
	 			$test_type_counts['clindamycin2'] = $row->Intermediate;
	 			$test_type_counts['clindamycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['erythromycin']){
	 			$test_type_counts['erythromycin'] = $row->Sesitive;
	 			$test_type_counts['erythromycin2'] = $row->Intermediate;
	 			$test_type_counts['erythromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nalidixic_acid']){
	 			$test_type_counts['nalidixic_acid'] = $row->Sesitive;
	 			$test_type_counts['nalidixic_acid2'] = $row->Intermediate;
	 			$test_type_counts['nalidixic_acid3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nitrofurantoin']){
	 			$test_type_counts['nitrofurantoin'] = $row->Sesitive;
	 			$test_type_counts['nitrofurantoin2'] = $row->Intermediate;
	 			$test_type_counts['nitrofurantoin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin']){
	 			$test_type_counts['piperacillin'] = $row->Sesitive;
	 			$test_type_counts['piperacillin2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin_tazobactam']){
	 			$test_type_counts['piperacillin_tazobactam'] = $row->Sesitive;
	 			$test_type_counts['piperacillin_tazobactam2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin_tazobactam3'] = $row->Resistant;
	 		}else{
	 			$test_type_counts['tetracycline'] = $row->Sesitive;
	 			$test_type_counts['tetracycline2'] = $row->Intermediate;
	 			$test_type_counts['tetracycline3'] = $row->Resistant;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getShigellaOrganismCounts($month){
		$test_type_ids = $this->getTestTypeIDs('shigella_organism');
		$rows = $this->getAMRservillence($test_type_ids['organism_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['ampicilin'] = 0;
		$test_type_counts['ampicilin2'] = 0;
		$test_type_counts['ampicilin3'] = 0;
		$test_type_counts['azithromycin'] = 0;
		$test_type_counts['azithromycin2'] = 0;
		$test_type_counts['azithromycin3'] = 0;
		$test_type_counts['amikacin'] = 0;
		$test_type_counts['amikacin2'] = 0;
		$test_type_counts['amikacin3'] = 0;
		$test_type_counts['ceftriaxone'] = 0;
		$test_type_counts['ceftriaxone2'] = 0;
		$test_type_counts['ceftriaxone3'] = 0;
		$test_type_counts['ceftazidime'] = 0;
		$test_type_counts['ceftazidime2'] = 0;
		$test_type_counts['ceftazidime3'] = 0;
		$test_type_counts['cefotaxime'] = 0;
		$test_type_counts['cefotaxime2'] = 0;
		$test_type_counts['cefotaxime3'] = 0;
		$test_type_counts['cefoxitin'] = 0;
		$test_type_counts['cefoxitin2'] = 0;
		$test_type_counts['cefoxitin3'] = 0;
		$test_type_counts['cefixime'] = 0;
		$test_type_counts['cefixime2'] = 0;
		$test_type_counts['cefixime3'] = 0;
		$test_type_counts['cotrimoxazole'] = 0;
		$test_type_counts['cotrimoxazole2'] = 0;
		$test_type_counts['cotrimoxazole3'] = 0;
		$test_type_counts['ciprofloxacin'] = 0;
		$test_type_counts['ciprofloxacin2'] = 0;
		$test_type_counts['ciprofloxacin3'] = 0;
		$test_type_counts['colistin'] = 0;
		$test_type_counts['colistin2'] = 0;
		$test_type_counts['colistin3'] = 0;
		$test_type_counts['gentamicin'] = 0;
		$test_type_counts['gentamicin2'] = 0;
		$test_type_counts['gentamicin3'] = 0;
		$test_type_counts['imipenem'] = 0;
		$test_type_counts['imipenem2'] = 0;
		$test_type_counts['imipenem3'] = 0;
		$test_type_counts['levofloxacin'] = 0;
		$test_type_counts['levofloxacin2'] = 0;
		$test_type_counts['levofloxacin3'] = 0;
		$test_type_counts['meropenem'] = 0;
		$test_type_counts['meropenem2'] = 0;
		$test_type_counts['meropenem3'] = 0;
		$test_type_counts['oxacillin'] = 0;
		$test_type_counts['oxacillin2'] = 0;
		$test_type_counts['oxacillin3'] = 0;
		$test_type_counts['penicillin_g'] = 0;
		$test_type_counts['penicillin_g2'] = 0;
		$test_type_counts['penicillin_g3'] = 0;
		$test_type_counts['vancomycin'] = 0;
		$test_type_counts['vancomycin2'] = 0;
		$test_type_counts['vancomycin3'] = 0;
		$test_type_counts['augmentin'] = 0;
		$test_type_counts['augmentin2'] = 0;
		$test_type_counts['augmentin3'] = 0;
		$test_type_counts['chloramphenicol'] = 0;
		$test_type_counts['chloramphenicol2'] = 0;
		$test_type_counts['chloramphenicol3'] = 0;
		$test_type_counts['clindamycin'] = 0;
		$test_type_counts['clindamycin2'] = 0;
		$test_type_counts['clindamycin3'] = 0;
		$test_type_counts['erythromycin'] = 0;
		$test_type_counts['erythromycin2'] = 0;
		$test_type_counts['erythromycin3'] = 0;
		$test_type_counts['nalidixic_acid'] = 0;
		$test_type_counts['nalidixic_acid2'] = 0;
		$test_type_counts['nalidixic_acid3'] = 0;
		$test_type_counts['nitrofurantoin'] = 0;
		$test_type_counts['nitrofurantoin2'] = 0;
		$test_type_counts['nitrofurantoin3'] = 0;
		$test_type_counts['piperacillin'] = 0;
		$test_type_counts['piperacillin2'] = 0;
		$test_type_counts['piperacillin3'] = 0;
		$test_type_counts['piperacillin_tazobactam'] = 0;
		$test_type_counts['piperacillin_tazobactam2'] = 0;
		$test_type_counts['piperacillin_tazobactam3'] = 0;
		$test_type_counts['tetracycline'] = 0;
		$test_type_counts['tetracycline2'] = 0;
		$test_type_counts['tetracycline3'] = 0;
		$test_type_counts['isolate_number'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->drug_id == $test_type_ids['ampicilin']){
	 			$test_type_counts['ampicilin'] = $row->Sesitive;
	 			$test_type_counts['ampicilin2'] = $row->Intermediate;
	 			$test_type_counts['ampicilin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['azithromycin']){
	 			$test_type_counts['azithromycin'] = $row->Sesitive;
	 			$test_type_counts['azithromycin2'] = $row->Intermediate;
	 			$test_type_counts['azithromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['amikacin']){
	 			$test_type_counts['amikacin'] = $row->Sesitive;
	 			$test_type_counts['amikacin2'] = $row->Intermediate;
	 			$test_type_counts['amikacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftriaxone']){
	 			$test_type_counts['ceftriaxone'] = $row->Sesitive;
	 			$test_type_counts['ceftriaxone2'] = $row->Intermediate;
	 			$test_type_counts['ceftriaxone3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftazidime']){
	 			$test_type_counts['ceftazidime'] = $row->Sesitive;
	 			$test_type_counts['ceftazidime2'] = $row->Intermediate;
	 			$test_type_counts['ceftazidime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefotaxime']){
	 			$test_type_counts['cefotaxime'] = $row->Sesitive;
	 			$test_type_counts['cefotaxime2'] = $row->Intermediate;
	 			$test_type_counts['cefotaxime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cotrimoxazole']){
	 			$test_type_counts['cotrimoxazole'] = $row->Sesitive;
	 			$test_type_counts['cotrimoxazole2'] = $row->Intermediate;
	 			$test_type_counts['cotrimoxazole3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ciprofloxacin']){
	 			$test_type_counts['ciprofloxacin'] = $row->Sesitive;
	 			$test_type_counts['ciprofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['ciprofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['colistin']){
	 			$test_type_counts['colistin'] = $row->Sesitive;
	 			$test_type_counts['colistin2'] = $row->Intermediate;
	 			$test_type_counts['colistin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefixime']){
	 			$test_type_counts['cefixime'] = $row->Sesitive;
	 			$test_type_counts['cefixime2'] = $row->Intermediate;
	 			$test_type_counts['cefixime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefoxitin']){
	 			$test_type_counts['cefoxitin'] = $row->Sesitive;
	 			$test_type_counts['cefoxitin2'] = $row->Intermediate;
	 			$test_type_counts['cefoxitin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['gentamicin']){
	 			$test_type_counts['gentamicin'] = $row->Sesitive;
	 			$test_type_counts['gentamicin2'] = $row->Intermediate;
	 			$test_type_counts['gentamicin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['imipenem']){
	 			$test_type_counts['imipenem'] = $row->Sesitive;
	 			$test_type_counts['imipenem2'] = $row->Intermediate;
	 			$test_type_counts['imipenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['levofloxacin']){
	 			$test_type_counts['levofloxacin'] = $row->Sesitive;
	 			$test_type_counts['levofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['levofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['meropenem']){
	 			$test_type_counts['meropenem'] = $row->Sesitive;
	 			$test_type_counts['meropenem2'] = $row->Intermediate;
	 			$test_type_counts['meropenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['oxacillin']){
	 			$test_type_counts['oxacillin'] = $row->Sesitive;
	 			$test_type_counts['oxacillin2'] = $row->Intermediate;
	 			$test_type_counts['oxacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['penicillin_g']){
	 			$test_type_counts['penicillin_g'] = $row->Sesitive;
	 			$test_type_counts['penicillin_g2'] = $row->Intermediate;
	 			$test_type_counts['penicillin_g3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['vancomycin']){
	 			$test_type_counts['vancomycin'] = $row->Sesitive;
	 			$test_type_counts['vancomycin2'] = $row->Intermediate;
	 			$test_type_counts['vancomycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['augmentin']){
	 			$test_type_counts['augmentin'] = $row->Sesitive;
	 			$test_type_counts['augmentin2'] = $row->Intermediate;
	 			$test_type_counts['augmentin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['chloramphenicol']){
	 			$test_type_counts['chloramphenicol'] = $row->Sesitive;
	 			$test_type_counts['chloramphenicol2'] = $row->Intermediate;
	 			$test_type_counts['chloramphenicol3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['clindamycin']){
	 			$test_type_counts['clindamycin'] = $row->Sesitive;
	 			$test_type_counts['clindamycin2'] = $row->Intermediate;
	 			$test_type_counts['clindamycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['erythromycin']){
	 			$test_type_counts['erythromycin'] = $row->Sesitive;
	 			$test_type_counts['erythromycin2'] = $row->Intermediate;
	 			$test_type_counts['erythromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nalidixic_acid']){
	 			$test_type_counts['nalidixic_acid'] = $row->Sesitive;
	 			$test_type_counts['nalidixic_acid2'] = $row->Intermediate;
	 			$test_type_counts['nalidixic_acid3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nitrofurantoin']){
	 			$test_type_counts['nitrofurantoin'] = $row->Sesitive;
	 			$test_type_counts['nitrofurantoin2'] = $row->Intermediate;
	 			$test_type_counts['nitrofurantoin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin']){
	 			$test_type_counts['piperacillin'] = $row->Sesitive;
	 			$test_type_counts['piperacillin2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin_tazobactam']){
	 			$test_type_counts['piperacillin_tazobactam'] = $row->Sesitive;
	 			$test_type_counts['piperacillin_tazobactam2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin_tazobactam3'] = $row->Resistant;
	 		}else{
	 			$test_type_counts['tetracycline'] = $row->Sesitive;
	 			$test_type_counts['tetracycline2'] = $row->Intermediate;
	 			$test_type_counts['tetracycline3'] = $row->Resistant;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getNeisseriaOrganismCounts($month){
		$test_type_ids = $this->getTestTypeIDs('neisseria_organism');
		$rows = $this->getAMRservillence($test_type_ids['organism_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['ampicilin'] = 0;
		$test_type_counts['ampicilin2'] = 0;
		$test_type_counts['ampicilin3'] = 0;
		$test_type_counts['azithromycin'] = 0;
		$test_type_counts['azithromycin2'] = 0;
		$test_type_counts['azithromycin3'] = 0;
		$test_type_counts['amikacin'] = 0;
		$test_type_counts['amikacin2'] = 0;
		$test_type_counts['amikacin3'] = 0;
		$test_type_counts['ceftriaxone'] = 0;
		$test_type_counts['ceftriaxone2'] = 0;
		$test_type_counts['ceftriaxone3'] = 0;
		$test_type_counts['ceftazidime'] = 0;
		$test_type_counts['ceftazidime2'] = 0;
		$test_type_counts['ceftazidime3'] = 0;
		$test_type_counts['cefotaxime'] = 0;
		$test_type_counts['cefotaxime2'] = 0;
		$test_type_counts['cefotaxime3'] = 0;
		$test_type_counts['cefoxitin'] = 0;
		$test_type_counts['cefoxitin2'] = 0;
		$test_type_counts['cefoxitin3'] = 0;
		$test_type_counts['cefixime'] = 0;
		$test_type_counts['cefixime2'] = 0;
		$test_type_counts['cefixime3'] = 0;
		$test_type_counts['cotrimoxazole'] = 0;
		$test_type_counts['cotrimoxazole2'] = 0;
		$test_type_counts['cotrimoxazole3'] = 0;
		$test_type_counts['ciprofloxacin'] = 0;
		$test_type_counts['ciprofloxacin2'] = 0;
		$test_type_counts['ciprofloxacin3'] = 0;
		$test_type_counts['colistin'] = 0;
		$test_type_counts['colistin2'] = 0;
		$test_type_counts['colistin3'] = 0;
		$test_type_counts['gentamicin'] = 0;
		$test_type_counts['gentamicin2'] = 0;
		$test_type_counts['gentamicin3'] = 0;
		$test_type_counts['imipenem'] = 0;
		$test_type_counts['imipenem2'] = 0;
		$test_type_counts['imipenem3'] = 0;
		$test_type_counts['levofloxacin'] = 0;
		$test_type_counts['levofloxacin2'] = 0;
		$test_type_counts['levofloxacin3'] = 0;
		$test_type_counts['meropenem'] = 0;
		$test_type_counts['meropenem2'] = 0;
		$test_type_counts['meropenem3'] = 0;
		$test_type_counts['oxacillin'] = 0;
		$test_type_counts['oxacillin2'] = 0;
		$test_type_counts['oxacillin3'] = 0;
		$test_type_counts['penicillin_g'] = 0;
		$test_type_counts['penicillin_g2'] = 0;
		$test_type_counts['penicillin_g3'] = 0;
		$test_type_counts['vancomycin'] = 0;
		$test_type_counts['vancomycin2'] = 0;
		$test_type_counts['vancomycin3'] = 0;
		$test_type_counts['augmentin'] = 0;
		$test_type_counts['augmentin2'] = 0;
		$test_type_counts['augmentin3'] = 0;
		$test_type_counts['chloramphenicol'] = 0;
		$test_type_counts['chloramphenicol2'] = 0;
		$test_type_counts['chloramphenicol3'] = 0;
		$test_type_counts['clindamycin'] = 0;
		$test_type_counts['clindamycin2'] = 0;
		$test_type_counts['clindamycin3'] = 0;
		$test_type_counts['erythromycin'] = 0;
		$test_type_counts['erythromycin2'] = 0;
		$test_type_counts['erythromycin3'] = 0;
		$test_type_counts['nalidixic_acid'] = 0;
		$test_type_counts['nalidixic_acid2'] = 0;
		$test_type_counts['nalidixic_acid3'] = 0;
		$test_type_counts['nitrofurantoin'] = 0;
		$test_type_counts['nitrofurantoin2'] = 0;
		$test_type_counts['nitrofurantoin3'] = 0;
		$test_type_counts['piperacillin'] = 0;
		$test_type_counts['piperacillin2'] = 0;
		$test_type_counts['piperacillin3'] = 0;
		$test_type_counts['piperacillin_tazobactam'] = 0;
		$test_type_counts['piperacillin_tazobactam2'] = 0;
		$test_type_counts['piperacillin_tazobactam3'] = 0;
		$test_type_counts['tetracycline'] = 0;
		$test_type_counts['tetracycline2'] = 0;
		$test_type_counts['tetracycline3'] = 0;
		$test_type_counts['isolate_number'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->drug_id == $test_type_ids['ampicilin']){
	 			$test_type_counts['ampicilin'] = $row->Sesitive;
	 			$test_type_counts['ampicilin2'] = $row->Intermediate;
	 			$test_type_counts['ampicilin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['azithromycin']){
	 			$test_type_counts['azithromycin'] = $row->Sesitive;
	 			$test_type_counts['azithromycin2'] = $row->Intermediate;
	 			$test_type_counts['azithromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['amikacin']){
	 			$test_type_counts['amikacin'] = $row->Sesitive;
	 			$test_type_counts['amikacin2'] = $row->Intermediate;
	 			$test_type_counts['amikacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftriaxone']){
	 			$test_type_counts['ceftriaxone'] = $row->Sesitive;
	 			$test_type_counts['ceftriaxone2'] = $row->Intermediate;
	 			$test_type_counts['ceftriaxone3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftazidime']){
	 			$test_type_counts['ceftazidime'] = $row->Sesitive;
	 			$test_type_counts['ceftazidime2'] = $row->Intermediate;
	 			$test_type_counts['ceftazidime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefotaxime']){
	 			$test_type_counts['cefotaxime'] = $row->Sesitive;
	 			$test_type_counts['cefotaxime2'] = $row->Intermediate;
	 			$test_type_counts['cefotaxime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cotrimoxazole']){
	 			$test_type_counts['cotrimoxazole'] = $row->Sesitive;
	 			$test_type_counts['cotrimoxazole2'] = $row->Intermediate;
	 			$test_type_counts['cotrimoxazole3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ciprofloxacin']){
	 			$test_type_counts['ciprofloxacin'] = $row->Sesitive;
	 			$test_type_counts['ciprofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['ciprofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['colistin']){
	 			$test_type_counts['colistin'] = $row->Sesitive;
	 			$test_type_counts['colistin2'] = $row->Intermediate;
	 			$test_type_counts['colistin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefixime']){
	 			$test_type_counts['cefixime'] = $row->Sesitive;
	 			$test_type_counts['cefixime2'] = $row->Intermediate;
	 			$test_type_counts['cefixime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefoxitin']){
	 			$test_type_counts['cefoxitin'] = $row->Sesitive;
	 			$test_type_counts['cefoxitin2'] = $row->Intermediate;
	 			$test_type_counts['cefoxitin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['gentamicin']){
	 			$test_type_counts['gentamicin'] = $row->Sesitive;
	 			$test_type_counts['gentamicin2'] = $row->Intermediate;
	 			$test_type_counts['gentamicin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['imipenem']){
	 			$test_type_counts['imipenem'] = $row->Sesitive;
	 			$test_type_counts['imipenem2'] = $row->Intermediate;
	 			$test_type_counts['imipenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['levofloxacin']){
	 			$test_type_counts['levofloxacin'] = $row->Sesitive;
	 			$test_type_counts['levofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['levofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['meropenem']){
	 			$test_type_counts['meropenem'] = $row->Sesitive;
	 			$test_type_counts['meropenem2'] = $row->Intermediate;
	 			$test_type_counts['meropenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['oxacillin']){
	 			$test_type_counts['oxacillin'] = $row->Sesitive;
	 			$test_type_counts['oxacillin2'] = $row->Intermediate;
	 			$test_type_counts['oxacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['penicillin_g']){
	 			$test_type_counts['penicillin_g'] = $row->Sesitive;
	 			$test_type_counts['penicillin_g2'] = $row->Intermediate;
	 			$test_type_counts['penicillin_g3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['vancomycin']){
	 			$test_type_counts['vancomycin'] = $row->Sesitive;
	 			$test_type_counts['vancomycin2'] = $row->Intermediate;
	 			$test_type_counts['vancomycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['augmentin']){
	 			$test_type_counts['augmentin'] = $row->Sesitive;
	 			$test_type_counts['augmentin2'] = $row->Intermediate;
	 			$test_type_counts['augmentin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['chloramphenicol']){
	 			$test_type_counts['chloramphenicol'] = $row->Sesitive;
	 			$test_type_counts['chloramphenicol2'] = $row->Intermediate;
	 			$test_type_counts['chloramphenicol3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['clindamycin']){
	 			$test_type_counts['clindamycin'] = $row->Sesitive;
	 			$test_type_counts['clindamycin2'] = $row->Intermediate;
	 			$test_type_counts['clindamycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['erythromycin']){
	 			$test_type_counts['erythromycin'] = $row->Sesitive;
	 			$test_type_counts['erythromycin2'] = $row->Intermediate;
	 			$test_type_counts['erythromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nalidixic_acid']){
	 			$test_type_counts['nalidixic_acid'] = $row->Sesitive;
	 			$test_type_counts['nalidixic_acid2'] = $row->Intermediate;
	 			$test_type_counts['nalidixic_acid3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nitrofurantoin']){
	 			$test_type_counts['nitrofurantoin'] = $row->Sesitive;
	 			$test_type_counts['nitrofurantoin2'] = $row->Intermediate;
	 			$test_type_counts['nitrofurantoin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin']){
	 			$test_type_counts['piperacillin'] = $row->Sesitive;
	 			$test_type_counts['piperacillin2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin_tazobactam']){
	 			$test_type_counts['piperacillin_tazobactam'] = $row->Sesitive;
	 			$test_type_counts['piperacillin_tazobactam2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin_tazobactam3'] = $row->Resistant;
	 		}else{
	 			$test_type_counts['tetracycline'] = $row->Sesitive;
	 			$test_type_counts['tetracycline2'] = $row->Intermediate;
	 			$test_type_counts['tetracycline3'] = $row->Resistant;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getStaphylococcusOrganismCounts($month){
		$test_type_ids = $this->getTestTypeIDs('staphylococcus_organism');
		$rows = $this->getAMRservillence($test_type_ids['organism_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['ampicilin'] = 0;
		$test_type_counts['ampicilin2'] = 0;
		$test_type_counts['ampicilin3'] = 0;
		$test_type_counts['azithromycin'] = 0;
		$test_type_counts['azithromycin2'] = 0;
		$test_type_counts['azithromycin3'] = 0;
		$test_type_counts['amikacin'] = 0;
		$test_type_counts['amikacin2'] = 0;
		$test_type_counts['amikacin3'] = 0;
		$test_type_counts['ceftriaxone'] = 0;
		$test_type_counts['ceftriaxone2'] = 0;
		$test_type_counts['ceftriaxone3'] = 0;
		$test_type_counts['ceftazidime'] = 0;
		$test_type_counts['ceftazidime2'] = 0;
		$test_type_counts['ceftazidime3'] = 0;
		$test_type_counts['cefotaxime'] = 0;
		$test_type_counts['cefotaxime2'] = 0;
		$test_type_counts['cefotaxime3'] = 0;
		$test_type_counts['cefoxitin'] = 0;
		$test_type_counts['cefoxitin2'] = 0;
		$test_type_counts['cefoxitin3'] = 0;
		$test_type_counts['cefixime'] = 0;
		$test_type_counts['cefixime2'] = 0;
		$test_type_counts['cefixime3'] = 0;
		$test_type_counts['cotrimoxazole'] = 0;
		$test_type_counts['cotrimoxazole2'] = 0;
		$test_type_counts['cotrimoxazole3'] = 0;
		$test_type_counts['ciprofloxacin'] = 0;
		$test_type_counts['ciprofloxacin2'] = 0;
		$test_type_counts['ciprofloxacin3'] = 0;
		$test_type_counts['colistin'] = 0;
		$test_type_counts['colistin2'] = 0;
		$test_type_counts['colistin3'] = 0;
		$test_type_counts['gentamicin'] = 0;
		$test_type_counts['gentamicin2'] = 0;
		$test_type_counts['gentamicin3'] = 0;
		$test_type_counts['imipenem'] = 0;
		$test_type_counts['imipenem2'] = 0;
		$test_type_counts['imipenem3'] = 0;
		$test_type_counts['levofloxacin'] = 0;
		$test_type_counts['levofloxacin2'] = 0;
		$test_type_counts['levofloxacin3'] = 0;
		$test_type_counts['meropenem'] = 0;
		$test_type_counts['meropenem2'] = 0;
		$test_type_counts['meropenem3'] = 0;
		$test_type_counts['oxacillin'] = 0;
		$test_type_counts['oxacillin2'] = 0;
		$test_type_counts['oxacillin3'] = 0;
		$test_type_counts['penicillin_g'] = 0;
		$test_type_counts['penicillin_g2'] = 0;
		$test_type_counts['penicillin_g3'] = 0;
		$test_type_counts['vancomycin'] = 0;
		$test_type_counts['vancomycin2'] = 0;
		$test_type_counts['vancomycin3'] = 0;
		$test_type_counts['augmentin'] = 0;
		$test_type_counts['augmentin2'] = 0;
		$test_type_counts['augmentin3'] = 0;
		$test_type_counts['chloramphenicol'] = 0;
		$test_type_counts['chloramphenicol2'] = 0;
		$test_type_counts['chloramphenicol3'] = 0;
		$test_type_counts['clindamycin'] = 0;
		$test_type_counts['clindamycin2'] = 0;
		$test_type_counts['clindamycin3'] = 0;
		$test_type_counts['erythromycin'] = 0;
		$test_type_counts['erythromycin2'] = 0;
		$test_type_counts['erythromycin3'] = 0;
		$test_type_counts['nalidixic_acid'] = 0;
		$test_type_counts['nalidixic_acid2'] = 0;
		$test_type_counts['nalidixic_acid3'] = 0;
		$test_type_counts['nitrofurantoin'] = 0;
		$test_type_counts['nitrofurantoin2'] = 0;
		$test_type_counts['nitrofurantoin3'] = 0;
		$test_type_counts['piperacillin'] = 0;
		$test_type_counts['piperacillin2'] = 0;
		$test_type_counts['piperacillin3'] = 0;
		$test_type_counts['piperacillin_tazobactam'] = 0;
		$test_type_counts['piperacillin_tazobactam2'] = 0;
		$test_type_counts['piperacillin_tazobactam3'] = 0;
		$test_type_counts['tetracycline'] = 0;
		$test_type_counts['tetracycline2'] = 0;
		$test_type_counts['tetracycline3'] = 0;
		$test_type_counts['isolate_number'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->drug_id == $test_type_ids['ampicilin']){
	 			$test_type_counts['ampicilin'] = $row->Sesitive;
	 			$test_type_counts['ampicilin2'] = $row->Intermediate;
	 			$test_type_counts['ampicilin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['azithromycin']){
	 			$test_type_counts['azithromycin'] = $row->Sesitive;
	 			$test_type_counts['azithromycin2'] = $row->Intermediate;
	 			$test_type_counts['azithromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['amikacin']){
	 			$test_type_counts['amikacin'] = $row->Sesitive;
	 			$test_type_counts['amikacin2'] = $row->Intermediate;
	 			$test_type_counts['amikacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftriaxone']){
	 			$test_type_counts['ceftriaxone'] = $row->Sesitive;
	 			$test_type_counts['ceftriaxone2'] = $row->Intermediate;
	 			$test_type_counts['ceftriaxone3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftazidime']){
	 			$test_type_counts['ceftazidime'] = $row->Sesitive;
	 			$test_type_counts['ceftazidime2'] = $row->Intermediate;
	 			$test_type_counts['ceftazidime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefotaxime']){
	 			$test_type_counts['cefotaxime'] = $row->Sesitive;
	 			$test_type_counts['cefotaxime2'] = $row->Intermediate;
	 			$test_type_counts['cefotaxime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cotrimoxazole']){
	 			$test_type_counts['cotrimoxazole'] = $row->Sesitive;
	 			$test_type_counts['cotrimoxazole2'] = $row->Intermediate;
	 			$test_type_counts['cotrimoxazole3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ciprofloxacin']){
	 			$test_type_counts['ciprofloxacin'] = $row->Sesitive;
	 			$test_type_counts['ciprofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['ciprofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['colistin']){
	 			$test_type_counts['colistin'] = $row->Sesitive;
	 			$test_type_counts['colistin2'] = $row->Intermediate;
	 			$test_type_counts['colistin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefixime']){
	 			$test_type_counts['cefixime'] = $row->Sesitive;
	 			$test_type_counts['cefixime2'] = $row->Intermediate;
	 			$test_type_counts['cefixime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefoxitin']){
	 			$test_type_counts['cefoxitin'] = $row->Sesitive;
	 			$test_type_counts['cefoxitin2'] = $row->Intermediate;
	 			$test_type_counts['cefoxitin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['gentamicin']){
	 			$test_type_counts['gentamicin'] = $row->Sesitive;
	 			$test_type_counts['gentamicin2'] = $row->Intermediate;
	 			$test_type_counts['gentamicin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['imipenem']){
	 			$test_type_counts['imipenem'] = $row->Sesitive;
	 			$test_type_counts['imipenem2'] = $row->Intermediate;
	 			$test_type_counts['imipenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['levofloxacin']){
	 			$test_type_counts['levofloxacin'] = $row->Sesitive;
	 			$test_type_counts['levofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['levofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['meropenem']){
	 			$test_type_counts['meropenem'] = $row->Sesitive;
	 			$test_type_counts['meropenem2'] = $row->Intermediate;
	 			$test_type_counts['meropenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['oxacillin']){
	 			$test_type_counts['oxacillin'] = $row->Sesitive;
	 			$test_type_counts['oxacillin2'] = $row->Intermediate;
	 			$test_type_counts['oxacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['penicillin_g']){
	 			$test_type_counts['penicillin_g'] = $row->Sesitive;
	 			$test_type_counts['penicillin_g2'] = $row->Intermediate;
	 			$test_type_counts['penicillin_g3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['vancomycin']){
	 			$test_type_counts['vancomycin'] = $row->Sesitive;
	 			$test_type_counts['vancomycin2'] = $row->Intermediate;
	 			$test_type_counts['vancomycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['augmentin']){
	 			$test_type_counts['augmentin'] = $row->Sesitive;
	 			$test_type_counts['augmentin2'] = $row->Intermediate;
	 			$test_type_counts['augmentin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['chloramphenicol']){
	 			$test_type_counts['chloramphenicol'] = $row->Sesitive;
	 			$test_type_counts['chloramphenicol2'] = $row->Intermediate;
	 			$test_type_counts['chloramphenicol3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['clindamycin']){
	 			$test_type_counts['clindamycin'] = $row->Sesitive;
	 			$test_type_counts['clindamycin2'] = $row->Intermediate;
	 			$test_type_counts['clindamycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['erythromycin']){
	 			$test_type_counts['erythromycin'] = $row->Sesitive;
	 			$test_type_counts['erythromycin2'] = $row->Intermediate;
	 			$test_type_counts['erythromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nalidixic_acid']){
	 			$test_type_counts['nalidixic_acid'] = $row->Sesitive;
	 			$test_type_counts['nalidixic_acid2'] = $row->Intermediate;
	 			$test_type_counts['nalidixic_acid3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nitrofurantoin']){
	 			$test_type_counts['nitrofurantoin'] = $row->Sesitive;
	 			$test_type_counts['nitrofurantoin2'] = $row->Intermediate;
	 			$test_type_counts['nitrofurantoin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin']){
	 			$test_type_counts['piperacillin'] = $row->Sesitive;
	 			$test_type_counts['piperacillin2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin_tazobactam']){
	 			$test_type_counts['piperacillin_tazobactam'] = $row->Sesitive;
	 			$test_type_counts['piperacillin_tazobactam2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin_tazobactam3'] = $row->Resistant;
	 		}else{
	 			$test_type_counts['tetracycline'] = $row->Sesitive;
	 			$test_type_counts['tetracycline2'] = $row->Intermediate;
	 			$test_type_counts['tetracycline3'] = $row->Resistant;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getStreptococcusOrganismCounts($month){
		$test_type_ids = $this->getTestTypeIDs('streptococcus_organism');
		$rows = $this->getAMRservillence($test_type_ids['organism_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['ampicilin'] = 0;
		$test_type_counts['ampicilin2'] = 0;
		$test_type_counts['ampicilin3'] = 0;
		$test_type_counts['azithromycin'] = 0;
		$test_type_counts['azithromycin2'] = 0;
		$test_type_counts['azithromycin3'] = 0;
		$test_type_counts['amikacin'] = 0;
		$test_type_counts['amikacin2'] = 0;
		$test_type_counts['amikacin3'] = 0;
		$test_type_counts['ceftriaxone'] = 0;
		$test_type_counts['ceftriaxone2'] = 0;
		$test_type_counts['ceftriaxone3'] = 0;
		$test_type_counts['ceftazidime'] = 0;
		$test_type_counts['ceftazidime2'] = 0;
		$test_type_counts['ceftazidime3'] = 0;
		$test_type_counts['cefotaxime'] = 0;
		$test_type_counts['cefotaxime2'] = 0;
		$test_type_counts['cefotaxime3'] = 0;
		$test_type_counts['cefoxitin'] = 0;
		$test_type_counts['cefoxitin2'] = 0;
		$test_type_counts['cefoxitin3'] = 0;
		$test_type_counts['cefixime'] = 0;
		$test_type_counts['cefixime2'] = 0;
		$test_type_counts['cefixime3'] = 0;
		$test_type_counts['cotrimoxazole'] = 0;
		$test_type_counts['cotrimoxazole2'] = 0;
		$test_type_counts['cotrimoxazole3'] = 0;
		$test_type_counts['ciprofloxacin'] = 0;
		$test_type_counts['ciprofloxacin2'] = 0;
		$test_type_counts['ciprofloxacin3'] = 0;
		$test_type_counts['colistin'] = 0;
		$test_type_counts['colistin2'] = 0;
		$test_type_counts['colistin3'] = 0;
		$test_type_counts['gentamicin'] = 0;
		$test_type_counts['gentamicin2'] = 0;
		$test_type_counts['gentamicin3'] = 0;
		$test_type_counts['imipenem'] = 0;
		$test_type_counts['imipenem2'] = 0;
		$test_type_counts['imipenem3'] = 0;
		$test_type_counts['levofloxacin'] = 0;
		$test_type_counts['levofloxacin2'] = 0;
		$test_type_counts['levofloxacin3'] = 0;
		$test_type_counts['meropenem'] = 0;
		$test_type_counts['meropenem2'] = 0;
		$test_type_counts['meropenem3'] = 0;
		$test_type_counts['oxacillin'] = 0;
		$test_type_counts['oxacillin2'] = 0;
		$test_type_counts['oxacillin3'] = 0;
		$test_type_counts['penicillin_g'] = 0;
		$test_type_counts['penicillin_g2'] = 0;
		$test_type_counts['penicillin_g3'] = 0;
		$test_type_counts['vancomycin'] = 0;
		$test_type_counts['vancomycin2'] = 0;
		$test_type_counts['vancomycin3'] = 0;
		$test_type_counts['augmentin'] = 0;
		$test_type_counts['augmentin2'] = 0;
		$test_type_counts['augmentin3'] = 0;
		$test_type_counts['chloramphenicol'] = 0;
		$test_type_counts['chloramphenicol2'] = 0;
		$test_type_counts['chloramphenicol3'] = 0;
		$test_type_counts['clindamycin'] = 0;
		$test_type_counts['clindamycin2'] = 0;
		$test_type_counts['clindamycin3'] = 0;
		$test_type_counts['erythromycin'] = 0;
		$test_type_counts['erythromycin2'] = 0;
		$test_type_counts['erythromycin3'] = 0;
		$test_type_counts['nalidixic_acid'] = 0;
		$test_type_counts['nalidixic_acid2'] = 0;
		$test_type_counts['nalidixic_acid3'] = 0;
		$test_type_counts['nitrofurantoin'] = 0;
		$test_type_counts['nitrofurantoin2'] = 0;
		$test_type_counts['nitrofurantoin3'] = 0;
		$test_type_counts['piperacillin'] = 0;
		$test_type_counts['piperacillin2'] = 0;
		$test_type_counts['piperacillin3'] = 0;
		$test_type_counts['piperacillin_tazobactam'] = 0;
		$test_type_counts['piperacillin_tazobactam2'] = 0;
		$test_type_counts['piperacillin_tazobactam3'] = 0;
		$test_type_counts['tetracycline'] = 0;
		$test_type_counts['tetracycline2'] = 0;
		$test_type_counts['tetracycline3'] = 0;
		$test_type_counts['isolate_number'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->drug_id == $test_type_ids['ampicilin']){
	 			$test_type_counts['ampicilin'] = $row->Sesitive;
	 			$test_type_counts['ampicilin2'] = $row->Intermediate;
	 			$test_type_counts['ampicilin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['azithromycin']){
	 			$test_type_counts['azithromycin'] = $row->Sesitive;
	 			$test_type_counts['azithromycin2'] = $row->Intermediate;
	 			$test_type_counts['azithromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['amikacin']){
	 			$test_type_counts['amikacin'] = $row->Sesitive;
	 			$test_type_counts['amikacin2'] = $row->Intermediate;
	 			$test_type_counts['amikacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftriaxone']){
	 			$test_type_counts['ceftriaxone'] = $row->Sesitive;
	 			$test_type_counts['ceftriaxone2'] = $row->Intermediate;
	 			$test_type_counts['ceftriaxone3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftazidime']){
	 			$test_type_counts['ceftazidime'] = $row->Sesitive;
	 			$test_type_counts['ceftazidime2'] = $row->Intermediate;
	 			$test_type_counts['ceftazidime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefotaxime']){
	 			$test_type_counts['cefotaxime'] = $row->Sesitive;
	 			$test_type_counts['cefotaxime2'] = $row->Intermediate;
	 			$test_type_counts['cefotaxime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cotrimoxazole']){
	 			$test_type_counts['cotrimoxazole'] = $row->Sesitive;
	 			$test_type_counts['cotrimoxazole2'] = $row->Intermediate;
	 			$test_type_counts['cotrimoxazole3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ciprofloxacin']){
	 			$test_type_counts['ciprofloxacin'] = $row->Sesitive;
	 			$test_type_counts['ciprofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['ciprofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['colistin']){
	 			$test_type_counts['colistin'] = $row->Sesitive;
	 			$test_type_counts['colistin2'] = $row->Intermediate;
	 			$test_type_counts['colistin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefixime']){
	 			$test_type_counts['cefixime'] = $row->Sesitive;
	 			$test_type_counts['cefixime2'] = $row->Intermediate;
	 			$test_type_counts['cefixime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefoxitin']){
	 			$test_type_counts['cefoxitin'] = $row->Sesitive;
	 			$test_type_counts['cefoxitin2'] = $row->Intermediate;
	 			$test_type_counts['cefoxitin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['gentamicin']){
	 			$test_type_counts['gentamicin'] = $row->Sesitive;
	 			$test_type_counts['gentamicin2'] = $row->Intermediate;
	 			$test_type_counts['gentamicin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['imipenem']){
	 			$test_type_counts['imipenem'] = $row->Sesitive;
	 			$test_type_counts['imipenem2'] = $row->Intermediate;
	 			$test_type_counts['imipenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['levofloxacin']){
	 			$test_type_counts['levofloxacin'] = $row->Sesitive;
	 			$test_type_counts['levofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['levofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['meropenem']){
	 			$test_type_counts['meropenem'] = $row->Sesitive;
	 			$test_type_counts['meropenem2'] = $row->Intermediate;
	 			$test_type_counts['meropenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['oxacillin']){
	 			$test_type_counts['oxacillin'] = $row->Sesitive;
	 			$test_type_counts['oxacillin2'] = $row->Intermediate;
	 			$test_type_counts['oxacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['penicillin_g']){
	 			$test_type_counts['penicillin_g'] = $row->Sesitive;
	 			$test_type_counts['penicillin_g2'] = $row->Intermediate;
	 			$test_type_counts['penicillin_g3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['vancomycin']){
	 			$test_type_counts['vancomycin'] = $row->Sesitive;
	 			$test_type_counts['vancomycin2'] = $row->Intermediate;
	 			$test_type_counts['vancomycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['augmentin']){
	 			$test_type_counts['augmentin'] = $row->Sesitive;
	 			$test_type_counts['augmentin2'] = $row->Intermediate;
	 			$test_type_counts['augmentin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['chloramphenicol']){
	 			$test_type_counts['chloramphenicol'] = $row->Sesitive;
	 			$test_type_counts['chloramphenicol2'] = $row->Intermediate;
	 			$test_type_counts['chloramphenicol3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['clindamycin']){
	 			$test_type_counts['clindamycin'] = $row->Sesitive;
	 			$test_type_counts['clindamycin2'] = $row->Intermediate;
	 			$test_type_counts['clindamycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['erythromycin']){
	 			$test_type_counts['erythromycin'] = $row->Sesitive;
	 			$test_type_counts['erythromycin2'] = $row->Intermediate;
	 			$test_type_counts['erythromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nalidixic_acid']){
	 			$test_type_counts['nalidixic_acid'] = $row->Sesitive;
	 			$test_type_counts['nalidixic_acid2'] = $row->Intermediate;
	 			$test_type_counts['nalidixic_acid3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nitrofurantoin']){
	 			$test_type_counts['nitrofurantoin'] = $row->Sesitive;
	 			$test_type_counts['nitrofurantoin2'] = $row->Intermediate;
	 			$test_type_counts['nitrofurantoin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin']){
	 			$test_type_counts['piperacillin'] = $row->Sesitive;
	 			$test_type_counts['piperacillin2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin_tazobactam']){
	 			$test_type_counts['piperacillin_tazobactam'] = $row->Sesitive;
	 			$test_type_counts['piperacillin_tazobactam2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin_tazobactam3'] = $row->Resistant;
	 		}else{
	 			$test_type_counts['tetracycline'] = $row->Sesitive;
	 			$test_type_counts['tetracycline2'] = $row->Intermediate;
	 			$test_type_counts['tetracycline3'] = $row->Resistant;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getAcinetobacterOrganismCounts($month){
		$test_type_ids = $this->getTestTypeIDs('acinetobacter_organism');
		$rows = $this->getAMRservillence($test_type_ids['organism_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['ampicilin'] = 0;
		$test_type_counts['ampicilin2'] = 0;
		$test_type_counts['ampicilin3'] = 0;
		$test_type_counts['azithromycin'] = 0;
		$test_type_counts['azithromycin2'] = 0;
		$test_type_counts['azithromycin3'] = 0;
		$test_type_counts['amikacin'] = 0;
		$test_type_counts['amikacin2'] = 0;
		$test_type_counts['amikacin3'] = 0;
		$test_type_counts['ceftriaxone'] = 0;
		$test_type_counts['ceftriaxone2'] = 0;
		$test_type_counts['ceftriaxone3'] = 0;
		$test_type_counts['ceftazidime'] = 0;
		$test_type_counts['ceftazidime2'] = 0;
		$test_type_counts['ceftazidime3'] = 0;
		$test_type_counts['cefotaxime'] = 0;
		$test_type_counts['cefotaxime2'] = 0;
		$test_type_counts['cefotaxime3'] = 0;
		$test_type_counts['cefoxitin'] = 0;
		$test_type_counts['cefoxitin2'] = 0;
		$test_type_counts['cefoxitin3'] = 0;
		$test_type_counts['cefixime'] = 0;
		$test_type_counts['cefixime2'] = 0;
		$test_type_counts['cefixime3'] = 0;
		$test_type_counts['cotrimoxazole'] = 0;
		$test_type_counts['cotrimoxazole2'] = 0;
		$test_type_counts['cotrimoxazole3'] = 0;
		$test_type_counts['ciprofloxacin'] = 0;
		$test_type_counts['ciprofloxacin2'] = 0;
		$test_type_counts['ciprofloxacin3'] = 0;
		$test_type_counts['colistin'] = 0;
		$test_type_counts['colistin2'] = 0;
		$test_type_counts['colistin3'] = 0;
		$test_type_counts['gentamicin'] = 0;
		$test_type_counts['gentamicin2'] = 0;
		$test_type_counts['gentamicin3'] = 0;
		$test_type_counts['imipenem'] = 0;
		$test_type_counts['imipenem2'] = 0;
		$test_type_counts['imipenem3'] = 0;
		$test_type_counts['levofloxacin'] = 0;
		$test_type_counts['levofloxacin2'] = 0;
		$test_type_counts['levofloxacin3'] = 0;
		$test_type_counts['meropenem'] = 0;
		$test_type_counts['meropenem2'] = 0;
		$test_type_counts['meropenem3'] = 0;
		$test_type_counts['oxacillin'] = 0;
		$test_type_counts['oxacillin2'] = 0;
		$test_type_counts['oxacillin3'] = 0;
		$test_type_counts['penicillin_g'] = 0;
		$test_type_counts['penicillin_g2'] = 0;
		$test_type_counts['penicillin_g3'] = 0;
		$test_type_counts['vancomycin'] = 0;
		$test_type_counts['vancomycin2'] = 0;
		$test_type_counts['vancomycin3'] = 0;
		$test_type_counts['augmentin'] = 0;
		$test_type_counts['augmentin2'] = 0;
		$test_type_counts['augmentin3'] = 0;
		$test_type_counts['chloramphenicol'] = 0;
		$test_type_counts['chloramphenicol2'] = 0;
		$test_type_counts['chloramphenicol3'] = 0;
		$test_type_counts['clindamycin'] = 0;
		$test_type_counts['clindamycin2'] = 0;
		$test_type_counts['clindamycin3'] = 0;
		$test_type_counts['erythromycin'] = 0;
		$test_type_counts['erythromycin2'] = 0;
		$test_type_counts['erythromycin3'] = 0;
		$test_type_counts['nalidixic_acid'] = 0;
		$test_type_counts['nalidixic_acid2'] = 0;
		$test_type_counts['nalidixic_acid3'] = 0;
		$test_type_counts['nitrofurantoin'] = 0;
		$test_type_counts['nitrofurantoin2'] = 0;
		$test_type_counts['nitrofurantoin3'] = 0;
		$test_type_counts['piperacillin'] = 0;
		$test_type_counts['piperacillin2'] = 0;
		$test_type_counts['piperacillin3'] = 0;
		$test_type_counts['piperacillin_tazobactam'] = 0;
		$test_type_counts['piperacillin_tazobactam2'] = 0;
		$test_type_counts['piperacillin_tazobactam3'] = 0;
		$test_type_counts['tetracycline'] = 0;
		$test_type_counts['tetracycline2'] = 0;
		$test_type_counts['tetracycline3'] = 0;
		$test_type_counts['isolate_number'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->drug_id == $test_type_ids['ampicilin']){
	 			$test_type_counts['ampicilin'] = $row->Sesitive;
	 			$test_type_counts['ampicilin2'] = $row->Intermediate;
	 			$test_type_counts['ampicilin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['azithromycin']){
	 			$test_type_counts['azithromycin'] = $row->Sesitive;
	 			$test_type_counts['azithromycin2'] = $row->Intermediate;
	 			$test_type_counts['azithromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['amikacin']){
	 			$test_type_counts['amikacin'] = $row->Sesitive;
	 			$test_type_counts['amikacin2'] = $row->Intermediate;
	 			$test_type_counts['amikacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftriaxone']){
	 			$test_type_counts['ceftriaxone'] = $row->Sesitive;
	 			$test_type_counts['ceftriaxone2'] = $row->Intermediate;
	 			$test_type_counts['ceftriaxone3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftazidime']){
	 			$test_type_counts['ceftazidime'] = $row->Sesitive;
	 			$test_type_counts['ceftazidime2'] = $row->Intermediate;
	 			$test_type_counts['ceftazidime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefotaxime']){
	 			$test_type_counts['cefotaxime'] = $row->Sesitive;
	 			$test_type_counts['cefotaxime2'] = $row->Intermediate;
	 			$test_type_counts['cefotaxime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cotrimoxazole']){
	 			$test_type_counts['cotrimoxazole'] = $row->Sesitive;
	 			$test_type_counts['cotrimoxazole2'] = $row->Intermediate;
	 			$test_type_counts['cotrimoxazole3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ciprofloxacin']){
	 			$test_type_counts['ciprofloxacin'] = $row->Sesitive;
	 			$test_type_counts['ciprofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['ciprofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['colistin']){
	 			$test_type_counts['colistin'] = $row->Sesitive;
	 			$test_type_counts['colistin2'] = $row->Intermediate;
	 			$test_type_counts['colistin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefixime']){
	 			$test_type_counts['cefixime'] = $row->Sesitive;
	 			$test_type_counts['cefixime2'] = $row->Intermediate;
	 			$test_type_counts['cefixime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefoxitin']){
	 			$test_type_counts['cefoxitin'] = $row->Sesitive;
	 			$test_type_counts['cefoxitin2'] = $row->Intermediate;
	 			$test_type_counts['cefoxitin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['gentamicin']){
	 			$test_type_counts['gentamicin'] = $row->Sesitive;
	 			$test_type_counts['gentamicin2'] = $row->Intermediate;
	 			$test_type_counts['gentamicin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['imipenem']){
	 			$test_type_counts['imipenem'] = $row->Sesitive;
	 			$test_type_counts['imipenem2'] = $row->Intermediate;
	 			$test_type_counts['imipenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['levofloxacin']){
	 			$test_type_counts['levofloxacin'] = $row->Sesitive;
	 			$test_type_counts['levofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['levofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['meropenem']){
	 			$test_type_counts['meropenem'] = $row->Sesitive;
	 			$test_type_counts['meropenem2'] = $row->Intermediate;
	 			$test_type_counts['meropenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['oxacillin']){
	 			$test_type_counts['oxacillin'] = $row->Sesitive;
	 			$test_type_counts['oxacillin2'] = $row->Intermediate;
	 			$test_type_counts['oxacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['penicillin_g']){
	 			$test_type_counts['penicillin_g'] = $row->Sesitive;
	 			$test_type_counts['penicillin_g2'] = $row->Intermediate;
	 			$test_type_counts['penicillin_g3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['vancomycin']){
	 			$test_type_counts['vancomycin'] = $row->Sesitive;
	 			$test_type_counts['vancomycin2'] = $row->Intermediate;
	 			$test_type_counts['vancomycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['augmentin']){
	 			$test_type_counts['augmentin'] = $row->Sesitive;
	 			$test_type_counts['augmentin2'] = $row->Intermediate;
	 			$test_type_counts['augmentin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['chloramphenicol']){
	 			$test_type_counts['chloramphenicol'] = $row->Sesitive;
	 			$test_type_counts['chloramphenicol2'] = $row->Intermediate;
	 			$test_type_counts['chloramphenicol3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['clindamycin']){
	 			$test_type_counts['clindamycin'] = $row->Sesitive;
	 			$test_type_counts['clindamycin2'] = $row->Intermediate;
	 			$test_type_counts['clindamycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['erythromycin']){
	 			$test_type_counts['erythromycin'] = $row->Sesitive;
	 			$test_type_counts['erythromycin2'] = $row->Intermediate;
	 			$test_type_counts['erythromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nalidixic_acid']){
	 			$test_type_counts['nalidixic_acid'] = $row->Sesitive;
	 			$test_type_counts['nalidixic_acid2'] = $row->Intermediate;
	 			$test_type_counts['nalidixic_acid3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nitrofurantoin']){
	 			$test_type_counts['nitrofurantoin'] = $row->Sesitive;
	 			$test_type_counts['nitrofurantoin2'] = $row->Intermediate;
	 			$test_type_counts['nitrofurantoin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin']){
	 			$test_type_counts['piperacillin'] = $row->Sesitive;
	 			$test_type_counts['piperacillin2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin_tazobactam']){
	 			$test_type_counts['piperacillin_tazobactam'] = $row->Sesitive;
	 			$test_type_counts['piperacillin_tazobactam2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin_tazobactam3'] = $row->Resistant;
	 		}else{
	 			$test_type_counts['tetracycline'] = $row->Sesitive;
	 			$test_type_counts['tetracycline2'] = $row->Intermediate;
	 			$test_type_counts['tetracycline3'] = $row->Resistant;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getVibrioOrganismCounts($month){
		$test_type_ids = $this->getTestTypeIDs('vibrio_organism');
		$rows = $this->getAMRservillence($test_type_ids['organism_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['ampicilin'] = 0;
		$test_type_counts['ampicilin2'] = 0;
		$test_type_counts['ampicilin3'] = 0;
		$test_type_counts['azithromycin'] = 0;
		$test_type_counts['azithromycin2'] = 0;
		$test_type_counts['azithromycin3'] = 0;
		$test_type_counts['amikacin'] = 0;
		$test_type_counts['amikacin2'] = 0;
		$test_type_counts['amikacin3'] = 0;
		$test_type_counts['ceftriaxone'] = 0;
		$test_type_counts['ceftriaxone2'] = 0;
		$test_type_counts['ceftriaxone3'] = 0;
		$test_type_counts['ceftazidime'] = 0;
		$test_type_counts['ceftazidime2'] = 0;
		$test_type_counts['ceftazidime3'] = 0;
		$test_type_counts['cefotaxime'] = 0;
		$test_type_counts['cefotaxime2'] = 0;
		$test_type_counts['cefotaxime3'] = 0;
		$test_type_counts['cefoxitin'] = 0;
		$test_type_counts['cefoxitin2'] = 0;
		$test_type_counts['cefoxitin3'] = 0;
		$test_type_counts['cefixime'] = 0;
		$test_type_counts['cefixime2'] = 0;
		$test_type_counts['cefixime3'] = 0;
		$test_type_counts['cotrimoxazole'] = 0;
		$test_type_counts['cotrimoxazole2'] = 0;
		$test_type_counts['cotrimoxazole3'] = 0;
		$test_type_counts['ciprofloxacin'] = 0;
		$test_type_counts['ciprofloxacin2'] = 0;
		$test_type_counts['ciprofloxacin3'] = 0;
		$test_type_counts['colistin'] = 0;
		$test_type_counts['colistin2'] = 0;
		$test_type_counts['colistin3'] = 0;
		$test_type_counts['gentamicin'] = 0;
		$test_type_counts['gentamicin2'] = 0;
		$test_type_counts['gentamicin3'] = 0;
		$test_type_counts['imipenem'] = 0;
		$test_type_counts['imipenem2'] = 0;
		$test_type_counts['imipenem3'] = 0;
		$test_type_counts['levofloxacin'] = 0;
		$test_type_counts['levofloxacin2'] = 0;
		$test_type_counts['levofloxacin3'] = 0;
		$test_type_counts['meropenem'] = 0;
		$test_type_counts['meropenem2'] = 0;
		$test_type_counts['meropenem3'] = 0;
		$test_type_counts['oxacillin'] = 0;
		$test_type_counts['oxacillin2'] = 0;
		$test_type_counts['oxacillin3'] = 0;
		$test_type_counts['penicillin_g'] = 0;
		$test_type_counts['penicillin_g2'] = 0;
		$test_type_counts['penicillin_g3'] = 0;
		$test_type_counts['vancomycin'] = 0;
		$test_type_counts['vancomycin2'] = 0;
		$test_type_counts['vancomycin3'] = 0;
		$test_type_counts['augmentin'] = 0;
		$test_type_counts['augmentin2'] = 0;
		$test_type_counts['augmentin3'] = 0;
		$test_type_counts['chloramphenicol'] = 0;
		$test_type_counts['chloramphenicol2'] = 0;
		$test_type_counts['chloramphenicol3'] = 0;
		$test_type_counts['clindamycin'] = 0;
		$test_type_counts['clindamycin2'] = 0;
		$test_type_counts['clindamycin3'] = 0;
		$test_type_counts['erythromycin'] = 0;
		$test_type_counts['erythromycin2'] = 0;
		$test_type_counts['erythromycin3'] = 0;
		$test_type_counts['nalidixic_acid'] = 0;
		$test_type_counts['nalidixic_acid2'] = 0;
		$test_type_counts['nalidixic_acid3'] = 0;
		$test_type_counts['nitrofurantoin'] = 0;
		$test_type_counts['nitrofurantoin2'] = 0;
		$test_type_counts['nitrofurantoin3'] = 0;
		$test_type_counts['piperacillin'] = 0;
		$test_type_counts['piperacillin2'] = 0;
		$test_type_counts['piperacillin3'] = 0;
		$test_type_counts['piperacillin_tazobactam'] = 0;
		$test_type_counts['piperacillin_tazobactam2'] = 0;
		$test_type_counts['piperacillin_tazobactam3'] = 0;
		$test_type_counts['tetracycline'] = 0;
		$test_type_counts['tetracycline2'] = 0;
		$test_type_counts['tetracycline3'] = 0;
		$test_type_counts['isolate_number'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->drug_id == $test_type_ids['ampicilin']){
	 			$test_type_counts['ampicilin'] = $row->Sesitive;
	 			$test_type_counts['ampicilin2'] = $row->Intermediate;
	 			$test_type_counts['ampicilin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['azithromycin']){
	 			$test_type_counts['azithromycin'] = $row->Sesitive;
	 			$test_type_counts['azithromycin2'] = $row->Intermediate;
	 			$test_type_counts['azithromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['amikacin']){
	 			$test_type_counts['amikacin'] = $row->Sesitive;
	 			$test_type_counts['amikacin2'] = $row->Intermediate;
	 			$test_type_counts['amikacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftriaxone']){
	 			$test_type_counts['ceftriaxone'] = $row->Sesitive;
	 			$test_type_counts['ceftriaxone2'] = $row->Intermediate;
	 			$test_type_counts['ceftriaxone3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftazidime']){
	 			$test_type_counts['ceftazidime'] = $row->Sesitive;
	 			$test_type_counts['ceftazidime2'] = $row->Intermediate;
	 			$test_type_counts['ceftazidime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefotaxime']){
	 			$test_type_counts['cefotaxime'] = $row->Sesitive;
	 			$test_type_counts['cefotaxime2'] = $row->Intermediate;
	 			$test_type_counts['cefotaxime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cotrimoxazole']){
	 			$test_type_counts['cotrimoxazole'] = $row->Sesitive;
	 			$test_type_counts['cotrimoxazole2'] = $row->Intermediate;
	 			$test_type_counts['cotrimoxazole3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ciprofloxacin']){
	 			$test_type_counts['ciprofloxacin'] = $row->Sesitive;
	 			$test_type_counts['ciprofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['ciprofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['colistin']){
	 			$test_type_counts['colistin'] = $row->Sesitive;
	 			$test_type_counts['colistin2'] = $row->Intermediate;
	 			$test_type_counts['colistin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefixime']){
	 			$test_type_counts['cefixime'] = $row->Sesitive;
	 			$test_type_counts['cefixime2'] = $row->Intermediate;
	 			$test_type_counts['cefixime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefoxitin']){
	 			$test_type_counts['cefoxitin'] = $row->Sesitive;
	 			$test_type_counts['cefoxitin2'] = $row->Intermediate;
	 			$test_type_counts['cefoxitin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['gentamicin']){
	 			$test_type_counts['gentamicin'] = $row->Sesitive;
	 			$test_type_counts['gentamicin2'] = $row->Intermediate;
	 			$test_type_counts['gentamicin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['imipenem']){
	 			$test_type_counts['imipenem'] = $row->Sesitive;
	 			$test_type_counts['imipenem2'] = $row->Intermediate;
	 			$test_type_counts['imipenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['levofloxacin']){
	 			$test_type_counts['levofloxacin'] = $row->Sesitive;
	 			$test_type_counts['levofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['levofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['meropenem']){
	 			$test_type_counts['meropenem'] = $row->Sesitive;
	 			$test_type_counts['meropenem2'] = $row->Intermediate;
	 			$test_type_counts['meropenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['oxacillin']){
	 			$test_type_counts['oxacillin'] = $row->Sesitive;
	 			$test_type_counts['oxacillin2'] = $row->Intermediate;
	 			$test_type_counts['oxacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['penicillin_g']){
	 			$test_type_counts['penicillin_g'] = $row->Sesitive;
	 			$test_type_counts['penicillin_g2'] = $row->Intermediate;
	 			$test_type_counts['penicillin_g3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['vancomycin']){
	 			$test_type_counts['vancomycin'] = $row->Sesitive;
	 			$test_type_counts['vancomycin2'] = $row->Intermediate;
	 			$test_type_counts['vancomycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['augmentin']){
	 			$test_type_counts['augmentin'] = $row->Sesitive;
	 			$test_type_counts['augmentin2'] = $row->Intermediate;
	 			$test_type_counts['augmentin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['chloramphenicol']){
	 			$test_type_counts['chloramphenicol'] = $row->Sesitive;
	 			$test_type_counts['chloramphenicol2'] = $row->Intermediate;
	 			$test_type_counts['chloramphenicol3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['clindamycin']){
	 			$test_type_counts['clindamycin'] = $row->Sesitive;
	 			$test_type_counts['clindamycin2'] = $row->Intermediate;
	 			$test_type_counts['clindamycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['erythromycin']){
	 			$test_type_counts['erythromycin'] = $row->Sesitive;
	 			$test_type_counts['erythromycin2'] = $row->Intermediate;
	 			$test_type_counts['erythromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nalidixic_acid']){
	 			$test_type_counts['nalidixic_acid'] = $row->Sesitive;
	 			$test_type_counts['nalidixic_acid2'] = $row->Intermediate;
	 			$test_type_counts['nalidixic_acid3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nitrofurantoin']){
	 			$test_type_counts['nitrofurantoin'] = $row->Sesitive;
	 			$test_type_counts['nitrofurantoin2'] = $row->Intermediate;
	 			$test_type_counts['nitrofurantoin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin']){
	 			$test_type_counts['piperacillin'] = $row->Sesitive;
	 			$test_type_counts['piperacillin2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin_tazobactam']){
	 			$test_type_counts['piperacillin_tazobactam'] = $row->Sesitive;
	 			$test_type_counts['piperacillin_tazobactam2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin_tazobactam3'] = $row->Resistant;
	 		}else{
	 			$test_type_counts['tetracycline'] = $row->Sesitive;
	 			$test_type_counts['tetracycline2'] = $row->Intermediate;
	 			$test_type_counts['tetracycline3'] = $row->Resistant;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getEnterococcusOrganismCounts($month){
		$test_type_ids = $this->getTestTypeIDs('enterococcus_organism');
		$rows = $this->getAMRservillence($test_type_ids['organism_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['ampicilin'] = 0;
		$test_type_counts['ampicilin2'] = 0;
		$test_type_counts['ampicilin3'] = 0;
		$test_type_counts['azithromycin'] = 0;
		$test_type_counts['azithromycin2'] = 0;
		$test_type_counts['azithromycin3'] = 0;
		$test_type_counts['amikacin'] = 0;
		$test_type_counts['amikacin2'] = 0;
		$test_type_counts['amikacin3'] = 0;
		$test_type_counts['ceftriaxone'] = 0;
		$test_type_counts['ceftriaxone2'] = 0;
		$test_type_counts['ceftriaxone3'] = 0;
		$test_type_counts['ceftazidime'] = 0;
		$test_type_counts['ceftazidime2'] = 0;
		$test_type_counts['ceftazidime3'] = 0;
		$test_type_counts['cefotaxime'] = 0;
		$test_type_counts['cefotaxime2'] = 0;
		$test_type_counts['cefotaxime3'] = 0;
		$test_type_counts['cefoxitin'] = 0;
		$test_type_counts['cefoxitin2'] = 0;
		$test_type_counts['cefoxitin3'] = 0;
		$test_type_counts['cefixime'] = 0;
		$test_type_counts['cefixime2'] = 0;
		$test_type_counts['cefixime3'] = 0;
		$test_type_counts['cotrimoxazole'] = 0;
		$test_type_counts['cotrimoxazole2'] = 0;
		$test_type_counts['cotrimoxazole3'] = 0;
		$test_type_counts['ciprofloxacin'] = 0;
		$test_type_counts['ciprofloxacin2'] = 0;
		$test_type_counts['ciprofloxacin3'] = 0;
		$test_type_counts['colistin'] = 0;
		$test_type_counts['colistin2'] = 0;
		$test_type_counts['colistin3'] = 0;
		$test_type_counts['gentamicin'] = 0;
		$test_type_counts['gentamicin2'] = 0;
		$test_type_counts['gentamicin3'] = 0;
		$test_type_counts['imipenem'] = 0;
		$test_type_counts['imipenem2'] = 0;
		$test_type_counts['imipenem3'] = 0;
		$test_type_counts['levofloxacin'] = 0;
		$test_type_counts['levofloxacin2'] = 0;
		$test_type_counts['levofloxacin3'] = 0;
		$test_type_counts['meropenem'] = 0;
		$test_type_counts['meropenem2'] = 0;
		$test_type_counts['meropenem3'] = 0;
		$test_type_counts['oxacillin'] = 0;
		$test_type_counts['oxacillin2'] = 0;
		$test_type_counts['oxacillin3'] = 0;
		$test_type_counts['penicillin_g'] = 0;
		$test_type_counts['penicillin_g2'] = 0;
		$test_type_counts['penicillin_g3'] = 0;
		$test_type_counts['vancomycin'] = 0;
		$test_type_counts['vancomycin2'] = 0;
		$test_type_counts['vancomycin3'] = 0;
		$test_type_counts['augmentin'] = 0;
		$test_type_counts['augmentin2'] = 0;
		$test_type_counts['augmentin3'] = 0;
		$test_type_counts['chloramphenicol'] = 0;
		$test_type_counts['chloramphenicol2'] = 0;
		$test_type_counts['chloramphenicol3'] = 0;
		$test_type_counts['clindamycin'] = 0;
		$test_type_counts['clindamycin2'] = 0;
		$test_type_counts['clindamycin3'] = 0;
		$test_type_counts['erythromycin'] = 0;
		$test_type_counts['erythromycin2'] = 0;
		$test_type_counts['erythromycin3'] = 0;
		$test_type_counts['nalidixic_acid'] = 0;
		$test_type_counts['nalidixic_acid2'] = 0;
		$test_type_counts['nalidixic_acid3'] = 0;
		$test_type_counts['nitrofurantoin'] = 0;
		$test_type_counts['nitrofurantoin2'] = 0;
		$test_type_counts['nitrofurantoin3'] = 0;
		$test_type_counts['piperacillin'] = 0;
		$test_type_counts['piperacillin2'] = 0;
		$test_type_counts['piperacillin3'] = 0;
		$test_type_counts['piperacillin_tazobactam'] = 0;
		$test_type_counts['piperacillin_tazobactam2'] = 0;
		$test_type_counts['piperacillin_tazobactam3'] = 0;
		$test_type_counts['tetracycline'] = 0;
		$test_type_counts['tetracycline2'] = 0;
		$test_type_counts['tetracycline3'] = 0;
		$test_type_counts['isolate_number'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->drug_id == $test_type_ids['ampicilin']){
	 			$test_type_counts['ampicilin'] = $row->Sesitive;
	 			$test_type_counts['ampicilin2'] = $row->Intermediate;
	 			$test_type_counts['ampicilin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['azithromycin']){
	 			$test_type_counts['azithromycin'] = $row->Sesitive;
	 			$test_type_counts['azithromycin2'] = $row->Intermediate;
	 			$test_type_counts['azithromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['amikacin']){
	 			$test_type_counts['amikacin'] = $row->Sesitive;
	 			$test_type_counts['amikacin2'] = $row->Intermediate;
	 			$test_type_counts['amikacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftriaxone']){
	 			$test_type_counts['ceftriaxone'] = $row->Sesitive;
	 			$test_type_counts['ceftriaxone2'] = $row->Intermediate;
	 			$test_type_counts['ceftriaxone3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftazidime']){
	 			$test_type_counts['ceftazidime'] = $row->Sesitive;
	 			$test_type_counts['ceftazidime2'] = $row->Intermediate;
	 			$test_type_counts['ceftazidime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefotaxime']){
	 			$test_type_counts['cefotaxime'] = $row->Sesitive;
	 			$test_type_counts['cefotaxime2'] = $row->Intermediate;
	 			$test_type_counts['cefotaxime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cotrimoxazole']){
	 			$test_type_counts['cotrimoxazole'] = $row->Sesitive;
	 			$test_type_counts['cotrimoxazole2'] = $row->Intermediate;
	 			$test_type_counts['cotrimoxazole3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ciprofloxacin']){
	 			$test_type_counts['ciprofloxacin'] = $row->Sesitive;
	 			$test_type_counts['ciprofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['ciprofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['colistin']){
	 			$test_type_counts['colistin'] = $row->Sesitive;
	 			$test_type_counts['colistin2'] = $row->Intermediate;
	 			$test_type_counts['colistin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefixime']){
	 			$test_type_counts['cefixime'] = $row->Sesitive;
	 			$test_type_counts['cefixime2'] = $row->Intermediate;
	 			$test_type_counts['cefixime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefoxitin']){
	 			$test_type_counts['cefoxitin'] = $row->Sesitive;
	 			$test_type_counts['cefoxitin2'] = $row->Intermediate;
	 			$test_type_counts['cefoxitin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['gentamicin']){
	 			$test_type_counts['gentamicin'] = $row->Sesitive;
	 			$test_type_counts['gentamicin2'] = $row->Intermediate;
	 			$test_type_counts['gentamicin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['imipenem']){
	 			$test_type_counts['imipenem'] = $row->Sesitive;
	 			$test_type_counts['imipenem2'] = $row->Intermediate;
	 			$test_type_counts['imipenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['levofloxacin']){
	 			$test_type_counts['levofloxacin'] = $row->Sesitive;
	 			$test_type_counts['levofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['levofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['meropenem']){
	 			$test_type_counts['meropenem'] = $row->Sesitive;
	 			$test_type_counts['meropenem2'] = $row->Intermediate;
	 			$test_type_counts['meropenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['oxacillin']){
	 			$test_type_counts['oxacillin'] = $row->Sesitive;
	 			$test_type_counts['oxacillin2'] = $row->Intermediate;
	 			$test_type_counts['oxacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['penicillin_g']){
	 			$test_type_counts['penicillin_g'] = $row->Sesitive;
	 			$test_type_counts['penicillin_g2'] = $row->Intermediate;
	 			$test_type_counts['penicillin_g3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['vancomycin']){
	 			$test_type_counts['vancomycin'] = $row->Sesitive;
	 			$test_type_counts['vancomycin2'] = $row->Intermediate;
	 			$test_type_counts['vancomycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['augmentin']){
	 			$test_type_counts['augmentin'] = $row->Sesitive;
	 			$test_type_counts['augmentin2'] = $row->Intermediate;
	 			$test_type_counts['augmentin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['chloramphenicol']){
	 			$test_type_counts['chloramphenicol'] = $row->Sesitive;
	 			$test_type_counts['chloramphenicol2'] = $row->Intermediate;
	 			$test_type_counts['chloramphenicol3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['clindamycin']){
	 			$test_type_counts['clindamycin'] = $row->Sesitive;
	 			$test_type_counts['clindamycin2'] = $row->Intermediate;
	 			$test_type_counts['clindamycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['erythromycin']){
	 			$test_type_counts['erythromycin'] = $row->Sesitive;
	 			$test_type_counts['erythromycin2'] = $row->Intermediate;
	 			$test_type_counts['erythromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nalidixic_acid']){
	 			$test_type_counts['nalidixic_acid'] = $row->Sesitive;
	 			$test_type_counts['nalidixic_acid2'] = $row->Intermediate;
	 			$test_type_counts['nalidixic_acid3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nitrofurantoin']){
	 			$test_type_counts['nitrofurantoin'] = $row->Sesitive;
	 			$test_type_counts['nitrofurantoin2'] = $row->Intermediate;
	 			$test_type_counts['nitrofurantoin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin']){
	 			$test_type_counts['piperacillin'] = $row->Sesitive;
	 			$test_type_counts['piperacillin2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin_tazobactam']){
	 			$test_type_counts['piperacillin_tazobactam'] = $row->Sesitive;
	 			$test_type_counts['piperacillin_tazobactam2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin_tazobactam3'] = $row->Resistant;
	 		}else{
	 			$test_type_counts['tetracycline'] = $row->Sesitive;
	 			$test_type_counts['tetracycline2'] = $row->Intermediate;
	 			$test_type_counts['tetracycline3'] = $row->Resistant;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getHaemophilusOrganismCounts($month){
		$test_type_ids = $this->getTestTypeIDs('haemophilus_organism');
		$rows = $this->getAMRservillence($test_type_ids['organism_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['ampicilin'] = 0;
		$test_type_counts['ampicilin2'] = 0;
		$test_type_counts['ampicilin3'] = 0;
		$test_type_counts['azithromycin'] = 0;
		$test_type_counts['azithromycin2'] = 0;
		$test_type_counts['azithromycin3'] = 0;
		$test_type_counts['amikacin'] = 0;
		$test_type_counts['amikacin2'] = 0;
		$test_type_counts['amikacin3'] = 0;
		$test_type_counts['ceftriaxone'] = 0;
		$test_type_counts['ceftriaxone2'] = 0;
		$test_type_counts['ceftriaxone3'] = 0;
		$test_type_counts['ceftazidime'] = 0;
		$test_type_counts['ceftazidime2'] = 0;
		$test_type_counts['ceftazidime3'] = 0;
		$test_type_counts['cefotaxime'] = 0;
		$test_type_counts['cefotaxime2'] = 0;
		$test_type_counts['cefotaxime3'] = 0;
		$test_type_counts['cefoxitin'] = 0;
		$test_type_counts['cefoxitin2'] = 0;
		$test_type_counts['cefoxitin3'] = 0;
		$test_type_counts['cefixime'] = 0;
		$test_type_counts['cefixime2'] = 0;
		$test_type_counts['cefixime3'] = 0;
		$test_type_counts['cotrimoxazole'] = 0;
		$test_type_counts['cotrimoxazole2'] = 0;
		$test_type_counts['cotrimoxazole3'] = 0;
		$test_type_counts['ciprofloxacin'] = 0;
		$test_type_counts['ciprofloxacin2'] = 0;
		$test_type_counts['ciprofloxacin3'] = 0;
		$test_type_counts['colistin'] = 0;
		$test_type_counts['colistin2'] = 0;
		$test_type_counts['colistin3'] = 0;
		$test_type_counts['gentamicin'] = 0;
		$test_type_counts['gentamicin2'] = 0;
		$test_type_counts['gentamicin3'] = 0;
		$test_type_counts['imipenem'] = 0;
		$test_type_counts['imipenem2'] = 0;
		$test_type_counts['imipenem3'] = 0;
		$test_type_counts['levofloxacin'] = 0;
		$test_type_counts['levofloxacin2'] = 0;
		$test_type_counts['levofloxacin3'] = 0;
		$test_type_counts['meropenem'] = 0;
		$test_type_counts['meropenem2'] = 0;
		$test_type_counts['meropenem3'] = 0;
		$test_type_counts['oxacillin'] = 0;
		$test_type_counts['oxacillin2'] = 0;
		$test_type_counts['oxacillin3'] = 0;
		$test_type_counts['penicillin_g'] = 0;
		$test_type_counts['penicillin_g2'] = 0;
		$test_type_counts['penicillin_g3'] = 0;
		$test_type_counts['vancomycin'] = 0;
		$test_type_counts['vancomycin2'] = 0;
		$test_type_counts['vancomycin3'] = 0;
		$test_type_counts['augmentin'] = 0;
		$test_type_counts['augmentin2'] = 0;
		$test_type_counts['augmentin3'] = 0;
		$test_type_counts['chloramphenicol'] = 0;
		$test_type_counts['chloramphenicol2'] = 0;
		$test_type_counts['chloramphenicol3'] = 0;
		$test_type_counts['clindamycin'] = 0;
		$test_type_counts['clindamycin2'] = 0;
		$test_type_counts['clindamycin3'] = 0;
		$test_type_counts['erythromycin'] = 0;
		$test_type_counts['erythromycin2'] = 0;
		$test_type_counts['erythromycin3'] = 0;
		$test_type_counts['nalidixic_acid'] = 0;
		$test_type_counts['nalidixic_acid2'] = 0;
		$test_type_counts['nalidixic_acid3'] = 0;
		$test_type_counts['nitrofurantoin'] = 0;
		$test_type_counts['nitrofurantoin2'] = 0;
		$test_type_counts['nitrofurantoin3'] = 0;
		$test_type_counts['piperacillin'] = 0;
		$test_type_counts['piperacillin2'] = 0;
		$test_type_counts['piperacillin3'] = 0;
		$test_type_counts['piperacillin_tazobactam'] = 0;
		$test_type_counts['piperacillin_tazobactam2'] = 0;
		$test_type_counts['piperacillin_tazobactam3'] = 0;
		$test_type_counts['tetracycline'] = 0;
		$test_type_counts['tetracycline2'] = 0;
		$test_type_counts['tetracycline3'] = 0;
		$test_type_counts['isolate_number'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->drug_id == $test_type_ids['ampicilin']){
	 			$test_type_counts['ampicilin'] = $row->Sesitive;
	 			$test_type_counts['ampicilin2'] = $row->Intermediate;
	 			$test_type_counts['ampicilin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['azithromycin']){
	 			$test_type_counts['azithromycin'] = $row->Sesitive;
	 			$test_type_counts['azithromycin2'] = $row->Intermediate;
	 			$test_type_counts['azithromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['amikacin']){
	 			$test_type_counts['amikacin'] = $row->Sesitive;
	 			$test_type_counts['amikacin2'] = $row->Intermediate;
	 			$test_type_counts['amikacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftriaxone']){
	 			$test_type_counts['ceftriaxone'] = $row->Sesitive;
	 			$test_type_counts['ceftriaxone2'] = $row->Intermediate;
	 			$test_type_counts['ceftriaxone3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftazidime']){
	 			$test_type_counts['ceftazidime'] = $row->Sesitive;
	 			$test_type_counts['ceftazidime2'] = $row->Intermediate;
	 			$test_type_counts['ceftazidime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefotaxime']){
	 			$test_type_counts['cefotaxime'] = $row->Sesitive;
	 			$test_type_counts['cefotaxime2'] = $row->Intermediate;
	 			$test_type_counts['cefotaxime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cotrimoxazole']){
	 			$test_type_counts['cotrimoxazole'] = $row->Sesitive;
	 			$test_type_counts['cotrimoxazole2'] = $row->Intermediate;
	 			$test_type_counts['cotrimoxazole3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ciprofloxacin']){
	 			$test_type_counts['ciprofloxacin'] = $row->Sesitive;
	 			$test_type_counts['ciprofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['ciprofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['colistin']){
	 			$test_type_counts['colistin'] = $row->Sesitive;
	 			$test_type_counts['colistin2'] = $row->Intermediate;
	 			$test_type_counts['colistin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefixime']){
	 			$test_type_counts['cefixime'] = $row->Sesitive;
	 			$test_type_counts['cefixime2'] = $row->Intermediate;
	 			$test_type_counts['cefixime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefoxitin']){
	 			$test_type_counts['cefoxitin'] = $row->Sesitive;
	 			$test_type_counts['cefoxitin2'] = $row->Intermediate;
	 			$test_type_counts['cefoxitin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['gentamicin']){
	 			$test_type_counts['gentamicin'] = $row->Sesitive;
	 			$test_type_counts['gentamicin2'] = $row->Intermediate;
	 			$test_type_counts['gentamicin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['imipenem']){
	 			$test_type_counts['imipenem'] = $row->Sesitive;
	 			$test_type_counts['imipenem2'] = $row->Intermediate;
	 			$test_type_counts['imipenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['levofloxacin']){
	 			$test_type_counts['levofloxacin'] = $row->Sesitive;
	 			$test_type_counts['levofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['levofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['meropenem']){
	 			$test_type_counts['meropenem'] = $row->Sesitive;
	 			$test_type_counts['meropenem2'] = $row->Intermediate;
	 			$test_type_counts['meropenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['oxacillin']){
	 			$test_type_counts['oxacillin'] = $row->Sesitive;
	 			$test_type_counts['oxacillin2'] = $row->Intermediate;
	 			$test_type_counts['oxacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['penicillin_g']){
	 			$test_type_counts['penicillin_g'] = $row->Sesitive;
	 			$test_type_counts['penicillin_g2'] = $row->Intermediate;
	 			$test_type_counts['penicillin_g3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['vancomycin']){
	 			$test_type_counts['vancomycin'] = $row->Sesitive;
	 			$test_type_counts['vancomycin2'] = $row->Intermediate;
	 			$test_type_counts['vancomycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['augmentin']){
	 			$test_type_counts['augmentin'] = $row->Sesitive;
	 			$test_type_counts['augmentin2'] = $row->Intermediate;
	 			$test_type_counts['augmentin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['chloramphenicol']){
	 			$test_type_counts['chloramphenicol'] = $row->Sesitive;
	 			$test_type_counts['chloramphenicol2'] = $row->Intermediate;
	 			$test_type_counts['chloramphenicol3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['clindamycin']){
	 			$test_type_counts['clindamycin'] = $row->Sesitive;
	 			$test_type_counts['clindamycin2'] = $row->Intermediate;
	 			$test_type_counts['clindamycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['erythromycin']){
	 			$test_type_counts['erythromycin'] = $row->Sesitive;
	 			$test_type_counts['erythromycin2'] = $row->Intermediate;
	 			$test_type_counts['erythromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nalidixic_acid']){
	 			$test_type_counts['nalidixic_acid'] = $row->Sesitive;
	 			$test_type_counts['nalidixic_acid2'] = $row->Intermediate;
	 			$test_type_counts['nalidixic_acid3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nitrofurantoin']){
	 			$test_type_counts['nitrofurantoin'] = $row->Sesitive;
	 			$test_type_counts['nitrofurantoin2'] = $row->Intermediate;
	 			$test_type_counts['nitrofurantoin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin']){
	 			$test_type_counts['piperacillin'] = $row->Sesitive;
	 			$test_type_counts['piperacillin2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin_tazobactam']){
	 			$test_type_counts['piperacillin_tazobactam'] = $row->Sesitive;
	 			$test_type_counts['piperacillin_tazobactam2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin_tazobactam3'] = $row->Resistant;
	 		}else{
	 			$test_type_counts['tetracycline'] = $row->Sesitive;
	 			$test_type_counts['tetracycline2'] = $row->Intermediate;
	 			$test_type_counts['tetracycline3'] = $row->Resistant;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getNeisseriamOrganismCounts($month){
		$test_type_ids = $this->getTestTypeIDs('neisseriam_organism');
		$rows = $this->getAMRservillence($test_type_ids['organism_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['ampicilin'] = 0;
		$test_type_counts['ampicilin2'] = 0;
		$test_type_counts['ampicilin3'] = 0;
		$test_type_counts['azithromycin'] = 0;
		$test_type_counts['azithromycin2'] = 0;
		$test_type_counts['azithromycin3'] = 0;
		$test_type_counts['amikacin'] = 0;
		$test_type_counts['amikacin2'] = 0;
		$test_type_counts['amikacin3'] = 0;
		$test_type_counts['ceftriaxone'] = 0;
		$test_type_counts['ceftriaxone2'] = 0;
		$test_type_counts['ceftriaxone3'] = 0;
		$test_type_counts['ceftazidime'] = 0;
		$test_type_counts['ceftazidime2'] = 0;
		$test_type_counts['ceftazidime3'] = 0;
		$test_type_counts['cefotaxime'] = 0;
		$test_type_counts['cefotaxime2'] = 0;
		$test_type_counts['cefotaxime3'] = 0;
		$test_type_counts['cefoxitin'] = 0;
		$test_type_counts['cefoxitin2'] = 0;
		$test_type_counts['cefoxitin3'] = 0;
		$test_type_counts['cefixime'] = 0;
		$test_type_counts['cefixime2'] = 0;
		$test_type_counts['cefixime3'] = 0;
		$test_type_counts['cotrimoxazole'] = 0;
		$test_type_counts['cotrimoxazole2'] = 0;
		$test_type_counts['cotrimoxazole3'] = 0;
		$test_type_counts['ciprofloxacin'] = 0;
		$test_type_counts['ciprofloxacin2'] = 0;
		$test_type_counts['ciprofloxacin3'] = 0;
		$test_type_counts['colistin'] = 0;
		$test_type_counts['colistin2'] = 0;
		$test_type_counts['colistin3'] = 0;
		$test_type_counts['gentamicin'] = 0;
		$test_type_counts['gentamicin2'] = 0;
		$test_type_counts['gentamicin3'] = 0;
		$test_type_counts['imipenem'] = 0;
		$test_type_counts['imipenem2'] = 0;
		$test_type_counts['imipenem3'] = 0;
		$test_type_counts['levofloxacin'] = 0;
		$test_type_counts['levofloxacin2'] = 0;
		$test_type_counts['levofloxacin3'] = 0;
		$test_type_counts['meropenem'] = 0;
		$test_type_counts['meropenem2'] = 0;
		$test_type_counts['meropenem3'] = 0;
		$test_type_counts['oxacillin'] = 0;
		$test_type_counts['oxacillin2'] = 0;
		$test_type_counts['oxacillin3'] = 0;
		$test_type_counts['penicillin_g'] = 0;
		$test_type_counts['penicillin_g2'] = 0;
		$test_type_counts['penicillin_g3'] = 0;
		$test_type_counts['vancomycin'] = 0;
		$test_type_counts['vancomycin2'] = 0;
		$test_type_counts['vancomycin3'] = 0;
		$test_type_counts['augmentin'] = 0;
		$test_type_counts['augmentin2'] = 0;
		$test_type_counts['augmentin3'] = 0;
		$test_type_counts['chloramphenicol'] = 0;
		$test_type_counts['chloramphenicol2'] = 0;
		$test_type_counts['chloramphenicol3'] = 0;
		$test_type_counts['clindamycin'] = 0;
		$test_type_counts['clindamycin2'] = 0;
		$test_type_counts['clindamycin3'] = 0;
		$test_type_counts['erythromycin'] = 0;
		$test_type_counts['erythromycin2'] = 0;
		$test_type_counts['erythromycin3'] = 0;
		$test_type_counts['nalidixic_acid'] = 0;
		$test_type_counts['nalidixic_acid2'] = 0;
		$test_type_counts['nalidixic_acid3'] = 0;
		$test_type_counts['nitrofurantoin'] = 0;
		$test_type_counts['nitrofurantoin2'] = 0;
		$test_type_counts['nitrofurantoin3'] = 0;
		$test_type_counts['piperacillin'] = 0;
		$test_type_counts['piperacillin2'] = 0;
		$test_type_counts['piperacillin3'] = 0;
		$test_type_counts['piperacillin_tazobactam'] = 0;
		$test_type_counts['piperacillin_tazobactam2'] = 0;
		$test_type_counts['piperacillin_tazobactam3'] = 0;
		$test_type_counts['tetracycline'] = 0;
		$test_type_counts['tetracycline2'] = 0;
		$test_type_counts['tetracycline3'] = 0;
		$test_type_counts['isolate_number'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->drug_id == $test_type_ids['ampicilin']){
	 			$test_type_counts['ampicilin'] = $row->Sesitive;
	 			$test_type_counts['ampicilin2'] = $row->Intermediate;
	 			$test_type_counts['ampicilin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['azithromycin']){
	 			$test_type_counts['azithromycin'] = $row->Sesitive;
	 			$test_type_counts['azithromycin2'] = $row->Intermediate;
	 			$test_type_counts['azithromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['amikacin']){
	 			$test_type_counts['amikacin'] = $row->Sesitive;
	 			$test_type_counts['amikacin2'] = $row->Intermediate;
	 			$test_type_counts['amikacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftriaxone']){
	 			$test_type_counts['ceftriaxone'] = $row->Sesitive;
	 			$test_type_counts['ceftriaxone2'] = $row->Intermediate;
	 			$test_type_counts['ceftriaxone3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftazidime']){
	 			$test_type_counts['ceftazidime'] = $row->Sesitive;
	 			$test_type_counts['ceftazidime2'] = $row->Intermediate;
	 			$test_type_counts['ceftazidime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefotaxime']){
	 			$test_type_counts['cefotaxime'] = $row->Sesitive;
	 			$test_type_counts['cefotaxime2'] = $row->Intermediate;
	 			$test_type_counts['cefotaxime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cotrimoxazole']){
	 			$test_type_counts['cotrimoxazole'] = $row->Sesitive;
	 			$test_type_counts['cotrimoxazole2'] = $row->Intermediate;
	 			$test_type_counts['cotrimoxazole3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ciprofloxacin']){
	 			$test_type_counts['ciprofloxacin'] = $row->Sesitive;
	 			$test_type_counts['ciprofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['ciprofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['colistin']){
	 			$test_type_counts['colistin'] = $row->Sesitive;
	 			$test_type_counts['colistin2'] = $row->Intermediate;
	 			$test_type_counts['colistin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefixime']){
	 			$test_type_counts['cefixime'] = $row->Sesitive;
	 			$test_type_counts['cefixime2'] = $row->Intermediate;
	 			$test_type_counts['cefixime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefoxitin']){
	 			$test_type_counts['cefoxitin'] = $row->Sesitive;
	 			$test_type_counts['cefoxitin2'] = $row->Intermediate;
	 			$test_type_counts['cefoxitin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['gentamicin']){
	 			$test_type_counts['gentamicin'] = $row->Sesitive;
	 			$test_type_counts['gentamicin2'] = $row->Intermediate;
	 			$test_type_counts['gentamicin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['imipenem']){
	 			$test_type_counts['imipenem'] = $row->Sesitive;
	 			$test_type_counts['imipenem2'] = $row->Intermediate;
	 			$test_type_counts['imipenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['levofloxacin']){
	 			$test_type_counts['levofloxacin'] = $row->Sesitive;
	 			$test_type_counts['levofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['levofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['meropenem']){
	 			$test_type_counts['meropenem'] = $row->Sesitive;
	 			$test_type_counts['meropenem2'] = $row->Intermediate;
	 			$test_type_counts['meropenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['oxacillin']){
	 			$test_type_counts['oxacillin'] = $row->Sesitive;
	 			$test_type_counts['oxacillin2'] = $row->Intermediate;
	 			$test_type_counts['oxacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['penicillin_g']){
	 			$test_type_counts['penicillin_g'] = $row->Sesitive;
	 			$test_type_counts['penicillin_g2'] = $row->Intermediate;
	 			$test_type_counts['penicillin_g3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['vancomycin']){
	 			$test_type_counts['vancomycin'] = $row->Sesitive;
	 			$test_type_counts['vancomycin2'] = $row->Intermediate;
	 			$test_type_counts['vancomycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['augmentin']){
	 			$test_type_counts['augmentin'] = $row->Sesitive;
	 			$test_type_counts['augmentin2'] = $row->Intermediate;
	 			$test_type_counts['augmentin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['chloramphenicol']){
	 			$test_type_counts['chloramphenicol'] = $row->Sesitive;
	 			$test_type_counts['chloramphenicol2'] = $row->Intermediate;
	 			$test_type_counts['chloramphenicol3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['clindamycin']){
	 			$test_type_counts['clindamycin'] = $row->Sesitive;
	 			$test_type_counts['clindamycin2'] = $row->Intermediate;
	 			$test_type_counts['clindamycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['erythromycin']){
	 			$test_type_counts['erythromycin'] = $row->Sesitive;
	 			$test_type_counts['erythromycin2'] = $row->Intermediate;
	 			$test_type_counts['erythromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nalidixic_acid']){
	 			$test_type_counts['nalidixic_acid'] = $row->Sesitive;
	 			$test_type_counts['nalidixic_acid2'] = $row->Intermediate;
	 			$test_type_counts['nalidixic_acid3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nitrofurantoin']){
	 			$test_type_counts['nitrofurantoin'] = $row->Sesitive;
	 			$test_type_counts['nitrofurantoin2'] = $row->Intermediate;
	 			$test_type_counts['nitrofurantoin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin']){
	 			$test_type_counts['piperacillin'] = $row->Sesitive;
	 			$test_type_counts['piperacillin2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin_tazobactam']){
	 			$test_type_counts['piperacillin_tazobactam'] = $row->Sesitive;
	 			$test_type_counts['piperacillin_tazobactam2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin_tazobactam3'] = $row->Resistant;
	 		}else{
	 			$test_type_counts['tetracycline'] = $row->Sesitive;
	 			$test_type_counts['tetracycline2'] = $row->Intermediate;
	 			$test_type_counts['tetracycline3'] = $row->Resistant;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getCampylobacterOrganismCounts($month){
		$test_type_ids = $this->getTestTypeIDs('campylobacter_organism');
		$rows = $this->getAMRservillence($test_type_ids['organism_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['ampicilin'] = 0;
		$test_type_counts['ampicilin2'] = 0;
		$test_type_counts['ampicilin3'] = 0;
		$test_type_counts['azithromycin'] = 0;
		$test_type_counts['azithromycin2'] = 0;
		$test_type_counts['azithromycin3'] = 0;
		$test_type_counts['amikacin'] = 0;
		$test_type_counts['amikacin2'] = 0;
		$test_type_counts['amikacin3'] = 0;
		$test_type_counts['ceftriaxone'] = 0;
		$test_type_counts['ceftriaxone2'] = 0;
		$test_type_counts['ceftriaxone3'] = 0;
		$test_type_counts['ceftazidime'] = 0;
		$test_type_counts['ceftazidime2'] = 0;
		$test_type_counts['ceftazidime3'] = 0;
		$test_type_counts['cefotaxime'] = 0;
		$test_type_counts['cefotaxime2'] = 0;
		$test_type_counts['cefotaxime3'] = 0;
		$test_type_counts['cefoxitin'] = 0;
		$test_type_counts['cefoxitin2'] = 0;
		$test_type_counts['cefoxitin3'] = 0;
		$test_type_counts['cefixime'] = 0;
		$test_type_counts['cefixime2'] = 0;
		$test_type_counts['cefixime3'] = 0;
		$test_type_counts['cotrimoxazole'] = 0;
		$test_type_counts['cotrimoxazole2'] = 0;
		$test_type_counts['cotrimoxazole3'] = 0;
		$test_type_counts['ciprofloxacin'] = 0;
		$test_type_counts['ciprofloxacin2'] = 0;
		$test_type_counts['ciprofloxacin3'] = 0;
		$test_type_counts['colistin'] = 0;
		$test_type_counts['colistin2'] = 0;
		$test_type_counts['colistin3'] = 0;
		$test_type_counts['gentamicin'] = 0;
		$test_type_counts['gentamicin2'] = 0;
		$test_type_counts['gentamicin3'] = 0;
		$test_type_counts['imipenem'] = 0;
		$test_type_counts['imipenem2'] = 0;
		$test_type_counts['imipenem3'] = 0;
		$test_type_counts['levofloxacin'] = 0;
		$test_type_counts['levofloxacin2'] = 0;
		$test_type_counts['levofloxacin3'] = 0;
		$test_type_counts['meropenem'] = 0;
		$test_type_counts['meropenem2'] = 0;
		$test_type_counts['meropenem3'] = 0;
		$test_type_counts['oxacillin'] = 0;
		$test_type_counts['oxacillin2'] = 0;
		$test_type_counts['oxacillin3'] = 0;
		$test_type_counts['penicillin_g'] = 0;
		$test_type_counts['penicillin_g2'] = 0;
		$test_type_counts['penicillin_g3'] = 0;
		$test_type_counts['vancomycin'] = 0;
		$test_type_counts['vancomycin2'] = 0;
		$test_type_counts['vancomycin3'] = 0;
		$test_type_counts['augmentin'] = 0;
		$test_type_counts['augmentin2'] = 0;
		$test_type_counts['augmentin3'] = 0;
		$test_type_counts['chloramphenicol'] = 0;
		$test_type_counts['chloramphenicol2'] = 0;
		$test_type_counts['chloramphenicol3'] = 0;
		$test_type_counts['clindamycin'] = 0;
		$test_type_counts['clindamycin2'] = 0;
		$test_type_counts['clindamycin3'] = 0;
		$test_type_counts['erythromycin'] = 0;
		$test_type_counts['erythromycin2'] = 0;
		$test_type_counts['erythromycin3'] = 0;
		$test_type_counts['nalidixic_acid'] = 0;
		$test_type_counts['nalidixic_acid2'] = 0;
		$test_type_counts['nalidixic_acid3'] = 0;
		$test_type_counts['nitrofurantoin'] = 0;
		$test_type_counts['nitrofurantoin2'] = 0;
		$test_type_counts['nitrofurantoin3'] = 0;
		$test_type_counts['piperacillin'] = 0;
		$test_type_counts['piperacillin2'] = 0;
		$test_type_counts['piperacillin3'] = 0;
		$test_type_counts['piperacillin_tazobactam'] = 0;
		$test_type_counts['piperacillin_tazobactam2'] = 0;
		$test_type_counts['piperacillin_tazobactam3'] = 0;
		$test_type_counts['tetracycline'] = 0;
		$test_type_counts['tetracycline2'] = 0;
		$test_type_counts['tetracycline3'] = 0;
		$test_type_counts['isolate_number'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->drug_id == $test_type_ids['ampicilin']){
	 			$test_type_counts['ampicilin'] = $row->Sesitive;
	 			$test_type_counts['ampicilin2'] = $row->Intermediate;
	 			$test_type_counts['ampicilin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['azithromycin']){
	 			$test_type_counts['azithromycin'] = $row->Sesitive;
	 			$test_type_counts['azithromycin2'] = $row->Intermediate;
	 			$test_type_counts['azithromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['amikacin']){
	 			$test_type_counts['amikacin'] = $row->Sesitive;
	 			$test_type_counts['amikacin2'] = $row->Intermediate;
	 			$test_type_counts['amikacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftriaxone']){
	 			$test_type_counts['ceftriaxone'] = $row->Sesitive;
	 			$test_type_counts['ceftriaxone2'] = $row->Intermediate;
	 			$test_type_counts['ceftriaxone3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftazidime']){
	 			$test_type_counts['ceftazidime'] = $row->Sesitive;
	 			$test_type_counts['ceftazidime2'] = $row->Intermediate;
	 			$test_type_counts['ceftazidime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefotaxime']){
	 			$test_type_counts['cefotaxime'] = $row->Sesitive;
	 			$test_type_counts['cefotaxime2'] = $row->Intermediate;
	 			$test_type_counts['cefotaxime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cotrimoxazole']){
	 			$test_type_counts['cotrimoxazole'] = $row->Sesitive;
	 			$test_type_counts['cotrimoxazole2'] = $row->Intermediate;
	 			$test_type_counts['cotrimoxazole3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ciprofloxacin']){
	 			$test_type_counts['ciprofloxacin'] = $row->Sesitive;
	 			$test_type_counts['ciprofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['ciprofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['colistin']){
	 			$test_type_counts['colistin'] = $row->Sesitive;
	 			$test_type_counts['colistin2'] = $row->Intermediate;
	 			$test_type_counts['colistin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefixime']){
	 			$test_type_counts['cefixime'] = $row->Sesitive;
	 			$test_type_counts['cefixime2'] = $row->Intermediate;
	 			$test_type_counts['cefixime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefoxitin']){
	 			$test_type_counts['cefoxitin'] = $row->Sesitive;
	 			$test_type_counts['cefoxitin2'] = $row->Intermediate;
	 			$test_type_counts['cefoxitin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['gentamicin']){
	 			$test_type_counts['gentamicin'] = $row->Sesitive;
	 			$test_type_counts['gentamicin2'] = $row->Intermediate;
	 			$test_type_counts['gentamicin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['imipenem']){
	 			$test_type_counts['imipenem'] = $row->Sesitive;
	 			$test_type_counts['imipenem2'] = $row->Intermediate;
	 			$test_type_counts['imipenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['levofloxacin']){
	 			$test_type_counts['levofloxacin'] = $row->Sesitive;
	 			$test_type_counts['levofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['levofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['meropenem']){
	 			$test_type_counts['meropenem'] = $row->Sesitive;
	 			$test_type_counts['meropenem2'] = $row->Intermediate;
	 			$test_type_counts['meropenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['oxacillin']){
	 			$test_type_counts['oxacillin'] = $row->Sesitive;
	 			$test_type_counts['oxacillin2'] = $row->Intermediate;
	 			$test_type_counts['oxacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['penicillin_g']){
	 			$test_type_counts['penicillin_g'] = $row->Sesitive;
	 			$test_type_counts['penicillin_g2'] = $row->Intermediate;
	 			$test_type_counts['penicillin_g3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['vancomycin']){
	 			$test_type_counts['vancomycin'] = $row->Sesitive;
	 			$test_type_counts['vancomycin2'] = $row->Intermediate;
	 			$test_type_counts['vancomycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['augmentin']){
	 			$test_type_counts['augmentin'] = $row->Sesitive;
	 			$test_type_counts['augmentin2'] = $row->Intermediate;
	 			$test_type_counts['augmentin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['chloramphenicol']){
	 			$test_type_counts['chloramphenicol'] = $row->Sesitive;
	 			$test_type_counts['chloramphenicol2'] = $row->Intermediate;
	 			$test_type_counts['chloramphenicol3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['clindamycin']){
	 			$test_type_counts['clindamycin'] = $row->Sesitive;
	 			$test_type_counts['clindamycin2'] = $row->Intermediate;
	 			$test_type_counts['clindamycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['erythromycin']){
	 			$test_type_counts['erythromycin'] = $row->Sesitive;
	 			$test_type_counts['erythromycin2'] = $row->Intermediate;
	 			$test_type_counts['erythromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nalidixic_acid']){
	 			$test_type_counts['nalidixic_acid'] = $row->Sesitive;
	 			$test_type_counts['nalidixic_acid2'] = $row->Intermediate;
	 			$test_type_counts['nalidixic_acid3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nitrofurantoin']){
	 			$test_type_counts['nitrofurantoin'] = $row->Sesitive;
	 			$test_type_counts['nitrofurantoin2'] = $row->Intermediate;
	 			$test_type_counts['nitrofurantoin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin']){
	 			$test_type_counts['piperacillin'] = $row->Sesitive;
	 			$test_type_counts['piperacillin2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin_tazobactam']){
	 			$test_type_counts['piperacillin_tazobactam'] = $row->Sesitive;
	 			$test_type_counts['piperacillin_tazobactam2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin_tazobactam3'] = $row->Resistant;
	 		}else{
	 			$test_type_counts['tetracycline'] = $row->Sesitive;
	 			$test_type_counts['tetracycline2'] = $row->Intermediate;
	 			$test_type_counts['tetracycline3'] = $row->Resistant;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getOthersOrganismCounts($month){
		$test_type_ids = $this->getTestTypeIDs('others_organism');
		$rows = $this->getAMRservillence($test_type_ids['organism_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['ampicilin'] = 0;
		$test_type_counts['ampicilin2'] = 0;
		$test_type_counts['ampicilin3'] = 0;
		$test_type_counts['azithromycin'] = 0;
		$test_type_counts['azithromycin2'] = 0;
		$test_type_counts['azithromycin3'] = 0;
		$test_type_counts['amikacin'] = 0;
		$test_type_counts['amikacin2'] = 0;
		$test_type_counts['amikacin3'] = 0;
		$test_type_counts['ceftriaxone'] = 0;
		$test_type_counts['ceftriaxone2'] = 0;
		$test_type_counts['ceftriaxone3'] = 0;
		$test_type_counts['ceftazidime'] = 0;
		$test_type_counts['ceftazidime2'] = 0;
		$test_type_counts['ceftazidime3'] = 0;
		$test_type_counts['cefotaxime'] = 0;
		$test_type_counts['cefotaxime2'] = 0;
		$test_type_counts['cefotaxime3'] = 0;
		$test_type_counts['cefoxitin'] = 0;
		$test_type_counts['cefoxitin2'] = 0;
		$test_type_counts['cefoxitin3'] = 0;
		$test_type_counts['cefixime'] = 0;
		$test_type_counts['cefixime2'] = 0;
		$test_type_counts['cefixime3'] = 0;
		$test_type_counts['cotrimoxazole'] = 0;
		$test_type_counts['cotrimoxazole2'] = 0;
		$test_type_counts['cotrimoxazole3'] = 0;
		$test_type_counts['ciprofloxacin'] = 0;
		$test_type_counts['ciprofloxacin2'] = 0;
		$test_type_counts['ciprofloxacin3'] = 0;
		$test_type_counts['colistin'] = 0;
		$test_type_counts['colistin2'] = 0;
		$test_type_counts['colistin3'] = 0;
		$test_type_counts['gentamicin'] = 0;
		$test_type_counts['gentamicin2'] = 0;
		$test_type_counts['gentamicin3'] = 0;
		$test_type_counts['imipenem'] = 0;
		$test_type_counts['imipenem2'] = 0;
		$test_type_counts['imipenem3'] = 0;
		$test_type_counts['levofloxacin'] = 0;
		$test_type_counts['levofloxacin2'] = 0;
		$test_type_counts['levofloxacin3'] = 0;
		$test_type_counts['meropenem'] = 0;
		$test_type_counts['meropenem2'] = 0;
		$test_type_counts['meropenem3'] = 0;
		$test_type_counts['oxacillin'] = 0;
		$test_type_counts['oxacillin2'] = 0;
		$test_type_counts['oxacillin3'] = 0;
		$test_type_counts['penicillin_g'] = 0;
		$test_type_counts['penicillin_g2'] = 0;
		$test_type_counts['penicillin_g3'] = 0;
		$test_type_counts['vancomycin'] = 0;
		$test_type_counts['vancomycin2'] = 0;
		$test_type_counts['vancomycin3'] = 0;
		$test_type_counts['augmentin'] = 0;
		$test_type_counts['augmentin2'] = 0;
		$test_type_counts['augmentin3'] = 0;
		$test_type_counts['chloramphenicol'] = 0;
		$test_type_counts['chloramphenicol2'] = 0;
		$test_type_counts['chloramphenicol3'] = 0;
		$test_type_counts['clindamycin'] = 0;
		$test_type_counts['clindamycin2'] = 0;
		$test_type_counts['clindamycin3'] = 0;
		$test_type_counts['erythromycin'] = 0;
		$test_type_counts['erythromycin2'] = 0;
		$test_type_counts['erythromycin3'] = 0;
		$test_type_counts['nalidixic_acid'] = 0;
		$test_type_counts['nalidixic_acid2'] = 0;
		$test_type_counts['nalidixic_acid3'] = 0;
		$test_type_counts['nitrofurantoin'] = 0;
		$test_type_counts['nitrofurantoin2'] = 0;
		$test_type_counts['nitrofurantoin3'] = 0;
		$test_type_counts['piperacillin'] = 0;
		$test_type_counts['piperacillin2'] = 0;
		$test_type_counts['piperacillin3'] = 0;
		$test_type_counts['piperacillin_tazobactam'] = 0;
		$test_type_counts['piperacillin_tazobactam2'] = 0;
		$test_type_counts['piperacillin_tazobactam3'] = 0;
		$test_type_counts['tetracycline'] = 0;
		$test_type_counts['tetracycline2'] = 0;
		$test_type_counts['tetracycline3'] = 0;
		$test_type_counts['isolate_number'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->drug_id == $test_type_ids['ampicilin']){
	 			$test_type_counts['ampicilin'] = $row->Sesitive;
	 			$test_type_counts['ampicilin2'] = $row->Intermediate;
	 			$test_type_counts['ampicilin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['azithromycin']){
	 			$test_type_counts['azithromycin'] = $row->Sesitive;
	 			$test_type_counts['azithromycin2'] = $row->Intermediate;
	 			$test_type_counts['azithromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['amikacin']){
	 			$test_type_counts['amikacin'] = $row->Sesitive;
	 			$test_type_counts['amikacin2'] = $row->Intermediate;
	 			$test_type_counts['amikacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftriaxone']){
	 			$test_type_counts['ceftriaxone'] = $row->Sesitive;
	 			$test_type_counts['ceftriaxone2'] = $row->Intermediate;
	 			$test_type_counts['ceftriaxone3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ceftazidime']){
	 			$test_type_counts['ceftazidime'] = $row->Sesitive;
	 			$test_type_counts['ceftazidime2'] = $row->Intermediate;
	 			$test_type_counts['ceftazidime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefotaxime']){
	 			$test_type_counts['cefotaxime'] = $row->Sesitive;
	 			$test_type_counts['cefotaxime2'] = $row->Intermediate;
	 			$test_type_counts['cefotaxime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cotrimoxazole']){
	 			$test_type_counts['cotrimoxazole'] = $row->Sesitive;
	 			$test_type_counts['cotrimoxazole2'] = $row->Intermediate;
	 			$test_type_counts['cotrimoxazole3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['ciprofloxacin']){
	 			$test_type_counts['ciprofloxacin'] = $row->Sesitive;
	 			$test_type_counts['ciprofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['ciprofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['colistin']){
	 			$test_type_counts['colistin'] = $row->Sesitive;
	 			$test_type_counts['colistin2'] = $row->Intermediate;
	 			$test_type_counts['colistin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefixime']){
	 			$test_type_counts['cefixime'] = $row->Sesitive;
	 			$test_type_counts['cefixime2'] = $row->Intermediate;
	 			$test_type_counts['cefixime3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['cefoxitin']){
	 			$test_type_counts['cefoxitin'] = $row->Sesitive;
	 			$test_type_counts['cefoxitin2'] = $row->Intermediate;
	 			$test_type_counts['cefoxitin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['gentamicin']){
	 			$test_type_counts['gentamicin'] = $row->Sesitive;
	 			$test_type_counts['gentamicin2'] = $row->Intermediate;
	 			$test_type_counts['gentamicin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['imipenem']){
	 			$test_type_counts['imipenem'] = $row->Sesitive;
	 			$test_type_counts['imipenem2'] = $row->Intermediate;
	 			$test_type_counts['imipenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['levofloxacin']){
	 			$test_type_counts['levofloxacin'] = $row->Sesitive;
	 			$test_type_counts['levofloxacin2'] = $row->Intermediate;
	 			$test_type_counts['levofloxacin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['meropenem']){
	 			$test_type_counts['meropenem'] = $row->Sesitive;
	 			$test_type_counts['meropenem2'] = $row->Intermediate;
	 			$test_type_counts['meropenem3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['oxacillin']){
	 			$test_type_counts['oxacillin'] = $row->Sesitive;
	 			$test_type_counts['oxacillin2'] = $row->Intermediate;
	 			$test_type_counts['oxacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['penicillin_g']){
	 			$test_type_counts['penicillin_g'] = $row->Sesitive;
	 			$test_type_counts['penicillin_g2'] = $row->Intermediate;
	 			$test_type_counts['penicillin_g3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['vancomycin']){
	 			$test_type_counts['vancomycin'] = $row->Sesitive;
	 			$test_type_counts['vancomycin2'] = $row->Intermediate;
	 			$test_type_counts['vancomycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['augmentin']){
	 			$test_type_counts['augmentin'] = $row->Sesitive;
	 			$test_type_counts['augmentin2'] = $row->Intermediate;
	 			$test_type_counts['augmentin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['chloramphenicol']){
	 			$test_type_counts['chloramphenicol'] = $row->Sesitive;
	 			$test_type_counts['chloramphenicol2'] = $row->Intermediate;
	 			$test_type_counts['chloramphenicol3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['clindamycin']){
	 			$test_type_counts['clindamycin'] = $row->Sesitive;
	 			$test_type_counts['clindamycin2'] = $row->Intermediate;
	 			$test_type_counts['clindamycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['erythromycin']){
	 			$test_type_counts['erythromycin'] = $row->Sesitive;
	 			$test_type_counts['erythromycin2'] = $row->Intermediate;
	 			$test_type_counts['erythromycin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nalidixic_acid']){
	 			$test_type_counts['nalidixic_acid'] = $row->Sesitive;
	 			$test_type_counts['nalidixic_acid2'] = $row->Intermediate;
	 			$test_type_counts['nalidixic_acid3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['nitrofurantoin']){
	 			$test_type_counts['nitrofurantoin'] = $row->Sesitive;
	 			$test_type_counts['nitrofurantoin2'] = $row->Intermediate;
	 			$test_type_counts['nitrofurantoin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin']){
	 			$test_type_counts['piperacillin'] = $row->Sesitive;
	 			$test_type_counts['piperacillin2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin3'] = $row->Resistant;
	 		}else if((int)$row->drug_id == $test_type_ids['piperacillin_tazobactam']){
	 			$test_type_counts['piperacillin_tazobactam'] = $row->Sesitive;
	 			$test_type_counts['piperacillin_tazobactam2'] = $row->Intermediate;
	 			$test_type_counts['piperacillin_tazobactam3'] = $row->Resistant;
	 		}else{
	 			$test_type_counts['tetracycline'] = $row->Sesitive;
	 			$test_type_counts['tetracycline2'] = $row->Intermediate;
	 			$test_type_counts['tetracycline3'] = $row->Resistant;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getBloodSpecimenRejectionCounts($month){
		$test_type_ids = $this->getTestTypeIDs('blood_specimen_rejection');
		$rows = $this->getSpecimenRejectionTotalBySampleType($test_type_ids['specimen_type_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['inadequate_specimen_volume'] = 0;
		$test_type_counts['hemolyzed_specimen'] = 0;
		$test_type_counts['specimen_without_lab_request_form'] = 0;
		$test_type_counts['No_test_specified_on_lab_request_form_accompanying_specimen'] = 0;
		$test_type_counts['Specimen_without_label_or_identifier'] = 0;
		$test_type_counts['Wrong_specimen_label'] = 0;
		$test_type_counts['Unclear_specimen_label'] = 0;
		$test_type_counts['Wrong_specimen_container'] = 0;
		$test_type_counts['Damaged_specimen_container'] = 0;
		$test_type_counts['Too_old_specimen'] = 0;
		$test_type_counts['Date_of_specimen_collection_not_specified'] = 0;
		$test_type_counts['Time_of_specimen_collection_not_specified'] = 0;
		$test_type_counts['Specimen_type_unacceptable_for_required_test'] = 0;
		$test_type_counts['Other_reasons'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->reason_id == $test_type_ids['inadequate_specimen_volume']){
	 			$test_type_counts['inadequate_specimen_volume'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['hemolyzed_specimen']){
	 			$test_type_counts['hemolyzed_specimen'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['specimen_without_lab_request_form']){
	 			$test_type_counts['specimen_without_lab_request_form'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['No_test_specified_on_lab_request_form_accompanying_specimen']){
	 			$test_type_counts['No_test_specified_on_lab_request_form_accompanying_specimen'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Specimen_without_label_or_identifier']){
	 			$test_type_counts['Specimen_without_label_or_identifier'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Wrong_specimen_label']){
	 			$test_type_counts['Wrong_specimen_label'] =$row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Damaged_specimen_container']){
	 			$test_type_counts['Damaged_specimen_container'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Too_old_specimen']){
	 			$test_type_counts['Too_old_specimen'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Date_of_specimen_collection_not_specified']){
	 			$test_type_counts['Date_of_specimen_collection_not_specified'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Wrong_specimen_container']){
	 			$test_type_counts['Wrong_specimen_container'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Unclear_specimen_label']){
	 			$test_type_counts['Unclear_specimen_label'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Time_of_specimen_collection_not_specified']){
	 			$test_type_counts['Time_of_specimen_collection_not_specified'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Specimen_type_unacceptable_for_required_test']){
	 			$test_type_counts['Specimen_type_unacceptable_for_required_test'] = $row->total;
	 		}else{
	 			$test_type_counts['Other_reasons'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getStoolSpecimenRejectionCounts($month){
		$test_type_ids = $this->getTestTypeIDs('stool_specimen_rejection');
		$rows = $this->getSpecimenRejectionTotalBySampleType($test_type_ids['specimen_type_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['inadequate_specimen_volume'] = 0;
		$test_type_counts['hemolyzed_specimen'] = 0;
		$test_type_counts['specimen_without_lab_request_form'] = 0;
		$test_type_counts['No_test_specified_on_lab_request_form_accompanying_specimen'] = 0;
		$test_type_counts['Specimen_without_label_or_identifier'] = 0;
		$test_type_counts['Wrong_specimen_label'] = 0;
		$test_type_counts['Unclear_specimen_label'] = 0;
		$test_type_counts['Wrong_specimen_container'] = 0;
		$test_type_counts['Damaged_specimen_container'] = 0;
		$test_type_counts['Too_old_specimen'] = 0;
		$test_type_counts['Date_of_specimen_collection_not_specified'] = 0;
		$test_type_counts['Time_of_specimen_collection_not_specified'] = 0;
		$test_type_counts['Specimen_type_unacceptable_for_required_test'] = 0;
		$test_type_counts['Other_reasons'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->reason_id == $test_type_ids['inadequate_specimen_volume']){
	 			$test_type_counts['inadequate_specimen_volume'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['hemolyzed_specimen']){
	 			$test_type_counts['hemolyzed_specimen'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['specimen_without_lab_request_form']){
	 			$test_type_counts['specimen_without_lab_request_form'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['No_test_specified_on_lab_request_form_accompanying_specimen']){
	 			$test_type_counts['No_test_specified_on_lab_request_form_accompanying_specimen'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Specimen_without_label_or_identifier']){
	 			$test_type_counts['Specimen_without_label_or_identifier'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Wrong_specimen_label']){
	 			$test_type_counts['Wrong_specimen_label'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Damaged_specimen_container']){
	 			$test_type_counts['Damaged_specimen_container'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Too_old_specimen']){
	 			$test_type_counts['Too_old_specimen'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Date_of_specimen_collection_not_specified']){
	 			$test_type_counts['Date_of_specimen_collection_not_specified'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Wrong_specimen_container']){
	 			$test_type_counts['Wrong_specimen_container'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Unclear_specimen_label']){
	 			$test_type_counts['Unclear_specimen_label'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Time_of_specimen_collection_not_specified']){
	 			$test_type_counts['Time_of_specimen_collection_not_specified'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Specimen_type_unacceptable_for_required_test']){
	 			$test_type_counts['Specimen_type_unacceptable_for_required_test'] = $row->total;
	 		}else{
	 			$test_type_counts['Other_reasons'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getUrineSpecimenRejectionCounts($month){
		$test_type_ids = $this->getTestTypeIDs('urine_specimen_rejection');
		$rows = $this->getSpecimenRejectionTotalBySampleType($test_type_ids['specimen_type_id'],$month);
		//dd($rows);//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['inadequate_specimen_volume'] = 0;
		$test_type_counts['hemolyzed_specimen'] = 0;
		$test_type_counts['specimen_without_lab_request_form'] = 0;
		$test_type_counts['No_test_specified_on_lab_request_form_accompanying_specimen'] = 0;
		$test_type_counts['Specimen_without_label_or_identifier'] = 0;
		$test_type_counts['Wrong_specimen_label'] = 0;
		$test_type_counts['Unclear_specimen_label'] = 0;
		$test_type_counts['Wrong_specimen_container'] = 0;
		$test_type_counts['Damaged_specimen_container'] = 0;
		$test_type_counts['Too_old_specimen'] = 0;
		$test_type_counts['Date_of_specimen_collection_not_specified'] = 0;
		$test_type_counts['Time_of_specimen_collection_not_specified'] = 0;
		$test_type_counts['Specimen_type_unacceptable_for_required_test'] = 0;
		$test_type_counts['Other_reasons'] = 0;
		//dd($rows);
	 	foreach($rows as $row){
	 		//echo $test_type_ids['hemolyzed_specimen']

	 		if($row->reason_id == $test_type_ids['hemolyzed_specimen']){
	 			$test_type_counts['hemolyzed_specimen'] = $row->total;
	 		}elseif((int)$row->reason_id == $test_type_ids['inadequate_specimen_volume']){
	 			$test_type_counts['inadequate_specimen_volume'] = $row->total;
	 		}elseif((int)$row->reason_id == $test_type_ids['specimen_without_lab_request_form']){
	 			$test_type_counts['specimen_without_lab_request_form'] = $row->total;
	 		}elseif((int)$row->reason_id == $test_type_ids['No_test_specified_on_lab_request_form_accompanying_specimen']){
	 			$test_type_counts['No_test_specified_on_lab_request_form_accompanying_specimen'] = $row->total;
	 		}elseif((int)$row->reason_id == $test_type_ids['Specimen_without_label_or_identifier']){
	 			$test_type_counts['Specimen_without_label_or_identifier'] = $row->total;
	 		}elseif($row->reason_id == $test_type_ids['Wrong_specimen_label']){
	 			$test_type_counts['Wrong_specimen_label'] = $row->total;
	 		}elseif((int)$row->reason_id == $test_type_ids['Damaged_specimen_container']){
	 			$test_type_counts['Damaged_specimen_container'] = $row->total;
	 		}elseif((int)$row->reason_id == $test_type_ids['Too_old_specimen']){
	 			$test_type_counts['Too_old_specimen'] = $row->total;
	 		}elseif((int)$row->reason_id == $test_type_ids['Date_of_specimen_collection_not_specified']){
	 			$test_type_counts['Date_of_specimen_collection_not_specified'] = $row->total;
	 		}elseif((int)$row->reason_id == $test_type_ids['Wrong_specimen_container']){
	 			$test_type_counts['Wrong_specimen_container'] = $row->total;
	 		}elseif((int)$row->reason_id == $test_type_ids['Unclear_specimen_label']){
	 			$test_type_counts['Unclear_specimen_label'] = $row->total;
	 		}elseif((int)$row->reason_id == $test_type_ids['Time_of_specimen_collection_not_specified']){
	 			$test_type_counts['Time_of_specimen_collection_not_specified'] = $row->total;
	 		}elseif((int)$row->reason_id == $test_type_ids['Specimen_type_unacceptable_for_required_test']){
	 			$test_type_counts['Specimen_type_unacceptable_for_required_test'] = $row->total;
	 		}else{
	 			$test_type_counts['Other_reasons'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getSputumSpecimenRejectionCounts($month){
		$test_type_ids = $this->getTestTypeIDs('sputum_specimen_rejection');
		$rows = $this->getSpecimenRejectionTotalBySampleType($test_type_ids['specimen_type_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['inadequate_specimen_volume'] = 0;
		$test_type_counts['hemolyzed_specimen'] = 0;
		$test_type_counts['specimen_without_lab_request_form'] = 0;
		$test_type_counts['No_test_specified_on_lab_request_form_accompanying_specimen'] = 0;
		$test_type_counts['Specimen_without_label_or_identifier'] = 0;
		$test_type_counts['Wrong_specimen_label'] = 0;
		$test_type_counts['Unclear_specimen_label'] = 0;
		$test_type_counts['Wrong_specimen_container'] = 0;
		$test_type_counts['Damaged_specimen_container'] = 0;
		$test_type_counts['Too_old_specimen'] = 0;
		$test_type_counts['Date_of_specimen_collection_not_specified'] = 0;
		$test_type_counts['Time_of_specimen_collection_not_specified'] = 0;
		$test_type_counts['Specimen_type_unacceptable_for_required_test'] = 0;
		$test_type_counts['Other_reasons'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->reason_id == $test_type_ids['inadequate_specimen_volume']){
	 			$test_type_counts['inadequate_specimen_volume'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['hemolyzed_specimen']){
	 			$test_type_counts['hemolyzed_specimen'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['specimen_without_lab_request_form']){
	 			$test_type_counts['specimen_without_lab_request_form'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['No_test_specified_on_lab_request_form_accompanying_specimen']){
	 			$test_type_counts['No_test_specified_on_lab_request_form_accompanying_specimen'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Specimen_without_label_or_identifier']){
	 			$test_type_counts['Specimen_without_label_or_identifier'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Wrong_specimen_label']){
	 			$test_type_counts['Wrong_specimen_label'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Damaged_specimen_container']){
	 			$test_type_counts['Damaged_specimen_container'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Too_old_specimen']){
	 			$test_type_counts['Too_old_specimen'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Date_of_specimen_collection_not_specified']){
	 			$test_type_counts['Date_of_specimen_collection_not_specified'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Wrong_specimen_container']){
	 			$test_type_counts['Wrong_specimen_container'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Unclear_specimen_label']){
	 			$test_type_counts['Unclear_specimen_label'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Time_of_specimen_collection_not_specified']){
	 			$test_type_counts['Time_of_specimen_collection_not_specified'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Specimen_type_unacceptable_for_required_test']){
	 			$test_type_counts['Specimen_type_unacceptable_for_required_test'] = $row->total;
	 		}else{
	 			$test_type_counts['Other_reasons'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getPusSpecimenRejectionCounts($month){
		$test_type_ids = $this->getTestTypeIDs('pus_specimen_rejection');
		$rows = $this->getSpecimenRejectionTotalBySampleType($test_type_ids['specimen_type_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['inadequate_specimen_volume'] = 0;
		$test_type_counts['hemolyzed_specimen'] = 0;
		$test_type_counts['specimen_without_lab_request_form'] = 0;
		$test_type_counts['No_test_specified_on_lab_request_form_accompanying_specimen'] = 0;
		$test_type_counts['Specimen_without_label_or_identifier'] = 0;
		$test_type_counts['Wrong_specimen_label'] = 0;
		$test_type_counts['Unclear_specimen_label'] = 0;
		$test_type_counts['Wrong_specimen_container'] = 0;
		$test_type_counts['Damaged_specimen_container'] = 0;
		$test_type_counts['Too_old_specimen'] = 0;
		$test_type_counts['Date_of_specimen_collection_not_specified'] = 0;
		$test_type_counts['Time_of_specimen_collection_not_specified'] = 0;
		$test_type_counts['Specimen_type_unacceptable_for_required_test'] = 0;
		$test_type_counts['Other_reasons'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->reason_id == $test_type_ids['inadequate_specimen_volume']){
	 			$test_type_counts['inadequate_specimen_volume'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['hemolyzed_specimen']){
	 			$test_type_counts['hemolyzed_specimen'] = $test_type_counts['hemolyzed_specimen'] + 1;
	 		}else if((int)$row->reason_id == $test_type_ids['specimen_without_lab_request_form']){
	 			$test_type_counts['specimen_without_lab_request_form'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['No_test_specified_on_lab_request_form_accompanying_specimen']){
	 			$test_type_counts['No_test_specified_on_lab_request_form_accompanying_specimen'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Specimen_without_label_or_identifier']){
	 			$test_type_counts['Specimen_without_label_or_identifier'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Wrong_specimen_label']){
	 			$test_type_counts['Wrong_specimen_label'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Damaged_specimen_container']){
	 			$test_type_counts['Damaged_specimen_container'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Too_old_specimen']){
	 			$test_type_counts['Too_old_specimen'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Date_of_specimen_collection_not_specified']){
	 			$test_type_counts['Date_of_specimen_collection_not_specified'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Wrong_specimen_container']){
	 			$test_type_counts['Wrong_specimen_container'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Unclear_specimen_label']){
	 			$test_type_counts['Unclear_specimen_label'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Time_of_specimen_collection_not_specified']){
	 			$test_type_counts['Time_of_specimen_collection_not_specified'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Specimen_type_unacceptable_for_required_test']){
	 			$test_type_counts['Specimen_type_unacceptable_for_required_test'] = $row->total;
	 		}else{
	 			$test_type_counts['Other_reasons'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getGenitalSpecimenRejectionCounts($month){
		$test_type_ids = $this->getTestTypeIDs('genital_specimen_rejection');
		$rows = $this->getSpecimenRejectionTotalBySampleType($test_type_ids['specimen_type_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['inadequate_specimen_volume'] = 0;
		$test_type_counts['hemolyzed_specimen'] = 0;
		$test_type_counts['specimen_without_lab_request_form'] = 0;
		$test_type_counts['No_test_specified_on_lab_request_form_accompanying_specimen'] = 0;
		$test_type_counts['Specimen_without_label_or_identifier'] = 0;
		$test_type_counts['Wrong_specimen_label'] = 0;
		$test_type_counts['Unclear_specimen_label'] = 0;
		$test_type_counts['Wrong_specimen_container'] = 0;
		$test_type_counts['Damaged_specimen_container'] = 0;
		$test_type_counts['Too_old_specimen'] = 0;
		$test_type_counts['Date_of_specimen_collection_not_specified'] = 0;
		$test_type_counts['Time_of_specimen_collection_not_specified'] = 0;
		$test_type_counts['Specimen_type_unacceptable_for_required_test'] = 0;
		$test_type_counts['Other_reasons'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->reason_id == $test_type_ids['inadequate_specimen_volume']){
	 			$test_type_counts['inadequate_specimen_volume'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['hemolyzed_specimen']){
	 			$test_type_counts['hemolyzed_specimen'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['specimen_without_lab_request_form']){
	 			$test_type_counts['specimen_without_lab_request_form'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['No_test_specified_on_lab_request_form_accompanying_specimen']){
	 			$test_type_counts['No_test_specified_on_lab_request_form_accompanying_specimen'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Specimen_without_label_or_identifier']){
	 			$test_type_counts['Specimen_without_label_or_identifier'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Wrong_specimen_label']){
	 			$test_type_counts['Wrong_specimen_label'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Damaged_specimen_container']){
	 			$test_type_counts['Damaged_specimen_container'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Too_old_specimen']){
	 			$test_type_counts['Too_old_specimen'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Date_of_specimen_collection_not_specified']){
	 			$test_type_counts['Date_of_specimen_collection_not_specified'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Wrong_specimen_container']){
	 			$test_type_counts['Wrong_specimen_container'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Unclear_specimen_label']){
	 			$test_type_counts['Unclear_specimen_label'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Time_of_specimen_collection_not_specified']){
	 			$test_type_counts['Time_of_specimen_collection_not_specified'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Specimen_type_unacceptable_for_required_test']){
	 			$test_type_counts['Specimen_type_unacceptable_for_required_test'] = $row->total;
	 		}else{
	 			$test_type_counts['Other_reasons'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getSkinSpecimenRejectionCounts($month){
		$test_type_ids = $this->getTestTypeIDs('skin_specimen_rejection');
		$rows = $this->getSpecimenRejectionTotalBySampleType($test_type_ids['specimen_type_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['inadequate_specimen_volume'] = 0;
		$test_type_counts['hemolyzed_specimen'] = 0;
		$test_type_counts['specimen_without_lab_request_form'] = 0;
		$test_type_counts['No_test_specified_on_lab_request_form_accompanying_specimen'] = 0;
		$test_type_counts['Specimen_without_label_or_identifier'] = 0;
		$test_type_counts['Wrong_specimen_label'] = 0;
		$test_type_counts['Unclear_specimen_label'] = 0;
		$test_type_counts['Wrong_specimen_container'] = 0;
		$test_type_counts['Damaged_specimen_container'] = 0;
		$test_type_counts['Too_old_specimen'] = 0;
		$test_type_counts['Date_of_specimen_collection_not_specified'] = 0;
		$test_type_counts['Time_of_specimen_collection_not_specified'] = 0;
		$test_type_counts['Specimen_type_unacceptable_for_required_test'] = 0;
		$test_type_counts['Other_reasons'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->reason_id == $test_type_ids['inadequate_specimen_volume']){
	 			$test_type_counts['inadequate_specimen_volume'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['hemolyzed_specimen']){
	 			$test_type_counts['hemolyzed_specimen'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['specimen_without_lab_request_form']){
	 			$test_type_counts['specimen_without_lab_request_form'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['No_test_specified_on_lab_request_form_accompanying_specimen']){
	 			$test_type_counts['No_test_specified_on_lab_request_form_accompanying_specimen'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Specimen_without_label_or_identifier']){
	 			$test_type_counts['Specimen_without_label_or_identifier'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Wrong_specimen_label']){
	 			$test_type_counts['Wrong_specimen_label'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Damaged_specimen_container']){
	 			$test_type_counts['Damaged_specimen_container'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Too_old_specimen']){
	 			$test_type_counts['Too_old_specimen'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Date_of_specimen_collection_not_specified']){
	 			$test_type_counts['Date_of_specimen_collection_not_specified'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Wrong_specimen_container']){
	 			$test_type_counts['Wrong_specimen_container'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Unclear_specimen_label']){
	 			$test_type_counts['Unclear_specimen_label'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Time_of_specimen_collection_not_specified']){
	 			$test_type_counts['Time_of_specimen_collection_not_specified'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Specimen_type_unacceptable_for_required_test']){
	 			$test_type_counts['Specimen_type_unacceptable_for_required_test'] = $row->total;
	 		}else{
	 			$test_type_counts['Other_reasons'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}

	private function getOtherSpecimenRejectionCounts($month){
		$test_type_ids = $this->getTestTypeIDs('other_specimen_rejection');
		$rows = $this->getSpecimenRejectionTotalBySampleType($test_type_ids['specimen_type_id'],$month);
		//$test_type_counts = $this->getTestTypeInitialCounts('hematology');
		$test_type_counts['inadequate_specimen_volume'] = 0;
		$test_type_counts['hemolyzed_specimen'] = 0;
		$test_type_counts['specimen_without_lab_request_form'] = 0;
		$test_type_counts['No_test_specified_on_lab_request_form_accompanying_specimen'] = 0;
		$test_type_counts['Specimen_without_label_or_identifier'] = 0;
		$test_type_counts['Wrong_specimen_label'] = 0;
		$test_type_counts['Unclear_specimen_label'] = 0;
		$test_type_counts['Wrong_specimen_container'] = 0;
		$test_type_counts['Damaged_specimen_container'] = 0;
		$test_type_counts['Too_old_specimen'] = 0;
		$test_type_counts['Date_of_specimen_collection_not_specified'] = 0;
		$test_type_counts['Time_of_specimen_collection_not_specified'] = 0;
		$test_type_counts['Specimen_type_unacceptable_for_required_test'] = 0;
		$test_type_counts['Other_reasons'] = 0;

	 	foreach($rows as $row){
	 		//dd($row);
	 		if((int)$row->reason_id == $test_type_ids['inadequate_specimen_volume']){
	 			$test_type_counts['inadequate_specimen_volume'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['hemolyzed_specimen']){
	 			$test_type_counts['hemolyzed_specimen'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['specimen_without_lab_request_form']){
	 			$test_type_counts['specimen_without_lab_request_form'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['No_test_specified_on_lab_request_form_accompanying_specimen']){
	 			$test_type_counts['No_test_specified_on_lab_request_form_accompanying_specimen'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Specimen_without_label_or_identifier']){
	 			$test_type_counts['Specimen_without_label_or_identifier'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Wrong_specimen_label']){
	 			$test_type_counts['Wrong_specimen_label'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Damaged_specimen_container']){
	 			$test_type_counts['Damaged_specimen_container'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Too_old_specimen']){
	 			$test_type_counts['Too_old_specimen'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Date_of_specimen_collection_not_specified']){
	 			$test_type_counts['Date_of_specimen_collection_not_specified'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Wrong_specimen_container']){
	 			$test_type_counts['Wrong_specimen_container'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Unclear_specimen_label']){
	 			$test_type_counts['Unclear_specimen_label'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Time_of_specimen_collection_not_specified']){
	 			$test_type_counts['Time_of_specimen_collection_not_specified'] = $row->total;
	 		}else if((int)$row->reason_id == $test_type_ids['Specimen_type_unacceptable_for_required_test']){
	 			$test_type_counts['Specimen_type_unacceptable_for_required_test'] = $row->total;
	 		}else{
	 			$test_type_counts['Other_reasons'] = $row->total;
	 		}

	 	}
	 	return $test_type_counts;
	}


	private function getTestTypeIDs($lab_section){

		$test_type_ids = [
						'isolate'=>
							[
							'test_category_id' => 2,
							'Klebsiella_pneumoniae' => 72,
							'Escherichia_coli' => 2,
							'Salmonella_spp' => 16,
							'Shigella_spp' => 13,
							'Neisseria_gonorrhoeae' => 42,
							'Staphylococcus_aureus' => 23,
							'Streptococcus_pneumoniae' => 61,
							'Acinetobacter_baumannii' => 13,
							'Vibrio_cholerae' => 20,
							'Enterococcus_spp' => 34,
							'Haemophilus_influenzae' => 52,
							'Neisseria_meningitides' => 43,
							'Campylobacter' => 0,
						],
						'hematology'=>
							[ //Input the measure_id for a test type in this section - check testtype_measure table
							'test_category_id' => 3, //the id of the hematology - check test_categories table
							'hb_non_automated' => 'hb_non_automated',
							'vdrl_rpr' => 'vdrl_rpr',
							'cbc' => 'wbc',
							'film_comment' => 'film_comment',
							'tpha' => 'tpha',
							'esr' =>'esr',
							'shigella_dysentery' => 'shigella_dysentery',
							'bleeding_time' => 'bleeding_time',
							'Hepatitisb_sags' => 'hepatitisb_sags',
							'prothrombin_time' => 'prothrombin_time',
							'brucella' => 'brucella',
							'clotting_time' => 'clotting_time',
							'pregnancy_test' => 'pregnancy_test',
							'sickle_cell' => 'sickle_cell',
						],
						'serology' => [ //Input the measure_id for a test type in this section - check testtype_measure table
							'test_category_id' => 4, //the id of the serology - check test_categories table
							'vdrl_rpr' => 'vdrl_rpr',
							'tpha' => 'tpha',
							'shigella_dysentery' => 'shigella_dysentery',
							'hepatitisb_sags' => 'hepatitisb_sags',
							'brucella' => 'brucella',
							'pregnancy_test' => 'pregnancy_test',
							'crag' => 'crag',
							'rheumatoid_factor' => 'rheumatoid_factor',
							'hepb_core_ag' => 'hepb_core_ag',
							'hepa' => 'hepa',
							'hepc' => 'hepc',
						],
						'blood_transfusion' => [ //Input the measure_id for a test type in this section - check testtype_measure table
							'test_category_id' => 5, //the id of the serology - check test_categories table
							'ahb_combs_test' => 'ahb_combs_test',
							'abo_grouping' => 'abo_grouping',
							'rhesus_grouping' => 'N/A',
							'cross_matching' => 'cross_matching',
						],
						//test based analysis
						'culture_and_sensitivity_specimen' => [ //Input the measure_id for a test type in this section
							'test_type_id' => 5, //the id of the cul n sens test - check test_types table
							'blood' => 22,
							'urine' => 26,
							'stool' => 13,
							'sputum' => 24,
							'nosal_swab' => 3,
							'rectal_swab' => 5,
							'wound_swab' => 15,
							'pus_swab' => 16,
							'eye_swab' => 18,
							'ear_swab' => 19,
							'throat_swab' => 20,
							'uretheral_swab' => 25,
						],
						'microbiology' => [ //Input the measure_id for a test type in this section - check testtype_measure table
							'test_category_id' => 2, //the id of the serology - check test_categories table
							'test_type_id' => 5, //the id of the microbiology test - check test_types table
							'auramine_fm' => 'auramine_fm',
							'zn_for_afb' => 'zn_for_afb',
							'leishman_stain' => 'leishman_stain',
							'gram' => 'gram',
							'india_ink' => 'india_ink',
							'urine_microscopy' => 'urine_microscopy',
							'wet_prep' => 'wet_prep',
							//'others' => 15,

						],
						'parasitology' => [ //Input the measure_id for a test type in this section - check testtype_measure table
							'test_category_id' => 1, //the id of the serology - check test_categories table
							'test_type_id' => 5, //the id of the parasitology test - check test_types table
							'malaria_microscopy' => 'bs_for_mps',
							'malaria_rdts' => 'malaria_rdts',
							'trypasonoma' => 'trypasonoma',
							'micro_filaria' => 'micro_filaria',
							'leishmania' => 'leishmania',
							'trichinella' => 'trichinella',
							'borrellia' => 'borrellia',
						],
						'stoolmicroscopy' => [ //Input the measure_id for a test type in this section - check testtype_measure table
							'test_category_id' => 5, //the id of the serology - check test_categories table
							'test_type_id' => 5, //the id of the stool test - check test_types table
							'entamoeba' => 'entamoeba',
							'giardia' => 'giardia',
							'cryptosporidium' => 'cryptosporidium',
							'isospora' => 'isospora',
							'cyclospora' => 'cyclospora',
							'strongyloides' => 'strongyloides',
							'shistosoma' => 'shistosoma',
							'taenia' => 'taenia',
							'askaris' => 'askaris',
							'hookworm' => 'hookworm',
							'trichuris' => 'trichuris',
							//'other_parasites' => 25,

						],
						'immunology' => [ //Input the measure_id number for a test type in this section - check testtype_measure table
							'test_category_id' => 7,
							'cd4' => 'cd4',
							'hiv_viral_load' => 'hiv_viral_load',
							'hepb' => 'hepb',
						],
						'molecular' => [
							'test_category_id' => 2,
							'tb_genexpert' => 'tb_genexpert',
							'latent_tb' => 'latent_tb',
							'tb_lam' => 'tb_lam',
						],
						'hctcount' => [
							'test_category_id' => 2,
							'determine' => 'determine',
							'statpak' => 'statpak',
							'sdbioline' => 'sdbioline',
							'hiv_syphilis_duo' => 'hiv_syphilis_duo',
							'oraquick' => 'oraquick',
						],
						'eMTCTcount' => [
							'test_category_id' => 2,
							'determine' => 'determine',
							'statpak' => 'statpak',
							'sdbioline' => 'sdbioline',
							'hiv_syphilis_duo' => 'hiv_syphilis_duo',
							'oraquick' => 'oraquick',
						],
						'SMCcount' => [
							'test_category_id' => 2,
							'determine' => 'determine',
							'statpak' => 'statpak',
							'sdbioline' => 'sdbioline',
							'hiv_syphilis_duo' => 'hiv_syphilis_duo',
							'oraquick' => 'oraquick',
						],
						'clinicalDiagnosiscount' => [
							'test_category_id' => 2,
							'determine' => 'determine',
							'statpak' => 'statpak',
							'sdbioline' => 'sdbioline',
							'hiv_syphilis_duo' => 'hiv_syphilis_duo',
							'oraquick' => 'oraquick',
						],
						'repeatTestcount' => [
							'test_category_id' => 2,
							'determine' => 'determine',
							'statpak' => 'statpak',
							'sdbioline' => 'sdbioline',
							'hiv_syphilis_duo' => 'hiv_syphilis_duo',
							'oraquick' => 'oraquick',
						],
						'VerificationTestcount' => [
							'test_category_id' => 2,
							'determine' => 'determine',
							'statpak' => 'statpak',
							'sdbioline' => 'sdbioline',
							'hiv_syphilis_duo' => 'hiv_syphilis_duo',
							'oraquick' => 'oraquick',
						],
						'inconclusivecount' => [
							'test_category_id' => 2,
							'determine' => 'determine',
							'statpak' => 'statpak',
							'sdbioline' => 'sdbioline',
							'hiv_syphilis_duo' => 'hiv_syphilis_duo',
							'oraquick' => 'oraquick',
						],
						'dnaConfirmedTestcount' => [
							'test_category_id' => 2,
							'determine' => 'determine',
							'statpak' => 'statpak',
							'sdbioline' => 'sdbioline',
							'hiv_syphilis_duo' => 'hiv_syphilis_duo',
							'oraquick' => 'oraquick',
						],
						'IQCcount' => [
							'test_category_id' => 2,
							'determine' => 'determine',
							'statpak' => 'statpak',
							'sdbioline' => 'sdbioline',
							'hiv_syphilis_duo' => 'hiv_syphilis_duo',
							'oraquick' => 'oraquick',
						],
						'EQAcount' => [
							'test_category_id' => 2,
							'determine' => 'determine',
							'statpak' => 'statpak',
							'sdbioline' => 'sdbioline',
							'hiv_syphilis_duo' => 'hiv_syphilis_duo',
							'oraquick' => 'oraquick',
						],
						'chemistry' => [//Input the measure_id for a test type in this section - check testtype_measure table
							'test_category_id' => 6, //the id of the serology - check test_categories table
							'urea' => 'urea',
							'calcium' => 'calcium',
							'potassium' => 'potassium',
							'albumin' => 'albumin',
							'total_protein' => 'total_protein',
							'sodium' => 'sodium',
							'creatinine' => 'creatinine',
							'alt' => 'alt',
							'ast' => 'ast',
							'protein' => 'protein',
							'triglycerides' => 'triglycerides',
							'cholesterol' => 'cholesterol',
							'free_t3' => 'free_t3',
							'free_t4' => 'free_t4',
							'tsh' => 'tsh',
							'alkaline_phosphate' => 'alkaline_phosphate',
							'amylase' => 'amylase',
							'glucose' => 'glucose',
							'total_bilirubin' => 'total_bilirubin',
							'lipase' => 'lipase',
							'afp' => 'afp',

						],
						'referralTests' => [//get ids from measures table
							'status' => 1, //the id of the serology - check test_categories table
							'eid' => 'eid',
							'hiv_viral_load' => 'hiv_viral_load',
							'cd4' => 'cd4',
							'sickle_cell_confirmation' => 92,
							'histology' => 511,
							'polio' => 'polio',
							'sars' => 'sars',
							'tb_genexpert' => 'tb_genexpert',
							'mdr_tb' => 'mdr_tb',

						],
						'referred_microbiology' => [//get ids from measures table
							'status' => 1, //the id of the serology - check test_categories table
							'typhoid_fever' => 'typhoid_fever',
							'cholera' => 'cholera',
							'dysentry' => 'dysentry',
							'rota_virus' => 'rota_virus',
							'meningitis' => 'meningitis',
							'neonatal_tetanus' => 'neonatal_tetanus',
							'plague' => 'plague',
							'isolates' => 12,

						],
						'referred_parasitology' => [//get ids from measures table
							//'status' => 1, //the id of the serology - check test_categories table
							'status' => 1,
							'hemo_parasites' => 510,
							'intestinal_parasites' => 92,
							'tissue_parasites' => 51,

						],
						'referred_virology' => [//get ids from measures table
							'status' => 1, //the id of the serology - check test_categories table
							'measles' => 'measles',
							'vhf' => 'vhf',
							'animal_bites' => 'animal_bites',
							'suspected_outbreak_sample' => 511,
							'hepbAg' => 'hepb_core_ag',
							'hepb_vl' => 'hepb_vl',
							'hepc_vl' => 'hepc_vl',
						],
						'equipmentBreakdown' => [
							'referral_reason' => 1,
							'CD4' => 'cd4',
							'TB' => 'tb',
							'CBC' => 'cbc',
							'Chemistry' => 4,
							'Microbiology' => 4,
							'hiv' => 'hiv',
							'VDRL' => 'vdrl_rpr',
							'Haematology' => 4,
							'Parasitolog' => 4,
						],
						'reagent_stockout' => [
							'referral_reason' => 2,
							'CD4' => 'cd4',
							'TB' => 'tb_genexpert',
							'CBC' => 'cbc',
							'Chemistry' => 5,
							'Microbiology' => 1,
							'hiv' => 'hiv',
							'VDRL' => 'vdrl_rpr',
							'Haematology' => 4,
							'Parasitolog' => 1,
						],
						'supplies_stockout' => [
							'referral_reason' => 3,
							'CD4' => 'cd4',
							'TB' => 'tb_genexpert',
							'CBC' => 'cbc',
							'Chemistry' => 5,
							'Microbiology' => 1,
							'hiv' => 'hiv',
							'VDRL' => 'vdrl_rpr',
							'Haematology' => 4,
							'Parasitolog' => 1,
						],
						'power_outage' => [
							'referral_reason' => 4,
							'CD4' => 'cd4',
							'TB' => 'tb_genexpert',
							'CBC' => 'cbc',
							'Chemistry' => 5,
							'Microbiology' => 1,
							'hiv' => 'hiv',
							'VDRL' => 'vdrl_rpr',
							'Haematology' => 4,
							'Parasitolog' => 1,
						],
						'no_testing_expertise' => [
							'referral_reason' => 5,
							'CD4' => 'cd4',
							'TB' => 'tb_genexpert',
							'CBC' => 'cbc',
							'Chemistry' => 5,
							'Microbiology' => 1,
							'hiv' => 'hiv',
							'VDRL' => 'vdrl_rpr',
							'Haematology' => 4,
							'Parasitolog' => 1,
						],
						'required_equipment' => [
							'referral_reason' => 1,
							'CD4' => 'cd4',
							'TB' => 'tb_genexpert',
							'CBC' => 'cbc',
							'Chemistry' => 5,
							'Microbiology' => 1,
							'hiv' => 'hiv',
							'VDRL' => 'vdrl_rpr',
							'Haematology' => 4,
							'Parasitolog' => 1,
						],
						'confirmatory_testing' => [
							'referral_reason' => 1,
							'CD4' => 'cd4',
							'TB' => 'tb_genexpert',
							'CBC' => 'cbc',
							'Chemistry' => 5,
							'Microbiology' => 1,
							'hiv' => 'hiv',
							'VDRL' => 'vdrl_rpr',
							'Haematology' => 4,
							'Parasitolog' => 1,
						],
						'qa_retesting' => [
							'referral_reason' => 1,
							'CD4' => 'cd4',
							'TB' => 'tb_genexpert',
							'CBC' => 'cbc',
							'Chemistry' => 5,
							'Microbiology' => 1,
							'hiv' => 'hiv',
							'VDRL' => 'vdrl_rpr',
							'Haematology' => 4,
							'Parasitolog' => 1,
						],
						'other_referral_reasons' => [
							'referral_reason' => 1,
							'CD4' => 'cd4',
							'TB' => 'tb_genexpert',
							'CBC' => 'cbc',
							'Chemistry' => 5,
							'Microbiology' => 1,
							'hiv' => 'hiv',
							'VDRL' => 'vdrl_rpr',
							'Haematology' => 4,
							'Parasitolog' => 1,
						],
						'klebsiella_organism' => [//get ids from measures table
							'organism_id' => 72, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'escherichia_organism' => [//get ids from measures table
							'organism_id' => 2, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'salmonella_organism' => [//get ids from measures table
							'organism_id' => 16, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'shigella_organism' => [//get ids from measures table
							'organism_id' => 13, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'neisseria_organism' => [//get ids from measures table
							'organism_id' => 42, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'staphylococcus_organism' => [//get ids from measures table
							'organism_id' => 23, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'streptococcus_organism' => [//get ids from measures table
							'organism_id' => 61, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'acinetobacter_organism' => [//get ids from measures table
							'organism_id' => 13, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'vibrio_organism' => [//get ids from measures table
							'organism_id' => 20, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'enterococcus_organism' => [//get ids from measures table
							'organism_id' => 34, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'haemophilus_organism' => [//get ids from measures table
							'organism_id' => 52, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'neisseriam_organism' => [//get ids from measures table
							'organism_id' => 43, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'campylobacter_organism' => [//get ids from measures table
							'organism_id' => 30, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'others_organism' => [//get ids from measures table
							'organism_id' => 1, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,
						],
						'blood_specimen_rejection' => [
							'specimen_type_id' => 23,
							'inadequate_specimen_volume' => 1,
							'hemolyzed_specimen' => 9,
							'specimen_without_lab_request_form' => 3,
							'No_test_specified_on_lab_request_form_accompanying_specimen' => 4,
							'Specimen_without_label_or_identifier' => 20,
							'Wrong_specimen_label' => 38,
							'Unclear_specimen_label' => 7,
							'Wrong_specimen_container' => 8,
							'Damaged_specimen_container' => 11,
							'Too_old_specimen' => 16,
							'Date_of_specimen_collection_not_specified' => 13,
							'Time_of_specimen_collection_not_specified' => 14,
							'Specimen_type_unacceptable_for_required_test' => 15,
							//'Other_reasons' => 19,
						],
						'stool_specimen_rejection' => [
							'specimen_type_id' => 13,
							'inadequate_specimen_volume' => 1,
							'hemolyzed_specimen' => 9,
							'specimen_without_lab_request_form' => 3,
							'No_test_specified_on_lab_request_form_accompanying_specimen' => 4,
							'Specimen_without_label_or_identifier' => 20,
							'Wrong_specimen_label' => 38,
							'Unclear_specimen_label' => 7,
							'Wrong_specimen_container' => 8,
							'Damaged_specimen_container' => 11,
							'Too_old_specimen' => 16,
							'Date_of_specimen_collection_not_specified' => 13,
							'Time_of_specimen_collection_not_specified' => 14,
							'Specimen_type_unacceptable_for_required_test' => 15,
							//'Other_reasons' => 19,
							],
						'urine_specimen_rejection' => [
							'specimen_type_id' => 13,
							'inadequate_specimen_volume' => 1,
							'hemolyzed_specimen' => 9,
							'specimen_without_lab_request_form' => 3,
							'No_test_specified_on_lab_request_form_accompanying_specimen' => 4,
							'Specimen_without_label_or_identifier' => 20,
							'Wrong_specimen_label' => 38,
							'Unclear_specimen_label' => 7,
							'Wrong_specimen_container' => 8,
							'Damaged_specimen_container' => 11,
							'Too_old_specimen' => 16,
							'Date_of_specimen_collection_not_specified' => 13,
							'Time_of_specimen_collection_not_specified' => 14,
							'Specimen_type_unacceptable_for_required_test' => 15,
							//'Other_reasons' => 19,
							],
						'sputum_specimen_rejection' => [
							'specimen_type_id' => 24,
							'inadequate_specimen_volume' => 1,
							'hemolyzed_specimen' => 9,
							'specimen_without_lab_request_form' => 3,
							'No_test_specified_on_lab_request_form_accompanying_specimen' => 4,
							'Specimen_without_label_or_identifier' => 20,
							'Wrong_specimen_label' => 38,
							'Unclear_specimen_label' => 7,
							'Wrong_specimen_container' => 8,
							'Damaged_specimen_container' => 11,
							'Too_old_specimen' => 16,
							'Date_of_specimen_collection_not_specified' => 13,
							'Time_of_specimen_collection_not_specified' => 14,
							'Specimen_type_unacceptable_for_required_test' => 15,
							//'Other_reasons' => 19,
							],
						'pus_specimen_rejection' => [
							'specimen_type_id' => 10,
							'inadequate_specimen_volume' => 1,
							'hemolyzed_specimen' => 9,
							'specimen_without_lab_request_form' => 3,
							'No_test_specified_on_lab_request_form_accompanying_specimen' => 4,
							'Specimen_without_label_or_identifier' => 20,
							'Wrong_specimen_label' => 38,
							'Unclear_specimen_label' => 7,
							'Wrong_specimen_container' => 8,
							'Damaged_specimen_container' => 11,
							'Too_old_specimen' => 16,
							'Date_of_specimen_collection_not_specified' => 13,
							'Time_of_specimen_collection_not_specified' => 14,
							'Specimen_type_unacceptable_for_required_test' => 15,
							//'Other_reasons' => 19,
							],
						'genital_specimen_rejection' => [
							'specimen_type_id' => 21,
							'inadequate_specimen_volume' => 1,
							'hemolyzed_specimen' => 9,
							'specimen_without_lab_request_form' => 3,
							'No_test_specified_on_lab_request_form_accompanying_specimen' => 4,
							'Specimen_without_label_or_identifier' => 20,
							'Wrong_specimen_label' => 38,
							'Unclear_specimen_label' => 7,
							'Wrong_specimen_container' => 8,
							'Damaged_specimen_container' => 11,
							'Too_old_specimen' => 16,
							'Date_of_specimen_collection_not_specified' => 13,
							'Time_of_specimen_collection_not_specified' => 14,
							'Specimen_type_unacceptable_for_required_test' => 15,
							//'Other_reasons' => 19,
							],
						'skin_specimen_rejection' => [
							'specimen_type_id' => 14,
							'inadequate_specimen_volume' => 1,
							'hemolyzed_specimen' => 9,
							'specimen_without_lab_request_form' => 3,
							'No_test_specified_on_lab_request_form_accompanying_specimen' => 4,
							'Specimen_without_label_or_identifier' => 20,
							'Wrong_specimen_label' => 38,
							'Unclear_specimen_label' => 7,
							'Wrong_specimen_container' => 8,
							'Damaged_specimen_container' => 11,
							'Too_old_specimen' => 16,
							'Date_of_specimen_collection_not_specified' => 13,
							'Time_of_specimen_collection_not_specified' => 14,
							'Specimen_type_unacceptable_for_required_test' => 15,
							//'Other_reasons' => 19,
							],
						'other_specimen_rejection' => [
							'specimen_type_id' => 19,
							'inadequate_specimen_volume' => 1,
							'hemolyzed_specimen' => 9,
							'specimen_without_lab_request_form' => 3,
							'No_test_specified_on_lab_request_form_accompanying_specimen' => 4,
							'Specimen_without_label_or_identifier' => 20,
							'Wrong_specimen_label' => 38,
							'Unclear_specimen_label' => 7,
							'Wrong_specimen_container' => 8,
							'Damaged_specimen_container' => 11,
							'Too_old_specimen' => 16,
							'Date_of_specimen_collection_not_specified' => 13,
							'Time_of_specimen_collection_not_specified' => 14,
							'Specimen_type_unacceptable_for_required_test' => 15,
							//'Other_reasons' => 19,
						]
					];
				// }

			foreach ($test_type_ids as $key => $value) {
			\Log::info("....1.....");
			\Log::info($key);
			\Log::info("....2.....");
		}
		return $test_type_ids[$lab_section];
	  // }
	}

	private function getTestTypeInitialCounts($lab_section){
		//blood transfusion
		$test_types['blood_transfusion']['ahb_combs_test'] = 0;
		$test_types['blood_transfusion']['abo_grouping'] = 0;
		$test_types['blood_transfusion']['rhesus_grouping'] = 'N/A';
		$test_types['blood_transfusion']['cross_matching'] = 0;
		//test based analysis - culture and sensitivity
		$test_types['culture_and_sensitivity_specimen']['urine'] = 0;
		$test_types['culture_and_sensitivity_specimen']['blood'] = 0;
		$test_types['culture_and_sensitivity_specimen']['stool'] = 0;
		$test_types['culture_and_sensitivity_specimen']['swabs'] = 0;
		$test_types['culture_and_sensitivity_specimen']['sputum'] = 0;
		//immunology
		$test_types['immunology']['cd4'] = 0;
		$test_types['immunology']['hiv_viral_load'] = 0;
		$test_types['immunology']['hepb'] = 0;
		//molecular
		$test_types['molecular']['tb_genexpert'] = 0;
		$test_types['molecular']['tb_genexpert1'] = 0;
		$test_types['molecular']['latent_tb'] = 0;
		$test_types['molecular']['latent_tb1'] = 0;
		$test_types['molecular']['tb_lam'] = 0;
		$test_types['molecular']['tb_lam1'] = 0;
		return $test_types[$lab_section];
	}

	private function getHivTestByPurpose($month){
		$ret_array =  array();
		$d_hct = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('measure_id','=','1')->where('purpose','=','hct')
		->where('result', '!=', '')
		->where('unhls_tests.time_verified', 'LIKE', $month)->get();
		$ret_array['determine']['hct']= $d_hct[0]->counter;

		$d_emct = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','1')->where('purpose','=','emtct')->where('result', '!=', '')->get();
		$ret_array['determine']['emct']= $d_emct[0]->counter;

		$d_clinic = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','1')->where('purpose','=','clinical_diagnosis')->where('result', '!=', '')->get();
		$ret_array['determine']['clinic']= $d_clinic[0]->counter;

		$d_smc = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','1')->where('purpose','=','smc')->where('result', '!=', '')->get();
		$ret_array['determine']['smc']= $d_smc[0]->counter;

		$d_repeat = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','1')->where('purpose','=','repeat_test')->where('result', '!=', '')->get();
		$ret_array['determine']['repeat']= $d_repeat[0]->counter;

		$d_verification = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','1')->where('purpose','=','test_for_verification')->where('result', '!=', '')->get();
		$ret_array['determine']['verification']= $d_verification[0]->counter;

		$d_inconclusive = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','1')->where('purpose','=','inconclusive_results')->where('result', '!=', '')->get();
		$ret_array['determine']['inconclusive']= $d_inconclusive[0]->counter;

		$d_dna = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','1')->where('purpose','=','dna_confirmatory_test')->where('result', '!=', '')->get();
		$ret_array['determine']['dna']= $d_dna[0]->counter;

		$d_iqc = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','1')->where('purpose','=','iqc')->where('result', '!=', '')->get();
		$ret_array['determine']['iqc']= $d_iqc[0]->counter;

		$d_eqa = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','1')->where('purpose','=','eqa')->where('result', '!=', '')->get();
		$ret_array['determine']['eqa']= $d_eqa[0]->counter;

		// Statpak counts
		$s_hct = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','2')->where('purpose','=','hct')->where('result', '!=', '')->get();
		$ret_array['statpak']['hct']= $d_hct[0]->counter;

		$s_emct = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','2')->where('purpose','=','emtct')->where('result', '!=', '')->get();
		$ret_array['statpak']['emct']= $d_emct[0]->counter;

		$s_clinic = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','2')->where('purpose','=','clinical_diagnosis')->where('result', '!=', '')->get();
		$ret_array['statpak']['clinic']= $d_clinic[0]->counter;

		$s_smc = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','2')->where('purpose','=','smc')->where('result', '!=', '')->get();
		$ret_array['statpak']['smc']= $d_smc[0]->counter;

		$s_repeat = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','2')->where('purpose','=','repeat_test')->where('result', '!=', '')->get();
		$ret_array['statpak']['repeat']= $d_repeat[0]->counter;

		$s_verification = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','2')->where('purpose','=','test_for_verification')->where('result', '!=', '')->get();
		$ret_array['statpak']['verification']= $d_verification[0]->counter;

		$s_inconclusive = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','2')->where('purpose','=','inconclusive_results')->where('result', '!=', '')->get();
		$ret_array['statpak']['inconclusive']= $s_inconclusive[0]->counter;

		$s_dna = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','2')->where('purpose','=','dna_confirmatory_test')->where('result', '!=', '')->get();
		$ret_array['statpak']['dna']= $s_dna[0]->counter;

		$s_iqc = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','2')->where('purpose','=','iqc')->where('result', '!=', '')->get();
		$ret_array['statpak']['iqc']= $s_iqc[0]->counter;

		$s_eqa = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','2')->where('purpose','=','eqa')->where('result', '!=', '')->get();
		$ret_array['statpak']['eqa']= $s_eqa[0]->counter;

		// SD-Bioline counts
		$sd_hct = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','3')->where('purpose','=','hct')->where('result', '!=', '')	->get();
		$ret_array['sdbioline']['hct']= $sd_hct[0]->counter;

		$sd_emct = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','3')->where('purpose','=','emtct')->where('result', '!=', '')->get();
		$ret_array['sdbioline']['emct']= $sd_emct[0]->counter;

		$sd_clinic = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','3')->where('purpose','=','clinical_diagnosis')->where('result', '!=', '')->get();
		$ret_array['sdbioline']['clinic']= $sd_clinic[0]->counter;

		$sd_smc = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','3')->where('purpose','=','smc')->where('result', '!=', '')->get();
		$ret_array['sdbioline']['smc']= $sd_smc[0]->counter;

		$sd_repeat = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','3')->where('purpose','=','repeat_test')->where('result', '!=', '')->get();
		$ret_array['sdbioline']['repeat']= $sd_repeat[0]->counter;

		$sd_verification = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','3')->where('purpose','=','test_for_verification')->where('result', '!=', '')->get();
		$ret_array['sdbioline']['verification']= $sd_verification[0]->counter;

		$sd_inconclusive = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','3')->where('purpose','=','inconclusive_results')->where('result', '!=', '')->get();
		$ret_array['sdbioline']['inconclusive']= $sd_inconclusive[0]->counter;

		$sd_dna = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','3')->where('purpose','=','dna_confirmatory_test')->where('result', '!=', '')->get();
		$ret_array['sdbioline']['dna']= $sd_dna[0]->counter;

		$sd_iqc = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','3')->where('purpose','=','iqc')->where('result', '!=', '')->get();
		$ret_array['sdbioline']['iqc']= $sd_iqc[0]->counter;

		$sd_eqa = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','3')->where('purpose','=','eqa')->where('result', '!=', '')->get();
		$ret_array['sdbioline']['eqa']= $sd_eqa[0]->counter;

		// HIV-Syphilis Duo count
		$h_hct = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','100')->where('purpose','=','hct')->where('result', '!=', '')	->get();
		$ret_array['syphilis']['hct']= $h_hct[0]->counter;

		$h_emct = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','100')->where('purpose','=','emtct')->where('result', '!=', '')->get();
		$ret_array['syphilis']['emct']= $h_emct[0]->counter;

		$h_clinic = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','100')->where('purpose','=','clinical_diagnosis')->where('result', '!=', '')->get();
		$ret_array['syphilis']['clinic']= $h_clinic[0]->counter;

		$h_smc = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','100')->where('purpose','=','smc')->where('result', '!=', '')->get();
		$ret_array['syphilis']['smc']= $h_smc[0]->counter;

		$h_repeat = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','100')->where('purpose','=','repeat_test')->where('result', '!=', '')->get();
		$ret_array['syphilis']['repeat']= $h_repeat[0]->counter;

		$h_verification = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','100')->where('purpose','=','test_for_verification')->where('result', '!=', '')->get();
		$ret_array['syphilis']['verification']= $h_verification[0]->counter;

		$h_inconclusive = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','100')->where('purpose','=','inconclusive_results')->where('result', '!=', '')->get();
		$ret_array['syphilis']['inconclusive']= $h_inconclusive[0]->counter;

		$h_dna = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','100')->where('purpose','=','dna_confirmatory_test')->where('result', '!=', '')->get();
		$ret_array['syphilis']['dna']= $h_dna[0]->counter;

		$h_iqc = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','100')->where('purpose','=','iqc')->where('result', '!=', '')->get();
		$ret_array['syphilis']['iqc']= $h_iqc[0]->counter;

		$h_eqa = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','100')->where('purpose','=','eqa')->where('result', '!=', '')->get();
		$ret_array['syphilis']['eqa']= $h_eqa[0]->counter;

		// Oraquick count
		$o_hct = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','101')->where('purpose','=','hct')->where('result', '!=', '')	->get();
		$ret_array['oraquick']['hct']= $o_hct[0]->counter;

		$o_emct = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','101')->where('purpose','=','emtct')->where('result', '!=', '')->get();
		$ret_array['oraquick']['emct']= $o_emct[0]->counter;

		$o_clinic = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','101')->where('purpose','=','clinical_diagnosis')->where('result', '!=', '')->get();
		$ret_array['oraquick']['clinic']= $o_clinic[0]->counter;

		$o_smc = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','101')->where('purpose','=','smc')->where('result', '!=', '')->get();
		$ret_array['oraquick']['smc']= $o_smc[0]->counter;

		$o_repeat = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','101')->where('purpose','=','repeat_test')->where('result', '!=', '')->get();
		$ret_array['oraquick']['repeat']= $o_repeat[0]->counter;

		$o_verification = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','101')->where('purpose','=','test_for_verification')->where('result', '!=', '')->get();
		$ret_array['oraquick']['verification']= $o_verification[0]->counter;

		$o_inconclusive = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','101')->where('purpose','=','inconclusive_results')->where('result', '!=', '')->get();
		$ret_array['oraquick']['inconclusive']= $o_inconclusive[0]->counter;

		$o_dna = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','101')->where('purpose','=','dna_confirmatory_test')->where('result', '!=', '')->get();
		$ret_array['oraquick']['dna']= $o_dna[0]->counter;

		$o_iqc = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('unhls_tests.time_verified', 'LIKE', $month)
		->where('measure_id','=','101')->where('purpose','=','iqc')->where('result', '!=', '')->get();
		$ret_array['oraquick']['iqc']= $o_iqc[0]->counter;

		$o_eqa = DB::table("unhls_test_results")
		->select("unhls_tests.purpose","measures.name", DB::raw("COUNT(unhls_tests.id) as counter"))
		->join("measures","measures.id","=","unhls_test_results.measure_id")
		->join("unhls_tests","unhls_test_results.test_id","=","unhls_tests.id")
		->where('measure_id','=','101')->where('purpose','=','eqa')->where('result', '!=', '')->get();
		$ret_array['oraquick']['eqa']= $o_eqa[0]->counter;

//get the totals now
		$ret_array['determine']['total'] = $ret_array['determine']['hct']+$ret_array['determine']['emct']+$ret_array['determine']['clinic']+$ret_array['determine']['smc']+$ret_array['determine']['repeat']+$ret_array['determine']['verification']+
$ret_array['determine']['inconclusive']+$ret_array['determine']['dna']+$ret_array['determine']['iqc']+$ret_array['determine']['eqa'];

$ret_array['statpak']['total'] = $ret_array['statpak']['hct']+$ret_array['statpak']['emct']+$ret_array['statpak']['clinic']+$ret_array['statpak']['smc']+$ret_array['statpak']['repeat']+$ret_array['statpak']['verification']+
$ret_array['statpak']['inconclusive']+$ret_array['statpak']['dna']+$ret_array['statpak']['iqc']+$ret_array['statpak']['eqa'];

$ret_array['sdbioline']['total'] = $ret_array['sdbioline']['hct']+$ret_array['sdbioline']['emct']+$ret_array['sdbioline']['clinic']+$ret_array['sdbioline']['smc']+$ret_array['sdbioline']['repeat']+$ret_array['sdbioline']['verification']+
$ret_array['sdbioline']['inconclusive']+$ret_array['sdbioline']['dna']+$ret_array['sdbioline']['iqc']+$ret_array['sdbioline']['eqa'];

$ret_array['syphilis']['total'] = $ret_array['syphilis']['hct']+$ret_array['syphilis']['emct']+$ret_array['syphilis']['clinic']+$ret_array['syphilis']['smc']+$ret_array['syphilis']['repeat']+$ret_array['syphilis']['verification']+
$ret_array['syphilis']['inconclusive']+$ret_array['syphilis']['dna']+$ret_array['syphilis']['iqc']+$ret_array['syphilis']['eqa'];

$ret_array['oraquick']['total'] = $ret_array['oraquick']['hct']+$ret_array['oraquick']['emct']+$ret_array['oraquick']['clinic']+$ret_array['oraquick']['smc']+$ret_array['oraquick']['repeat']+$ret_array['oraquick']['verification']+
$ret_array['oraquick']['inconclusive']+$ret_array['oraquick']['dna']+$ret_array['oraquick']['iqc']+$ret_array['oraquick']['eqa'];


		return $ret_array;
	}
/*SELECT ur.id, ur.test_id, mr.measure_id, mr.interpretation
FROM unhls_test_results ur
INNER JOIN measure_ranges mr ON(ur.measure_id = mr.measure_id)*/

}
