<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUnhlsVisitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('unhls_visits', function(Blueprint $table)
		{
			$table->integer('facility_id')->after('visit_lab_number')->unsigned()->nullable();
			$table->string('facility_lab_number')->after('facility_id')->nullable();

			$table->foreign('facility_id')->references('id')->on('facilities');

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
	}

}
