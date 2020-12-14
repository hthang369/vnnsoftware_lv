<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Services\Company\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    private $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index()
    {
        return $this->companyService->list();
    }

    public function detail($id)
    {
        return $this->companyService->detail($id);
    }

    public function newForm() {
        return $this->companyService->newForm();
    }

    public function updateForm($id) {
        return $this->companyService->updateForm($id);
    }

    public function register(Request $request)
    {
        return $this->companyService->create($request);
    }

    public function update($id, Request $request)
    {
        return $this->companyService->update($id, $request);
    }

    public function delete($id)
    {
        return $this->companyService->delete($id);
    }
}
