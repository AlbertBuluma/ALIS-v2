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
		DB::update('ALTER TABLE unhls_patients ADD admission_date DATETIME NULL DEFAULT NULL AFTER gender');
		DB::update('ALTER TABLE unhls_tests ADD revised_by INT(10) NULL AFTER time_approved');
		DB::update('ALTER TABLE unhls_tests ADD time_revised DATE NULL AFTER revised_by');
		DB::update('ALTER TABLE unhls_test_results ADD revised_result VARCHAR(255) NULL AFTER sample_id');
		DB::update('ALTER TABLE unhls_test_results ADD revised_by INT(10) NULL AFTER revised_result');
		DB::update('ALTER TABLE unhls_test_results ADD revised_by2 INT(10) NULL AFTER revised_result');
		DB::update('ALTER TABLE unhls_test_results ADD time_revised DATE NULL AFTER revised_by');
		// DB::update('ALTER TABLE referrals ADD test_id INT(10) NULL AFTER status');
		DB::update('ALTER TABLE unhls_tests  ADD instrument_id INT  AFTER instrument,  ADD method_used VARCHAR(60) NULL');
        DB::statement('ALTER TABLE `unhls_tests` CHANGE `purpose` `purpose` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL');
		DB::update('ALTER TABLE unhls_visits ADD is_printed INT(2) NOT NULL DEFAULT 0 AFTER facility_lab_number');
		DB::update('ALTER TABLE unhls_visits ADD printed_by INT(3) NULL AFTER is_printed, ADD time_printed DATETIME NULL AFTER printed_by');
		DB::update('ALTER TABLE test_types ADD parentId INT(3) NULL AFTER description');
		DB::update('ALTER TABLE test_name_mappings ADD test_category_id INT(10) NULL AFTER test_type_id');
		DB::update('ALTER TABLE specimens ADD sample_obtainer VARCHAR(60) NULL DEFAULT NULL AFTER accepted_by');
        DB::update('ALTER TABLE clinicians ADD active INT(3) NOT NULL DEFAULT 0 AFTER email');
        DB::statement('ALTER TABLE `clinicians` CHANGE `email` `email` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL');
        DB::insert('INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES (18, "User", 1)');
        DB::statement('ALTER TABLE `clinicians` CHANGE `created_at` `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP, CHANGE `updated_at` `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP');
        DB::statement('ALTER TABLE `clinicians` CHANGE `email` `email` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `inv_items` CHANGE `created_at` `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, CHANGE `updated_at` `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
        DB::statement('ALTER TABLE `inv_items` CHANGE `min_level` `min_level` DECIMAL(8,2) NULL DEFAULT NULL, CHANGE `storage_req` `storage_req` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `unhls_equipment_suppliers` CHANGE `created_at` `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, CHANGE `updated_at` `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
        DB::statement('ALTER TABLE `requests` CHANGE `remarks` `remarks` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `unhls_equipment_maintenance` CHANGE `comment` `comment` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `unhls_tests` CHANGE `interpretation` `interpretation` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL');
//        DB::statement('ALTER TABLE `unhls_equipment_inventory` DROP INDEX `unhls_equipment_inventory_supplier_id_foreign`');
        DB::statement('ALTER TABLE `unhls_equipment_breakdown` CHANGE `hsd_request` `hsd_request` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
                        CHANGE `in_charge_id` `in_charge_id` INT(11) NULL DEFAULT NULL, CHANGE `priority` `priority` INT(11) NULL DEFAULT NULL,
                        CHANGE `breakdown_type` `breakdown_type` INT(11) NULL DEFAULT NULL,
                        CHANGE `problem` `problem` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
                        CHANGE `equipment_failure` `equipment_failure` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
                        CHANGE `reporting_officer` `reporting_officer` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
                        CHANGE `reporting_officer_contact` `reporting_officer_contact` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
                        CHANGE `reporting_officer_email` `reporting_officer_email` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
                        CHANGE `intervention_authority` `intervention_authority` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
                        CHANGE `conclusion` `conclusion` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
                        CHANGE `verified_by` `verified_by` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
                        CHANGE `verification_date` `verification_date` DATE NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `unhls_equipment_breakdown` CHANGE `created_at` `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                        CHANGE `updated_at` `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
        DB::statement('ALTER TABLE `requests` CHANGE `quantity_remaining` `quantity_remaining` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL');
        DB::statement('ALTER TABLE `requests` CHANGE `test_category_id` `test_category_id` INT(10) UNSIGNED NULL');
        DB::statement('ALTER TABLE `requests` CHANGE `quantity_ordered` `quantity_ordered` INT(11) NULL');

        DB::statement('ALTER TABLE `unhls_patients` CHANGE `patient_number` `patient_number` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL');

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
