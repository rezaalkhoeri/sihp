<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CriteriaController extends Controller
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
        $url = config('app.base_url') . "/api/masterData/getCriteria";
        $response = $client->get($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
        ]);        
        $data = json_decode($response->getBody());

        if ($data->responseCode == '00') {
            $criteria = $data->responseData;
            $return = [
                'criteria'
            ];
            return view('sihp.compliance.criteria.criteriaIndex', compact($return));
        } else {
            $this->error($data);
        }
    }

    public function add(Request $request)
    {
        $criteriaName = json_decode($request->get('data'));
        
        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/CriteriaAction";
        $response = $client->post($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
            'form_params' => [
                'action' => 'create',
                'namaCriteria' => $criteriaName
            ]
        ]);        
        $body = json_decode($response->getBody());

        if ($body->responseCode == '00') {
            $data = [
                'status' => 200,
                'message' => 'Save New Criteria Success!',
                'alert' => 'success'
            ];
            echo json_encode($data);
        } else {
            $this->error($body);
        }
    }

    public function edit(Request $request)
    {
        $criteriaID = json_decode($request->get('data'));
        
        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/getCriteriaByID";
        $response = $client->post($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
            'form_params' => [
                'id' => $criteriaID,
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
        $idCriteria = $postData->id;
        $criteriaName = $postData->name;

        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/CriteriaAction";
        $response = $client->post($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
            'form_params' => [
                'action' => 'update',
                'id' => $idCriteria,
                'namaCriteria' => $criteriaName
            ]
        ]);
        $body = json_decode($response->getBody());

        if ($body->responseCode == '00') {
            $data = [
                'status' => 200,
                'message' => 'Update Criteria Success!',
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
        $idCriteria = $postData->id;

        $client = new \GuzzleHttp\Client();
        $url = config('app.base_url') . "/api/masterData/CriteriaAction";
        $response = $client->post($url, [
            // 'headers' => [
            //     'authentication' => $token,
            // ],
            'form_params' => [
                'action' => 'delete',
                'id' => $idCriteria
            ]
        ]);
        $body = json_decode($response->getBody());

        if ($body->responseCode == '00') {
            $data = [
                'status' => 200,
                'message' => 'Delete Criteria Success!',
                'alert' => 'success'
            ];
            echo json_encode($data);
        } else {
            $this->error($body);
        }
    }

}
