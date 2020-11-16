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
			$table->string('serial_no');
			$table->date('occurrence_date');
			$table->time('occurrence_time');
			$table->string('personnel_id');
			$table->string('personnel_surname');
			$table->string('personnel_othername');
			$table->string('personnel_gender');
			$table->date('personnel_dob');
			$table->string('personnel_age');
			$table->string('personnel_category');
			$table->string('personnel_telephone');
			$table->string('personnel_email');
			$table->string('nok_name');
			$table->string('nok_telephone');
			$table->string('nok_email');
			$table->string('lab_section');
			$table->string('occurrence');
			$table->string('ulin');
			$table->string('equip_name');
			$table->string('equip_code');
			$table->string('task');
			$table->text('description');
			$table->string('officer_fname');
			$table->string('officer_lname');
			$table->string('officer_cadre');
			$table->string('officer_telephone');
			$table->string('extent');
			$table->text('firstaid');
			$table->text('intervention');
			$table->date('intervention_date');
			$table->time('intervention_time');
			$table->text('intervention_followup');
			$table->string('mo_fname');
			$table->string('mo_lname');
			$table->string('mo_designation');
			$table->string('mo_telephone');
			$table->text('cause');
			$table->text('corrective_action');
			$table->text('referral_status');
			$table->text('status');
			$table->date('analysis_date');
			$table->time('analysis_time');
			$table->string('bo_fname');
			$table->string('bo_lname');
			$table->string('bo_designation');
			$table->string('bo_telephone');
			$table->text('findings');
			$table->text('improvement_plan');
			$table->date('response_date');
			$table->time('response_time');
			$table->string('brm_fname');
			$table->string('brm_lname');
			$table->string('brm_designation');
			$table->string('brm_telephone');
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
