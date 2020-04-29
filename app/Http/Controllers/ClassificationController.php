<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassificationController extends Controller
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
        $url = config('app.base_url') . "/api/masterData/getClassification";
        $response = $client->get($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
        ]);        
        $data = json_decode($response->getBody());

        if ($data->responseCode == '00') {
            $classification = $data->responseData;
            $return = [
                'classification'
            ];
            return view('sihp.compliance.classification.classificationIndex', compact($return));
        } else {
            $this->error($data);
        }
    }

    public function add(Request $request)
    {
        $classificationName = json_decode($request->get('data'));
        
        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/ClassificationAction";
        $response = $client->post($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
            'form_params' => [
                'action' => 'create',
                'namaClassification' => $classificationName
            ]
        ]);        
        $body = json_decode($response->getBody());

        if ($body->responseCode == '00') {
            $data = [
                'status' => 200,
                'message' => 'Save New Classification Success!',
                'alert' => 'success'
            ];
            echo json_encode($data);
        } else {
            $this->error($body);
        }
    }

    public function edit(Request $request)
    {
        $classifiID = json_decode($request->get('data'));
        
        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/getClassificationByID";
        $response = $client->post($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
            'form_params' => [
                'id' => $classifiID,
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
        $idClassifi = $postData->id;
        $classifiName = $postData->name;

        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/ClassificationAction";
        $response = $client->post($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
            'form_params' => [
                'action' => 'update',
                'id' => $idClassifi,
                'namaClassification' => $classifiName
            ]
        ]);
        $body = json_decode($response->getBody());

        if ($body->responseCode == '00') {
            $data = [
                'status' => 200,
                'message' => 'Update Classification Success!',
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
        $idClassifi = $postData->id;

        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/ClassificationAction";
        $response = $client->post($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
            'form_params' => [
                'action' => 'delete',
                'id' => $idClassifi
            ]
        ]);
        $body = json_decode($response->getBody());

        if ($body->responseCode == '00') {
            $data = [
                'status' => 200,
                'message' => 'Delete Classification Success!',
                'alert' => 'success'
            ];
            echo json_encode($data);
        } else {
            $this->error($body);
        }
    }

}
