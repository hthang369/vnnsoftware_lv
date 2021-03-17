<?php

namespace App\Http\Controllers\UserManagementForAppChat;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Services\UserManagementForAppChat\UserManagementForAppChatService;
use Illuminate\Http\Request;

class UserManagementForAppChatController extends Controller
{

    private $userManagementForAppChatService;

    /**
     * UserManagementForAppChatController constructor.
     * @param UserManagementForAppChatService $userManagementForAppChatService
     */
    public function __construct(UserManagementForAppChatService $userManagementForAppChatService)
    {
        parent::__construct();
        $this->userManagementForAppChatService = $userManagementForAppChatService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('/common/index_page_top_menu');
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
    public function register(Request $request)
    {
        //return $this->userManagementForAppChatService->create($request);

        $validator = $this->userManagementForAppChatService->newValidate($request->all());

        if ($validator->fails()) {
            return redirect()->intended('/system-admin/user-management-for-app-chat/new')->withInput()->withErrors($validator->errors());
        }

        $company = Company::find($request->input('company_id'));

        $data = $request->all();
        $data['company'] = $company->name;

        $url = config('constants.api_address') . '/api/v1/user/register-users';
        $method = "POST";
        $response = $this->userManagementForAppChatService->sendRequestToAPI($url, $method, $data);

        $dataResponse = json_decode($response->getBody()->getContents(), true);

        if ($dataResponse['error_code'] != 0) { dd($dataResponse);
            return redirect()->intended('/system-admin/user-management-for-app-chat/new')
                ->withInput()->with('errorCommon', $dataResponse['error_msg']);
        }

        return view('/user-management-for-app-chat/list')->with('list', null);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $url = config('constants.api_address') . '/api/v1/user/delete';
        $method = "POST";
        $response = $this->userManagementForAppChatService->sendRequestToAPI($url, $method, 1);

        $dataResponse = json_decode($response->getBody()->getContents(), true);

        if ($dataResponse['error_code'] != 0) {
            return redirect()->intended('/system-admin/user-management-for-app-chat/new')
                ->withInput()->with('errorCommon', $dataResponse['error_msg']);
        }
        return redirect()->intended('/system-admin/user-management-for-app-chat/list')->with('deleted', true);
    }

    public function searchForm() {
        return view('/user-management-for-app-chat/search');
    }
}
