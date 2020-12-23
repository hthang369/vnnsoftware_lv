<?php

namespace App\Services\UserManagementForAppChat;

use App\Models\Company;
use App\Services\Contract\ApiService;
use Illuminate\Support\Facades\Http;

class UserManagementForAppChatService extends ApiService
{

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

        return view('/user-management-for-app-chat/detail')->with('userManagementForAppChat', $company);
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
        return redirect()->intended('/system-admin/user-management-for-app-chat/detail/' . $company->id)->with('saved', true);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateForm($id)
    {
        $listCompany = Company::all();
        return view('/user-management-for-app-chat/update_form')->with(['userManagementForAppChat' => 9, 'listCompany' => $listCompany]);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {

        return redirect()->intended('/system-admin/user-management-for-app-chat/detail/' . $id)->with('saved', true);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {

        return redirect()->intended('/system-admin/user-management-for-app-chat')->with('deleted', true);
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
