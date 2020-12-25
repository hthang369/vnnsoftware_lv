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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        return view('/user-management-for-app-chat/list')->with('list', null);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id)
    {

        return view('/user-management-for-app-chat/detail')->with('userManagementForAppChat', 3);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newForm()
    {
        $listCompany = Company::all();
        return view('/user-management-for-app-chat/add_form')->with('listCompany', $listCompany);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $validator = $this->userManagementForAppChatValidation->newValidate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $company = Company::find($request->input('company_id'));

        $data = $request->all();
        $data['company'] = $company->name;

        $url = config('constants.api_address') . '/api/v1/user/register';
        $method = "POST";
        $response = $this->sendRequestToAPI($url, $method, $data);

        $dataResponse = json_decode($response->getBody()->getContents(), true);

        if ($dataResponse['error_code'] != 0) {
            return redirect()->back()->withInput()->with('errorCommon', $dataResponse['error_msg']);
        }

        return redirect()->intended('/system-admin/user-management-for-app-chat/detail/' . $dataResponse['data']['id'])->with('messCommon', __('custom_message.saved'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $url = config('constants.api_address') . '/api/v1/user/delete';
        $method = "POST";
        $response = $this->sendRequestToAPI($url, $method, 1);

        $dataResponse = json_decode($response->getBody()->getContents(), true);

        if ($dataResponse['error_code'] != 0) {
            return redirect()->back()->withInput()->with('errorCommon', $dataResponse['error_msg']);
        }
        return redirect()->intended('/system-admin/user-management-for-app-chat')->with('deleted', true);
    }
}
