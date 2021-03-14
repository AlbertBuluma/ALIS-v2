<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdatePocTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::update('ALTER TABLE poc_tables ADD given_contrimazole VARCHAR(60) NULL AFTER updated_at, ADD delivered_at VARCHAR(60) NULL AFTER given_contrimazole, ADD nin VARCHAR(60) NULL AFTER delivered_at, ADD feeding_status VARCHAR(60) NULL AFTER nin');
        DB::update('ALTER TABLE poc_tables ADD ulin VARCHAR(255) NULL AFTER updated_at');
        DB::statement('ALTER TABLE `poc_tables` ADD `mother_hts` VARCHAR(60) NULL DEFAULT NULL AFTER `mother_name`');
        DB::statement('ALTER TABLE `poc_tables` ADD `mother_art` VARCHAR(60) NULL DEFAULT NULL AFTER `mother_hts`');
        DB::statement('ALTER TABLE `poc_tables` CHANGE `mother_hiv_status` `mother_hiv_status` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `poc_tables` CHANGE `admission_date` `admission_date` DATE NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `poc_tables` CHANGE `mother_name` `mother_name` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `poc_tables` CHANGE `provisional_diagnosis` `provisional_diagnosis` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `poc_tables` CHANGE `infant_pmtctarv` `infant_pmtctarv` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
                                CHANGE `mother_pmtctarv` `mother_pmtctarv` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
                                CHANGE `other_entry_point` `other_entry_point` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL');
        DB::statement('ALTER TABLE `poc_tables` CHANGE `caretaker_number` `caretaker_number` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `poc_tables` CHANGE `other_entry_point` `other_entry_point` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `poc_results` CHANGE `test_time` `test_time` TIME NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `poc_tables` CHANGE `exp_no` `exp_no` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
                            CHANGE `breastfeeding_status` `breastfeeding_status` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
                            CHANGE `collection_date` `collection_date` DATE NULL DEFAULT NULL, CHANGE `pcr_level` `pcr_level` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
                            CHANGE `pmtct_antenatal` `pmtct_antenatal` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL');

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
