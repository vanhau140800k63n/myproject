<?php

namespace App\Repositories\Eloquent;

use App\Models\Action;
use App\Repositories\ActionRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class ActionRepository extends BaseRepository implements ActionRepositoryInterface
{
    private $action;

    public function __construct()
    {
        $this->action = new Action();
    }
}
