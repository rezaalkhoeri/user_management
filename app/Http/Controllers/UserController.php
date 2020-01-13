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

    public function index(Request $request)
    {
        //Get data user
        $data = Session::get('SessionToken');
        $users = Session::get('users');
        $token = $data->responseData->token;

        $client = new \GuzzleHttp\Client();
        $url = config('app.url')."/api/users_data/";
        $response = $client->get($url, [
            'headers' => [
                'authentication' => $token ,
            ]
        ]);
        $body= json_decode($response->getBody());
        $getdatas = $body->responseData;

        $return = [
            'getdatas', 'users'
        ];

        return view('user-management.admin-page.users_data.users-data',compact($return));
    }

    public function addUserIndex()
    {
        //Get data user
        $data = Session::get('SessionToken');
        $users = Session::get('users');
        $token = $data->responseData->token;

        $client = new \GuzzleHttp\Client();
        $url = config('app.url')."/api/position/";
        $response = $client->get($url, [
            'headers' => [
                'authentication' => $token ,
            ]
        ]);
        $body= json_decode($response->getBody());
        $getPosition = $body->responseData;

        // echo '<pre>',print_r($getPosition,1),'</pre>';
        // die;

        $return = ['getPosition','users'];

        return view('user-management.admin-page.users_data.input-usersdata', compact($return));
    }

    public function addUser(Request $request)
    {
        //Input data user
        $data = Session::get('SessionToken');
        $users = Session::get('users');
        $token = $data->responseData->token;

        $httpclient = new \GuzzleHttp\Client();
        $response = $httpclient->post(config('app.url').'/api/users_data/insert', [
            'headers' => [
                'Content-Type'      => 'application/x-www-form-urlencoded',
                'authentication'    => $token,
            ],
            'form_params' => [
                "personal_number" => $request->get('personal_number'),
                "name" => $request->get('name'),
                "ad_username" => $request->get('ad_username'),
                "email" => $request->get('email'),
                "zpassword" => $request->get('zpassword'),
                "role" => $request->get('role'),
            ],
        ]);

        $newUsers= $response->getBody();
        $post_user= json_decode($newUsers);
        
        Session::flash('message', 'Berhasil menambahkan data users!');            
        Session::flash('type','success');
        return redirect(route('users.data'));
      }

    public function editUser($PERNR)
    {
         //Get data user
        $data = Session::get('SessionToken');
        $users = Session::get('users');
        $token = $data->responseData->token;

        $client = new \GuzzleHttp\Client();
        $url = config('app.url')."/api/users_data/getByID/".$PERNR;

        $response = $client->get($url, [
            'headers' => [
                'authentication' => $token ,
            ],
        ]);

        $updates = json_decode($response->getBody());
        $getusers = $updates->responseData;
        $get = array($getusers);

        $return = ['get','users'];

        return view('user-management.admin-page.users_data.edit-usersdata',compact($return));

    }
    public function updateUser(Request $request, $PERNR, $ASSIGNMENT_NUMBER)
    {
        //Update data user
        $data = Session::get('SessionToken');
        $token = $data->responseData->token;

        $clients = new \GuzzleHttp\Client();
        $urls = config('app.url')."/api/users_data/update";
        $responses = $clients->post($urls, [
            'headers' => [
                'authentication' => $token ,
                'Content-Type'     => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                "personal_number" => $PERNR,
                "assignment_number" => $ASSIGNMENT_NUMBER,
                "name" => $request->get('name'),
                "ad_username" => $request->get('ad_username'),
                "email" => $request->get('email'),
                "role" => $request->get('role'),
            ],
        ]);
        $newUsers= $responses->getBody();
        $post_user= json_decode($newUsers);
        $user_data = $post_user->responseData;

        Session::flash('message', 'Berhasil update data users!');            
        Session::flash('type','success');
        return redirect(route('users.data'));
    }

    public function deleteUser(Request $request, $PERNR, $ASSIGNMENT_NUMBER)
    {
        $data = Session::get('SessionToken');
        $token = $data->responseData->token;

        $hit_api = new \GuzzleHttp\Client();
        $urls = config('app.url')."/api/users_data/delete";
        $responses = $hit_api->post($urls, [
            'headers' => [
                'authentication' => $token ,
            ],
            'form_params' => [
                "personal_number"=> $PERNR,
                "assignment_number"=> $ASSIGNMENT_NUMBER,
            ],
        ]);
        $deletes= json_decode($responses->getBody());
        $delete_users = $deletes->responseData;

        Session::flash('message', 'Berhasil nonaktifkan users!');            
        Session::flash('type','success');
        return redirect(route('users.data'));
    }

    public function activeUser(Request $request, $PERNR, $ASSIGNMENT_NUMBER)
    {
        $data = Session::get('SessionToken');
        $token = $data->responseData->token;

        $hit_apis = new \GuzzleHttp\Client();
        $uris = config('app.url')."/api/users_data/activate";
        $responses = $hit_apis->post($uris, [
            'headers' => [
                'authentication' => $token ,
            ],
            'form_params' => [
                "personal_number"=> $PERNR,
                "assignment_number"=> $ASSIGNMENT_NUMBER,
            ],
        ]);
        $actives= json_decode($responses->getBody());
        $actived_users = $actives->responseData;

        Session::flash('message', 'Berhasil aktifkan users!');            
        Session::flash('type','success');
        return redirect(route('users.data'));
    }

    public function userstatus(Request $request)
    {
        //Get data user
        $data = Session::get('SessionToken');
        $token = $data->responseData->token;

        $client = new \GuzzleHttp\Client();
        $url = config('app.url')."/api/users_data/";
        $response = $client->get($url, [
            'headers' => [
                'authentication' => $token ,
            ]
        ]);
        $body= json_decode($response->getBody());
        $getdatas = $body->responseData;

        //Get Data User Login
        $responses = $client->get(config('app.url').'/api/user/', [
            'headers' => [
                'authentication' => $token,
              ]
        ]);
        $user= json_decode($responses->getBody());
        $users = $user->responseData;
        Session::put('users', $users);
        return view('user-management.admin-page.data-statususers',compact('getdatas','users'));
    }


    // public function showChangePasswordForm(){
    //     return view('auth.changepassword');
    // }
//     public function changePassword(Request $request){
//         if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
//             // The passwords matches
//             return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
//         }
//         if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
//             //Current password and new password are same
//             return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
//         }
//         $validatedData = $request->validate([
//             'current-password' => 'required',
//             'new-password' => 'required|string|min:6|confirmed',
//         ]);
//         //Change Password
//         $user = Auth::user();
//         $user->password = bcrypt($request->get('new-password'));
//         $user->save();
//         return redirect()->back()->with("success","Password changed successfully !");
//     }

}
