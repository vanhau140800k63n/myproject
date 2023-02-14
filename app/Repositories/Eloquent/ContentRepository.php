<?php

namespace App\Repositories\Eloquent;

use App\Models\Content;
use App\Repositories\ContentRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class ContentRepository extends BaseRepository implements ContentRepositoryInterface
{
    private $content;

    public function __construct()
    {
        $this->content = new Content();
    }
}
