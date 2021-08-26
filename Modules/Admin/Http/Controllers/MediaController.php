<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Repositories\MediaCriteria;
use Modules\Admin\Repositories\MediaRepository;
use Modules\Admin\Responses\MediaResponse;
use Modules\Admin\Validators\MediaValidator;
use Modules\Core\Http\Controllers\CoreController;

class MediaController extends CoreController
{
    public function __construct(MediaRepository $repository, MediaValidator $validator, MediaResponse $response, MediaCriteria $criteria)
    {
        parent::__construct($repository, $validator, $response, $criteria);
        $this->setDefaultView('admin::media');
        $this->setRouteName('media');
        $this->setPathView([
            'create' => 'admin::menus.menu_modal',
            'show' => 'admin::menus.menu_modal'
        ]);
    }

    public function index()
    {
        return view('admin::media.index');
    }
}
