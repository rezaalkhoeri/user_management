<?php
namespace App\Http\Controllers;
use Auth;
use Alert;
use Hash;
use Illuminate\Http\Request;
use Guzzle\Http\Client;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
        $users = Session::get('users');
        $return = ['users'];
        return view('user-management.dashboard.dashboard', compact($return));
    }

}
