<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnhlsStockcard extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('unhls_stockcard', function($table)
		{
			$table->increments('id');
		   	$table->integer('district_id')->unsigned();
		   	$table->integer('facility_id')->unsigned();
		   	$table->integer('year_id')->unsigned();
		   	$table->integer('commodity_id')->unsigned();
		    $table->integer('to_from');		    
		    $table->integer('to_from_type');
		    $table->string('voucher_number');
		    $table->integer('quantity');
			$table->string('action');
			$table->string('batch_number');
			$table->dateTime('issue_date');			
			$table->dateTime('expiry_date');	
			$table->string('initials');		
			$table->string('remarks');		
			$table->integer('balance');
		    	

		    $table->foreign('district_id')->references('id')->on('unhls_districts');
		    $table->foreign('facility_id')->references('id')->on('unhls_facilities');
		    $table->foreign('year_id')->references('id')->on('unhls_financial_years');
		    $table->foreign('commodity_id')->references('id')->on('commodities');
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
		
		Schema::drop('unhls_stockcard');
	}

}
