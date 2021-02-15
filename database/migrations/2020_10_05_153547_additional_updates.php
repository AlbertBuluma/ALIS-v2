<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AdditionalUpdates extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// DB::update('ALTER TABLE unhls_equipment_maintenance ADD supplier_id INT(10) NULL');
		DB::update('ALTER TABLE unhls_patients ADD age INT(10) NULL ');
		// DB::update('ALTER TABLE unhls_patients ADD nationality VARCHAR(255) NULL AFTER age');
		DB::update('ALTER TABLE poc_tables ADD ulin VARCHAR(255) NULL AFTER updated_at');
		DB::update('ALTER TABLE unhls_patients ADD admission_date DATETIME NULL DEFAULT NULL AFTER gender');
		DB::update('ALTER TABLE unhls_tests ADD revised_by INT(10) NULL AFTER time_approved');
		DB::update('ALTER TABLE unhls_tests ADD time_revised DATE NULL AFTER revised_by');
		DB::update('ALTER TABLE unhls_test_results ADD revised_result VARCHAR(255) NULL AFTER sample_id');
		DB::update('ALTER TABLE unhls_test_results ADD revised_by INT(10) NULL AFTER revised_result');
		DB::update('ALTER TABLE unhls_test_results ADD revised_by2 INT(10) NULL AFTER revised_result');
		DB::update('ALTER TABLE unhls_test_results ADD time_revised DATE NULL AFTER revised_by');
		// DB::update('ALTER TABLE referrals ADD test_id INT(10) NULL AFTER status');
		DB::update('ALTER TABLE unhls_tests  ADD instrument_id INT  AFTER instrument,  ADD method_used VARCHAR(60) NULL');
        DB::statement('ALTER TABLE `unhls_tests` CHANGE `purpose` `purpose` VARCHAR(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL');
		DB::update('ALTER TABLE unhls_visits ADD is_printed INT(2) NOT NULL DEFAULT 0 AFTER facility_lab_number');
		DB::update('ALTER TABLE unhls_visits ADD printed_by INT(3) NULL AFTER is_printed, ADD time_printed DATETIME NULL AFTER printed_by');
		DB::update('ALTER TABLE test_types ADD parentId INT(3) NULL AFTER description');
		DB::update('ALTER TABLE test_name_mappings ADD test_category_id INT(10) NULL AFTER test_type_id');
		DB::update('ALTER TABLE specimens ADD sample_obtainer VARCHAR(60) NULL DEFAULT NULL AFTER accepted_by');
        DB::update('ALTER TABLE clinicians ADD active INT(3) NOT NULL DEFAULT 0 AFTER email');
        DB::statement('ALTER TABLE `clinicians` CHANGE `email` `email` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL');
        DB::insert('INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES (18, "User", 1)');
        DB::statement('ALTER TABLE `poc_tables` ADD `mother_hts` VARCHAR(60) NULL DEFAULT NULL AFTER `mother_name`');
        DB::statement('ALTER TABLE `poc_tables` ADD `mother_art` VARCHAR(60) NULL DEFAULT NULL AFTER `mother_hts`');
        DB::statement('ALTER TABLE `poc_tables` CHANGE `mother_hiv_status` `mother_hiv_status` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `poc_tables` CHANGE `admission_date` `admission_date` DATE NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `poc_tables` CHANGE `mother_name` `mother_name` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `poc_tables` CHANGE `provisional_diagnosis` `provisional_diagnosis` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `poc_results` CHANGE `test_time` `test_time` TIME NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `poc_tables` CHANGE `caretaker_number` `caretaker_number` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `poc_tables` CHANGE `other_entry_point` `other_entry_point` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL');
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
