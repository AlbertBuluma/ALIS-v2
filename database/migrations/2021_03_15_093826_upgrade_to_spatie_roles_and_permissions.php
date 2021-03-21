<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpgradeToSpatieRolesAndPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('spatie_roles')){
            Artisan::call('optimize:clear');

            $tableNames = config('permission.table_names');
            $columnNames = config('permission.column_names');

            if (empty($tableNames)) {
                throw new \Exception('Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.');
            }

            Schema::create($tableNames['permissions'], function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('display_name')->default(null);
                $table->string('guard_name');
                $table->timestamps();
            });

            Schema::create($tableNames['roles'], function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('guard_name');
                $table->timestamps();
            });

            Schema::create($tableNames['model_has_permissions'], function (Blueprint $table) use ($tableNames, $columnNames) {
                $table->unsignedBigInteger('permission_id');

                $table->string('model_type');
                $table->unsignedBigInteger($columnNames['model_morph_key']);
                $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_permissions_model_id_model_type_index');

                $table->foreign('permission_id')
                    ->references('id')
                    ->on($tableNames['permissions'])
                    ->onDelete('cascade');

                $table->primary(['permission_id', $columnNames['model_morph_key'], 'model_type'],
                    'model_has_permissions_permission_model_type_primary');
            });

            Schema::create($tableNames['model_has_roles'], function (Blueprint $table) use ($tableNames, $columnNames) {
                $table->unsignedBigInteger('role_id');

                $table->string('model_type');
                $table->unsignedBigInteger($columnNames['model_morph_key']);
                $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_roles_model_id_model_type_index');

                $table->foreign('role_id')
                    ->references('id')
                    ->on($tableNames['roles'])
                    ->onDelete('cascade');

                $table->primary(['role_id', $columnNames['model_morph_key'], 'model_type'],
                    'model_has_roles_role_model_type_primary');
            });

            Schema::create($tableNames['role_has_permissions'], function (Blueprint $table) use ($tableNames) {
                $table->unsignedBigInteger('permission_id');
                $table->unsignedBigInteger('role_id');

                $table->foreign('permission_id')
                    ->references('id')
                    ->on($tableNames['permissions'])
                    ->onDelete('cascade');

                $table->foreign('role_id')
                    ->references('id')
                    ->on($tableNames['roles'])
                    ->onDelete('cascade');

                $table->primary(['permission_id', 'role_id'], 'role_has_permissions_permission_id_role_id_primary');
            });

            app('cache')
                ->store(config('permission.cache.store') != 'default' ? config('permission.cache.store') : null)
                ->forget(config('permission.cache.key'));


            DB::statement('ALTER TABLE `spatie_permissions` CHANGE `guard_name` `guard_name` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT "web"');
            DB::statement('ALTER TABLE `spatie_roles` CHANGE `guard_name` `guard_name` VARCHAR(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT "web"');
            DB::insert('INSERT INTO spatie_permissions (id, name, display_name, created_at, updated_at) SELECT id, name, display_name, created_at, updated_at FROM permissions ORDER BY id ASC');
            DB::update('UPDATE spatie_permissions SET guard_name = "web"');
            DB::insert('INSERT INTO spatie_roles (id, name, created_at, updated_at) SELECT id, name, created_at, updated_at FROM roles ORDER BY id ASC');
            DB::update('UPDATE spatie_roles SET guard_name = "web"');
            DB::insert('INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (1, \'App\\\Models\\\User\', 1)');
            DB::insert('INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES (18, "User", 1)');
            DB::insert('INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (1, 1), (2, 1), (3, 1), (4, 1), (5, 1), (6, 1), (7, 1), (8, 1), (9, 1), (10, 1),
                               (11, 1), (12, 1), (13, 1), (14, 1), (15, 1), (16, 1), (17, 1), (18, 1), (19, 1), (20, 1), (21, 1), (22, 1), (23, 1)');

            Artisan::call('optimize:clear');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(!Schema::hasTable('spatie_roles')){

            $tableNames = config('permission.table_names');

            if (empty($tableNames)) {
                throw new \Exception('Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
            }

            Schema::drop($tableNames['role_has_permissions']);
            Schema::drop($tableNames['model_has_roles']);
            Schema::drop($tableNames['model_has_permissions']);
            Schema::drop($tableNames['roles']);
            Schema::drop($tableNames['permissions']);
        }
    }
}
