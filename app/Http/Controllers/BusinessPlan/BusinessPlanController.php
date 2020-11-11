<?php

namespace App\Http\Controllers\BusinessPlan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusinessPlanController extends Controller
{
    public function index() {
        return view('/business-plan/list');
    }

    public function detail($id) {
        return view('/business-plan/detail');
    }
}



