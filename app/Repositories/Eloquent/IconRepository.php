<?php

namespace App\Repositories\Eloquent;

use App\Models\Icon;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\IconRepositoryInterface;

class IconRepository extends BaseRepository implements IconRepositoryInterface
{
    private $icon;

    public function __construct()
    {
        $this->icon = new Icon();
    }

    public function getLastIcon()
    {
        return $this->icon->orderBy('id', 'desc')->first();
    }

    public function create($data)
    {
        return $this->icon->create($data);
    }
}
