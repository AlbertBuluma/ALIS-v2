<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visit_statuses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',45);
		});

		// migrate year
		Eloquent::unguard();

		VisitStatus::create(["id" => 1, "name" => "appointment-made"]);
		VisitStatus::create(["id" => 2, "name" => "test-request-made"]);
		VisitStatus::create(["id" => 3, "name" => "specimen_received"]);
		VisitStatus::create(["id" => 4, "name" => "tests-completed"]);

		/* Permissions table */
		$permissions = array(
			array("name" => "manage_appointments", "display_name" => "Can manage appointments with Clinician"),
			array("name" => "make_labrequests", "display_name" => "Can make lab requests(Only for Clinicians)"),
			array("name" => "manage_visits", "display_name" => "Can manage visit content"),
		);

		$superadmin = Role::find(1);
		foreach ($permissions as $permission) {
			$superadmin->attachPermission(Permission::create($permission));
		}

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
