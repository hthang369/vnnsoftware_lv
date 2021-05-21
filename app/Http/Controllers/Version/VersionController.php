<?php

namespace App\Http\Controllers\Version;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VersionController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $json = json_decode(file_get_contents('https://laka.lampart-vn.com:9443/api/v1/get-version'), true);
        $versions = $json['data'];

        return view('/version/list')->with('versions', $versions);

    }
}
