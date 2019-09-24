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

    public function index(Request $request)
    {
        //Get data user
        $token = Session::get('SessionToken');
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost:3000/api/users_data/";
        $response = $client->get($url, [
            'headers' => [
                'authentication' => $token ,
            ]
        ]);
        $body= json_decode($response->getBody());
        $getdatas = $body->responseData;

        //Get Data User Login
        $responses = $client->get('http://localhost:3000/api/user/', [
            'headers' => [
                'authentication' => $token,
              ]
        ]);
        $user= json_decode($responses->getBody());
        $users = $user->responseData;
        Session::put('users', $users);
        return view('user-management.admin-page.users-data',compact('getdatas','users'));
    }

    public function addUserIndex()
    {
        return view('user-management.admin-page.input-usersdata');
    }

    public function listapps()
    {
        return view('user-management.users-page.list-app');
    }
    public function userstatus(Request $request)
    {
        //Get data user
        $token = Session::get('SessionToken');
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost:3000/api/users_data/";
        $response = $client->get($url, [
            'headers' => [
                'authentication' => $token ,
            ]
        ]);
        $body= json_decode($response->getBody());
        $getdatas = $body->responseData;

        //Get Data User Login
        $responses = $client->get('http://localhost:3000/api/user/', [
            'headers' => [
                'authentication' => $token,
              ]
        ]);
        $user= json_decode($responses->getBody());
        $users = $user->responseData;
        Session::put('users', $users);
        return view('user-management.admin-page.data-statususers',compact('getdatas','users'));
    }

    public function addUser(Request $request)
    {
        //Input data user
        $bearers = Session::get('SessionToken');
        $httpclient = new \GuzzleHttp\Client();
        $response = $httpclient->post('http://localhost:3000/api/users_data/insert', [
            'headers' => [
                'Content-Type'      => 'application/x-www-form-urlencoded',
                'authentication'    => $bearers,
            ],
            'form_params' => [
                "personal_number" => $request->get('personal_number'),
                "name" => $request->get('name'),
                "ad_username" => $request->get('ad_username'),
                "email" => $request->get('email'),
                "zpassword" => $request->get('zpassword'),
            ],
        ]);
        $newUsers= $response->getBody();
        $post_user= json_decode($newUsers);
        //Get data user
        $url = "http://localhost:3000/api/users_data/";
        $response = $httpclient->get($url, [
            'headers' => [
                'authentication' => $bearers ,
            ]
        ]);

        $body= json_decode($response->getBody());
        $getdatas = $body->responseData;
        return redirect('dashboard-admin')->with('status', 'Data Success Created!');
        // return view('apps.adminlayouts.dashboardadmin',compact('getdatas'));
    }

    public function updateUserIndex($PERNR)
    {
         //Get data user
         $token = Session::get('SessionToken');
         $client = new \GuzzleHttp\Client();
         $url = "http://localhost:3000/api/users_data/getByID/".$PERNR;

         $response = $client->get($url, [
             'headers' => [
                 'authentication' => $token ,
             ],
         ]);

         $updates = json_decode($response->getBody());
         $getusers = $updates->responseData;
         $get = array($getusers);
         // print_r($get);
         return view('user-management.admin-page.edit-usersdata',compact('get'));

    }
    public function updateUser(Request $request, $PERNR, $ASSIGNMENT_NUMBER)
    {
        //Update data user
        $bearer = Session::get('SessionToken');
        $clients = new \GuzzleHttp\Client();
        $urls = "http://localhost:3000/api/users_data/update";
        $responses = $clients->post($urls, [
            'headers' => [
                'authentication' => $bearer ,
                'Content-Type'     => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                "personal_number" => $PERNR,
                "assignment_number" => $ASSIGNMENT_NUMBER,
                "name" => $request->get('name'),
                "ad_username" => $request->get('ad_username'),
                "email" => $request->get('email'),
                // "z_password" => $request->get('z_password'),
            ],
        ]);
        $newUsers= $responses->getBody();
        $post_user= json_decode($newUsers);
        $user_data = $post_user->responseData;

        return redirect(route('home.dashboard-admin',compact('user_data')));
    }
    public function deleteUser(Request $request, $PERNR, $ASSIGNMENT_NUMBER)
    {
        $token_bearers = Session::get('SessionToken');
        $hit_api = new \GuzzleHttp\Client();
        $urls = "http://localhost:3000/api/users_data/delete";
        $responses = $hit_api->post($urls, [
            'headers' => [
                'authentication' => $token_bearers ,
            ],
            'form_params' => [
                "personal_number"=> $PERNR,
                "assignment_number"=> $ASSIGNMENT_NUMBER,
            ],
        ]);
        $deletes= json_decode($responses->getBody());
        $delete_users = $deletes->responseData;
        return redirect(route('home.users-status',compact('delete_users')))->with('status', 'Inactive Data Success!');
    }
    public function activeUser(Request $request, $PERNR, $ASSIGNMENT_NUMBER)
    {
        $token_bearers = Session::get('SessionToken');
        $hit_apis = new \GuzzleHttp\Client();
        $uris = "http://localhost:3000/api/users_data/activate";
        $responses = $hit_apis->post($uris, [
            'headers' => [
                'authentication' => $token_bearers ,
            ],
            'form_params' => [
                "personal_number"=> $PERNR,
                "assignment_number"=> $ASSIGNMENT_NUMBER,
            ],
        ]);
        $actives= json_decode($responses->getBody());
        $actived_users = $actives->responseData;
        return redirect(route('home.users-status',compact('actived_users')))->with('status', 'Active Data Success!');
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
