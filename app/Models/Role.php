<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;


class Role extends SpatieRole
{
    /**
    * Function for getting the admin role, currently the first user
    *
    */
    public static function getAdminRole()
    {
        return Role::find(1);
    }
}
