<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SystemHomeController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('\system-admin\home');
    }
}
