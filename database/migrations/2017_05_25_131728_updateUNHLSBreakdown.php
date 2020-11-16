<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUNHLSBreakdown extends Migration {

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

		    $table->datetime('report_date')->nullable();
		    $table->integer('restored_by')->nullable();
		    $table->datetime('restore_date')->nullable();
		    $table->longText('comment')->nullable();

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
		    $table->dropColumn(['report_date', 'restored_by', 'restore_date','comment']);
		});

	}

}
