<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnhlsDrugsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	
		Schema::create('unhls_drugs', function($table)

		{
			
		    $table->increments('id');
			$table->string('code');
		    $table->string('name');
		    $table->string('formulation');
		    $table->string('strength');		
		    $table->string('pack_size');
		    $table->string('unit_of_issue');		    
		    $table->string('amc');
		    $table->string('max_stock_level');
		    $table->string('min_stock_level');
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
		
		Schema::drop('unhls_drugs');
	}

}
