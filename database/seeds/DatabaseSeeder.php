<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
//        Eloquent::unguard();
        Model::unguard();

        DB::unprepared(file_get_contents(base_path() . "/database/seeds/facilities.sql"));
        echo "bulk facilities seeded!\n";

        DB::unprepared(file_get_contents(base_path() . "/database/seeds/other_sql_updates.sql"));
        echo "Updated Tables!\n";

        DB::unprepared(file_get_contents(base_path() . "/database/seeds/test_status.sql"));
        echo "Updated test_statuses Table!\n";

        DB::unprepared(file_get_contents(base_path() . "/database/seeds/permission_role.sql"));
        echo "Updated Admin role permissions in role_has_permissions table!\n";

        DB::unprepared(file_get_contents(base_path() . "/database/seeds/admin_privileges.sql"));
        echo "Updated Admin privileges table!\n";
//        DB::unprepared(file_get_contents(base_path() . "/database/seeds/permissions_update.sql"));
//        echo "Updated permissions Table!\n";

	}

}
