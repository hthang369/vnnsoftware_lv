<?php
namespace App\Repositories\Company;

use Illuminate\Http\Request;

interface CompanyRepositoryInterface
{
    public function getById($id);
    public function getAllPaginate(Request $request);
    public function create($input);
}
