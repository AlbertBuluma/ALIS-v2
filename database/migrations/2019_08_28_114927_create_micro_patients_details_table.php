 <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMicroPatientsDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('micro_patients_details', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('patient_id')->unsigned();
            $table->string('sub_county_residence', 150)->nullable();
            $table->string('sub_county_workplace', 150)->nullable();  
            $table->string('name_next_kin', 150)->nullable();
            $table->string('contact_next_kin')->nullable();
            $table->string('residence_next_kin', 150)->nullable();
            $table->dateTime('admission_date')->nullable();
            $table->tinyInteger('transfered')->nullable();
            $table->string('facility_transfered')->nullable;
            $table->text('clinical_notes')->nullable; 
            $table->string('days_on_antibiotic')->nullable();
            $table->string('requested_by')->nullable();
            $table->string('clinician_contact')->nullable();

            $table->softDeletes();
            $table->timestamps();
            
			$table->foreign('patient_id')->references('id')->on('unhls_patients');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('micro_patients_details');

	}
}