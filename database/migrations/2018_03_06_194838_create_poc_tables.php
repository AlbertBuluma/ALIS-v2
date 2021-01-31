<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePocTables extends Migration {

	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('poc_tables', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('facility_id');
			$table->integer('district_id');
			$table->string('gender');
			$table->float('age');
			$table->string('exp_no');
			$table->string('provisional_diagnosis');
			$table->string('caretaker_number');
			$table->string('entry_point');
			$table->string('mother_name');
			$table->string('infant_name');
			$table->string('breastfeeding_status');
			$table->string('mother_hiv_status');
			$table->date('collection_date');
			$table->string('pcr_level');
			$table->string('created_by');
			$table->string('pmtct_antenatal');
			$table->string('pmtct_delivery');
			$table->string('pmtct_postnatal');
			$table->date('admission_date');
			$table->string('sample_id');
			$table->string('infant_pmtctarv');
			$table->string('mother_pmtctarv');
			$table->string('other_entry_point');
			$table->softDeletes();
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
		Schema::drop('poc_tables');
	}

}
