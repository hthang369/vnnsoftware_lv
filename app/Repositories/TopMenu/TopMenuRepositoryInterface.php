<?php

namespace App\Repositories\TopMenu;

interface TopMenuRepositoryInterface
{
    public function getById($id);

    public function getAllPaginate();

    public function getAll();

    public function create($input);
}
