<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBbincidencesCauseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unhls_bbincidences_cause', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('bbincidence_id')->unsigned();
			$table->integer('cause_id')->unsigned();
			$table->foreign('bbincidence_id')->references('id')->on('unhls_bbincidences');
			$table->foreign('cause_id')->references('id')->on('unhls_bbcauses');
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
		Schema::drop('unhls_bbincidences_cause');
	}

}
