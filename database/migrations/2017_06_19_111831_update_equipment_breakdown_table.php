<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEquipmentBreakdownTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('unhls_equipment_breakdown', function($table)
		{

		    $table->integer('breakdown_type');
		    $table->string('reported_by')->nullable();
		    $table->datetime('breakdown_date')->nullable();

		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	
		Schema::table('unhls_equipment_breakdown', function (Blueprint $table) {
		    $table->dropColumn(['breakdown_type','reported_by','breakdown_date']);
		});

	}

}
