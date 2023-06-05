<?php

namespace App\Repositories\Eloquent;

use App\Models\Ranking;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\RankingRepositoryInterface;

class RankingRepository extends BaseRepository implements RankingRepositoryInterface
{
    private $ranking;

    public function __construct()
    {
        $this->ranking = new Ranking();
    }
}
