<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddColumnRangeInterpretion extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('measure_ranges', function(Blueprint $table)
		{
			$table->integer('result_interpretation_id')->unsigned()->nullable();
		});

		Schema::create('daily_negative_gram_stains', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('gram_stain_range_id')->unsigned();
		});

		Schema::create('daily_negative_cultures', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organism_id')->unsigned();
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
