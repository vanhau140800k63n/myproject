<?php

namespace App\Repositories\Eloquent;

use App\Models\Lesson;
use App\Models\PLanguage;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\LessonRepositoryInterface;

class LessonRepository extends BaseRepository implements LessonRepositoryInterface
{
    private $lesson;
    private $p_language;

    public function __construct()
    {
        $this->lesson = new Lesson();
        $this->p_language = new PLanguage();
    }

    public function getCourseListAdmin()
    {
        $query = $this->p_language;
        $course_list = $this->retryQuery($query);

        foreach ($course_list as $lesson) {
            $lesson->lesson_num = $this->lesson->where('course_id', $lesson->id)->get()->count();
        }

        return $course_list;
    }

    public function getLessonList($course_id)
    {
        $query = $this->lesson->where('course_id', $course_id);

        return $this->retryQuery($query);
    }

    public function addLesson($data)
    {
        $query = $this->lesson;

        $course_name = $this->p_language->where('id', $data['course_id'])->first()->name;
        $str = $this->makeSlug($course_name . ' ' . $data['sub_title']);

        $data_create = [
            'title' => $data['main_title'],
            'sub_title' => $data['sub_title'],
            'course_id' => $data['course_id'],
            'parent' => $data['parent'],
            'slug' => $str
        ];

        return $this->retryCreate($query, $data_create);
    }

    public function updateLesson($data)
    {
        $course_name = $this->p_language->where('id', $data['course_id'])->first()->name;
        $str = $this->makeSlug($course_name . ' ' . $data['sub_title']);

        $data_update = [
            'title' => $data['main_title'],
            'sub_title' => $data['sub_title'],
            'course_id' => $data['course_id'],
            'parent' => $data['parent'],
            'slug' => $str
        ];

        $lesson_update = $this->lesson->where('id', $data['id'])->update($data_update);
        return true;
    }

    public function getLessonAdmin($id)
    {
        return $this->lesson->find($id);
    }

    public function getLessonBySlug($slug, $course_id)
    {
        return $this->lesson->where('slug', $slug)->where('course_id', $course_id)->first();
    }

    public function getLessonIntro($course_id)
    {
        return $this->lesson->where('course_id', $course_id)->first();
    }

    public function delLessonAdmin($id)
    {
        return $this->lesson->where('id', $id)->delete();
    }
}
