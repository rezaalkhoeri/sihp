<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Validator;

class CategoryController extends Controller
{
    //
    public function error($params)
    {
        $data = [
            'status' => 200,
            'message' => 'Error!',
            'alert' => 'error'
        ];
        echo json_encode($data);
    }


    public function Index()
    {
        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/getCategory";
        $response = $client->get($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
        ]);        
        $data = json_decode($response->getBody());

        if ($data->responseCode == '00') {
            $category = $data->responseData;
            $return = [
                'category'
            ];
            return view('sihp.compliance.category.categoryIndex', compact($return));
        } else {
            $this->error($data);
        }
    }

    public function add(Request $request)
    {
        $categoryName = json_decode($request->get('data'));
        
        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/CategoryAction";
        $response = $client->post($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
            'form_params' => [
                'action' => 'create',
                'namaCategory' => $categoryName
            ]
        ]);        
        $body = json_decode($response->getBody());

        if ($body->responseCode == '00') {
            $data = [
                'status' => 200,
                'message' => 'Save New Category Success!',
                'alert' => 'success'
            ];
            echo json_encode($data);
        } else {
            $this->error($body);
        }
    }

    public function edit(Request $request)
    {
        $categoryID = json_decode($request->get('data'));
        
        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/getCategoryByID";
        $response = $client->post($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
            'form_params' => [
                'id' => $categoryID,
            ]
        ]);        
        $body = json_decode($response->getBody());

        if ($body->responseCode == '00') {
            $data = $body->responseData; 
            echo json_encode($data);
        } else {
            $this->error($body);
        }
    }

    public function update(Request $request)
    {
        $postData = json_decode($request->get('data'));
        $idCategory = $postData->id;
        $categoryName = $postData->name;

        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/CategoryAction";
        $response = $client->post($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
            'form_params' => [
                'action' => 'update',
                'id' => $idCategory,
                'namaCategory' => $categoryName
            ]
        ]);
        $body = json_decode($response->getBody());

        if ($body->responseCode == '00') {
            $data = [
                'status' => 200,
                'message' => 'Update Category Success!',
                'alert' => 'success'
            ];
            echo json_encode($data);
        } else {
            $this->error($body);
        }
    }

    public function delete(Request $request)
    {
        $postData = json_decode($request->get('data'));
        $idCategory = $postData->id;

        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/CategoryAction";
        $response = $client->post($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
            'form_params' => [
                'action' => 'delete',
                'id' => $idCategory
            ]
        ]);
        $body = json_decode($response->getBody());

        if ($body->responseCode == '00') {
            $data = [
                'status' => 200,
                'message' => 'Delete Category Success!',
                'alert' => 'success'
            ];
            echo json_encode($data);
        } else {
            $this->error($body);
        }
    }

}
