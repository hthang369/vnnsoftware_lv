<?php

namespace App\Repositories\Company;

use App\Repositories\MyRepository;
use App\Models\Company;

class CompanyMysqlRepository extends MyRepository implements CompanyRepositoryInterface
{

    public function getById($id)
    {
        return Company::find($id);
    }

    public function getAll()
    {
        return Company::all();
    }

    public function Create($input)
    {
        return Company::create($input);
    }

    public function update($id, $input)
    {
        return Company::where('id', $id)
            ->update($input);
    }

    public function delete($id)
    {
        return Company::where('id', $id)->delete();
    }
}
