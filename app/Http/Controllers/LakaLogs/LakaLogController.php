<?php

namespace App\Http\Controllers\LakaLogs;

use App\Http\Controllers\Core\CoreController;
use App\Repositories\LakaLogs\LakaLogRepository;
use App\Validators\LakaLogs\LakaLogValidator;
use Illuminate\Support\Facades\View;

/**
 * Class LakaLogController
 * @package App\Http\Controllers\LakaLogs
 * @property LakaLogRepository lakalogRepository
 */
class LakaLogController extends CoreController
{
    protected $listViewName = [
        'index' => 'laka-log.list',
        'create' => 'laka-log.create',
        'store' => 'laka-log.create',
    ];

    public function __construct(LakaLogValidator $validator) {
        parent::__construct($validator);

        $this->repository = $this->factory->makeRepository(LakaLogRepository::class);

        View::share('titlePage', 'laka_log.page_title');
        View::share('headerPage', 'laka_log.page_header');
    }

    public function index() {
        $dtFrom = request('dtFrom');
        $dtTo = request('dtTo');
        if ($dtFrom && $dtTo) {
            request()->merge(['date_log' => ['start' => $dtFrom, 'end' => $dtTo]]);
        }
        return parent::index();
    }
}
