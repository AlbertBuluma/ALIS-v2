<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBbincidencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unhls_bbincidences', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('facility_id')->unsigned();
			$table->string('serial_no')->default(null);
			$table->date('occurrence_date')->default(null);
			$table->time('occurrence_time')->default(null);
			$table->string('personnel_id')->default(null);
			$table->string('personnel_surname')->default(null);
			$table->string('personnel_othername')->default(null);
			$table->string('personnel_gender')->default(null);
			$table->date('personnel_dob')->default(null);
			$table->string('personnel_age')->default(null);
			$table->string('personnel_category')->default(null);
			$table->string('personnel_telephone')->default(null);
			$table->string('personnel_email')->default(null);
			$table->string('nok_name')->default(null);
			$table->string('nok_telephone')->default(null);
			$table->string('nok_email')->default(null);
			$table->string('lab_section')->default(null);
			$table->string('occurrence')->default(null);
			$table->string('ulin')->default(null);
			$table->string('equip_name')->default(null);
			$table->string('equip_code')->default(null);
			$table->string('task')->default(null);
			$table->text('description')->default(null);
			$table->string('officer_fname')->default(null);
			$table->string('officer_lname')->default(null);
			$table->string('officer_cadre')->default(null);
			$table->string('officer_telephone')->default(null);
			$table->string('extent')->default(null);
			$table->text('firstaid')->default(null);
			$table->text('intervention')->default(null);
			$table->date('intervention_date')->default(null);
			$table->time('intervention_time')->default(null);
			$table->text('intervention_followup')->default(null);
			$table->string('mo_fname')->default(null);
			$table->string('mo_lname')->default(null);
			$table->string('mo_designation')->default(null);
			$table->string('mo_telephone')->default(null);
			$table->text('cause')->default(null);
			$table->text('corrective_action')->default(null);
			$table->text('referral_status')->default(null);
			$table->text('status')->default(null);
			$table->date('analysis_date')->default(null);
			$table->time('analysis_time')->default(null);
			$table->string('bo_fname')->default(null);
			$table->string('bo_lname')->default(null);
			$table->string('bo_designation')->default(null);
			$table->string('bo_telephone')->default(null);
			$table->text('findings')->default(null);
			$table->text('improvement_plan')->default(null);
			$table->date('response_date')->default(null);
			$table->time('response_time')->default(null);
			$table->string('brm_fname')->default(null);
			$table->string('brm_lname')->default(null);
			$table->string('brm_designation')->default(null);
			$table->string('brm_telephone')->default(null);
			$table->integer('createdby')->nullable()->unsigned();
			$table->integer('updatedby')->nullable()->unsigned();
			$table->foreign('facility_id')->references('id')->on('unhls_facilities');
			$table->foreign('createdby')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('unhls_bbincidences');
	}

}
