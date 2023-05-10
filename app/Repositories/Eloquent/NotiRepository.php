<?php

namespace App\Repositories\Eloquent;

use App\Models\Noti;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\NotiRepositoryInterface;

class NotiRepository extends BaseRepository implements NotiRepositoryInterface
{
    private $noti;

    public function __construct()
    {
        $this->noti = new Noti();
    }
}
