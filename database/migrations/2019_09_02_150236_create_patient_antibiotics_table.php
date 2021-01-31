<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreatePatientAntibioticsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patient_antibiotics', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('patient_id')->unsigned();
			$table->integer('drug_id')->unsigned();
			$table->timestamps();

			//referenced columns
			$table->foreign('patient_id')->references('id')->on('unhls_patients');
			$table->foreign('drug_id')->references('id')->on('drugs');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('patient_antibiotics');
	}

}
