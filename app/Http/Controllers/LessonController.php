<?php

namespace App\Http\Controllers;

use App\Repositories\LessonRepositoryInterface;
use App\Repositories\PLanguageRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    private $userRepository;
    private $pLanguageRepository;
    private $lessonRepository;

    public function __construct(UserRepositoryInterface $userRepository, PLanguageRepositoryInterface $pLanguageRepository, LessonRepositoryInterface $lessonRepository)
    {
        $this->userRepository = $userRepository;
        $this->pLanguageRepository = $pLanguageRepository;
        $this->lessonRepository = $lessonRepository;
    }

    public function getCourseListAdmin()
    {
        $course_list = $this->lessonRepository->getCourseListAdmin();
        return view('admin.pages.lesson.course_list', compact('course_list'));
    }

    public function getLessonListAdmin(Request $req)
    {
        if (isset($req->name)) {
            $course_id = $this->pLanguageRepository->getPLanguageIdByName($req->name);
            if ($course_id === false) {
                return view('admin.pages.error_admin');
            }
            $lesson_list = $this->lessonRepository->getLessonListAdmin($course_id);
        } else {
            return view('admin.pages.error_admin');
        }

        return view('admin.pages.lesson.lesson_list', compact('lesson_list'));
    }

    public function addLessonAdmin(Request $req) {
        $course_list = $this->lessonRepository->getCourseListAdmin();
        return view('admin.pages.lesson.lesson_add', compact('course_list'));
    }

    public function addLessonInfoAdmin(Request $req) {
        if(isset($req->course_id) && $req->course_id != null && $req->course_id != '') {
            $course = $this->lessonRepository->addCourse($req->all());

            if($course !== false) {
                return response()->json($course);
            }
        }

        return response()->json(false);
    }
}
