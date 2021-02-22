<?php

namespace App\Services\ApprovalApiToken;

use App\Models\User;
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
        return view('user-management-for-app-chat/list')->with(['data' => isset($data['data']) ? $data['data'] : null, 'status' => self::STATUS]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listForControl()
    {
        $url = config('constants.api_address') . '/api/v1/user/get-list-delete-user';
        $request = null;
        $method = "GET";
        $response = $this->sendRequestToAPI($url, $method, $request);
        $data = $this->checkAndReturnData($response);

        $list = $data['data'];
        $return=[];
        foreach ($list as $l){
            $return [] = (object) $l;
        }

        return view('user-management-for-app-chat/list-for-control')->with(['list'=>$return,'data' => isset($data['data']) ? $data['data'] : null, 'status' => self::STATUS]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function disableUser($id)
    {
        $url = config('constants.api_address') . '/api/v1/user/delete-user';
        $request = ['user_id' => $id];
        $method = "POST";
        $response = $this->sendRequestToAPI($url, $method, $request);
        $data = $this->checkAndReturnData($response);

        return redirect()->intended('/system-admin/user-management-for-app-chat/list-user-for-control')->with('saved', true);
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
        return redirect()->intended('/system-admin/user-management-for-app-chat/list')->with('saved', true);
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
        return redirect()->intended('/system-admin/user-management-for-app-chat/list')->with('saved', true);
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
        return redirect()->intended('/system-admin/user-management-for-app-chat/list')->with('saved', true);
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
        return redirect()->intended('/system-admin/user-management-for-app-chat/list')->with('deleted', true);
    }

    /**
     * @param $response
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    private function checkAndReturnData($response)
    {
        $data = json_decode($response->getBody()->getContents(), true);
        if ($data['error_code'] != 0) {
            //            abort(500, $data['error_msg']);
        }

        return $data;
    }
}
