<?php

namespace App\Http\Controllers;

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
        // $fileContent = 'import java.util.Stack;  
        // public class Main  
        // {  
        // public static void main(String[] args)   
        // {  
        // //creating an instance of Stack class  
        // Stack<Integer> stk= new Stack<>();  
        // // checking stack is empty or not  
        // boolean result = stk.empty();  
        // System.out.println("Is the stack empty? " + result);  
        // // pushing elements into stack  
        // stk.push(78);  
        // stk.push(113);  
        // stk.push(90);  
        // stk.push(120);  
        // //prints elements of the stack  
        // System.out.println("Elements in Stack: " + stk);  
        // result = stk.empty();  
        // System.out.println("Is the stack empty? " + result);  
        // }  
        // }';
        // $fileOp = fopen('Main.java', 'w');
        // fwrite($fileOp, $fileContent);

        // $JAVA_HOME = '/Library/Java/JavaVirtualMachines/jdk1.8.0_202.jdk';
        // $PATH = "$JAVA_HOME/bin";
        // putenv("JAVA_HOME=$JAVA_HOME");
        // putenv("PATH=$PATH");
        // shell_exec("javac Main.java");
        // $cmd = "java Main stdbuf -o0 2>&1";
        // $inputlist = array();
        // $outlist = array();
        //  $descriptors = array(
        //     0 => array("pipe", "r"),
        //     1 => array("pipe", "w")
        // );

        // $output = '';
        // $process = proc_open($cmd, $descriptors, $pipes);


        $descriptorspec = array(
            0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
            1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
            2 => array("file", "/tmp/error-output.txt", "a") // stderr is a file to write to
        );

        $cwd = '/tmp';
        $env = array('some_option' => 'aeiou');

        $process = proc_open('php', $descriptorspec, $pipes, $cwd, $env);

        if (is_resource($process)) {
            // $pipes now looks like this:
            // 0 => writeable handle connected to child stdin
            // 1 => readable handle connected to child stdout
            // Any error output will be appended to /tmp/error-output.txt

            fwrite($pipes[0], '<?php print_r($_ENV); ?>');
            fclose($pipes[0]);

            echo stream_get_contents($pipes[1]);
            fclose($pipes[1]);

            // It is important that you close any pipes before calling
            // proc_close in order to avoid a deadlock
            $return_value = proc_close($process);

            echo "command returned $return_value\n";
        }



        // $posts = $this->postRepository->getPostChangeTitle();
        // foreach ($posts as $post) {
        //     if($post->title_update != null && $post->title_update != "") {
        //         $title = substr($post->title_update, strpos($post->title_update, '. ') + 2);
        //         $data['title'] = $title;
        //         $data['slug'] = $this->makeSlug($title) . '-' . $post->id;
        //         $data['id'] = $post->id;
        //         $update = $this->postRepository->updatePost($data);
        //     }
        // }

        // $posts = $this->postRepository->getPostList();
        // foreach ($posts as $post) {
        //     $post->meta = substr($post->meta, 0, -1);
        //     $post->save();
        // }

        // $lessons = $this->lessonRepository->getLessonListAll();
        // foreach ($lessons as $lesson) {
        //     $lesson->meta = substr($lesson->meta, 0, -1);
        //     $lesson->save();
        // }

        // $priority = 0.6;
        // $index = 1;
        // $posts = $this->postRepository->getPostChangeTitle();
        // foreach ($posts as $post) {
        //     if ($index % 100 == 0) $priority -= 0.01;
        //     $output =  '&lt;url&gt;<br>
        //                     &lt;loc&gt;' . route('post.detail', $post->slug) . '&lt;/loc&gt;<br>
        //                     &lt;lastmod&gt;2023-03-31T09:47:43+00:00&lt;/lastmod&gt;<br>
        //                     &lt;priority&gt;' . $priority . '&lt;/priority&gt;<br>
        //                 &lt;/url&gt;<br>';
        //     echo ($output);
        //     ++$index;
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
                        $pos = 3;
                    } else if ($size >= 7) {
                        $pos = $size - 4;
                    } else {
                        $pos = $size - 1;
                    }
                    if ($pos > 4) $pos = 4;
                    for ($i = 1; $i < $pos; ++$i) {
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
                        $pos = 3;
                    } else if ($size >= 7) {
                        $pos = $size - 4;
                    } else {
                        $pos = $size - 1;
                    }
                    if ($pos > 4) $pos = 4;
                    for ($i = 1; $i < $pos; ++$i) {
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
        if (str_contains($key, '"')) {
            $raw = "post.title like '%" . $key . "%'";
        } else {
            $raw = 'post.title like "%' . $key . '%"';
        }
        foreach ($categories as $category) {
            $raw .= ' or post.category like "' . $category->id . '-%"' .  ' or post.category like "%-' . $category->id . '-%"' . ' or post.category like "%-' . $category->id . '"';
        }
        $posts = $this->postRepository->searchPostRaw($raw, 30);

        return view('pages.search.result', compact('lessons', 'posts', 'key'));
    }
}
