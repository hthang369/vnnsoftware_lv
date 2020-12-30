<?php

namespace App\Http\Controllers\ApprovalApiToken;

use App\Http\Controllers\Controller;
use App\Services\ApprovalApiToken\ApprovalApiTokenService;

class ApprovalApiTokenController extends Controller
{

    private $approvalApiTokenService;

    /**
     * ApprovalApiTokenController constructor.
     * @param ApprovalApiTokenService $approvalApiTokenService
     */
    public function __construct(ApprovalApiTokenService $approvalApiTokenService)
    {
        parent::__construct();
        $this->approvalApiTokenService = $approvalApiTokenService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
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
}
