<?php

namespace Modules\Core\Http\Controllers;

use App\Http\Requests;
use App\Traits\SendResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Modules\Core\Contracts\BaseControllerInterface;
use Modules\Core\Contracts\PaginationTransformer;
use Modules\Core\Emails\EmailService;
use Modules\Core\Repositories\BaseRepository;
use Modules\Core\Responses\BaseResponse;
use Modules\Core\Support\Carbon;
use Modules\Core\Traits\Authorizable;
use Modules\Core\Validators\BaseValidator;
use Modules\Setting\Facade\Setting;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class BasesController.
 *
 * @package namespace Modules\Core\Http\Controllers;
 */
abstract class BaseController extends Controller implements BaseControllerInterface
{
    use Authorizable, AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var BaseRepository
     */
    protected $repository;

    /**
     * @var BaseValidator
     */
    protected $validator;

    /**
     * @var BaseResponse
     */
    protected $response;

    /**
     * @var array
     */
    protected $defaultCriteria;

    /**
     * @var array
     */
    protected $jobs = [];

    /**
     * @var string
     */
    protected $pathExport;

    /**
     * @var bool
     */
    protected $throwException;

    /**
     * @var array
     */
    protected $actionPermissionList = [];

    /**
     * BasesController constructor.
     *
     * @param BaseRepository $repository
     * @param BaseValidator $validator
     * @param BaseResponse $response
     * @param CriteriaInterface $criteria
     */
    public function __construct(BaseRepository $repository, BaseValidator $validator, BaseResponse $response, CriteriaInterface $criteria)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->response = $response;
        $this->throwException = false;
        $this->defaultCriteria = [$criteria];

        if (!empty($this->actionPermissionList))
            $this->setControllerActionPermission($this->actionPermissionList);
    }

    /**
     * @param $criteria
     */
    public function pushDefaultCriteria($criteria)
    {
        $this->defaultCriteria[] = $criteria;
    }

    /**
     * @param $job
     */
    public function pushJob($job)
    {
        $this->jobs[] = $job;
    }

    /**
     * @param $isThrow
     */
    public function setThrowException($isThrow)
    {
        $this->throwException = $isThrow;
    }

    /**
     * @param Request $request
     * @param $data
     * @param $viewName
     */
    protected function responseView(Request $request, $data, $viewName = '')
    {
        if ($request->wantsJson()) {
            return $this->response->data($data);
        }

        return view(implode('.', ['bases', $viewName]), compact('bases'));
    }

    /**
     * @param Request $request
     * @param $data
     * @param $viewName
     */
    protected function responseAction(Request $request, $result, $action)
    {
        if ($request->wantsJson()) {
            return $this->response->{$action}(data_get($result, 'data'));
        }

        return $request->back()->with('message', data_get($result, 'message'));
    }

    /**
     * @param Request $request
     * @param $data
     * @param $viewName
     */
    protected function responseErrorAction(Request $request, \Exception $e)
    {
        if ($request->wantsJson()) {
            if ($e instanceof ValidatorException) {
                return $this->response->validationError($e->getMessageBag());
            } else if ($e instanceof \Exception) {
                if ($this->throwException)
                    throw $e;
                else
                    return $this->response->error($e->getMessage());
            }
        }

        $message = $e->getMessage();
        if ($e instanceof ValidatorException) {
            return $message = $e->getMessageBag();
        }
        return $request->back()->withErrors($message)->withInput();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        foreach ($this->defaultCriteria as $criteria) {
            $this->repository->pushCriteria($criteria);
        }

        if (request()->has('limit')) {
            $bases = $this->repository->paginateAndTransform(app(PaginationTransformer::class));
        } else {
            $bases = $this->repository->all();
        }

        return $this->responseView(request(), $bases, 'index');
    }

    /**
     * @param $data
     * @param $rules
     * @throws ValidatorException
     */
    public function validator($data, $rules)
    {
        $this->validator->with($data)->passesOrFail($rules);
    }

    /**
     * Dispatch Job
     * @throws ValidatorException
     */
    public function dispatchJobs()
    {
        foreach($this->jobs as $job) {
            dispatch($job);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $this->validator($request->all(), ValidatorInterface::RULE_CREATE);

            $base = $this->repository->create($request->all());

            if (method_exists($base, 'toArray')) {
                $base = $base->toArray();
            }

            $response = [
                'message' => 'Base created.',
                'data' => $base,
            ];

            $this->dispatchJobs();

            return $this->responseAction($request, $response, 'created');
        } catch (\Exception $e) {
            return $this->responseErrorAction($request, $e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $base = $this->repository->find($id);

        return $this->responseView(request(), $base, 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $base = $this->repository->find($id);

        return view('bases.edit', compact('base'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  string $id
     *
     * @return BaseResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validator($request->all(), ValidatorInterface::RULE_UPDATE);

            $base = $this->repository->update($request->all(), $id);

            if (method_exists($base, 'toArray')) {
                $base = $base->toArray();
            }

            $response = [
                'message' => 'Base updated.',
                'data' => $base,
            ];

            $this->dispatchJobs();

            return $this->responseAction($request, $response, 'updated');
        } catch (\Exception $e){
            return $this->responseErrorAction($request, $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        return $this->responseAction(request(), null, 'deleted');
    }


    /**
     * @param Request $request
     * @param $id
     * @return mixed|void
     */
    public function import(Request $request, $id)
    {
        // todo: check input file

        // todo: validate format file

        // todo: convert to array

        // todo: handle array

        // todo: save array to db

    }


    /**
     * @param Request $request
     * @param int $id
     * @return array|void
     */
    public function export(Request $request, $id)
    {
        // todo: get data from db

        // todo: handle array data

        // todo: save array data to file

        // todo: download file

    }

    /**
     * Export Data
     * @param Request $request
     * @return void
     */
    public function exportData(Request $request, $callback)
    {
        // Check user call back
        if (is_null($callback)) return;

        // Check url for download
        if (!$request->has('url')) {
            throw new \Exception('Don\'t have url');
        }

        if (filter_var($request->url, FILTER_VALIDATE_URL)){
//        if (!preg_match('/^(.+)\/$/',$request->url,$match)) {
            throw new \Exception('Wrong url.');
        }
        $url = $request->url;

        // Get url front end
        $getUrlFrontend = rtrim(env('APP_URL_FRONTEND'), '/');

        // todo: get data from db
        $dataExport = [];

        if (is_callable($callback)) {
            $dataExport = call_user_func($callback, $request);
        }

        if (empty($dataExport)) return;

        // todo: handle array data
        $file = $dataExport['file_name'];

        // todo: save array data to file
        $pathFile = Storage::disk('public')->url(config(sprintf('filesystems.disks.public.%s', $this->getPathExport()))) . '/' . $file;

        // todo: download file
        if (file_exists(config(sprintf('filesystems.disks.public.path_%s', $this->getPathExport())) . '/' . $file)) {
            $textEncode = $dataExport['text_encode'];

            /** @var string $download |get in setting value:  1: send email; 0: directly download */
            if (!is_null($download = Setting::get('general', 'download_csv')) && $download) {

                //<editor-fold desc="Set path file, view and send email">
                $emailService = new EmailService();
                $emailService->pathFile = $getUrlFrontend . "{$url}?hash_download={$textEncode}";
                $emailService->view = 'core::email.export_mail';
                //<editor-fold desc="Translate subject">
                $subject                = trans('email.subject_download_month');
                $emailService->subject  = $subject ? $subject : '';
                //</editor-fold>
                $emailService->send();
                //</editor-fold>
            }

            return $this->response->data([
                'file_name'   => $file,
                'file_path'   => $pathFile,
                'is_download' => $download
            ]);
        } else {
            return $this->response->error('Fail', trans('common.file_not_found'));
        }
    }

    /**
     * Set path export
     *
     * @param string path
     * @return void
     */
    public function setPathExport($path)
    {
        $this->pathExport = $path;
    }

    /**
     * Get path export
     *
     * @return string
     */
    public function getPathExport()
    {
        return $this->pathExport ?? 'export_excel_report';
    }

    protected function validateDateRange($dateFrom, $dateTo, $maxMonth, $field = 'date_to')
    {
        $maxReportRangeInMonth = $maxMonth - 1; // Need to minus 1 because diffInMonths() returns +1 to the result
        $carbonFrom = new Carbon($dateFrom);
        $carbonTo = new Carbon($dateTo);

        $diffInMonths = $carbonFrom->diffInMonths($carbonTo);

        if ($diffInMonths > $maxReportRangeInMonth) {
            throw ValidationException::withMessages([$field => str_replace('{0}', $maxReportRangeInMonth + 1, trans('common.validate.reportDateRange'))]);
        }
    }
}
