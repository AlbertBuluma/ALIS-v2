<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddColumnToUnhlsPatientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('unhls_patients', function(Blueprint $table)
		{
			$table->integer('district_residence')->unsigned()->nullable()->after('village_residence');
			$table->integer('district_workplace')->unsigned()->nullable()->after('village_workplace');
			$table->integer('is_micro')->unsigned()->default(0);

			$table->foreign('district_residence')->references('id')->on('unhls_districts');
            $table->foreign('district_workplace')->references('id')->on('unhls_districts');

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
