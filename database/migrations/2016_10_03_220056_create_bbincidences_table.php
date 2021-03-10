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
			$table->string('serial_no')->nullable();
			$table->date('occurrence_date')->nullable();
			$table->time('occurrence_time')->nullable();
			$table->string('personnel_id')->nullable();
			$table->string('personnel_surname')->nullable();
			$table->string('personnel_othername')->nullable();
			$table->string('personnel_gender')->nullable();
			$table->date('personnel_dob')->nullable();
			$table->string('personnel_age')->nullable();
			$table->string('personnel_category')->nullable();
			$table->string('personnel_telephone')->nullable();
			$table->string('personnel_email')->nullable();
			$table->string('nok_name')->nullable();
			$table->string('nok_telephone')->nullable();
			$table->string('nok_email')->nullable();
			$table->string('lab_section')->nullable();
			$table->string('occurrence')->nullable();
			$table->string('ulin')->nullable();
			$table->string('equip_name')->nullable();
			$table->string('equip_code')->nullable();
			$table->string('task')->nullable();
			$table->text('description')->nullable();
			$table->string('officer_fname')->nullable();
			$table->string('officer_lname')->nullable();
			$table->string('officer_cadre')->nullable();
			$table->string('officer_telephone')->nullable();
			$table->string('extent')->nullable();
			$table->text('firstaid')->nullable();
			$table->text('intervention')->nullable();
			$table->date('intervention_date')->nullable();
			$table->time('intervention_time')->nullable();
			$table->text('intervention_followup')->nullable();
			$table->string('mo_fname')->nullable();
			$table->string('mo_lname')->nullable();
			$table->string('mo_designation')->nullable();
			$table->string('mo_telephone')->nullable();
			$table->text('cause')->nullable();
			$table->text('corrective_action')->nullable();
			$table->text('referral_status')->nullable();
			$table->text('status')->nullable();
			$table->date('analysis_date')->nullable();
			$table->time('analysis_time')->nullable();
			$table->string('bo_fname')->nullable();
			$table->string('bo_lname')->nullable();
			$table->string('bo_designation')->nullable();
			$table->string('bo_telephone')->nullable();
			$table->text('findings')->nullable();
			$table->text('improvement_plan')->nullable();
			$table->date('response_date')->nullable();
			$table->time('response_time')->nullable();
			$table->string('brm_fname')->nullable();
			$table->string('brm_lname')->nullable();
			$table->string('brm_designation')->nullable();
			$table->string('brm_telephone')->nullable();
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
