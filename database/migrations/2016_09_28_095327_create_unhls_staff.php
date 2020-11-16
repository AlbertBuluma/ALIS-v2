<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnhlsStaff extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unhls_staff', function($table)
		{
			$table->increments('id');
		   	$table->integer('facility_id')->unsigned();
			$table->string('firstName');		
			$table->string('lastName');		

		    $table->foreign('facility_id')->references('id')->on('unhls_facilities');
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

		Schema::drop('unhls_staff');

	}

}
