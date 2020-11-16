<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnhlsEquipmentSuppliersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unhls_equipment_suppliers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');				
			$table->string('phone');
			$table->string('email');		
			$table->string('address');		

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
		Schema::drop('unhls_equipment_suppliers');
	}

}
