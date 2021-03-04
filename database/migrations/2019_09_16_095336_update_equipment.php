<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class UpdateEquipment extends Migration {

	public function up()
	{
		Schema::table('unhls_equipment_inventory', function($table)
		{
		    $table->integer('name_id')->nullable()->after('name');
		    $table->string('unique_number', 100)->nullable()->after('name_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('unhls_equipment_inventory', function(Blueprint $table)
		{
			$table->dropColumn('name_id');
			$table->dropColumn('unique_number');
		});
	}

}
