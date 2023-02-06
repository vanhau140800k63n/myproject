<?php

namespace App\Repositories;

interface LessonRepositoryInterface
{
    public function getCourseListAdmin();
    public function getLessonListAdmin($p_language_id);
}
