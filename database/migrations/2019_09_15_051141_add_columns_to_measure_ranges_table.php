<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddColumnsToMeasureRangesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('measure_ranges', function(Blueprint $table)
		{
			$table->string('flag_min')->nullable()->after('gender');
			$table->string('flag_max')->nullable()->after('flag_min');
			$table->string('flag_lower')->nullable()->after('range_upper');
			$table->string('flag_upper')->nullable()->after('flag_lower');
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
