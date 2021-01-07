<?php

namespace App\Services\ApprovalApiToken;

use App\Services\Contract\ApiService;
use Illuminate\Support\Facades\Http;

class ApprovalApiTokenService extends ApiService
{
    const STATUS = [1 => 'Not accepted', 2 => 'Accepted', 3 => 'Paused'];

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        $url = config('constants.api_address') . '/api/v1/api-token/get-list-approval';
        $request = null;
        $method = "GET";
        $response = $this->sendRequestToAPI($url, $method, $request);
        $data = $this->checkAndReturnData($response);
        return view('/approval-api-token/list')->with(['data' => isset($data['data']) ? $data['data'] : null, 'status' => self::STATUS]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approvalToken($id)
    {
        $url = config('constants.api_address') . '/api/v1/api-token/approve-token';
        $request = ['id' => $id];
        $method = "POST";
        $response = $this->sendRequestToAPI($url, $method, $request);
        $this->checkAndReturnData($response);
        return redirect()->intended('/system-admin/approval-api-token')->with('saved', true);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function stopToken($id)
    {
        $url = config('constants.api_address') . '/api/v1/api-token/stop-token';
        $request = ['id' => $id];
        $method = "POST";
        $response = $this->sendRequestToAPI($url, $method, $request);
        $this->checkAndReturnData($response);
        return redirect()->intended('/system-admin/approval-api-token')->with('saved', true);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reopenToken($id)
    {
        $url = config('constants.api_address') . '/api/v1/api-token/reopen-token';
        $request = ['id' => $id];
        $method = "POST";
        $response = $this->sendRequestToAPI($url, $method, $request);
        $this->checkAndReturnData($response);
        return redirect()->intended('/system-admin/approval-api-token')->with('saved', true);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteToken($id)
    {
        $url = config('constants.api_address') . '/api/v1/api-token/delete-token';
        $request = ['id' => $id];
        $method = "POST";
        $response = $this->sendRequestToAPI($url, $method, $request);
        $this->checkAndReturnData($response);
        return redirect()->intended('/system-admin/approval-api-token')->with('deleted', true);
    }

    /**
     * @param $response
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    private function checkAndReturnData($response)
    {
        $data = json_decode($response->getBody()->getContents(), true);
        if ($data['error_code'] != 0) {
            return redirect()->intended('/system-admin/approval-api-token')->with('error', true);
        }

        return $data;
    }
}
