<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraColumnsToTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::update('ALTER TABLE `unhls_patients` ADD `age` INT(3) NULL AFTER `dob`');
		DB::update('ALTER TABLE `unhls_patients` ADD `nationality` VARCHAR(255) NULL AFTER `gender`');
		DB::update('ALTER TABLE `unhls_patients` ADD `district_residence` INT(10) NULL AFTER `nationality`, ADD `district_workplace` INT(10) NULL AFTER `district_residence`');
		DB::update('ALTER TABLE `unhls_patients` ADD `is_micro` INT(10) NOT NULL DEFAULT \'0\' AFTER `updated_at`');
		DB::update('ALTER TABLE unhls_visits ADD facility_id INT(10) NULL');
		DB::update('ALTER TABLE unhls_visits ADD facility_lab_number VARCHAR(255) NULL');
		DB::update('ALTER TABLE unhls_visits ADD urgency INT(10) NULL AFTER hospitalized');
		DB::update('ALTER TABLE unhls_tests ADD urgency_id INT(10) NULL AFTER visit_id');
		DB::update('ALTER TABLE `unhls_tests` ADD `revised_by` INT(10) NULL AFTER `time_approved`');
		DB::update('ALTER TABLE `unhls_tests` ADD `time_revised` DATE NULL AFTER `revised_by`');
		DB::update('ALTER TABLE `unhls_test_results` ADD `sample_id` VARCHAR(50) NULL AFTER `time_entered`');
		DB::update('ALTER TABLE `unhls_test_results` ADD `revised_result` VARCHAR(255) NULL AFTER `sample_id`');
		DB::update('ALTER TABLE `unhls_test_results` ADD `revised_by` INT(10) NULL AFTER `revised_result`');
		DB::update('ALTER TABLE `unhls_test_results` ADD `revised_by2` INT(10) NULL AFTER `revised_result`');
		DB::update('ALTER TABLE `unhls_test_results` ADD `time_revised` DATE NULL AFTER `revised_by`');
		DB::update('ALTER TABLE `facilities` ADD `facility_contact` INT(12) NULL AFTER `name`');
		DB::update('ALTER TABLE `facilities` ADD `facility_email` VARCHAR(255) NULL AFTER `name`');
		DB::update('ALTER TABLE facilities ADD active INT(3) NOT NULL DEFAULT 0');
		DB::update('ALTER TABLE `facilities` ADD `code` VARCHAR(255) NULL AFTER `active`, ADD `dhis2_name` VARCHAR(255) NULL AFTER `code`, ADD `dhis2_uid` VARCHAR(255) NULL AFTER `dhis2_name`');
		DB::update('ALTER TABLE `poc_tables` ADD `ulin` VARCHAR(255) NULL AFTER `updated_at`');
		DB::update('ALTER TABLE poc_tables ADD given_contrimazole VARCHAR(60) NULL AFTER updated_at, ADD delivered_at VARCHAR(60) NULL AFTER given_contrimazole, ADD nin VARCHAR(60) NULL AFTER delivered_at, ADD feeding_status VARCHAR(60) NULL AFTER nin');
		DB::update('ALTER TABLE clinicians ADD active INT(3) NOT NULL DEFAULT 0 AFTER email');

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
