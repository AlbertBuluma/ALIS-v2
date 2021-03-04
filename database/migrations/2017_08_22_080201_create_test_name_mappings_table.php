<?php

use App\Models\MeasureNameMapping;
use App\Models\ResultInterpretation;
use App\Models\TestNameMapping;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTestNameMappingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('test_name_mappings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('test_type_id')->unsigned()->nullable();
			$table->string('standard_name');
			$table->string('system_name')->unique();
		});

		Schema::create('measure_name_mappings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('test_name_mapping_id')->unsigned();
			$table->integer('measure_id')->unsigned()->nullable();
			$table->string('standard_name');
			$table->string('system_name')->unique();
		});

        Model::unguard();
        // testing seeding
        $testNameMappings = [
            ['standard_name' => 'CBC',
                'system_name' => 'cbc',
                'measureNameMappings' => [
                    [
                    'standard_name' => 'WBC',
                    'system_name' => 'wbc',],
                    [
                    'standard_name' => 'RBC',
                    'system_name' => 'rbc',],
                    [
                    'standard_name' => 'hgb',
                    'system_name' => 'hgb',],
                ]
            ],['standard_name' => 'Hb',
                'system_name' => 'hb',
                'measureNameMappings' => [
                    ['standard_name' => 'Hb',
                    'system_name' => 'hb',],
                ]
            ],['standard_name' => 'ESR',
                'system_name' => 'esr',
                'measureNameMappings' => [
                    ['standard_name' => 'ESR',
                    'system_name' => 'esr',],
                ]
            ],['standard_name' => 'Bleeding time',
                'system_name' => 'bleeding_time',
                'measureNameMappings' => [
                    ['standard_name' => 'Bleeding time',
                    'system_name' => 'bleeding_time',],
                ]
            ],['standard_name' => 'Prothrombin Time',
                'system_name' => 'prothrombin_time',
                'measureNameMappings' => [
                    ['standard_name' => 'Prothrombin Time',
                    'system_name' => 'prothrombin_time',],
                ]
            ],['standard_name' => 'Clotting Time',
                'system_name' => 'clotting_time',
                'measureNameMappings' => [
                    ['standard_name' => 'Clotting Time',
                    'system_name' => 'clotting_time',],
                ]
            ],['standard_name' => 'ABO Grouping',
                'system_name' => 'abo_grouping',
                'measureNameMappings' => [
                    ['standard_name' => 'ABO Grouping',
                    'system_name' => 'abo_grouping',],
                ]
            ],['standard_name' => 'Combs',
                'system_name' => 'combs',
                'measureNameMappings' => [
                    ['standard_name' => 'Combs',
                    'system_name' => 'combs',],
                ]
            ],['standard_name' => 'Cross Matching',
                'system_name' => 'cross_matching',
                'measureNameMappings' => [
                    ['standard_name' => 'Cross Matching',
                    'system_name' => 'cross_matching',],
                ]
            ],['standard_name' => 'Malaria Microscopy',
                'system_name' => 'malaria_microscopy',
                'measureNameMappings' => [
                    ['standard_name' => 'Malaria Microscopy',
                    'system_name' => 'malaria_microscopy',],
                ]
            ],['standard_name' => 'Malaria RDTs',
                'system_name' => 'malaria_rdts',
                'measureNameMappings' => [
                    ['standard_name' => 'Malaria RDTs',
                    'system_name' => 'malaria_rdts',],
                ]
            ],['standard_name' => 'Stool Microscopy',
                'system_name' => 'stool_microscopy',
                'measureNameMappings' => [
                    ['standard_name' => 'Stool Microscopy',
                    'system_name' => 'stool_microscopy',],
                ]
            ],['standard_name' => 'VDRL/RPR',
                'system_name' => 'vdrl_rpr',
                'measureNameMappings' => [
                    ['standard_name' => 'VDRL/RPR',
                    'system_name' => 'vdrl_rpr',],
                ]
            ],['standard_name' => 'TPHA',
                'system_name' => 'tpha',
                'measureNameMappings' => [
                    ['standard_name' => 'TPHA',
                    'system_name' => 'tpha',],
                ]
            ],['standard_name' => 'Shigella Dysentery',
                'system_name' => 'shigella_dysentery',
                'measureNameMappings' => [
                    ['standard_name' => 'Shigella Dysentery',
                    'system_name' => 'shigella_dysentery',],
                ]
            ],['standard_name' => 'Hepatitis B',
                'system_name' => 'hepatitis_b',
                'measureNameMappings' => [
                    ['standard_name' => 'Hepatitis B',
                    'system_name' => 'hepatitis_b',],
                ]
            ],['standard_name' => 'Brucella',
                'system_name' => 'brucella',
                'measureNameMappings' => [
                    ['standard_name' => 'Brucella',
                    'system_name' => 'brucella',],
                ]
            ],['standard_name' => 'Pregnancy Test',
                'system_name' => 'pregnancy_test',
                'measureNameMappings' => [
                    ['standard_name' => 'Pregnancy Test',
                    'system_name' => 'pregnancy_test',],
                ]
            ],['standard_name' => 'Rheumatoid Factor',
                'system_name' => 'rheumatoid_factor',
                'measureNameMappings' => [
                    ['standard_name' => 'Rheumatoid Factor',
                    'system_name' => 'rheumatoid_factor',],
                ]
            ],['standard_name' => 'CD4 tests',
                'system_name' => 'cd4_tests',
                'measureNameMappings' => [
                    ['standard_name' => 'CD4 tests',
                    'system_name' => 'cd4_tests',],
                ]
            ],['standard_name' => 'Viral Load Tests',
                'system_name' => 'viral_load_tests',
                'measureNameMappings' => [
                    ['standard_name' => 'Viral Load Tests',
                    'system_name' => 'viral_load_tests',],
                ]
            ],['standard_name' => 'ZN for AFBs',
                'system_name' => 'zn_for_afbs',
                'measureNameMappings' => [
                    ['standard_name' => 'ZN for AFBs',
                    'system_name' => 'zn_for_afbs',],
                ]
            ],['standard_name' => 'Culture & Sensitivity',
                'system_name' => 'culture_sensitivity',
                'measureNameMappings' => [
                    ['standard_name' => 'Culture & Sensitivity',
                    'system_name' => 'culture_sensitivity',],
                ]
            ],['standard_name' => 'Gram Stain',
                'system_name' => 'gram_stain',
                'measureNameMappings' => [
                    ['standard_name' => 'Gram Stain',
                    'system_name' => 'gram_stain',],
                ]
            ],['standard_name' => 'India Ink',
                'system_name' => 'india_ink',
                'measureNameMappings' => [
                    ['standard_name' => 'India Ink',
                    'system_name' => 'india_ink',],
                ]
            ],['standard_name' => 'Wet Preps',
                'system_name' => 'wet_preps',
                'measureNameMappings' => [
                    ['standard_name' => 'Wet Preps',
                    'system_name' => 'wet_preps',],
                ]
            ],['standard_name' => 'Urine Microscopy',
                'system_name' => 'urine_microscopy',
                'measureNameMappings' => [
                    ['standard_name' => 'Urine Microscopy',
                    'system_name' => 'urine_microscopy',],
                ]
            ],['standard_name' => 'Renal Profile',
                'system_name' => 'renal_profile',
                'measureNameMappings' => [
                    ['standard_name' => 'Urea',
                    'system_name' => 'urea',],
                    ['standard_name' => 'Calcium',
                    'system_name' => 'calcium',],
                    ['standard_name' => 'Potassium',
                    'system_name' => 'potassium',],
                    ['standard_name' => 'Sodium',
                    'system_name' => 'sodium',],
                    ['standard_name' => 'Creatinine',
                    'system_name' => 'creatinine',],
                ]
            ],['standard_name' => 'Liver Profile',
                'system_name' => 'liver_profile',
                'measureNameMappings' => [
                    ['standard_name' => 'ALT',
                    'system_name' => 'alt',],
                    ['standard_name' => 'AST',
                    'system_name' => 'ast',],
                    ['standard_name' => 'Albumin',
                    'system_name' => 'albumin',],
                    ['standard_name' => 'Total Protein',
                    'system_name' => 'total_protein',],
                ]
            ],['standard_name' => 'Lipid/Cardiac Profile',
                'system_name' => 'lipid_cardiac_profile',
                'measureNameMappings' => [
                    ['standard_name' => 'Triglycerides',
                    'system_name' => 'triglycerides',],
                    ['standard_name' => 'Cholesterol',
                    'system_name' => 'cholesterol',],
                    ['standard_name' => 'CK',
                    'system_name' => 'ck',],
                    ['standard_name' => 'LDH',
                    'system_name' => 'ldh',],
                    ['standard_name' => 'HDL',
                    'system_name' => 'hdl',],
                ]
            ],['standard_name' => 'Alkaline Phosphates',
                'system_name' => 'alkaline_phosphates',
                'measureNameMappings' => [
                    ['standard_name' => 'Alkaline Phosphates',
                    'system_name' => 'alkaline_phosphates',],
                ]
            ],['standard_name' => 'Amylase',
                'system_name' => 'amylase',
                'measureNameMappings' => [
                    ['standard_name' => 'Amylase',
                    'system_name' => 'amylase',],
                ]
            ],['standard_name' => 'Glucose',
                'system_name' => 'glucose',
                'measureNameMappings' => [
                    ['standard_name' => 'Glucose',
                    'system_name' => 'glucose',],
                ]
            ],['standard_name' => 'Uric Acid',
                'system_name' => 'uric_acid',
                'measureNameMappings' => [
                    ['standard_name' => 'Uric Acid',
                    'system_name' => 'uric_acid',],
                ]
            ],['standard_name' => 'Lactate',
                'system_name' => 'lactate',
                'measureNameMappings' => [
                    ['standard_name' => 'Lactate',
                    'system_name' => 'lactate',]
                ]
            ],['standard_name' => 'HIV',
                'system_name' => 'hiv',
                'measureNameMappings' => [
                    ['standard_name' => 'Determine',
                    'system_name' => 'determine',],
                    ['standard_name' => 'Stat-pak',
                    'system_name' => 'stat_pak',],
                    ['standard_name' => 'Unigold',
                    'system_name' => 'unigold',]
                ]
            ],
        ];
        foreach ($testNameMappings as $key => $testNameMapping)
        {
            $testNameMapping = TestNameMapping::create([
                'standard_name' => $testNameMapping['standard_name'],
                'test_type_id' => (isset($testNameMapping['test_type_id']))?$testNameMapping['test_type_id']:NULL,
                'system_name' => $testNameMapping['system_name']]);
            $test_name_mapping_id = $testNameMapping->id;
                echo "test name {$testNameMapping['standard_name']} - {$testNameMapping['system_name']}\n";
            foreach ($testNameMappings[$key]['measureNameMappings'] as $measureNameMapping) {
                MeasureNameMapping::create([
                    'test_name_mapping_id' => $test_name_mapping_id,
                'measure_id' => (isset($measureNameMapping['measure_id']))?$measureNameMapping['measure_id']:NULL,
                    'standard_name' => $measureNameMapping['standard_name'],
                    'system_name' => $measureNameMapping['system_name']]);
                    echo "--measure name {$measureNameMapping['standard_name']} - {$measureNameMapping['system_name']}\n";
            }
        }

        ResultInterpretation::create(['name' => 'High']);
        ResultInterpretation::create(['name' => 'Normal']);
        ResultInterpretation::create(['name' => 'Low']);
        ResultInterpretation::create(['name' => 'HGB<8']);
        ResultInterpretation::create(['name' => 'HGB≥8']);
        ResultInterpretation::create(['name' => 'Positive']);
        ResultInterpretation::create(['name' => 'Negative']);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('measure_name_mappings');
		Schema::drop('test_name_mappings');
	}

}
