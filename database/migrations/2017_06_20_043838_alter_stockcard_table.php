<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterStockcardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	Schema::table('unhls_stockcard', function($table)
		{

		    $table->integer('quantity_in')->nullable();
		    $table->integer('quantity_out')->nullable();

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
	
		Schema::table('unhls_stockcard', function (Blueprint $table) {
		    $table->dropColumn(['quantity_in,quantity_out']);
		});

	}

}
