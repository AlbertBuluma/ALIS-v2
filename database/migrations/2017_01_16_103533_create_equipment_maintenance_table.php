<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentMaintenanceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//

		Schema::create('unhls_equipment_maintenance', function($table)
		{
			$table->increments('id');
		   	$table->integer('district_id')->unsigned();
		   	$table->integer('facility_id')->unsigned();
		   	$table->integer('year_id')->unsigned();

		    $table->integer('equipment_id')->unsigned();		    
		    $table->datetime('last_service_date');
		    $table->datetime('next_service_date');
		    $table->text('serviced_by_name');
		    $table->text('serviced_by_contact');
			$table->integer('supplier_id');	
			$table->text('comment');					    	

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

		Schema::drop('unhls_equipment_maintenance');		
	}
}
