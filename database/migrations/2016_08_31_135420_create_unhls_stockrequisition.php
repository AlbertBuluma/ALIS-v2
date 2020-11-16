<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnhlsStockrequisition extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unhls_stockrequisition', function($table)
		{
			$table->increments('id');
		   	$table->integer('district_id')->unsigned();
		   	$table->integer('facility_id')->unsigned();
		   	$table->integer('year_id')->unsigned();
		   	$table->integer('item_id')->unsigned();
		    $table->string('issued_to');
		    $table->string('voucher_number');
		    $table->integer('quantity_required');
		    $table->integer('quantity_issued');
			$table->dateTime('issue_date');	
			$table->string('remarks');
		    	

		    $table->foreign('district_id')->references('id')->on('unhls_districts');
		    $table->foreign('facility_id')->references('id')->on('unhls_facilities');
		    $table->foreign('year_id')->references('id')->on('unhls_financial_years');
		    $table->foreign('item_id')->references('id')->on('commodities');
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
		
		Schema::drop('unhls_stockrequisition');
	}


}
