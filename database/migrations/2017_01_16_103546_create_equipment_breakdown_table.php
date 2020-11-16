<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentBreakdownTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//

		Schema::create('unhls_equipment_breakdown', function($table)
		{
			$table->increments('id');
		   	$table->integer('district_id')->unsigned();
		   	$table->integer('facility_id')->unsigned();
		   	$table->integer('year_id')->unsigned();

		    $table->integer('equipment_id')->unsigned();		    
		    $table->text('description');
		    $table->text('action_taken');
		    $table->text('hsd_request');
			$table->integer('in_charge_id');	
			$table->integer('priority');					    	

		    $table->foreign('district_id')->references('id')->on('unhls_districts');
		    $table->foreign('facility_id')->references('id')->on('unhls_facilities');
		    $table->foreign('year_id')->references('id')->on('unhls_financial_years');
		    $table->foreign('equipment_id')->references('id')->on('unhls_equipment_inventory');
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
		//

		Schema::drop('unhls_equipment_breakdown');		
	}

}
