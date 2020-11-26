<?php

namespace App\Http\Controllers\Version;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VersionController extends Controller
{
    public function index()
    {
        $json = json_decode(file_get_contents('https://laka.lampart-vn.com:9443/api/v1/get-version'), true);
        $versions = $json['data'];

        return view('/version/list')->with('versions', $versions);
    }
}
