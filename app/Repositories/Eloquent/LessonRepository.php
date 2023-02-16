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
        $str = $course_name . ' ' . $data['sub_title'];
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^|\/|\:)/", '-', $str);
        $str = preg_replace("/( )/", '-', $str);
        $str = preg_replace("/(---)/", '-', $str);
        $str = preg_replace("/(--)/", '-', $str);
        $str = strtolower($str);
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
        $str = $course_name . ' ' . $data['sub_title'];
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^|\/|\:)/", '-', $str);
        $str = preg_replace("/( )/", '-', $str);
        $str = preg_replace("/(---)/", '-', $str);
        $str = preg_replace("/(--)/", '-', $str);
        $str = strtolower($str);

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

    public function getLessonIntro($course_id) {
        return $this->lesson->where('course_id', $course_id)->first();
    }
}
