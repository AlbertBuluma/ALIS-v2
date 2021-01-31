<?php
/**
|TODO:
|generate a monthly... and enter into the monthly tables still to be created, considering files if to use R
|consider using another database which implies having two dbs on the same applications
*/

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateReportsTables extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_specimen_counts', function($table)
        {
            $table->increments('id');
            $table->date('date')->unique();
            $table->integer('all')->unsigned();
            $table->integer('accepted')->unsigned();
            $table->integer('rejected')->unsigned();
            $table->integer('referred_in')->unsigned()->nullable();
            $table->integer('referred_out')->unsigned()->nullable();
        });

        Schema::create('daily_specimen_type_counts', function($table)
        {
            $table->increments('id');
            $table->date('date');
            $table->integer('daily_specimen_count_id')->unsigned();
            $table->integer('specimen_type_id')->unsigned();
            $table->integer('all')->unsigned();
            $table->integer('accepted')->unsigned();
            $table->integer('rejected')->unsigned();
            $table->integer('referred_in')->unsigned();
            $table->integer('referred_out')->unsigned();

            $table->foreign('daily_specimen_count_id')->references('id')->on('daily_specimen_counts');
            $table->foreign('specimen_type_id')->references('id')->on('specimen_types');
        });

        Schema::create('daily_rejection_reason_counts', function($table)
        {
            $table->increments('id');
            $table->date('date');
            $table->integer('daily_specimen_count_id')->unsigned();
            $table->integer('reason_id')->unsigned();
            $table->integer('count')->unsigned();

            $table->foreign('daily_specimen_count_id')->references('id')->on('daily_specimen_counts');
            $table->foreign('reason_id')->references('id')->on('rejection_reasons');
        });

        Schema::create('daily_test_counts', function($table)
        {
            $table->increments('id');
            $table->date('date')->unique();
            $table->integer('all')->unsigned();
            $table->integer('referred_in')->unsigned();
            $table->integer('referred_out')->unsigned();

        });

        Schema::create('daily_test_type_counts', function($table)
        {
            $table->increments('id');
            $table->date('date');
            $table->integer('daily_test_count_id')->unsigned();
            $table->integer('test_type_id')->unsigned();
            $table->integer('age_upper_limit')->unsigned();
            $table->integer('age_lower_limit')->unsigned();
            $table->integer('gender')->unsigned();
            $table->integer('all')->unsigned();
            $table->integer('referred_in')->unsigned();
            $table->integer('referred_out')->unsigned();

            $table->foreign('test_type_id')->references('id')->on('test_types');
            $table->foreign('daily_test_count_id')->references('id')->on('daily_test_counts');
        });

        Schema::create('daily_turn_around_time', function($table)
        {
            $table->increments('id');
            $table->date('date');
            $table->integer('daily_test_type_count_id')->unsigned();
            $table->integer('avg_reception_tostart')->unsigned();//sum($test->specimen->time_accepted - $test->time_started)/(no of testType)
            $table->integer('avg_start_tocompletion')->unsigned();//sum($test->time_started - $test->time_completed)/(no of testType)
            $table->integer('avg_reception_tocompletion')->unsigned();//sum($test->specimen->time_accepted - $test->time_completed)/(no of testType)
            $table->integer('avg_start_tovarification')->unsigned();//sum($test->time_started - $test->time_verified)/(no of testType)

            $table->foreign('daily_test_type_count_id')->references('id')->on('daily_test_type_counts');
        });

        Schema::create('daily_gram_stain_result_counts', function($table)
        {
            $table->increments('id');
            $table->date('date');
            $table->integer('daily_test_type_count_id')->unsigned();
            $table->integer('gram_stain_range_id')->unsigned();
            $table->integer('count')->unsigned();// result

            $table->foreign('daily_test_type_count_id')->references('id')->on('daily_test_type_counts');
        });

        Schema::create('daily_hiv_counts', function($table)
        {
            $table->increments('id');
            $table->date('date');
            $table->integer('daily_test_type_count_id')->unsigned();
            $table->string('result');
            $table->string('purpose')->nullable();
            $table->integer('count')->unsigned();

            $table->foreign('daily_test_type_count_id')->references('id')->on('daily_test_type_counts');
        });

        Schema::create('result_interpretations', function($table)
        {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('daily_alphanumeric_counts', function($table)
        {
            $table->increments('id');
            $table->date('date');
            $table->integer('daily_test_type_count_id')->unsigned();
            $table->integer('measure_id')->unsigned();
            $table->integer('measure_range_id')->unsigned();//result
            $table->integer('result_interpretation_id')->unsigned()->nullable();//result
            $table->integer('count')->unsigned();

            $table->foreign('daily_test_type_count_id')->references('id')->on('daily_test_type_counts');
            $table->foreign('measure_id')->references('id')->on('measures');
            $table->foreign('measure_range_id')->references('id')->on('measure_ranges');
            $table->foreign('result_interpretation_id')->references('id')->on('result_interpretations');
        });

        Schema::create('daily_numeric_range_counts', function($table)
        {
            $table->increments('id');
            $table->date('date');
            $table->integer('daily_test_type_count_id')->unsigned();
            $table->integer('measure_id')->unsigned();
            $table->string('result');
            $table->integer('result_interpretation_id')->unsigned()->nullable();//result
            $table->integer('count')->unsigned();

            $table->foreign('daily_test_type_count_id')->references('id')->on('daily_test_type_counts');
            $table->foreign('measure_id')->references('id')->on('measures');
            $table->foreign('result_interpretation_id')->references('id')->on('result_interpretations');
        });

        Schema::create('daily_organism_counts', function($table)
        {
            $table->increments('id');
            $table->date('date');
            $table->integer('daily_test_type_count_id')->unsigned();
            $table->integer('organism_id')->unsigned();
            $table->integer('result_interpretation_id')->unsigned()->nullable();
            $table->integer('count')->unsigned();

            $table->foreign('organism_id')->references('id')->on('organisms');
            $table->foreign('result_interpretation_id')->references('id')->on('result_interpretations');
        });

        Schema::create('daily_susceptibility_counts', function($table)
        {
            $table->increments('id');
            $table->date('date');
            $table->integer('daily_organism_count_id')->unsigned();
            $table->integer('antibiotic_id')->unsigned();
            $table->integer('interpretation_id')->unsigned();
            $table->integer('count')->unsigned();

            $table->foreign('daily_organism_count_id')->references('id')->on('daily_organism_counts');
            $table->foreign('antibiotic_id')->references('id')->on('drugs');
            $table->foreign('interpretation_id')->references('id')->on('drug_susceptibility_measures');
        });

        Schema::table('report_diseases', function(Blueprint $table)
        {
            $table->integer('result_interpretation_id')->unsigned()->nullable();
        });
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
