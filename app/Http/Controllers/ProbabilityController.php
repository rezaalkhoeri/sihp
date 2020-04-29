<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProbabilityController extends Controller
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
        $url = config('app.base_url') . "/api/masterData/getProbability";
        $response = $client->get($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
        ]);        
        $data = json_decode($response->getBody());

        if ($data->responseCode == '00') {
            $probability = $data->responseData;
            $return = [
                'probability'
            ];
            return view('sihp.compliance.probability.probabilityIndex', compact($return));
        } else {
            $this->error($data);
        }
    }

    public function add(Request $request)
    {
        $probabilityName = json_decode($request->get('data'));
        
        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/ProbabilityAction";
        $response = $client->post($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
            'form_params' => [
                'action' => 'create',
                'namaProbability' => $probabilityName
            ]
        ]);        
        $body = json_decode($response->getBody());

        if ($body->responseCode == '00') {
            $data = [
                'status' => 200,
                'message' => 'Save New Probability Success!',
                'alert' => 'success'
            ];
            echo json_encode($data);
        } else {
            $this->error($body);
        }
    }

    public function edit(Request $request)
    {
        $probabilityID = json_decode($request->get('data'));
        
        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/getProbabilityByID";
        $response = $client->post($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
            'form_params' => [
                'id' => $probabilityID,
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
        $probabilityID = $postData->id;
        $probabilityName = $postData->name;

        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/ProbabilityAction";
        $response = $client->post($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
            'form_params' => [
                'action' => 'update',
                'id' => $probabilityID,
                'namaProbability' => $probabilityName
            ]
        ]);
        $body = json_decode($response->getBody());

        if ($body->responseCode == '00') {
            $data = [
                'status' => 200,
                'message' => 'Update Probability Success!',
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
        $probabilityID = $postData->id;

        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/ProbabilityAction";
        $response = $client->post($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
            'form_params' => [
                'action' => 'delete',
                'id' => $probabilityID
            ]
        ]);
        $body = json_decode($response->getBody());

        if ($body->responseCode == '00') {
            $data = [
                'status' => 200,
                'message' => 'Delete Probability Success!',
                'alert' => 'success'
            ];
            echo json_encode($data);
        } else {
            $this->error($body);
        }
    }

}
