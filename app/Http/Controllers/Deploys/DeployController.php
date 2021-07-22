<?php

namespace App\Http\Controllers\Deploys;

use App\Http\Controllers\Core\CoreController;
use App\Repositories\Deploys\DeployRepository;
use App\Validators\Deploys\DeployValidator;

/**
 * Class DeployController
 * @package App\Http\Controllers\Deploys
 * @property DeployRepository DeployRepository
 */
class DeployController extends CoreController
{
    protected $listViewName = [
        'index' => 'deploy.list'
    ];

    public function __construct(DeployValidator $validator) {
        parent::__construct($validator);

        $this->repository = $this->factory->makeRepository(DeployRepository::class);
    }
}
