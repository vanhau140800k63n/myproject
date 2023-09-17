<?php

namespace App\Repositories\Eloquent;

use App\Models\SolutionItem;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\SolutionItemRepositoryInterface;

class SolutionItemRepository extends BaseRepository implements SolutionItemRepositoryInterface
{
    private $solution_item;

    public function __construct()
    {
        $this->solution_item = new SolutionItem();
    }
}
