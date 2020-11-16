<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateVisitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// todo: move this to main migration when moving to master, for now
		// todo: just avoiding dev havoc
		Schema::table('unhls_visits', function($table)
		{
			$table->integer('ward_id')->nullable();
		});

		Schema::table('unhls_visits', function($table)
		{
			$table->string('bed_no')->nullable();
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
