<?php
namespace App\Repositories\Company;

interface CompanyRepositoryInterface
{
    public function getById($id);
    public function getAllPaginate();
    public function create($input);
}
