<?php

namespace App\Services\UserManagementForAppChat;

use App\Models\Company;
use App\Services\Contract\ApiService;
use App\Validations\UserManagementForAppChatValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserManagementForAppChatService extends ApiService
{

    private $userManagementForAppChatValidation;

    public function __construct(UserManagementForAppChatValidation $userManagementForAppChatValidation)
    {
        $this->userManagementForAppChatValidation = $userManagementForAppChatValidation;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $validator = $this->userManagementForAppChatValidation->newValidate($request->all());

        if ($validator->fails()) {
            return redirect()->intended('/system-admin/user-management-for-app-chat/new')->withInput()->withErrors($validator->errors());
        }

        $company = Company::find($request->input('company_id'));

        $data = $request->all();
        $data['company'] = $company->name;

        $url = config('constants.api_address') . '/api/v1/user/register';
        $method = "POST";
        $response = $this->sendRequestToAPI($url, $method, $data);

        $dataResponse = json_decode($response->getBody()->getContents(), true);

        if ($dataResponse['error_code'] != 0) {
            return redirect()->intended('/system-admin/user-management-for-app-chat/new')->withInput()->with('errorCommon', $dataResponse['error_msg']);
        }

        return view('/user-management-for-app-chat/list')->with('list', null);
//        return redirect()->intended('/system-admin/user-management-for-app-chat/detail/' . $dataResponse['data']['id'])->with('messCommon', __('custom_message.saved'));
    }

    public function newValidate($request) {
        return $this->userManagementForAppChatValidation->newValidate($request);
    }
}
