<?php
namespace App\Repositories\Company;

interface CompanyRepositoryInterface
{
    public function getById($id);
    public function getAll();
    public function create($input);
}
