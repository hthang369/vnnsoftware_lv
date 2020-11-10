<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemHomeController extends Controller
{
    public function index()
    {
        return view('\system-admin\home');
    }
}
