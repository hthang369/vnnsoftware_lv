<?php

namespace App\Services\Company;

use App\Repositories\Company\CompanyRepositoryInterface;
use App\Services\Contract\MyService;
use App\Company;
use Illuminate\Support\Facades\Validator;

class CompanyService extends MyService
{
    private $companyRepo;

    public function __construct(CompanyRepositoryInterface $companyRepo)
    {
        $this->companyRepo = $companyRepo;

    }

    public function getById($id)
    {
        return $this->companyRepo->getById($id);
    }

    public function Create($input)
    {
        return $this->companyRepo->Create($input);
    }

    public function update($id, $input)
    {
        return $this->companyRepo->update($id, $input);
    }

    public function ruleCreateUpdate($request, $id = null)
    {
        $ruleEmail = 'required|email|max:255|unique:Companys';
        $rulePassword = 'max:255';

        if ($id != null) {
            $ruleEmail = $ruleEmail . ',id,' . $id;
        } else {
            $rulePassword = $rulePassword . '|required';
        }

        return $validator = Validator::make($request, [
            'email' => $ruleEmail,
            'password' => $rulePassword,
            'name' => 'required|max:255',
            'role_id' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'max:255',
        ]);
    }

    public function getCompanyInfo($id)
    {
        return Company::find($id);
    }

    public function getAll()
    {
        return $this->companyRepo->getAll();
    }

    public function delete($id)
    {
        return $this->CompanyRepo->delete($id);
    }
}
