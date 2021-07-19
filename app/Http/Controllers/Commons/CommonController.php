<?php

namespace App\Http\Controllers\Commons;

use App\Core\Http\Response\WebResponse;
use App\Http\Controllers\Core\CoreController;
use App\Repositories\Commons\CommonRepository;
use App\Validators\Commons\CommonValidator;

/**
 * Class CommonController
 * @package App\Http\Controllers\Commons
 * @property CommonRepository commonRepository
 */
class CommonController extends CoreController
{
    protected $listViewName = [];

    protected $permissionActions = [
        'confirmDialog' => 'public'
    ];

    public function __construct(CommonValidator $validator)
    {
        parent::__construct($validator);

        $this->repository = $this->factory->makeRepository(CommonRepository::class);
    }

    public function confirmDialog($id)
    {
        return WebResponse::success('common.dialog_confirm_delete', ['id' => $id]);
    }
}
