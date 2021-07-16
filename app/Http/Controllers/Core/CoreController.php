<?php

namespace App\Http\Controllers\Core;

use App\Core\Http\Controllers\BaseController;
use App\Core\Http\Response\WebResponse;
use App\Core\Validators\BaseValidator;
use Illuminate\Support\Facades\View;

/**
 * Class CoreController
 * @package App\Http\Controllers\Core
 */
abstract class CoreController extends BaseController
{
    public function __construct(BaseValidator $validator) {
        parent::__construct($validator);

        View::share('sectionCode', $this->getSectionCode());
    }

    public function create()
    {
        $data = $this->repository->formGenerate();

        return WebResponse::success($this->getViewName(__FUNCTION__), $data);
    }
}
