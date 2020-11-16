<?php

namespace App\Http\Controllers\BusinessPlan;

use App\Http\Controllers\Controller;

class BusinessPlanController extends Controller
{
    public function index()
    {
        return view('/business-plan/list');
    }

    public function businessDetail($id)
    {
        return view('/business-plan/detail');
    }

    public function newForm() {
        return view('/business-plan/add_form');
    }

    public function updateForm() {
        return view('/business-plan/update_form');
    }
}



