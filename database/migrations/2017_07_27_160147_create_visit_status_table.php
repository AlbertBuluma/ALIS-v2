<?php

use App\Models\Role;
use App\Models\VisitStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

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
		Model::unguard();

		VisitStatus::create(["id" => 1, "name" => "appointment-made"]);
		VisitStatus::create(["id" => 2, "name" => "test-request-made"]);
		VisitStatus::create(["id" => 3, "name" => "specimen_received"]);
		VisitStatus::create(["id" => 4, "name" => "tests-completed"]);

		/* Permissions table */
		$permissions = array(
			array("name" => "manage_appointments", "display_name" => "Can manage appointments with Clinician", "guard_name" => "web"),
			array("name" => "make_labrequests", "display_name" => "Can make lab requests(Only for Clinicians)", "guard_name" => "web"),
			array("name" => "manage_visits", "display_name" => "Can manage visit content", "guard_name" => "web"),
		);

		$superadmin = Role::find(1);
		foreach ($permissions as $permission) {
//			$superadmin->attachPermission(Permission::create($permission));
			$superadmin->givePermissionTo(Permission::create($permission));
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
