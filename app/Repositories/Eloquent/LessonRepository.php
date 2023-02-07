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
            $lesson->lession_num = $this->lesson->where('course_id', $lesson->id)->get()->count();
        }

        return $course_list;
    }

    public function getLessonListAdmin($course_id) {
        $query = $this->lesson->where('course_id', $course_id);

        return $this->retryQuery($query);
    }

    public function addCourse($data) {
        $query = $this->lesson;
        $data_create = [
            'title' => $data['main_title'],
            'sub_title' => $data['sub_title'],
            'course_id' => $data['course_id']
        ];

        return $this->retryCreate($query, $data_create);
    }
}
