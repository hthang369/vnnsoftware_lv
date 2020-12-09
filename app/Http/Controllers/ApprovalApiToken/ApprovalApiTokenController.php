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

    public function approvalToken($id)
    {
        return $this->approvalApiTokenService->approvalToken($id);
    }

    public function stopToken($id)
    {
        return $this->approvalApiTokenService->stopToken($id);
    }

    public function deleteToken($id)
    {
        return $this->approvalApiTokenService->deleteToken($id);
    }
}
