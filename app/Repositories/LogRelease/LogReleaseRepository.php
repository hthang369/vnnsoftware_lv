<?php


namespace App\Repositories\LogRelease;


use App\Models\LogRelease;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogReleaseRepository
{

    public function addLogRelease($user_id,$redmine_id,$version,$environment)
    {

        LogRelease::create([
            'user_id' => $user_id,
            'redmine_id' => $redmine_id,
            'version' => $version,
            'environment'=>$environment,
            'release_type' => $this->getReleaseType($redmine_id),
        ]);
        return;
    }
    public function getLogReleaseList(){

        return LogRelease::latest()->get();

    }
    public function getLogReleaseByUserId($user_id){
        $logs = LogRelease::where("user_id","=",$user_id)->latest()->get();
        return $logs;

    }
    public function searchLogRelease($request){
        $logs = LogRelease::query();
        dd(1);die();
//        dd($request);die();
        if ($request->has('filter_field')){
            dd(123);
        }
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
