<?php

namespace App\Http\Controllers\Versions;

use App\Core\Http\Controllers\BaseController;
use App\Repositories\Versions\VersionRepository;
use App\Validators\Versions\VersionValidator;

/**
 * Class VersionController
 * @package App\Http\Controllers\Versions
 * @property VersionRepository versionRepository
 */
class VersionController extends BaseController
{
    protected $listViewName = [
        'index'     => 'version.list'
    ];

    public function __construct(VersionValidator $validator) {
        parent::__construct($validator);

        $this->repository = $this->factory->makeRepository(VersionRepository::class);
    }

}
