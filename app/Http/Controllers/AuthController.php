<?php

namespace App\Http\Controllers;
use Auth;
use Alert;
use Hash;
use Guzzle\Http\Client;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function getLogin()
    {
      return view('auth.login');
    }

    public function authlogin(Request $request){

          $http = new \GuzzleHttp\Client();
          $url = config('app.url')."/api/auth/login";
          $response = $http->post($url, [
              'form_params' => [
                  "email"=>$request->get('email'),
                  "password"=>$request->get('password'),
              ],
          ]);
  
          $body = json_decode($response->getBody()); 
          
          if ($body->responseCode == 55) {
              Session::flash('warning', $body->responseMessage );
              Session::flash('type','warning');
              return redirect(route('signin'));            
          
          } elseif ($body->responseCode == 05){
              Session::flash('warning', $body->responseMessage );            
              Session::flash('type','warning');
              return redirect(route('signin'));            
          
          } elseif ($body->responseCode == 99){
              Session::flash('alert', $body->responseMessage );            
              Session::flash('type','error');            
              return redirect(route('signin'));            
          
          } elseif ($body->responseCode == 45){
              Session::flash('warning', $body->responseMessage );            
              Session::flash('type','warning');            
              return redirect(route('signin'));            
          
          } elseif ($body->responseCode == '00'){              
                $data = $body->responseData;
                
                Session::put('tokenCredential', $body->responseData->token);
                Session::put('login', $data);

                //Get Data User Login
                $client = new \GuzzleHttp\Client();
                $responses = $client->get(config('app.url').'/api/user/', [
                    'headers' => [
                        'authentication' => $data->token,
                      ]
                ]);
                $user= json_decode($responses->getBody());
                
                $users = $user->responseData;
                Session::put('users', $users);

                if($data->role == null){
                  $data->role = "3";
                }

              if ($data->role == 1) {
                Session::put('SessionToken', $body);
                return redirect(route('home.dashboard'));                            
              } else {
                //Pekerja
                Session::put('SessionToken', $body);
                return redirect(route('home.dashboard'));                            
              } 
          }

          // echo '<pre>',print_r($body,1),'</pre>';
          // die;  
          // $bearer = $body->responseData->token; 
    }
      
    public function signout(Request $request) {
        $http = new \GuzzleHttp\Client();
        $url = config('app.url')."/api/auth/logout";
        $tokenCredential = Session::get('tokenCredential');

        $response = $http->post($url, [
          'form_params' => [
                  "key"=>$tokenCredential
              ],
        ]);
  
        $body = json_decode($response->getBody()); 
          
        if ($body->responseCode == 55) {

        }
        
        $request->session()->flush();
        return redirect('signin')->with('info','Logout Success!');
    }

}
