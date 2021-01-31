-- CREATE TABLE `requests` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `item_id` int(10) UNSIGNED NOT NULL,
--   `quantity_remaining` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `test_category_id` int(10) UNSIGNED NOT NULL,
--   `quantity_ordered` int(11) NOT NULL,
--   `tests_done` int(11) NOT NULL DEFAULT '0',
--   `user_id` int(10) UNSIGNED NOT NULL,
--   `remarks` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
--   `deleted_at` timestamp NULL DEFAULT NULL,
--   `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ALTER TABLE `requests`
--   ADD PRIMARY KEY (`id`),
--   ADD KEY `requests_test_category_id_foreign` (`test_category_id`),
--   ADD KEY `requests_item_id_foreign` (`item_id`),
--   ADD KEY `requests_user_id_foreign` (`user_id`);

-- ALTER TABLE `requests`
--   MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

-- ALTER TABLE `unhls_patients` ADD `is_micro` INT(10) NOT NULL DEFAULT '0' AFTER `updated_at`;
-- ALTER TABLE clinicians ADD active INT(3) NOT NULL DEFAULT 0 AFTER email;
-- ALTER TABLE facilities ADD active INT(3) NOT NULL DEFAULT 0;
-- ALTER TABLE unhls_visits ADD urgency INT(10) NULL AFTER hospitalized;
-- ALTER TABLE unhls_tests ADD urgency_id INT(10) NULL AFTER visit_id;
-- ALTER TABLE poc_tables ADD given_contrimazole VARCHAR(60) NULL AFTER updated_at, ADD delivered_at VARCHAR(60) NULL AFTER given_contrimazole, ADD nin VARCHAR(60) NULL AFTER delivered_at, ADD feeding_status VARCHAR(60) NULL AFTER nin;
-- ALTER TABLE unhls_patients ADD COLUMN nationality VARCHAR(25) after gender;
-- ALTER TABLE therapy ADD COLUMN clinician_id INT after contact;
-- ALTER TABLE unhls_equipment_maintenance ADD supplier_id INT(10) NULL;

-- ALTER TABLE `unhls_patients` ADD `age` INT(10) NULL ;
-- ALTER TABLE `unhls_patients` ADD `nationality` VARCHAR(255) NULL AFTER `age`;
-- ALTER TABLE `poc_tables` ADD `ulin` VARCHAR(255) NULL AFTER `updated_at`;

-- ALTER TABLE unhls_visits ADD facility_id INT(10) NULL;
-- ALTER TABLE unhls_visits ADD facility_lab_number VARCHAR(255) NULL;
-- ALTER TABLE unhls_equipment_inventory ADD unique_number VARCHAR(100) NULL, ADD name_id INT(10) NULL AFTER name;



-- ALTER TABLE `unhls_patients` ADD `district_residence` INT(10) NULL AFTER `nationality`, ADD `district_workplace` INT(10) NULL AFTER `district_residence`;
-- ALTER TABLE `unhls_tests` ADD `revised_by` INT(10) NULL AFTER `time_approved`;
-- ALTER TABLE `unhls_tests` ADD `time_revised` DATE NULL AFTER `revised_by`;
-- ALTER TABLE `unhls_test_results` ADD `revised_result` VARCHAR(255) NULL AFTER `sample_id`;
-- ALTER TABLE `unhls_test_results` ADD `revised_by` INT(10) NULL AFTER `revised_result`;
-- ALTER TABLE `unhls_test_results` ADD `revised_by2` INT(10) NULL AFTER `revised_result`;
-- ALTER TABLE `unhls_test_results` ADD `time_revised` DATE NULL AFTER `revised_by`;
-- ALTER TABLE `referrals` ADD `test_id` INT(10) NULL AFTER `status`;
-- ALTER TABLE `facilities` ADD `facility_contact` INT(12) NULL AFTER `name`;
-- ALTER TABLE `facilities` ADD `facility_email` VARCHAR(255) NULL AFTER `name`;
-- ALTER TABLE `facilities` ADD `code` VARCHAR(255) NULL AFTER `active`, ADD `dhis2_name` VARCHAR(255) NULL AFTER `code`, ADD `dhis2_uid` VARCHAR(255) NULL AFTER `dhis2_name`;

-- CREATE TABLE `clinicians` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `cadre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- ALTER TABLE `clinicians`
--   ADD PRIMARY KEY (`id`);
-- ALTER TABLE `clinicians`
--   MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
INSERT INTO `unhls_financial_years` (`id`, `year`) VALUES (1, '2020/2021');
-- ALTER TABLE `unhls_tests`  ADD `instrument_id` INT  AFTER `instrument`,  ADD `method_used` VARCHAR(60) NULL;
INSERT INTO `referral_reasons` (`id`, `reason`) VALUES
(1, 'Equipment break down'),
(2, 'Reagent stock out'),
(3, 'Supplies stock out'),
(4, 'Power outage'),
(5, 'No testing expertise'),
(6, 'Lack of required equipment'),
(7, 'Confirmatory testing'),
(8, 'For QA re-testing'),
(9, 'others');
