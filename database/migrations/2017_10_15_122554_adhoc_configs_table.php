<?php

use App\Models\AdhocConfig;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdhocConfigsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adhoc_configs', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('option')->unsigned()->nullable();
		});

		AdhocConfig::create(['name' => 'Report','option' => AdhocConfig::$constants['Report']['Standard']]);
		AdhocConfig::create(['name' => 'ULIN','option' => AdhocConfig::$constants['ULIN']['Standard']]);
		AdhocConfig::create(['name' => 'Clinician_UI','option' => AdhocConfig::$constants['Clinician_UI']['No']]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
