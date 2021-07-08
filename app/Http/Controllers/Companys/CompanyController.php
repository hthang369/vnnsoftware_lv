<?php

namespace App\Http\Controllers\Companys;

use App\Core\Http\Controllers\BaseController;
use App\Repositories\Companys\CompanyRepository;
use App\Validators\Companys\CompanyValidator;

/**
 * Class CompanyController
 * @package App\Http\Controllers\Companys
 * @property CompanyRepository companyRepository
 */
class CompanyController extends BaseController
{
    protected $listViewName = [
        'index'     => 'company.list',
        'create'    => 'company.list',
    ];

    public function __construct(CompanyValidator $validator) {
        parent::__construct($validator);

        $this->repository = $this->factory->makeRepository(CompanyRepository::class);
    }
}
