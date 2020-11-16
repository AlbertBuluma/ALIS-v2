<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTherapyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('therapy', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('visit_id')->unsigned();
			$table->integer('patient_id')->unsigned();
			$table->string('previous_therapy')->nullable();
			$table->string('current_therapy')->nullable();
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
