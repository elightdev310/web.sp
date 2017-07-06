<?php

namespace App\SP\Libs;

use DB;
use Auth;

use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;

use App\User as UserModule;
use App\Role;
use App\SP\Models\User;

Trait UserLib_Helper
{
    /**
     * Get Current User 
     * @return: User (SP Model)
     */
    public function currentUser() {
        $user = Auth::user();
        return $user;
    }
}
