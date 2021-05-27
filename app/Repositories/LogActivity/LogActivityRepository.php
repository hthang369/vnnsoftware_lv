<?php
namespace App\Repositories\LogActivity;

use Illuminate\Http\Request;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Auth;

class LogActivityRepository {

    public function addToLog(Request $request, $subject)
    {
        $log = new LogActivity();
        $log->subject = $subject;
        $log->url = $request->fullUrl();
        $log->method = $request->method();
        $log->ip = $request->ip();
        $log->agent = $request->header('user-agent');
        $log->user_id = Auth::id();
        $log->user_name = Auth::user()->name;

        $input = json_encode($request->all());
        $log->input = $input;

        $log->save();
       return;
    }

    public function getLogActivityList($itemsPerPage)
    {
        //return LogActivity::latest()->get();
        return LogActivity::latest()->paginate($itemsPerPage);

    }

    public function getLogActivityByUserId($id, $itemsPerPage)
    {
        return LogActivity::where("user_id", "=", $id)->latest()->paginate($itemsPerPage);
    }

}
