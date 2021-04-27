<?php
namespace App\Services\LogActivity;

use App\Repositories\LogActivity\LogActivityRepository;
use Illuminate\Http\Request;

class LogActivityService{

    private $logActivityRepository;

    public function __construct(LogActivityRepository $logActivityRepository) {
        $this->logActivityRepository = $logActivityRepository;
    }

    public function addToLog(Request $request, $subject)
    {
        $this->logActivityRepository->addToLog($request, $subject);
        //dd($request);
        return;
    }

    public function getLogActivityList()
    {
        return $this->logActivityRepository->getLogActivityList();
    }

    public function getLogActivityByUserId($id)
    {
        return $this->logActivityRepository->getLogActivityByUserId($id);
    }

}