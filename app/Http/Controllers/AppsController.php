<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Guzzle\Http\Client;
use Illuminate\Support\Facades\Session;

class AppsController extends Controller
{
    //

    public function error($body)
    {
        if ($body->responseCode == 10) {
            Session::flash('warning', 'User Access Expired!' );
            Session::flash('type','warning');
            return redirect(route('signin'));
        } elseif ($body->responseCode == 99){
            Session::flash('warning', 'User Access Expired!' );            
            Session::flash('type','warning');
            return redirect(route('signin'));             
        } elseif ($body->responseCode == 98){
            Session::flash('alert', $body->responseMessage );            
            Session::flash('type','error');            
            return redirect(route('signin'));                    
        } elseif ($body->responseCode == 90){
            Session::flash('alert', $body->responseMessage );            
            Session::flash('type','error');            
            return redirect(route('signin'));                    
        } else {
            Session::flash('warning', 'Please login again!' );            
            Session::flash('type','warning');
            return redirect(route('signin'));            
        }
    }    

    public function index()
    {
        $users = Session::get('users');
        $data = Session::get('SessionToken');
        $token = $data->responseData->token;
        $client = new \GuzzleHttp\Client();

        $url = config('app.url')."/api/apps/";
        $response = $client->get($url, [
            'headers' => [
                'authentication' => $token ,
            ]
        ]);
        $body= json_decode($response->getBody());

        if ($body->responseCode == 00) {
            $getApp = $body->responseData;        
            $return = ['users','getApp'];
            return view('user-management.admin-page.apps_data.apps_index', compact($return));   
        } else {
            return $this->error($body);
        }
    }

    public function addIndex()
    {
        $users = Session::get('users');
        $return = ['users'];
        return view('user-management.admin-page.apps_data.apps_add',compact($return));
    }

    public function addApps(Request $request)
    {
        $data = Session::get('SessionToken');
        $token = $data->responseData->token;

        $client = new \GuzzleHttp\Client();
        $response = $client->post(config('app.url').'/api/apps/crud', [
            'headers' => [
                'Content-Type'      => 'application/x-www-form-urlencoded',
                'authentication'    => $token,
            ],
            'form_params' => [
                "action" => 'create',
                "appsname" => $request->get('name'),
                "deskripsi" => $request->get('description'),
                "url" => $request->get('url'),
            ],
        ]);
        $apps = json_decode($response->getBody()->getContents());
        // echo '<pre>',print_r($post,1),'</pre>';
        // die;

        if ($apps->responseCode == 00) {
            Session::flash('message', 'Berhasil menambahkan data aplikasi!');            
            Session::flash('type','success');
            return redirect(route('apps.apps-index'));    
        } else {
            return $this->error($apps);
        }
    }

    public function editIndex($id)
    {
        $users = Session::get('users');
        $data = Session::get('SessionToken');
        $token = $data->responseData->token;
        $client = new \GuzzleHttp\Client();

        $url = config('app.url')."/api/apps/getByID/".$id;
        $response = $client->get($url, [
            'headers' => [
                'authentication' => $token ,
            ]
        ]);
 
        $body= json_decode($response->getBody());

        if ($body->responseCode == 00) {
            $getApp = $body->responseData;        
            $return = ['users','getApp'];
            return view('user-management.admin-page.apps_data.apps_edit',compact($return));
            // echo '<pre>',print_r($getApp,1),'</pre>';
            // die;    
        } else {
            return $this->error($body);
        }
    }

    public function updateApps(Request $request, $id)
    {
        $data = Session::get('SessionToken');
        $token = $data->responseData->token;

        $client = new \GuzzleHttp\Client();
        $response = $client->post(config('app.url').'/api/apps/crud', [
            'headers' => [
                'Content-Type'      => 'application/x-www-form-urlencoded',
                'authentication'    => $token,
            ],
            'form_params' => [
                "action" => 'update',
                "id" => $id,
                "appsname" => $request->get('name'),
                "deskripsi" => $request->get('description'),
                "url" => $request->get('url'),
            ],
        ]);

        $apps = json_decode($response->getBody()->getContents());

        if ($apps->responseCode == 00) {
            Session::flash('message', 'Berhasil update data aplikasi!');            
            Session::flash('type','success');
            return redirect(route('apps.apps-index'));
        } else {
            return $this->error($apps);
        }
    }

    public function deleteApps(Request $request, $id)
    {
        $data = Session::get('SessionToken');
        $token = $data->responseData->token;

        $client = new \GuzzleHttp\Client();
        $response = $client->post(config('app.url').'/api/apps/crud', [
            'headers' => [
                'Content-Type'      => 'application/x-www-form-urlencoded',
                'authentication'    => $token,
            ],
            'form_params' => [
                "action" => 'delete',
                "id" => $id,
            ],
        ]);

        $apps = json_decode($response->getBody()->getContents());

        if ($apps->responseCode == 00) {
            Session::flash('message', 'Berhasil hapus data aplikasi!');            
            Session::flash('type','success');
            return redirect(route('apps.apps-index'));
        } else {
            return $this->error($apps);
        }
    }




    public function indexAppsMapping()
    {
        $users = Session::get('users');
        $data = Session::get('SessionToken');
        $token = $data->responseData->token;
        $client = new \GuzzleHttp\Client();

        $url = config('app.url')."/api/apps/mapping/";
        $response = $client->get($url, [
            'headers' => [
                'authentication' => $token ,
            ]
        ]);
        $body= json_decode($response->getBody());

        if ($body->responseCode == 00) {
            $getApp = $body->responseData->rows;
            $return = ['users','getApp'];
            return view('user-management.admin-page.apps_mapping.apps_mapping', compact($return));     
        } else {
            return $this->error($body);
        }
        // echo '<pre>',print_r($body,1),'</pre>';
        // die;
    }

    public function addMappingIndex()
    {
        $users = Session::get('users');
        $data = Session::get('SessionToken');
        $token = $data->responseData->token;
        $client = new \GuzzleHttp\Client();

        $url = config('app.url')."/api/apps/";
        $response = $client->get($url, [
            'headers' => [
                'authentication' => $token ,
            ]
        ]);
        $body= json_decode($response->getBody());

        if ($body->responseCode == 00) {
            $getApp = $body->responseData;
            $url = config('app.url')."/api/users_data/";
            $response = $client->get($url, [
                'headers' => [
                    'authentication' => $token ,
                ]
            ]);
            $users_data= json_decode($response->getBody());
            
            if ($users_data->responseCode == 00) {
                $getUsers = $users_data->responseData;
                $return = ['users','getApp','getUsers'];
                return view('user-management.admin-page.apps_mapping.apps_mapping_add',compact($return));
            } else {
                return $this->error($users_data);
            } 

        } else {
            return $this->error($body);
        }
    }

    public function addMappingApps(Request $request)
    {
        $data = Session::get('SessionToken');
        $token = $data->responseData->token;

        $client = new \GuzzleHttp\Client();
        $response = $client->post(config('app.url').'/api/apps/mapping/crud', [
            'headers' => [
                'Content-Type'      => 'application/x-www-form-urlencoded',
                'authentication'    => $token,
            ],
            'form_params' => [
                "action" => 'create',
                "pernr" => $request->get('pernr'),
                "apps_id" => $request->get('appsname'),
            ],
        ]);
        $body = json_decode($response->getBody()->getContents());

        if ($body->responseCode == 00) {
            Session::flash('message', 'Berhasil menambahkan data mapping aplikasi!');            
            Session::flash('type','success');
            return redirect(route('apps.apps-mapping-index'));
        } else {
            return $this->error($body);
        }
    }

    public function editMappingIndex($id)
    {
        $users = Session::get('users');
        $data = Session::get('SessionToken');
        $token = $data->responseData->token;
        $client = new \GuzzleHttp\Client();

        $url = config('app.url')."/api/apps/mapping/".$id;
        $response = $client->get($url, [
            'headers' => [
                'authentication' => $token ,
            ]
        ]); 
        $body= json_decode($response->getBody());

        if ($body->responseCode == 00) {
            $getMapping = $body->responseData->rows;        
            $url = config('app.url')."/api/apps/";
            $response = $client->get($url, [
                'headers' => [
                    'authentication' => $token ,
                ]
            ]);
            $apps = json_decode($response->getBody());

            if ($apps->responseCode == 00) {
                $getApp = $apps->responseData;

                $url = config('app.url')."/api/users_data/";
                $response = $client->get($url, [
                    'headers' => [
                        'authentication' => $token ,
                    ]
                ]);
                $users_data = json_decode($response->getBody());

                if ($users_data->responseCode == 00) {
                    $getUsers = $users_data->responseData;
                    $return = ['users','getMapping', 'getApp', 'getUsers'];
                    return view('user-management.admin-page.apps_mapping.apps_mapping_edit',compact($return));        
                } else {
                    return $this->error($users_data);
                }   

            } else {
                return $this->error($apps);
            }    

        } else {
            return $this->error($body);
        }
        // echo '<pre>',print_r($getApp,1),'</pre>';
        // die;
    }

    public function updateMappingApps(Request $request, $id)
    {
        $data = Session::get('SessionToken');
        $token = $data->responseData->token;

        $client = new \GuzzleHttp\Client();
        $response = $client->post(config('app.url').'/api/apps/mapping/crud', [
            'headers' => [
                'Content-Type'      => 'application/x-www-form-urlencoded',
                'authentication'    => $token,
            ],
            'form_params' => [
                "action" => 'update',
                "id" => $id,
                "pernr" => $request->get('pernr'),
                "apps_id" => $request->get('appsname'),
            ],
        ]);
        $body = json_decode($response->getBody()->getContents());

        if ($body->responseCode == 00) {
            Session::flash('message', 'Berhasil update data mapping aplikasi!');            
            Session::flash('type','success');
            return redirect(route('apps.apps-mapping-index'));
        } else {
            return $this->error($body);
        }
    }

    public function deleteMappingApps(Request $request, $id)
    {
        $data = Session::get('SessionToken');
        $token = $data->responseData->token;

        $client = new \GuzzleHttp\Client();
        $response = $client->post(config('app.url').'/api/apps/mapping/crud', [
            'headers' => [
                'Content-Type'      => 'application/x-www-form-urlencoded',
                'authentication'    => $token,
            ],
            'form_params' => [
                "action" => 'delete',
                "id" => $id,
            ],
        ]);
        $body = json_decode($response->getBody()->getContents());

        if ($body->responseCode == 00) {
            Session::flash('message', 'Berhasil hapus data Mapping aplikasi!');            
            Session::flash('type','success');
            return redirect(route('apps.apps-mapping-index'));
        } else {
            return $this->error($body);
        }
    }


    public function listapps()
    {
        $users = Session::get('users');
        $data = Session::get('SessionToken');
        $token = $data->responseData->token;

        $client = new \GuzzleHttp\Client();
        $url = config('app.url')."/api/apps/user_app/".$users->PERNR;
        $response = $client->get($url, [
            'headers' => [
                'authentication' => $token ,
            ]
        ]);
        $body= json_decode($response->getBody());

        if ($body->responseCode == 00) {
            $getApp = $body->responseData->rows;        
            $return = ['users','getApp'];
            return view('user-management.users-page.list-app', compact($return));
        } else {
            return $this->error($body);
        }
    }

}
