<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateLookpTypeValue extends Migration {
 /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('look_up_values', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('look_up_id');
            $table->string('value');
            $table->string('value_description');
			$table->integer('status')->default(1);
			$table->integer('order')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('look_up_values');
    }

}
