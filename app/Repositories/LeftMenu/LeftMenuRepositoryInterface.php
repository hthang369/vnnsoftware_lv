<?php

namespace App\Repositories\LeftMenu;

interface LeftMenuRepositoryInterface
{
    public function getById($id);

    public function getAllPaginate();

    public function create($input);
}
