<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;

use Illuminate\Database\Eloquent\Model;

class ROLE2 extends EntrustRole
{
    /**
     * Function for getting the admin role, currently the first user
     *
     */
    public static function getAdminRole()
    {
        return ROLE2::find(1);
    }
}
