<?php

namespace App\Http\Controllers\Versions;

use Laka\Core\Http\Controllers\BaseController;
use App\Repositories\Versions\VersionRepository;
use App\Validators\Versions\VersionValidator;
use Illuminate\Support\Facades\View;

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

        View::share('titlePage', __('version.page_title'));
        View::share('headerPage', 'version.page_header');
    }

}
