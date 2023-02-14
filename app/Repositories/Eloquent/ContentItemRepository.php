<?php

namespace App\Repositories\Eloquent;

use App\Models\ContentItem;
use App\Repositories\ContentItemRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class ContentItemRepository extends BaseRepository implements ContentItemRepositoryInterface
{
    private $content_item;

    public function __construct()
    {
        $this->content_item = new ContentItem();
    }
}
