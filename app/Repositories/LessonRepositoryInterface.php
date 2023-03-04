<?php

namespace App\Repositories;

interface LessonRepositoryInterface
{
    public function getCourseListAdmin();
    public function getLessonList($course_id);
    public function getLessonListParent($course_id);
    public function addLesson($data);
    public function updateLesson($data);
    public function getLessonAdmin($id);
    public function getLessonBySlug($slug, $course_id);
    public function getLessonIntro($course_id);
    public function delLessonAdmin($id);
    public function getLessonListAll();
    public function getLessonById($id);
    public function getLessonChildList($id);
    public function searchLesson($key, $count);
    public function getPreLesson($id, $course_id);
    public function getNextLesson($id, $course_id);
}