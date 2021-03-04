<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSupplierIdToTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// DB::update('ALTER TABLE unhls_equipment_maintenance ADD supplier_id INT(10) NULL');
		// DB::update('ALTER TABLE clinicians ADD active INT(3) NOT NULL DEFAULT 0 AFTER email');
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
