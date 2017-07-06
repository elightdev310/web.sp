<?php

namespace App\SP\Libs;

use DB;
use Auth;

use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;

use App\Role;
use App\SP\Models\User;
use App\SP\Models\SocialProfile;

use App\SP\Libs\UserLib_Helper;

class UserLib 
{
    use UserLib_Helper;
    /**
     * Laravel application
     *
     * @var \Illuminate\Foundation\Application
     */
    public $app;

    /**
     * Create a new confide instance.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    // Get User by email
    public function getUserByEmail($email) {
        $user = User::withTrashed()->where("email", $email)->first();
        return $user;
    }

    public function registerUserAction($req) {
        ///////////////////////////
        if ($_user = $this->getUserByEmail($req['email'])) {
            $error = "Your email has been registered, already. <br/>";
            // if ($_user->status == config('sp.user_status.pending')) {
            //     if (MICHelper::isPendingVerification($_user)) {
            //         $error .= 'We sent verification email. Please check email to verfiy your email account.';
            //     } else {
            //         $error .= "But your account is pending. We're reviewing your account.";
            //     }
            // }
            // else if ($_user->status != config('mic.user_status.active')) {
            //     $error .= "But your account is canceled. Please call MIC to reactivate your account.";
            // }
            return $error;
        }

        try {
            // User Model
            $ud = array();
            $ud['name']     = $req['email']; //$req['first_name'].' '.$req['last_name'];
            $ud['email']    = $req['email'];
            $ud['password'] = $req['password'];
            $ud['type']     = config('sp.user_type.app_user');

            $uid = Module::insert("Users", (object)$ud);
            if (!$uid) {
                $error = "Error occurs when creating User.";
                return $error;
            }

            // Profile

            // User Role (APP_USER)
            $user = User::find($uid);
            $user->detachRoles();
            $role = Role::where('name', config('sp.user_role.app_user'))->first();
            $user->attachRole($role);

            // Send comfirm mail
            // $this->sendConfirmMail($user->email);
            return true;
        }
        catch(Exception $e) {
            $error = $e->getMessage()."in ".$e->getFile()."[Line: ".$e->getLine."]";
            return $error;
        }

        return false;
    }

    /**
     * When login via social site, Create User and Social Profile 
     * @param - provider: social type (facebook, twitter, google)
     * @return: User
     */ 
    public function socialFindOrCreateUser($user, $provider) {
        $socialProfile = SocialProfile::where('email', $user['email'])->first();
        if (!$socialProfile) {
            // Create Social Profile
            $email = $user['email'];
            if (!$email) {
                $email = $user['nickname'];
            }
            $socialProfile = SocialProfile::create([
                'provider' => $provider, 
                'provider_id' => $user['id'], 
                'email' => $email, 
                'token' => $user['token']
            ]);
        }

        $authUser = $socialProfile->user;
        if ($authUser) {
            return $authUser;
        }

        // Create New User
        $authUser = User::create([
            'name'     => $user['name'],
            'email'    => $email,
            'type'     => config('sp.user_type.app_user')
        ]);

        // User Role (APP_USER)
        $authUser->detachRoles();
        $role = Role::where('name', config('sp.user_role.app_user'))->first();
        $authUser->attachRole($role);

        // Send comfirm mail
        // $this->sendConfirmMail($user->email);
        return $authUser;
    }
}
