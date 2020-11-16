<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentInventoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//

		Schema::create('unhls_equipment_inventory', function($table)
		{
			$table->increments('id');
		   	$table->integer('district_id')->unsigned();
		   	$table->integer('facility_id')->unsigned();
		   	$table->integer('year_id')->unsigned();

		    $table->string('name');		    
		    $table->string('model');
		    $table->string('serial_number');
		    $table->integer('location');
			$table->string('procurement_type');

			$table->dateTime('purchase_date');			
			$table->dateTime('delivery_date');			
			$table->dateTime('verification_date');			
			$table->dateTime('installation_date');	
			$table->boolean('spare_parts');		
			$table->integer('warranty');		
			$table->integer('life_span');
			$table->boolean('service_frequency');	
			$table->boolean('service_contract');						    	

		    $table->foreign('district_id')->references('id')->on('unhls_districts');
		    $table->foreign('facility_id')->references('id')->on('unhls_facilities');
		    $table->foreign('year_id')->references('id')->on('unhls_financial_years');
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

		Schema::drop('unhls_equipment_inventory');		
	}

}
