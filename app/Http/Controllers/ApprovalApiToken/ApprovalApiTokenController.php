<?php

namespace App\Http\Controllers\ApprovalApiToken;

use App\Http\Controllers\Controller;
use App\Services\ApprovalApiToken\ApprovalApiTokenService;
use Illuminate\Http\Request;

class ApprovalApiTokenController extends Controller
{

    private $approvalApiTokenService;

    public function __construct(ApprovalApiTokenService $approvalApiTokenService)
    {
        $this->approvalApiTokenService = $approvalApiTokenService;
    }

    public function index()
    {
        return $this->approvalApiTokenService->list();
    }

    public function approvalToken(Request $request)
    {
        return $this->approvalApiTokenService->approvalToken($request);
    }

    public function stopToken($id, Request $request)
    {
        return $this->approvalApiTokenService->stopToken($id, $request);
    }

    public function deleteToken($id)
    {
        return $this->approvalApiTokenService->deleteToken($id);
    }
}
