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

    public function checkAddIcon($icon_path)
    {
        return $this->icon->where('path', intval($icon_path[4]))->where('index', intval($icon_path[5]))->first();
    }

    public function updateIcon($data)
    {
        return $this->icon->update($data);
    }

    public function getIconByPath($data)
    {
        return $this->icon->where('path', intval($data[4]))->where('index', intval($data[5]))->where('status', 1)->first();
    }

    public function randomByTag($tag, $num)
    {
        return $this->icon->where('tag', 'like', "%$tag%")->inRandomOrder()->take($num)->get();
    }

    public function searchIconByKey($key)
    {
        return $this->icon->where('tag', 'like', "%$key%")->where('status', 1)->inRandomOrder()->get();
    }

    public function getFirstIconByKeyNotActive($key)
    {
        return $this->icon->where('tag', 'like', "%$key%")->where('status', 0)->first();
    }
}
