<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmrTestRequestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('emr_test_request', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('patient_id');
		    $table->string('emr');
		    $table->integer('visit_type_id');
		    $table->string('ward');
		    $table->string('bed_number');
		    $table->string('clinical_notes');
		    $table->integer('clinician_id');
		    $table->string('hospitalised_more_than_24hrs');
		    $table->string('been_on_anti_biotics');
			
		});
	}
   
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('emr_test_request');
	}

}
