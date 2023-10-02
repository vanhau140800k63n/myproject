<?php

namespace App\Repositories;

interface SolutionRepositoryInterface
{
    public function create($data);
    public function getSolutionBySlug($id, $slug);
    public function random($num);
    public function searchKey($key, $count);
}
