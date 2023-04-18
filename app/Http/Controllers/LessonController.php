<?php

namespace App\Http\Controllers;

use App\Exceptions\PageException;
use App\Repositories\LessonItemRepositoryInterface;
use App\Repositories\LessonRepositoryInterface;
use App\Repositories\PLanguageRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class LessonController extends Controller
{
    private $userRepository;
    private $pLanguageRepository;
    private $lessonRepository;
    private $lessonItemRepository;
    private $file_methods = ['fopen', 'fclose', 'fread', 'fwrite', 'file_exists', 'filesize', 'unlink', 'copy', 'rename', 'mkdir', 'opendir', 'readdir', 'closedir', 'is_readable', 'is_writable', 'exec', 'shell_exec'];

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
                    $lesson_list = $this->lessonRepository->getLessonList($lesson->course_id);
                    $lesson_detail = $this->lessonItemRepository->getLessonDetail($req->id);
                    return view('admin.pages.lesson.lesson_detail', compact('lesson', 'lesson_detail', 'course_selected', 'course_list', 'lesson_list'));
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
        if ($course !== null) {
            $lesson_list = $this->lessonRepository->getLessonListParent($course->id);
            $lesson = $this->lessonRepository->getLessonBySlug($slug, $course->id);
            if ($lesson !== null) {
                if (!Auth::check() || Auth::user()->role != 1) {
                    $lesson->view += 1;
                    $lesson->save();
                }
                $lesson_parent = $this->lessonRepository->getLessonById($lesson->parent);
                $lesson_child_list = null;
                if ($lesson_parent != null) {
                    $lesson_child_list = $this->lessonRepository->getLessonChildList($lesson_parent->id);
                } else {
                    $lesson_child_list = $this->lessonRepository->getLessonChildList($lesson->id);
                }
                $lesson_detail = $this->lessonItemRepository->getLessonDetail($lesson->id);
                $pre_lesson = $this->lessonRepository->getPreLesson($lesson->id, $course->id);
                if ($pre_lesson !== '') {
                    $pre_lesson = route('learn.lesson_detail', ['course' => $course->name, 'slug' => $pre_lesson->slug]);
                }
                $next_lesson = $this->lessonRepository->getNextLesson($lesson->id, $course->id);
                if ($next_lesson !== '') {
                    $next_lesson = route('learn.lesson_detail', ['course' => $course->name, 'slug' => $next_lesson->slug]);
                }
                return view('pages.learn.lesson', compact('lesson_list', 'lesson_detail', 'course', 'lesson', 'lesson_parent', 'lesson_child_list', 'pre_lesson', 'next_lesson'));
            }
        }

        throw new PageException();
    }

    public function getLessonIntro($course)
    {
        $key = $course;
        $course = $this->pLanguageRepository->getCourseByName($course);
        if ($course !== null) {
            $lesson_list = $this->lessonRepository->getLessonListParent($course->id);
            $lesson = $this->lessonRepository->getLessonIntro($course->id);
            if ($lesson !== null) {
                if (!Auth::check() || Auth::user()->role != 1) {
                    $lesson->view += 1;
                    $lesson->save();
                }
                $lesson_parent = $this->lessonRepository->getLessonById($lesson->parent);
                $lesson_child_list = null;
                if ($lesson_parent != null) {
                    $lesson_child_list = $this->lessonRepository->getLessonChildList($lesson_parent->id);
                } else {
                    $lesson_child_list = $this->lessonRepository->getLessonChildList($lesson->id);
                }
                $lesson_detail = $this->lessonItemRepository->getLessonDetail($lesson->id);
                $pre_lesson = $this->lessonRepository->getPreLesson($lesson->id, $course->id);
                if ($pre_lesson !== '') {
                    $pre_lesson = route('learn.lesson_detail', ['course' => $course->name, 'slug' => $pre_lesson->slug]);
                }
                $next_lesson = $this->lessonRepository->getNextLesson($lesson->id, $course->id);
                if ($next_lesson !== '') {
                    $next_lesson = route('learn.lesson_detail', ['course' => $course->name, 'slug' => $next_lesson->slug]);
                }
                return view('pages.learn.lesson', compact('lesson_list', 'lesson_detail', 'course', 'lesson', 'lesson_parent', 'lesson_child_list', 'pre_lesson', 'next_lesson'));
            }
        } 

        return redirect()->route('search', ['key' => $key]);
    }

    public function buildCodePHP(Request $req)
    {
        try {
            $content = $req->content;
            foreach ($this->file_methods as $method) {
                if (str_contains($content, $method)) {
                    return 'System error!';
                }
            }
            return eval($content);
        } catch (Throwable $ex) {
            $message = $ex->getMessage();
            if (str_contains($message, 'App\Http\Controllers\LessonController')) {
                $message = str_replace('App\Http\Controllers\LessonController', '', $message);
            }
            return $message;
        }
    }

    public function lessonListMainAdmin(Request $req)
    {
        $lesson_list = $this->lessonRepository->getLessonList($req->id);
        $output = '<option value="0">Chọn bài viết chính</option>';

        foreach ($lesson_list as $lesson) {
            $output .= '<option value="' . $lesson->id . '">' . $lesson->title . '</option>';
        }

        return response()->json($output);
    }

    public function delLessonAdmin(Request $req)
    {
        if (isset($req->id)) {
            $del_lesson = $this->lessonRepository->delLessonAdmin($req->id);
        }

        return redirect()->back();
    }

    public function changeLessonItemType(Request $req)
    {
        $lesson_item = $this->lessonItemRepository->changeLessonItemType($req->all());

        return response()->json($lesson_item);
    }
}
