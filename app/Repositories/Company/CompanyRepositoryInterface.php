<?php
namespace App\Repositories\Company;

interface CompanyRepositoryInterface
{
    public function getById($id);
    public function getAll();
    public function Create($input);
    public function update($id, $input);
    public function delete($id);
}
