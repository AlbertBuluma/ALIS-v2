<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateLookupType extends Migration {

	/**
     * Run the migrations.
     *
     * @return void
     */
	 public function up()
    {
        Schema::create('look_ups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
			$table->integer('status')->default(1);
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
         Schema::dropIfExists('look_ups');
    }


}
