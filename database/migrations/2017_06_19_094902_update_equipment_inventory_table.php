<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEquipmentInventoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('unhls_equipment_inventory', function($table)
		{

		    $table->integer('supplier_id')->unsigned();
//		    $table->foreign('supplier_id')->references('id')->on('unhls_equipment_suppliers');

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

		Schema::table('unhls_equipment_inventory', function (Blueprint $table) {
		    $table->dropColumn(['supplier_id']);
		});

	}


}
