<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBbincidencesActionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unhls_bbincidences_action', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('bbincidence_id')->unsigned();
			$table->integer('action_id')->unsigned();
			$table->foreign('bbincidence_id')->references('id')->on('unhls_bbincidences');
			$table->foreign('action_id')->references('id')->on('unhls_bbactions');

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
		Schema::drop('unhls_bbincidences_action');
	}

}
