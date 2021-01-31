<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePocResults extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('poc_results', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('patient_id')->unsigned();
			$table->enum('results', array('Negative', 'Positive', 'Error'));
			$table->date('test_date');
			$table->string('tested_by');
			$table->string('dispatched_by');
			$table->date('dispatched_date');
			$table->time('test_time');
			$table->string('equipment_used');
			$table->foreign('patient_id')->references('id')->on('poc_tables');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('poc_results');
	}

}
