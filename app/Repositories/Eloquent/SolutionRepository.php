<?php

namespace App\Repositories\Eloquent;

use App\Models\Solution;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\SolutionRepositoryInterface;

class SolutionRepository extends BaseRepository implements SolutionRepositoryInterface
{
    private $solution;

    public function __construct()
    {
        $this->solution = new Solution();
    }
}
