<?php

namespace App\Repositories;

interface LessonRepositoryInterface
{
    public function getCourseListAdmin();
    public function getLessonList($course_id);
    public function addLesson($data);
    public function updateLesson($data);
    public function getLessonAdmin($id);
    public function getLessonBySlug($slug, $course_id);
    public function getLessonIntro($course_id);
    public function delLessonAdmin($id);
}