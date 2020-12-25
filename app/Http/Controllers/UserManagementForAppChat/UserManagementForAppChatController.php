<?php

namespace App\Http\Controllers\UserManagementForAppChat;

use App\Http\Controllers\Controller;
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
        return $this->userManagementForAppChatService->list();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id)
    {
        return $this->userManagementForAppChatService->detail($id);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newForm()
    {
        return $this->userManagementForAppChatService->newForm();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        return $this->userManagementForAppChatService->create($request);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        return $this->userManagementForAppChatService->delete($id);
    }
}
