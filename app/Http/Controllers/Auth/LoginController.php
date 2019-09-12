<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class LoginController extends Controller
{
    // /*
    // |--------------------------------------------------------------------------
    // | Login Controller
    // |--------------------------------------------------------------------------
    // |
    // | This controller handles authenticating users for the application and
    // | redirecting them to your home screen. The controller uses a trait
    // | to conveniently provide its functionality to your applications.
    // |
    // */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
     protected $redirectTo = '/dashboard-admin';

     /**
      * Create a new controller instance.
      *
      * @return void
      */
      public function __construct()
      {
        $this->middleware('guest')->except('logout');
      }

      public function login(Request $request){
        $http = new \GuzzleHttp\Client();
        $url = "http://localhost:3000/api/auth/login";
        $response = $http->post($url, [
            'form_params' => [
                "username"=>$request->get('username'),
                "password"=>$request->get('password'),
            ], 
        ]);
        $auth = json_decode($response->getBody(),true);
        
        // dd($auth);
        // // call
        // $response = $http->get('http://localhost:3000/api/users_data/', [
        // 'headers' => [
        //     'authentication' => $auth->responseData->token,
        //   ]
        // ]);
        // $auths = json_decode($response->getBody());
        // // dd($auths);
        // // result
        // // return view('apps.adminlayouts.dashboardAdmin');
		    // // return View::make($content);
        // return redirect()->route('home.dashboard-admin')->with('body',$auths);
        // dd($result);
		    // return View::make($content);
        
      }

      public function getUser()
      {
        
      }

      public function logout(){
        Session::flush();
        return redirect('login')->with('alert','Kamu sudah logout');
    }
}
