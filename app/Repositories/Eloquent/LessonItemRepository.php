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
}
