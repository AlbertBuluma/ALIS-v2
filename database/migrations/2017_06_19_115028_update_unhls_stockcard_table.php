<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUnhlsStockcardTable extends Migration {

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

		    $table->datetime('transaction_date')->nullable();

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
		    $table->dropColumn(['transaction_date']);
		});

	}

}
