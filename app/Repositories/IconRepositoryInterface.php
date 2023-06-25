<?php

namespace App\Repositories;

interface IconRepositoryInterface
{
    public function getLastIcon();
    public function create($data);
    public function updateIcon($data);
    public function checkAddIcon($icon_path);
}
