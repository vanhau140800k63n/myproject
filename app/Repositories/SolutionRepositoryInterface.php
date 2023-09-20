<?php

namespace App\Repositories;

interface SolutionRepositoryInterface
{
    public function create($data);
    public function getSolutionBySlug($slug);
    public function random($num);
}
