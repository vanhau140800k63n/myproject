<?php

namespace App\Http\Controllers;

use App\Models\PLanguage;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\LessonRepositoryInterface;
use App\Repositories\PLanguageRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $userRepository;
    private $pLanguageRepository;
    private $postRepository;
    private $lessonRepository;
    private $categoryRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        PLanguageRepositoryInterface $pLanguageRepository,
        PostRepositoryInterface $postRepository,
        LessonRepositoryInterface $lessonRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->userRepository = $userRepository;
        $this->pLanguageRepository = $pLanguageRepository;
        $this->postRepository = $postRepository;
        $this->lessonRepository = $lessonRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function getHomePage()
    {
        $pLanguages = $this->pLanguageRepository->getPLanguageHome();
        $post_list = $this->postRepository->getPostHome();
        return view('pages.home.home')->with(['p_languages' => $pLanguages, 'post_list' => $post_list]);
    }

    public function test(Request $req)
    {
        $posts = $this->postRepository->getPostList();
        $i = 1;
        foreach ($posts as $post) {
            if($post->title_update != null)
            echo ($i++ . '. ' . $post->title . '<br>' . $post->title_update . '<br><br>');
        }
        // $posts = $this->postRepository->getPostList();
        // foreach ($posts as $post) {
        //     $output =  '&lt;url&gt;<br>
        //                     &lt;loc&gt;' . route('post.detail', $post->slug) . '&lt;/loc&gt;<br>
        //                     &lt;lastmod&gt;2023-03-31T09:47:43+00:00&lt;/lastmod&gt;<br>
        //                     &lt;priority&gt;0.51&lt;/priority&gt;<br>
        //                 &lt;/url&gt;<br>';
        //     echo ($output);
        // }
    }

    public function updateMeta(Request $req)
    {
        $lesson_list = $this->lessonRepository->getLessonListAll();
        $post_list = $this->postRepository->getPostList();
        foreach ($lesson_list as $lesson) {
            if ($lesson->meta == '' || $lesson->meta == null) {
                $str = $lesson->title;
                $i = 0;
                $data = [];
                $output = '';
                while (strlen($str) > 0) {
                    $index = strpos($str, ' ');
                    if ($index == null) {
                        $data[$i] = $str;
                        $str = '';
                    } else {
                        $data[$i] = substr($str, 0, $index);
                        $str = substr($str, $index + 1);
                        ++$i;
                    }
                }
                $size = sizeof($data);
                if ($size > 2) {
                    if ($size == 3) {
                        $pos = 2;
                    } else if ($size >= 7) {
                        $pos = $size - 3;
                    } else {
                        $pos = $size - 2;
                    }
                    for ($i = $pos; $i < $size; ++$i) {
                        for ($j = 0; $j <= $size - $i; ++$j) {
                            for ($k = $j; $k < $j + $i; ++$k) {
                                if ($k == $j + $i - 1) {
                                    $output .= $data[$k] . ', ';
                                } else {
                                    $output .= $data[$k] . ' ';
                                }
                            }
                        }
                    }
                }

                $lesson->meta = $output;
            }
            $lesson->save();
        }

        foreach ($post_list as $post) {
            if ($post->meta == '' || $post->meta == null) {
                $str = $post->title;
                $i = 0;
                $data = [];
                $output = '';
                while (strlen($str) > 0) {
                    $index = strpos($str, ' ');
                    if ($index == null) {
                        $data[$i] = $str;
                        $str = '';
                    } else {
                        $data[$i] = substr($str, 0, $index);
                        $str = substr($str, $index + 1);
                        ++$i;
                    }
                }
                $size = sizeof($data);
                if ($size > 2) {
                    if ($size == 3) {
                        $pos = 2;
                    } else if ($size >= 7) {
                        $pos = $size - 3;
                    } else {
                        $pos = $size - 2;
                    }
                    for ($i = $pos; $i < $size; ++$i) {
                        for ($j = 0; $j <= $size - $i; ++$j) {
                            for ($k = $j; $k < $j + $i; ++$k) {
                                if ($k == $j + $i - 1) {
                                    $output .= $data[$k] . ', ';
                                } else {
                                    $output .= $data[$k] . ' ';
                                }
                            }
                        }
                    }
                }

                $post->meta = $output;
            }
            $post->save();
        }

        return 1;
    }

    public function searchKey(Request $req)
    {
        $output = '';
        $search_courses = $this->pLanguageRepository->searchCourses($req->key);
        $search_lesson = null;
        if ($search_courses->count() < 5) {
            $search_lesson = $this->lessonRepository->searchLesson($req->key, 5 - $search_courses->count());
        }
        $search_posts = $this->postRepository->searchPost($req->key);
        if ($search_courses->count() > 0) {
            $output .= '<div class="search_result_title">Khóa học</div>';
            foreach ($search_courses as $course) {
                $output .= '<a href="' . route('learn.lesson_intro', ['course' => $course->name]) . '" class="search_result_content_item">
                    <img class="search_result_img" src="' . asset($course->image) . '">
                    <p class="search_result_name"> Khóa học ' . $course->full_name . '</p>
                </a>';
            }
        }

        if ($search_lesson->count() > 0) {
            if ($output === '') {
                $output .= '<div class="search_result_title">Khóa học</div>';
            }
            foreach ($search_lesson as $lesson) {
                $output .= '<a href="' . route('learn.lesson_detail', ['course' => $lesson->course_name, 'slug' => $lesson->slug]) . '" class="search_result_content_item">
                    <img class="search_result_img" src="' . asset($lesson->image) . '">
                    <p class="search_result_name">' . $lesson->title . '</p>
                </a>';
            }
        }

        if ($search_posts->count() > 0) {
            $output .= '<div class="search_result_title">Bài viết</div>';
            $index = 0;
            foreach ($search_posts as $post) {
                ++$index;
                $output .= '<a href="' . route('post.detail', ['slug' => $post->slug]) . '" class="search_result_content_item">
                    <img class="search_result_img" src="' . asset($post->image) . '">
                    <p class="search_result_name">' . $post->title . '</p>
                </a>';
                if ($index == 5) {
                    break;
                }
            }
        }

        return response()->json($output);
    }

    public function getGameDesignPage()
    {
        $course_list = $this->pLanguageRepository->getPLanguageHome();
        return view('pages.game.design', compact('course_list'));
    }

    public function search($key)
    {
        $count = 16;
        $lessons = $this->lessonRepository->searchLesson($key, $count);
        $categories = $this->categoryRepository->getCategorySearch($key);
        $raw = 'title like "%' . $key . '%"';
        foreach ($categories as $category) {
            $raw .= ' or category like "' . $category->id . '-%"' .  ' or category like "%-' . $category->id . '-%"' . ' or category like "%-' . $category->id . '"';
        }
        $posts = $this->postRepository->searchPostRaw($raw, 30);

        return view('pages.search.result', compact('lessons', 'posts', 'key'));
    }
}
