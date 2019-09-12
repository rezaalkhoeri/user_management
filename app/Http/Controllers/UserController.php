<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Guzzle\Http\Client;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */

    public function getLogin()
    {
      return view('auth.login');
    }
    public function authlogin(Request $request){
        $http = new \GuzzleHttp\Client();
        $url = "http://localhost:3000/api/auth/login";
        $response = $http->post($url, [
            'form_params' => [
                "username"=>$request->get('username'),
                "password"=>$request->get('password'),
            ],
        ]);
        $body = json_decode($response->getBody());
        $bearer = $body->responseData->token;
        Session::put('SessionToken', $bearer);
        return redirect(route('home.dashboard-admin'));
      }
      
      public function signout() {
        Session::flush();
        return redirect('signin')->with('alert','Kamu sudah logout');
    }
}
