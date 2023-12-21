<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ChallengeRepositoryInterface;
use App\Repositories\LessonRepositoryInterface;
use App\Repositories\PLanguageRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Config\ExamConstants;
use Illuminate\Support\Facades\Auth;
use App\Repositories\SolutionRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $userRepository;
    private $pLanguageRepository;
    private $postRepository;
    private $lessonRepository;
    private $categoryRepository;
    private $challengeRepository;
    private $solutionRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        PLanguageRepositoryInterface $pLanguageRepository,
        PostRepositoryInterface $postRepository,
        LessonRepositoryInterface $lessonRepository,
        CategoryRepositoryInterface $categoryRepository,
        ChallengeRepositoryInterface $challengeRepository,
        SolutionRepositoryInterface $solutionRepository
    ) {
        $this->userRepository = $userRepository;
        $this->pLanguageRepository = $pLanguageRepository;
        $this->postRepository = $postRepository;
        $this->lessonRepository = $lessonRepository;
        $this->categoryRepository = $categoryRepository;
        $this->challengeRepository = $challengeRepository;
        $this->solutionRepository = $solutionRepository;
    }

    public function getHomePage()
    {
        $pLanguages = $this->pLanguageRepository->getPLanguageHome();
        $post_list = $this->postRepository->getPostHome();
        return view('pages.home.home')->with(['p_languages' => $pLanguages, 'post_list' => $post_list]);
    }

    public function test()
    {
        $json = file_get_contents('vote.json');
        $json_data = json_decode($json, true);
        // arsort($json_data);
        $check = Auth::check() && intval(Auth::user()->role) === 1;
        if ($check == true) {
            arsort($json_data);
        }
        return view('test', compact('json_data', 'check'));
        // $json = file_get_contents('exam_list.json');

        // // Decode the JSON file
        // $json_data = json_decode($json,true);
        // $html = Str::markdown(file_get_contents(asset('te.md')));
        // dd($html);
        // $data = file_get_contents('https://stackoverflow.com/questions/11227809/why-is-processing-a-sorted-array-faster-than-processing-an-unsorted-array');
        // dd($data);
    }

    public function update_test(Request $req)
    {
        $file = 'vote.json';
        $json = file_get_contents($file);
        $json_data = json_decode($json, true);
        $json_data[$req->key] = (int)$json_data[$req->key] + 1;
        file_put_contents($file, json_encode($json_data));
        return true;
    }

    public function postChangeTitle()
    {
        // $posts = $this->postRepository->getPostChangeTitle();
        // foreach ($posts as $post) {
        //     if ($post->title_update != null && $post->title_update != "") {
        //         $title = substr($post->title_update, strpos($post->title_update, '. ') + 2);
        //         $data['title'] = $title;
        //         $data['slug'] = $this->makeSlug($title) . '-' . $post->id;
        //         $data['id'] = $post->id;
        //         $update = $this->postRepository->updatePost($data);
        //     }
        // }
    }

    public function createSiteMap()
    {
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
        $search_posts = $this->postRepository->searchPost($req->key, 3);
        $search_solutions = $this->solutionRepository->searchKey($req->key, 3);

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
            foreach ($search_posts as $post) {
                $output .= '<a href="' . route('post.detail', ['slug' => $post->slug]) . '" class="search_result_content_item">
                    <img class="search_result_img" src="' . asset($post->image) . '">
                    <p class="search_result_name">' . $post->title . '</p>
                </a>';
            }
        }

        $search_solution_imgs = [
            'https://devsne.vn/image/icon/3iQLpVvsZ9.png',
            'https://devsne.vn/image/icon/5xCj6vqB9F.png',
            'https://devsne.vn/image/icon/BIUXGfbnpj.png'
        ];

        if ($search_solutions->count() > 0) {
            $output .= '<div class="search_result_title">Thảo luận</div>';
            foreach ($search_solutions as $index => $solution) {
                $output .= '<a href="' . route('solution.detail', ['id' => $solution->id, 'slug' => $solution->slug]) . '" class="search_result_content_item">
                    <img class="search_result_img" src="' . $search_solution_imgs[$index] . '">
                    <p class="search_result_name">' . $solution->title . '</p>
                </a>';
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

    // public function test(Request $req)
    // {
    //     return view('test');
    //     $curl = curl_init();

    //     $date = date_create("6/19/2023");

    //     for ($i = 1; $i < 35; ++$i) {
    //         date_add($date, date_interval_create_from_date_string("1 days"));
    //         $crr_date =  date_format($date, "m/d/Y");

    //         $curl = curl_init();

    //         curl_setopt_array($curl, array(
    //             CURLOPT_URL => 'https://www.mockaroo.com/rest/schemas/download?preview=true',
    //             CURLOPT_RETURNTRANSFER => true,
    //             CURLOPT_ENCODING => '',
    //             CURLOPT_MAXREDIRS => 10,
    //             CURLOPT_TIMEOUT => 0,
    //             CURLOPT_FOLLOWLOCATION => true,
    //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //             CURLOPT_CUSTOMREQUEST => 'POST',
    //             CURLOPT_POSTFIELDS => '{"schema":{"project_id":43251,"id":542415,"user_id":241268,"name":"MQ0000015","stamp":"248fc940","description":null,"num_rows":1,"file_format":"json","table_name":"MOCK_DATA","created_at":"2023-07-03T10:06:03.691Z","updated_at":"2023-07-04T02:51:13.865Z","include_header":true,"include_create_sql":false,"array":false,"delimiter":",","append_dataset_id":null,"xml_root_element":"dataset","xml_record_element":"record","line_ending":"unix","include_nulls":true,"bom":false,"quote_char":"\\"","force_quotes":false,"project":{"id":43251,"name":"Daikoku Mock","owner_id":241268,"created_at":"2023-06-20T06:07:32.348Z","updated_at":"2023-07-13T07:57:01.792Z"},"dataset":null,"columns_attributes":[{"id":6777561,"schema_id":542415,"position":0,"name":"kado_info_list","min":1,"max":100,"decimal_places":0,"values":"","min_date":"07/03/2022","max_date":"07/03/2023","date_format":"%-m/%-d/%Y","min_words":10,"max_words":20,"min_paragraphs":1,"max_paragraphs":3,"min_sentences":1,"max_sentences":10,"time_format":"%-l:%M %p","expression":"","list_id":null,"include_protocol":true,"include_host":true,"include_path":true,"include_query_string":true,"style":"A-","min_time":"12:00 AM","max_time":"11:59 PM","data_type_id":183,"regex":null,"min_money":0,"max_money":10,"money_symbol":"$","formula":"","null_percentage":0,"normal_dist_mean":"0","normal_dist_sd":"1","normal_dist_decimals":2,"sequence_start":1,"sequence_step":1,"sequence_repeat":1,"min_items":100,"max_items":100,"list_selection_style":"random","only_us_places":false,"file_name_format":"camel-caps","file_type":"common","scenario_id":null,"list_column":null,"sql_expression":"","sequence_restart":null,"countries":"","list_weights":null,"advanced_formula":null,"image_width_min":100,"image_width_max":250,"image_height_min":100,"image_height_max":null,"image_format":"png","avatar_height":50,"avatar_width":50,"dist_lambda":"1","dist_probability":"0.5","states":"","phone_format":"###-###-####","character_sequence_format":"","credit_card_types":null,"credit_card_countries":null,"password_min_length":8,"password_min_lower":1,"password_min_upper":1,"password_min_numbers":1,"password_min_symbols":1},{"id":6777562,"schema_id":542415,"position":1,"name":"kado_info_list.ymd","min":1,"max":100,"decimal_places":0,"values":"","min_date":"' . $crr_date . '","max_date":"' . $crr_date . '","date_format":"%Y-%m-%d","min_words":10,"max_words":20,"min_paragraphs":1,"max_paragraphs":3,"min_sentences":1,"max_sentences":10,"time_format":"%-l:%M %p","expression":"","list_id":null,"include_protocol":true,"include_host":true,"include_path":true,"include_query_string":true,"style":"A-","min_time":"12:00 AM","max_time":"11:59 PM","data_type_id":131,"regex":null,"min_money":0,"max_money":10,"money_symbol":"$","formula":"","null_percentage":0,"normal_dist_mean":"0","normal_dist_sd":"1","normal_dist_decimals":2,"sequence_start":1,"sequence_step":1,"sequence_repeat":1,"min_items":1,"max_items":1,"list_selection_style":"random","only_us_places":false,"file_name_format":"camel-caps","file_type":"common","scenario_id":null,"list_column":null,"sql_expression":"","sequence_restart":null,"countries":"","list_weights":null,"advanced_formula":null,"image_width_min":100,"image_width_max":250,"image_height_min":100,"image_height_max":null,"image_format":"png","avatar_height":50,"avatar_width":50,"dist_lambda":"1","dist_probability":"0.5","states":"","phone_format":"###-###-####","character_sequence_format":"","credit_card_types":null,"credit_card_countries":null,"password_min_length":8,"password_min_lower":1,"password_min_upper":1,"password_min_numbers":1,"password_min_symbols":1},{"id":6777563,"schema_id":542415,"position":2,"name":"kado_info_list.phmemb_cd","min":1,"max":100,"decimal_places":0,"values":"","min_date":"07/03/2022","max_date":"07/03/2023","date_format":"%-m/%-d/%Y","min_words":10,"max_words":20,"min_paragraphs":1,"max_paragraphs":3,"min_sentences":1,"max_sentences":10,"time_format":"%-l:%M %p","expression":"","list_id":272383,"include_protocol":true,"include_host":true,"include_path":true,"include_query_string":true,"style":"A-","min_time":"12:00 AM","max_time":"11:59 PM","data_type_id":138,"regex":null,"min_money":0,"max_money":10,"money_symbol":"$","formula":"","null_percentage":0,"normal_dist_mean":"0","normal_dist_sd":"1","normal_dist_decimals":2,"sequence_start":1,"sequence_step":1,"sequence_repeat":1,"min_items":0,"max_items":5,"list_selection_style":"sequential","only_us_places":false,"file_name_format":"camel-caps","file_type":"common","scenario_id":null,"list_column":"phmemb_cd","sql_expression":"","sequence_restart":null,"countries":"","list_weights":"[{\\"rule\\":\\"\\",\\"frequencies\\":{\\"23999122\\":\\"1\\",\\"23999570\\":\\"1\\",\\"23999761\\":\\"1\\",\\"user1001\\":\\"1\\",\\"user1005\\":\\"1\\",\\"user1006\\":\\"1\\",\\"user1007\\":\\"1\\",\\"user1008\\":\\"1\\",\\"user1009\\":\\"1\\",\\"user1010\\":\\"1\\",\\"user1011\\":\\"1\\",\\"user1012\\":\\"1\\",\\"user1013\\":\\"1\\",\\"user1014\\":\\"1\\",\\"user1015\\":\\"1\\",\\"user1016\\":\\"1\\",\\"user1017\\":\\"1\\",\\"user1018\\":\\"1\\",\\"user1019\\":\\"1\\",\\"user1020\\":\\"1\\",\\"user1021\\":\\"1\\",\\"user1022\\":\\"1\\",\\"user1023\\":\\"1\\",\\"user1024\\":\\"1\\",\\"user1025\\":\\"1\\",\\"user1026\\":\\"1\\",\\"user1027\\":\\"1\\",\\"user1028\\":\\"1\\",\\"user1029\\":\\"1\\",\\"user1030\\":\\"1\\",\\"user1031\\":\\"1\\",\\"user1032\\":\\"1\\",\\"user1033\\":\\"1\\",\\"user1034\\":\\"1\\",\\"user1035\\":\\"1\\",\\"user1036\\":\\"1\\",\\"user1037\\":\\"1\\",\\"user1038\\":\\"1\\",\\"user1039\\":\\"1\\",\\"user1040\\":\\"1\\",\\"user1041\\":\\"1\\",\\"user1042\\":\\"1\\",\\"user1043\\":\\"1\\",\\"user1044\\":\\"1\\",\\"user1045\\":\\"1\\",\\"user1046\\":\\"1\\",\\"user1047\\":\\"1\\",\\"user1048\\":\\"1\\",\\"user1049\\":\\"1\\",\\"user1050\\":\\"1\\",\\"user1051\\":\\"1\\",\\"user1052\\":\\"1\\",\\"user1053\\":\\"1\\",\\"user1054\\":\\"1\\",\\"user1055\\":\\"1\\",\\"user1056\\":\\"1\\",\\"user1057\\":\\"1\\",\\"user1058\\":\\"1\\",\\"user1059\\":\\"1\\",\\"user1060\\":\\"1\\",\\"user1061\\":\\"1\\",\\"user1062\\":\\"1\\",\\"user1063\\":\\"1\\",\\"user1064\\":\\"1\\",\\"user1065\\":\\"1\\",\\"user1066\\":\\"1\\",\\"user1067\\":\\"1\\",\\"user1068\\":\\"1\\",\\"user1069\\":\\"1\\",\\"user1070\\":\\"1\\",\\"user1071\\":\\"1\\",\\"user1072\\":\\"1\\",\\"user1073\\":\\"1\\",\\"user1074\\":\\"1\\",\\"user1075\\":\\"1\\",\\"user1076\\":\\"1\\",\\"user1077\\":\\"1\\",\\"user1078\\":\\"1\\",\\"user1079\\":\\"1\\",\\"user1080\\":\\"1\\",\\"user1081\\":\\"1\\",\\"user1082\\":\\"1\\",\\"user1083\\":\\"1\\",\\"user1084\\":\\"1\\",\\"user1085\\":\\"1\\",\\"user1086\\":\\"1\\",\\"user1087\\":\\"1\\",\\"user1088\\":\\"1\\",\\"user1089\\":\\"1\\",\\"user1090\\":\\"1\\",\\"user1091\\":\\"1\\",\\"user1092\\":\\"1\\",\\"user1093\\":\\"1\\",\\"user1094\\":\\"1\\",\\"user1095\\":\\"1\\",\\"user1096\\":\\"1\\",\\"user1097\\":\\"1\\",\\"user1098\\":\\"1\\",\\"user1099\\":\\"1\\",\\"user1100\\":\\"1\\"}}]","advanced_formula":"","image_width_min":100,"image_width_max":250,"image_height_min":100,"image_height_max":null,"image_format":"png","avatar_height":50,"avatar_width":50,"dist_lambda":"1","dist_probability":"0.5","states":"","phone_format":"###-###-####","character_sequence_format":"","credit_card_types":null,"credit_card_countries":null,"password_min_length":8,"password_min_lower":1,"password_min_upper":1,"password_min_numbers":1,"password_min_symbols":1},{"id":6777564,"schema_id":542415,"position":3,"name":"kado_info_list.daisu","min":1,"max":100,"decimal_places":0,"values":"","min_date":"07/03/2022","max_date":"07/03/2023","date_format":"%-m/%-d/%Y","min_words":10,"max_words":20,"min_paragraphs":1,"max_paragraphs":3,"min_sentences":1,"max_sentences":10,"time_format":"%-l:%M %p","expression":"","list_id":null,"include_protocol":true,"include_host":true,"include_path":true,"include_query_string":true,"style":"A-","min_time":"12:00 AM","max_time":"11:59 PM","data_type_id":128,"regex":null,"min_money":0,"max_money":10,"money_symbol":"$","formula":"random(20,50)","null_percentage":0,"normal_dist_mean":"0","normal_dist_sd":"1","normal_dist_decimals":2,"sequence_start":1,"sequence_step":1,"sequence_repeat":1,"min_items":0,"max_items":5,"list_selection_style":"random","only_us_places":false,"file_name_format":"camel-caps","file_type":"common","scenario_id":null,"list_column":null,"sql_expression":"","sequence_restart":null,"countries":"","list_weights":null,"advanced_formula":"\\"user\\" + (\\"%04d\\" % this) ","image_width_min":100,"image_width_max":250,"image_height_min":100,"image_height_max":null,"image_format":"png","avatar_height":50,"avatar_width":50,"dist_lambda":"1","dist_probability":"0.5","states":"","phone_format":"###-###-####","character_sequence_format":"","credit_card_types":null,"credit_card_countries":null,"password_min_length":8,"password_min_lower":1,"password_min_upper":1,"password_min_numbers":1,"password_min_symbols":1},{"id":6777565,"schema_id":542415,"position":4,"name":"kado_info_list.cust_su","min":1,"max":100,"decimal_places":0,"values":"","min_date":"07/03/2022","max_date":"07/03/2023","date_format":"%-m/%-d/%Y","min_words":10,"max_words":20,"min_paragraphs":1,"max_paragraphs":3,"min_sentences":1,"max_sentences":10,"time_format":"%-l:%M %p","expression":"","list_id":null,"include_protocol":true,"include_host":true,"include_path":true,"include_query_string":true,"style":"A-","min_time":"12:00 AM","max_time":"11:59 PM","data_type_id":128,"regex":null,"min_money":0,"max_money":10,"money_symbol":"$","formula":"random(20,100)","null_percentage":0,"normal_dist_mean":"0","normal_dist_sd":"1","normal_dist_decimals":2,"sequence_start":1,"sequence_step":1,"sequence_repeat":1,"min_items":0,"max_items":5,"list_selection_style":"random","only_us_places":false,"file_name_format":"camel-caps","file_type":"common","scenario_id":null,"list_column":null,"sql_expression":"","sequence_restart":null,"countries":"","list_weights":null,"advanced_formula":null,"image_width_min":100,"image_width_max":250,"image_height_min":100,"image_height_max":null,"image_format":"png","avatar_height":50,"avatar_width":50,"dist_lambda":"1","dist_probability":"0.5","states":"","phone_format":"###-###-####","character_sequence_format":"","credit_card_types":null,"credit_card_countries":null,"password_min_length":8,"password_min_lower":1,"password_min_upper":1,"password_min_numbers":1,"password_min_symbols":1},{"id":6777566,"schema_id":542415,"position":5,"name":"kado_info_list.kado_ritsu","min":1,"max":100,"decimal_places":0,"values":"","min_date":"07/03/2022","max_date":"07/03/2023","date_format":"%-m/%-d/%Y","min_words":10,"max_words":20,"min_paragraphs":1,"max_paragraphs":3,"min_sentences":1,"max_sentences":10,"time_format":"%-l:%M %p","expression":"","list_id":null,"include_protocol":true,"include_host":true,"include_path":true,"include_query_string":true,"style":"A-","min_time":"12:00 AM","max_time":"11:59 PM","data_type_id":128,"regex":null,"min_money":0,"max_money":10,"money_symbol":"$","formula":"round(random(10.1,50.1),1)","null_percentage":0,"normal_dist_mean":"0","normal_dist_sd":"1","normal_dist_decimals":2,"sequence_start":1,"sequence_step":1,"sequence_repeat":1,"min_items":0,"max_items":5,"list_selection_style":"random","only_us_places":false,"file_name_format":"camel-caps","file_type":"common","scenario_id":null,"list_column":null,"sql_expression":"","sequence_restart":null,"countries":"","list_weights":null,"advanced_formula":null,"image_width_min":100,"image_width_max":250,"image_height_min":100,"image_height_max":null,"image_format":"png","avatar_height":50,"avatar_width":50,"dist_lambda":"1","dist_probability":"0.5","states":"","phone_format":"###-###-####","character_sequence_format":"","credit_card_types":null,"credit_card_countries":null,"password_min_length":8,"password_min_lower":1,"password_min_upper":1,"password_min_numbers":1,"password_min_symbols":1},{"id":6777572,"schema_id":542415,"position":6,"name":"kado_info_list.senyu_ritsu","min":1,"max":100,"decimal_places":0,"values":"","min_date":"07/03/2022","max_date":"07/03/2023","date_format":"%-m/%-d/%Y","min_words":10,"max_words":20,"min_paragraphs":1,"max_paragraphs":3,"min_sentences":1,"max_sentences":10,"time_format":"%-l:%M %p","expression":"","list_id":null,"include_protocol":true,"include_host":true,"include_path":true,"include_query_string":true,"style":"A-","min_time":"12:00 AM","max_time":"11:59 PM","data_type_id":128,"regex":null,"min_money":0,"max_money":10,"money_symbol":"$","formula":"round(random(10.1,50.1),1)","null_percentage":0,"normal_dist_mean":"0","normal_dist_sd":"1","normal_dist_decimals":2,"sequence_start":1,"sequence_step":1,"sequence_repeat":1,"min_items":0,"max_items":5,"list_selection_style":"random","only_us_places":false,"file_name_format":"camel-caps","file_type":"common","scenario_id":null,"list_column":null,"sql_expression":"","sequence_restart":null,"countries":"","list_weights":null,"advanced_formula":null,"image_width_min":100,"image_width_max":250,"image_height_min":100,"image_height_max":null,"image_format":"png","avatar_height":50,"avatar_width":50,"dist_lambda":"1","dist_probability":"0.5","states":"","phone_format":"###-###-####","character_sequence_format":"","credit_card_types":null,"credit_card_countries":null,"password_min_length":8,"password_min_lower":1,"password_min_upper":1,"password_min_numbers":1,"password_min_symbols":1},{"id":6777573,"schema_id":542415,"position":7,"name":"kado_info_list.shiji_ritsu","min":1,"max":100,"decimal_places":0,"values":"","min_date":"07/03/2022","max_date":"07/03/2023","date_format":"%-m/%-d/%Y","min_words":10,"max_words":20,"min_paragraphs":1,"max_paragraphs":3,"min_sentences":1,"max_sentences":10,"time_format":"%-l:%M %p","expression":"","list_id":null,"include_protocol":true,"include_host":true,"include_path":true,"include_query_string":true,"style":"A-","min_time":"12:00 AM","max_time":"11:59 PM","data_type_id":128,"regex":null,"min_money":0,"max_money":10,"money_symbol":"$","formula":"round(random(10.1,60.1),1)","null_percentage":0,"normal_dist_mean":"0","normal_dist_sd":"1","normal_dist_decimals":2,"sequence_start":1,"sequence_step":1,"sequence_repeat":1,"min_items":0,"max_items":5,"list_selection_style":"random","only_us_places":false,"file_name_format":"camel-caps","file_type":"common","scenario_id":null,"list_column":null,"sql_expression":"","sequence_restart":null,"countries":"","list_weights":null,"advanced_formula":null,"image_width_min":100,"image_width_max":250,"image_height_min":100,"image_height_max":null,"image_format":"png","avatar_height":50,"avatar_width":50,"dist_lambda":"1","dist_probability":"0.5","states":"","phone_format":"###-###-####","character_sequence_format":"","credit_card_types":null,"credit_card_countries":null,"password_min_length":8,"password_min_lower":1,"password_min_upper":1,"password_min_numbers":1,"password_min_symbols":1}]}}',
    //             CURLOPT_HTTPHEADER => array(
    //                 'authority: www.mockaroo.com',
    //                 'accept: */*',
    //                 'accept-language: en-US,en;q=0.9,vi;q=0.8,ja;q=0.7',
    //                 'content-type: application/json',
    //                 'cookie: _ga=GA1.2.1865922164.1688971348; _gid=GA1.2.999744992.1689224014; remember_user_token=eyJfcmFpbHMiOnsibWVzc2FnZSI6Ilcxc3lORGN4TVRsZExDSWtNbUVrTVRBa04wcFhNRmQ1YkZwblpFZHhOSEU1VUVWcmVYRXdaU0lzSWpFMk9Ea3lNelEzTXpndU16WTNOakV5T0RNNE55SmQiLCJleHAiOiIyMDMzLTA3LTEzVDA3OjUyOjE4LjM2N1oiLCJwdXIiOm51bGx9fQ%3D%3D--bfab172798cee46a917c156933a4e377ec29155b; session_v2=bfc83fa9ccc2038cc38a59c8d89093dc; _ga_THRTP1Y86Q=GS1.2.1689238409.5.0.1689238409.0.0.0',
    //                 'origin: https://www.mockaroo.com',
    //                 'referer: https://www.mockaroo.com/schemas/542415',
    //                 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
    //                 'sec-ch-ua-mobile: ?1',
    //                 'sec-ch-ua-platform: "Android"',
    //                 'sec-fetch-dest: empty',
    //                 'sec-fetch-mode: cors',
    //                 'sec-fetch-site: same-origin',
    //                 'user-agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36'
    //             ),
    //         ));

    //         $response = curl_exec($curl);

    //         curl_close($curl);

    //         $myfile = fopen(date_format($date, "Ymd") . ".json", "w") or die("Unable to open file!");

    //         $response = '{
    //             "status": "success",
    //             "header": {
    //               "reqid": "string",
    //               "resid": "string",
    //               "stime": "20230703121212",
    //               "etime": "20230703121212"
    //             },
    //             "body": {
    //               "data": {
    //                 "code": "",
    //                 "summary": "",
    //                 "detail": "",
    //                 "result_cd": "OK",
    //                 "err": [
    //                 ],
    //                 "kado_info_list":' . substr($response, strpos($response, '['),  strpos($response, ']')  - strpos($response, '[') + 1) . ' }
    //             }
    //           }';

    //         fwrite($myfile, json_encode(json_decode($response), JSON_PRETTY_PRINT));
    //         fclose($myfile);
    //     }

    //     // dd($this->saveIconImage('https://cdn-icons-png.flaticon.com/128/711/711284.png', 'test'));
    //     // $index = '<section class="search-result icons-search-result';
    //     // $content = file_get_contents('https://www.flaticon.com/search/2?word=code&order_by=4');
    //     // $content = substr($content, strpos($content, $index), strpos($content, '</section>', strpos($content, $index)) - strpos($content, $index) + 10);
    //     // $arr = [];
    //     // while (strpos($content, '<img') != false) {
    //     //     $img = substr($content, strpos($content, '<img'),  strpos($content, '>', strpos($content, '<img'))  + 1 - strpos($content, '<img'));
    //     //     $content = substr($content, 0,  strpos($content, '<img ')) . substr($content, strpos($content, '>', strpos($content, '<img ')) + 1);
    //     //     array_push($arr, $img);
    //     // }
    //     // return view('test', compact('arr'));
    // }
}
