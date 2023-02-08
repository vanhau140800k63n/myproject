<?php

namespace App\Repositories;

interface LessonItemRepositoryInterface
{
    public function addItem($data);
    public function getLessonDetail($lesson_id);
    public function updateItem($data);
    public function delItem($id);
}
