<?php

namespace App\Repositories;

interface LessonRepositoryInterface
{
    public function getCourseListAdmin();
    public function getLessonListAdmin($course_id);
    public function addCourse($data);
}
