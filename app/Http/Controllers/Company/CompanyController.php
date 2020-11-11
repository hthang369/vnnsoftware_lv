<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function index()
    {
        return view('/company/list');
    }

    public function companyDetail()
    {
        return view('/company/detail');
    }

    public function newForm() {
        return view('/company/add_form');
    }

    public function updateForm() {
        return view('/company/update_form');
    }
}
