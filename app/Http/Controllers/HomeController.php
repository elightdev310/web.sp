<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use SPUserLib;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $current_user = SPUserLib::currentUser();
        if ($current_user) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('user.login');
        }
    }

    /**
    * Dashboard Page (dashboard)
    *
    */
    public function dashboard(Request $request) {
        return view('sp.dashboard');
    }
}
