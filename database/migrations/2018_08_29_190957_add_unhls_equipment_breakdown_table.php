<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUnhlsEquipmentBreakdownTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('unhls_equipment_breakdown', function(Blueprint $table)
		{
			// $table->increments('id');
			// $table->integer('district_id')->unsigned();
			// $table->integer('facility_id')->unsigned();
			$table->string('facility_code');
			$table->string('facility_level');
			// $table->date('report_date');

			// $table->integer('equipment_id')->unsigned();
			$table->string('equipment_code');
			$table->string('equipment_type');
			$table->text('problem');
			$table->string('equipment_failure');
			$table->string('reporting_officer');
			$table->string('reporting_officer_contact');
			$table->string('reporting_officer_email');
			$table->string('intervention_authority');
			// $table->text('action_taken');
			$table->text('conclusion');
			$table->string('verified_by');
			$table->date('verification_date');
			// $table->integer('in_charge_id');
			// $table->integer('priority');

			// $table->foreign('district_id')->references('id')->on('unhls_districts');
			// $table->foreign('facility_id')->references('id')->on('unhls_facilities');
			// $table->foreign('equipment_id')->references('id')->on('unhls_equipment_inventory');
			// $table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('unhls_equipment_breakdown', function(Blueprint $table)
		{

		});
	}

}
