<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\SP\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User as UserModule;

class User extends UserModule
{
    use SoftDeletes;

    // public function employee() {
    //     return $this->hasOne('App\SP\Models\Employee', 'user_id');
    // }
}
