<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdatePocTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::update('ALTER TABLE poc_tables ADD given_contrimazole VARCHAR(60) NULL AFTER updated_at, ADD delivered_at VARCHAR(60) NULL AFTER given_contrimazole, ADD nin VARCHAR(60) NULL AFTER delivered_at, ADD feeding_status VARCHAR(60) NULL AFTER nin');
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
