<?php


namespace App\Repositories\LogRelease;


use App\Models\LogRelease;

class LogReleaseRepository
{

    public function addLogRelease($user_id, $redmine_id, $version, $environment)
    {

        LogRelease::create([
            'user_id' => $user_id,
            'redmine_id' => $redmine_id,
            'version' => $version,
            'environment' => $environment,
            'release_type' => $this->getReleaseType($redmine_id),
        ]);
        return;
    }

    public function getLogReleaseList()
    {

        return LogRelease::latest()->get();

    }

    public function getLogReleaseByUserId($user_id)
    {
        $logs = LogRelease::where("user_id", "=", $user_id)->latest()->get();

        return $logs;

    }

    public function searchLogRelease($request)
    {

        $logs = LogRelease::query();
        $field_filter = $request->all();
        $field_not_filter = ["_token", "log_user_id"];
        $log_user_id = $field_filter[log_user_id];

        if ($log_user_id != null) {

            $logs = $this->getLogReleaseByUserId($log_user_id);
        }

        foreach ($field_filter as $field => $value) {
            if (!in_array($field, $field_not_filter) && $value != null) {
                $logs = $logs->where($field, $value);
                if ($log_user_id == null) {
                    $logs = $logs->get();
                }
            }
        }

        return $logs;
    }

    public function getReleaseType($redmine_id)
    {
        if (LogRelease::where("redmine_id", "=", $redmine_id)->first() == null) {
            return 0;
        } else {
            return 1;
        }
    }
}
