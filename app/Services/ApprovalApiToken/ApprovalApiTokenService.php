<?php

namespace App\Services\ApprovalApiToken;

use Illuminate\Support\Facades\Http;

class ApprovalApiTokenService
{
    const STATUS = [1 => 'Not accepted', 2 => 'Accepted', 3 => 'Paused'];

    public function list()
    {
        $url = env('API_ADDRESS') . '/api/v1/api-token/get-list-approval';
        $request = null;
        $method = "GET";
        $response = $this->sendRequestToAPI($url, $method, $request);
        $data = $this->checkAndReturnData($response);
        return view('/approval-api-token/list')->with(['data' => $data['data'], 'status' => self::STATUS]);
    }

    public function approvalToken($id)
    {
        $url = env('API_ADDRESS') . '/api/v1/api-token/approve-token';
        $request = ['id' => $id];
        $method = "POST";
        $response = $this->sendRequestToAPI($url, $method, $request);
        $this->checkAndReturnData($response);
        return redirect()->intended('/system-admin/approval-api-token')->with('saved', true);
    }

    public function stopToken($id)
    {
        $url = env('API_ADDRESS') . '/api/v1/api-token/stop-token';
        $request = ['id' => $id];
        $method = "POST";
        $response = $this->sendRequestToAPI($url, $method, $request);
        $this->checkAndReturnData($response);
        return redirect()->intended('/system-admin/approval-api-token')->with('saved', true);
    }

    public function reopenToken($id)
    {
        $url = env('API_ADDRESS') . '/api/v1/api-token/reopen-token';
        $request = ['id' => $id];
        $method = "POST";
        $response = $this->sendRequestToAPI($url, $method, $request);
        $this->checkAndReturnData($response);
        return redirect()->intended('/system-admin/approval-api-token')->with('saved', true);
    }

    public function deleteToken($id)
    {
        $url = env('API_ADDRESS') . '/api/v1/api-token/delete-token';
        $request = ['id' => $id];
        $method = "POST";
        $response = $this->sendRequestToAPI($url, $method, $request);
        $this->checkAndReturnData($response);
        return redirect()->intended('/system-admin/approval-api-token')->with('deleted', true);
    }

    private function sendRequestToAPI(string $string, $method, $request)
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $options = [
            'form_params' => $request,
            'headers' => [
                'token' => 'test-token',
            ],
        ];

        $response = $client->request($method, $string, $options);
        return $response;
    }

    private function checkAndReturnData($response)
    {
        $data = json_decode($response->getBody()->getContents(), true);
        if ($data['error_code'] != 0) {
            return redirect()->intended('/system-admin/approval-api-token')->with('error', true);
        }

        return $data;
    }
}
