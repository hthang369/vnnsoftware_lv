<?php

namespace App\Http\Controllers\ApprovalApiToken;

use App\Http\Controllers\Controller;
use App\Services\ApprovalApiToken\ApprovalApiTokenService;
use App\Services\Company\CompanyService;
use Illuminate\Http\Request;


class ApprovalApiTokenController extends Controller
{
    const STATUS = [1 => 'Not accepted', 2 => 'Accepted', 3 => 'Paused'];

    private $approvalApiTokenService;
    private $companyService;

    /**
     * ApprovalApiTokenController constructor.
     * @param ApprovalApiTokenService $approvalApiTokenService
     */
    public function __construct(ApprovalApiTokenService $approvalApiTokenService, CompanyService $companyService)
    {
        parent::__construct();
        $this->approvalApiTokenService = $approvalApiTokenService;
        $this->companyService = $companyService;
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
        return $this->approvalApiTokenService->list();
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approvalToken($id)
    {
        return $this->approvalApiTokenService->approvalToken($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function stopToken($id)
    {
        return $this->approvalApiTokenService->stopToken($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reopenToken($id)
    {
        return $this->approvalApiTokenService->reopenToken($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteToken($id)
    {
        return $this->approvalApiTokenService->deleteToken($id);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listForControl()
    {
        $url = config('constants.api_address') . '/api/v1/user/get-list-delete-user';
        $request = null;
        $method = "GET";
        $response = $this->approvalApiTokenService->sendRequestToAPI($url, $method, $request);
        $data = $this->approvalApiTokenService->checkAndReturnData($response);

        $list = $data['data'];
        $return = [];
        foreach ($list as $l) {
            $return [] = (object)$l;
        }

        return view('user-management-for-app-chat/list-for-control')
            ->with(['list' => $return, 'data' => isset($data['data']) ? $data['data'] : null, 'status' => self::STATUS]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function disableUser($id)
    {
        return $this->approvalApiTokenService->disableUser($id);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addContactList(Request $request)
    {

        $url = config('constants.api_address') . '/api/v1/user/get-list-delete-user';
        $request = null;
        $method = "GET";
        $response = $this->approvalApiTokenService->sendRequestToAPI($url, $method, $request);
        $data = $this->approvalApiTokenService->checkAndReturnData($response);

        $list = $data['data'];
        $return = [];
        foreach ($list as $l) {
            $return [] = (object)$l;
        }

        return view('user-management-for-app-chat/add_contact_list')
            ->with([
                'list' => $return,
                'data' => isset($data['data']) ? $data['data'] : null,
                'status' => self::STATUS,
            ]);
    }

    // Update contact for LAKA user page

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addContactUpdatePage(Request $request)
    {
        $url = config('constants.api_address') . '/api/v1/user/get-detail-user/' . $request['id'];
        $userId = $request['id'];
        $request = null;
        $method = "GET";
        $response = $this->approvalApiTokenService->sendRequestToAPI($url, $method, $request);
        $data = $this->approvalApiTokenService->checkAndReturnData($response);

        $companies = $this->companyService->listWithoutParameter();
        return view('user-management-for-app-chat/add_contact_update')
            ->with([
                'companies' => $companies,
                'user' => (object)$data,
                'userId' => $userId,
            ]);
    }

    public function addContactsAndRoomsByCompany(Request $request)
    {
        $addAllContactsResult = null;
        $addToAllRoomsResult = null;

        // add all contacts
        if ($request['add_all_contacts'] != null && $request['company_id'] != null) {
            $url = 'http://172.16.2.8:91/api/v1/contact/add-all-contacts-in-company';

            $request1 = $request->except(['add_all_contacts', '_token', 'add_to_all_rooms']);
            $method = "POST";
            $response = $this->approvalApiTokenService->sendRequestToAPI($url, $method, $request1);
            $data1 = $this->approvalApiTokenService->checkAndReturnData($response);

            if ($data1['error_code'] == 0 && $data1['error_msg'] == 0) {
                $addAllContactsResult = true;
            } else {
                $addAllContactsResult = false;
            }
        }

        // add to all rooms
        if ($request['add_to_all_rooms'] != null && $request['company_id'] != null) {
            $url = 'http://172.16.2.8:91/api/v1/contact/add-to-all-rooms-by-company';

            $request2 = $request->except(['add_all_contacts', '_token', 'add_to_all_rooms']);
            $method = "POST";
            $response = $this->approvalApiTokenService->sendRequestToAPI($url, $method, $request2);
            $data2 = $this->approvalApiTokenService->checkAndReturnData($response);

            if ($data2['error_code'] == 0 && $data2['error_msg'] == 0) {
                $addToAllRoomsResult = true;
            } else {
                $addToAllRoomsResult = false;
            }
        }

        return redirect()
            ->intended('/system-admin/user-management-for-app-chat/add-contact/update/' . $request['user_id'])
            ->with(['added_all_contact' => $addAllContactsResult, 'added_to_all_rooms' => $addToAllRoomsResult]);

    }
}
