<?php

namespace App\Repositories;

interface IconRepositoryInterface
{
    public function getLastIcon();
    public function create($data);
}
