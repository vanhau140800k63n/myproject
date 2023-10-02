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

    public function create($data) {
        return $this->solution->create($data);
    }

    public function getSolutionBySlug($id, $slug) {
        return $this->solution->where('id', $id)->where('slug', $slug)->first();
    }

    public function random($num) {
        return $this->solution->whereNotNull('slug')->where('slug', '!=', '')->inRandomOrder()->take($num)->get();
    }

    public function searchKey($key, $count) {
        return $this->solution->where('title', 'like', '%' . $key . '%')->take($count)->get();
    }
}
