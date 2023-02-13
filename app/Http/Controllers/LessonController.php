<?php

namespace App\Http\Controllers;

use App\Exceptions\PageException;
use App\Repositories\LessonItemRepositoryInterface;
use App\Repositories\LessonRepositoryInterface;
use App\Repositories\PLanguageRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Throwable;

class LessonController extends Controller
{
    private $userRepository;
    private $pLanguageRepository;
    private $lessonRepository;
    private $lessonItemRepository;

    public function __construct(UserRepositoryInterface $userRepository, PLanguageRepositoryInterface $pLanguageRepository, LessonRepositoryInterface $lessonRepository, LessonItemRepositoryInterface $lessonItemRepository)
    {
        $this->userRepository = $userRepository;
        $this->pLanguageRepository = $pLanguageRepository;
        $this->lessonRepository = $lessonRepository;
        $this->lessonItemRepository = $lessonItemRepository;
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
            $lesson_list = $this->lessonRepository->getLessonList($course_id);
        } else {
            return view('admin.pages.error_admin');
        }

        return view('admin.pages.lesson.lesson_list', compact('lesson_list'));
    }

    public function addLessonAdmin(Request $req)
    {
        $course_list = $this->lessonRepository->getCourseListAdmin();
        return view('admin.pages.lesson.lesson_add', compact('course_list'));
    }

    public function addLessonInfoAdmin(Request $req)
    {
        if (isset($req->course_id) && $req->course_id != null && $req->course_id != '') {
            $lesson = $this->lessonRepository->addLesson($req->all());

            if ($lesson !== false) {
                return response()->json($lesson);
            }
        }

        return response()->json(false);
    }

    public function addLessonItemAdmin(Request $req)
    {
        $lesson_item = $this->lessonItemRepository->addItem($req->all());
        if ($lesson_item !== false) {
            return response()->json($lesson_item);
        }

        return response()->json(false);
    }

    public function updateLessonItemAdmin(Request $req)
    {
        $lesson_item_update = $this->lessonItemRepository->updateItem($req->all());
        if ($lesson_item_update !== false) {
            return response()->json($lesson_item_update);
        }

        return response()->json(false);
    }

    public function lessonDetailAdmin(Request $req)
    {
        if (isset($req->id)) {
            $lesson = $this->lessonRepository->getLessonAdmin($req->id);
            if ($lesson !== null && isset($lesson->course_id) && $lesson->course_id !== null) {
                $course_selected = $this->pLanguageRepository->getCourseAdmin($lesson->course_id);
                if ($course_selected !== null) {
                    $course_list = $this->lessonRepository->getCourseListAdmin();
                    $lesson_detail = $this->lessonItemRepository->getLessonDetail($req->id);
                    return view('admin.pages.lesson.lesson_detail', compact('lesson', 'lesson_detail', 'course_selected', 'course_list'));
                }
            }
        }
        return view('admin.pages.error_admin');
    }

    public function updateLessonInfoAdmin(Request $req)
    {
        if (isset($req->course_id) && $req->course_id != null && $req->course_id != '') {
            $lesson = $this->lessonRepository->updateLesson($req->all());

            if ($lesson !== false) {
                return response()->json($lesson);
            }
        }

        return response()->json(false);
    }

    public function delLessonItemAdmin(Request $req)
    {
        if (isset($req->id)) {
            $del_lesson_item = $this->lessonItemRepository->delItem($req->id);
        }

        return response()->json(true);
    }

    public function getLessonDetail($course, $slug)
    {
        $course = $this->pLanguageRepository->getCourseByName($course);
        if ($course !== false) {
            $lesson_list = $this->lessonRepository->getLessonList($course->id);
            $lesson = $this->lessonRepository->getLessonBySlug($slug, $course->id);
            if ($lesson !== null) {
                $lesson_detail = $this->lessonItemRepository->getLessonDetail($lesson->id);
                return view('pages.learn.lesson', compact('lesson_list', 'lesson_detail', 'course', 'lesson'));
            }
        }
        
        throw new PageException();
    }

    public function getLessonIntro($course)
    {
        $course = $this->pLanguageRepository->getCourseByName($course);
        if ($course !== false) {
            $lesson_list = $this->lessonRepository->getLessonList($course->id);
            $lesson = $this->lessonRepository->getLessonIntro($course->id);

            if ($lesson !== null) {
                $lesson_detail = $this->lessonItemRepository->getLessonDetail($lesson->id);
                return view('pages.learn.lesson', compact('lesson_list', 'lesson_detail', 'course', 'lesson'));
            }
        }

        throw new PageException();
    }

    public function buildCodePHP(Request $req)
    {
        try {
            return eval($req->content);
        } catch (Throwable $ex) {
            return $ex->getMessage();
        }
    }
}
