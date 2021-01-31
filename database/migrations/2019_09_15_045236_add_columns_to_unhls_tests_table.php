<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUnhlsTestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('unhls_tests', function(Blueprint $table)
		{
			$table->integer('approved_by')->unsigned()->nullable();
			$table->timestamp('time_approved')->nullable();
			$table->integer('clinician_id')->unsigned()->nullable()->after('requested_by');
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
