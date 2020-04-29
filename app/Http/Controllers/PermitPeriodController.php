<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermitPeriodController extends Controller
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
        $url = config('app.base_url') . "/api/masterData/getPermitPeriod";
        $response = $client->get($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
        ]);        
        $data = json_decode($response->getBody());

        if ($data->responseCode == '00') {
            $permit = $data->responseData;
            $return = [
                'permit'
            ];
            return view('sihp.compliance.permit_period.permitPeriodindex', compact($return));
        } else {
            $this->error($data);
        }
    }

    public function add(Request $request)
    {
        $permitName = json_decode($request->get('data'));
        
        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/PermitPeriodAction";
        $response = $client->post($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
            'form_params' => [
                'action' => 'create',
                'namaPermitPeriod' => $permitName
            ]
        ]);        
        $body = json_decode($response->getBody());

        if ($body->responseCode == '00') {
            $data = [
                'status' => 200,
                'message' => 'Save New Permit Period Success!',
                'alert' => 'success'
            ];
            echo json_encode($data);
        } else {
            $this->error($body);
        }
    }

    public function edit(Request $request)
    {
        $permitID = json_decode($request->get('data'));
        
        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/getPermitPeriodByID";
        $response = $client->post($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
            'form_params' => [
                'id' => $permitID,
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
        $idPermit = $postData->id;
        $permitName = $postData->name;

        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/PermitPeriodAction";
        $response = $client->post($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
            'form_params' => [
                'action' => 'update',
                'id' => $idPermit,
                'namaPermitPeriod' => $permitName
            ]
        ]);
        $body = json_decode($response->getBody());

        if ($body->responseCode == '00') {
            $data = [
                'status' => 200,
                'message' => 'Update Permit Period Success!',
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
        $idPermit = $postData->id;

        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/PermitPeriodAction";
        $response = $client->post($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
            'form_params' => [
                'action' => 'delete',
                'id' => $idPermit
            ]
        ]);
        $body = json_decode($response->getBody());

        if ($body->responseCode == '00') {
            $data = [
                'status' => 200,
                'message' => 'Delete Permit Period Success!',
                'alert' => 'success'
            ];
            echo json_encode($data);
        } else {
            $this->error($body);
        }
    }

}
