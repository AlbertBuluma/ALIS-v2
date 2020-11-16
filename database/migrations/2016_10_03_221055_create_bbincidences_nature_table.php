<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBbincidencesNatureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unhls_bbincidences_nature', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('bbincidence_id')->unsigned();
			$table->integer('nature_id')->unsigned();
			$table->foreign('bbincidence_id')->references('id')->on('unhls_bbincidences');
			$table->foreign('nature_id')->references('id')->on('unhls_bbnatures');
            $table->softDeletes();
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
		Schema::drop('unhls_bbincidences_nature');
	}

}
