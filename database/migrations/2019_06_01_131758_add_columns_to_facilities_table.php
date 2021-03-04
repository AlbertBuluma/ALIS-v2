<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddColumnsToFacilitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('facilities', function(Blueprint $table)
		{
			$table->string('facility_contact')->after('name')->nullable();
			$table->string('facility_email')->after('facility_contact')->nullable();
			$table->integer('active')->after('facility_email');
			$table->string('code')->after('active')->nullable();
			$table->string('dhis2_name')->after('code')->nullable();
			$table->string('dhis2_uid')->after('dhis2_name')->nullable();

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
