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

    public function addItem($data)
    {
        $data_create = [
            'title' => $data['title'],
            'content' => $data['content'],
            'type' => $data['type'],
            'index' => $data['index'],
            'p_language_id' => $data['code'],
            'compiler' => $data['compiler'],
            'post_id' => $data['post_id']
        ];

        return $this->content_item->create($data_create);
    }

    public function getPostDetail($post_id)
    {
        return $this->content_item->where('post_id', $post_id)->orderBy('index', 'ASC')->get();
    }

    public function updateItem($data)
    {
        $data_update = [
            'title' => $data['title'],
            'content' => $data['content'],
            'type' => $data['type'],
            'index' => $data['index'],
            'p_language_id' => $data['code'],
            'compiler' => $data['compiler'],
            'post_id' => $data['post_id']
        ];

        return $this->content_item->where('id', $data['id'])->update($data_update);
    }

    public function delItem($id)
    {
        return $this->content_item->where('id', $id)->delete();
    }
}
