<?php

namespace App\Http\Controllers\Companys;

use App\Http\Controllers\Core\CoreController;
use App\Repositories\Companys\CompanyRepository;
use App\Validators\Companys\CompanyValidator;
use Illuminate\Support\Facades\View;

/**
 * Class CompanyController
 * @package App\Http\Controllers\Companys
 * @property CompanyRepository companyRepository
 */
class CompanyController extends CoreController
{
    protected $listViewName = [
        'index'     => 'company.list',
        'create'    => 'company.create',
    ];

    public function __construct(CompanyValidator $validator) {
        parent::__construct($validator);

        $this->repository = $this->factory->makeRepository(CompanyRepository::class);

        View::share('titlePage', 'Danh sách công ty');
        View::share('headerPage', 'custom_title.company');
        View::share('routeLink', 'company.store');
    }
}
