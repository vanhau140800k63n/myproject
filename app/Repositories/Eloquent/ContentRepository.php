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

    public function findContentUrl($url)
    {
        return $this->content->where('content', $url)->first();
    }

    public function createContentUrl($data)
    {
        return $this->content->create($data);
    }

    public function getContentUnPublicUrl()
    {
        return $this->content->where('type', 1)->where('status', 0)->first();
    }

    public function updateContentUrl($data, $id)
    {
        return $this->content->where('id', $id)->update($data);
    }
}
