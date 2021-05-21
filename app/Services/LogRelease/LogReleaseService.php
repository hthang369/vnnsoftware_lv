<?php


namespace App\Services\LogRelease;


use App\Repositories\LogRelease\LogReleaseRepository;

class LogReleaseService
{
    private $logReleaseRepository;

    public function __construct(LogReleaseRepository $logReleaseRepository)
    {
        $this->logReleaseRepository = $logReleaseRepository;
    }

    public function addLogRelease($user_id, $redmine_id, $version, $environment)
    {
        $this->logReleaseRepository->addLogRelease($user_id, $redmine_id, $version, $environment);
    }

    public function getLogReleaseList()
    {
        return $this->logReleaseRepository->getLogReleaseList();
    }

    public function getLogReleaseByUserId($user_id)
    {
        return $this->logReleaseRepository->getLogReleaseByUserId($user_id);
    }

    public function searchLogRelease($request)
    {
        return $this->logReleaseRepository->searchLogRelease($request);
    }
}
