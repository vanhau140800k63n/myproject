<?php

namespace App\Repositories\Eloquent;

use App\Models\LessonItem;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\LessonItemRepositoryInterface;

class LessonItemRepository extends BaseRepository implements LessonItemRepositoryInterface
{
    private $lesson_item;

    public function __construct()
    {
        $this->lesson_item = new LessonItem();
    }

    public function addItem($data) {
        $data_create = [
            'title' => $data['title'],
            'content' => $data['content'],
            'type' => $data['type'],
            'index' => $data['index'],
            'p_language_id' => $data['code'],
            'lesson_id' => $data['lesson_id']
        ];

        return $this->lesson_item->create($data_create);
    }

    public function getLessonDetail($lesson_id) {
        return $this->lesson_item->where('lesson_id', $lesson_id)->orderBy('index', 'ASC')->get();
    }

    public function updateItem($data) {
        $data_update = [
            'title' => $data['title'],
            'content' => $data['content'],
            'type' => $data['type'],
            'index' => $data['index'],
            'p_language_id' => $data['code'],
            'lesson_id' => $data['lesson_id']
        ];

        return $this->lesson_item->where('id', $data['id'])->update($data_update);
    }

    public function delItem($id) {
        return $this->lesson_item->where('id', $id)->delete();
    }

    public function getLessonDetailBySlug($slug) {
        return $this->lesson_item->where('slug', $slug)->orderBy('index', 'ASC')->get();
    }
}
