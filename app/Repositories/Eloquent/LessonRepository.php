<?php

namespace App\Repositories\Eloquent;

use App\Models\Lesson;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\LessonRepositoryInterface;

class LessonRepository extends BaseRepository implements LessonRepositoryInterface
{
    private $lesson;

    public function __construct()
    {
        $this->lesson = new Lesson();
    }
}
