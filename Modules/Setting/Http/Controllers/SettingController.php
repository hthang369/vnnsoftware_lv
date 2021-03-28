<?php

namespace Modules\Setting\Http\Controllers;

use Modules\Core\Http\Controllers\CoreController;
use Modules\Setting\Repositories\SettingCriteria;
use Modules\Setting\Repositories\SettingRepository;
use Modules\Setting\Responses\SettingResponse;
use Modules\Setting\Validators\SettingValidator;

class SettingController extends CoreController
{
    public function __construct(SettingRepository $repository, SettingValidator $validator, SettingResponse $response, SettingCriteria $criteria)
    {
        parent::__construct($repository, $validator, $response, $criteria);
    }
}
