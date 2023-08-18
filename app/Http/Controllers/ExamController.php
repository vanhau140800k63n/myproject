<?php

namespace App\Http\Controllers;

use App\Config\ExamConstants;
use App\Exceptions\PageException;
use App\Repositories\ChallengeAnswerRepositoryInterface;
use App\Repositories\ChallengeRepositoryInterface;
use App\Repositories\PLanguageRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ExamController extends Controller
{
    private $userRepository;
    private $pLanguageRepository;
    private $challengeRepository;
    private $challengeAnswerRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        PLanguageRepositoryInterface $pLanguageRepository,
        ChallengeRepositoryInterface $challengeRepository,
        ChallengeAnswerRepositoryInterface $challengeAnswerRepository
    ) {
        $this->userRepository = $userRepository;
        $this->pLanguageRepository = $pLanguageRepository;
        $this->challengeRepository = $challengeRepository;
        $this->challengeAnswerRepository = $challengeAnswerRepository;
    }

    public function getExamHome()
    {
        $user = null;
        if (Auth::check()) {
            $user = Auth::user();
        }

        $exam_list_json = file_get_contents('exam_list.json');
        $exam_list = json_decode($exam_list_json, true);

        return view('pages.exam.exercise_list', compact('user', 'exam_list'));
    }

    public function getChallengeInfo(Request $req)
    {
        $message = $req->session()->get('message');
        $challenge = $this->challengeRepository->getChallengeWeek();
        $time_start = strtotime($challenge->time_start);
        $challenge_ranking = $this->challengeRepository->getChallengeRanking();
        $top_answer = $this->challengeAnswerRepository->getTopAnswer($challenge_ranking->id);

        $index = 1;
        foreach ($top_answer as $answer) {
            $user = $this->userRepository->getUserById($answer->user_id);
            $answer->index = $index++;
            $answer->user_name = ($user->first_name == null || $user->first_name == '') && ($user->last_name == null || $user->last_name == '') ? $user->email : $user->last_name . ' ' . $user->first_name;
        }

        return view('pages.exam.challenge_info', compact('challenge', 'top_answer', 'message', 'time_start'));
    }

    public function getChallengeWeek()
    {
        $challenge = $this->challengeRepository->getChallengeWeek();
        $user = Auth::user();

        $time_start = strtotime($challenge->time_start);
        $time_end = strtotime($challenge->time_start . ' +30 minutes');

        if ($time_start > time()) {
            return redirect()->back()->with('message', 'Bài Thi Chưa Bắt Đầu<br><span style="font-size: 16px; color:#ed5829; font-weight: 600">' . date('Y-m-d H:i:s', $time_start) . '</span>');
        }

        $check_answer_exist = $this->challengeAnswerRepository->getAnswer($user->id, $challenge->id);
        if ($check_answer_exist != null) {
            // return redirect()->route('exam.challenge_weekly')->with('message', 'Hết Lượt Làm Bài');
        } else {
            $data = [
                'user_id' => $user->id,
                'challenge_id' => $challenge->id
            ];

            $answer = $this->challengeAnswerRepository->createAnswer($data);
        }

        // if (time() > $time_end) {
        //     return redirect()->back()->with('message', 'Quá Thời Gian Làm Bài');
        // }

        $html = Str::markdown(file_get_contents('test.md'));

        return view('pages.exam.contest_detail', compact('challenge', 'html'));
    }

    public function runTestCase(Request $req)
    {
        $lang = $req->lang;
        $practice = $req->practice;
        $code = $req->code;

        $json = file_get_contents('exam_list/' . $lang . '/exercises/practice/' . $practice . '/test.json');
        $test_case = json_decode($json, true);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => ExamConstants::SUBMIT_URL . 'compile/' . $lang . '/index.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query([
                'code' => $code,
                'test_case' => $test_case,
                'practice' => $practice,
                'user_id' => Auth::id()
            ]),
            CURLOPT_HTTPHEADER => array(
                'ngrok-skip-browser-warning' => '1231'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;

        $res_test_case = [];

        if ($response != 'error') {
            $res = explode('|', $response);
            $res_test_case = explode(',', $res[0]);
        }

        $output = '';
        for ($i = 0; $i < count($res_test_case); ++$i) {
            if ($res_test_case[$i] == 1) {
                $output .= '<div class="test_case_item pass">Test Case ' . ($i + 1) . ' <i class="fa-solid fa-circle-check"></i></div>';
            } else {
                $output .= '<div class="test_case_item error">Test Case ' . ($i + 1) . ' <i class="fa-solid fa-circle-xmark"></i></div>';
            }
        }

        return response()->json($output);
    }

    public function submitCode(Request $req)
    {
        $challenge = $this->challengeRepository->getChallengeWeek();
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => ExamConstants::SUBMIT_URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query([
                'code' => $req->code,
                'test_case' => $challenge->test_case,
                'test_case_result' => $challenge->test_case_result,
                'challenge_id' => $challenge->id,
                'user_id' => Auth::id()
            ]),
            CURLOPT_HTTPHEADER => array(),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $exec_time = 0;
        $res_test_case = [];
        if ($response != 'error') {
            $res = explode('|', $response);
            $res_test_case = explode(',', $res[0]);
            $exec_time = $res[1];
        }

        $answer = $this->challengeAnswerRepository->getAnswer(Auth::id(), $challenge->id);
        $correct_test_case_num = 0;
        $test_case_score = explode('|', $challenge->test_case_score);
        $score = 0;

        for ($i = 0; $i < count($res_test_case); ++$i) {
            if ($res_test_case[$i] == 1) {
                ++$correct_test_case_num;
                $score += $test_case_score[$i];
            }
        }

        $data = [
            'code' => $req->code,
            'time' => $req->time,
            'correct_test_case_num' => $correct_test_case_num,
            'score' => $score,
            'exec_time' => $exec_time
        ];

        $update_answer = $this->challengeAnswerRepository->updateAnswer($answer->id, $data);
        return redirect()->route('exam.challenge_weekly')->with('message', 'Bạn Đã Hoàn Thành<br>' . '<span style="font-size: 16px; color:#ed5829; font-weight: 500">' . 'Kết quả: ' . $score . ' Điểm</span>');
    }

    public function updateExamList()
    {
        $directory = 'exam_list/';
        $files = array_diff(scandir($directory), array('..', '.'));
        $json = file_get_contents('exam_list.json');
        $json_data = json_decode($json, true);

        foreach ($files as $file) {
            $concepts = array_diff(scandir($directory . $file . "/concepts/"), array('..', '.'));
            $practices = array_diff(scandir($directory . $file . "/exercises/practice/"), array('..', '.'));
            if (file_exists($directory . $file . "/exercises/concept/")) {
                $practices = array_merge($practices, array_diff(scandir($directory . $file . "/exercises/concept/"), array('..', '.')));
            }
            $json_data[$file]['concepts_num'] = count($concepts);
            $json_data[$file]['practices_num'] = count($practices);
            if (!isset($json_data[$file]['image'])) {
                $json_data[$file]['image'] = '';
            }
            if (!isset($json_data[$file]['name'])) {
                $json_data[$file]['name'] = $file;
            }
            if (!isset($json_data[$file]['language'])) {
                $json_data[$file]['language'] = $file;
            }
            if (!isset($json_data[$file]['type'])) {
                $json_data[$file]['type'] = $file;
            }
            if (!isset($json_data[$file]['path_to_exercise'])) {
                $json_data[$file]['path_to_exercise'] = '';
            }

            // $json_data[$file]['concepts'] = $concepts;
            $json_data[$file]['concepts'] = [];
            // $json_data[$file]['practices'] = [];
            foreach ($practices as $practice) {
                if (!isset($json_data[$file]['practices'][$practice]['path'])) {
                    if ($file == 'c') {
                        $json_data[$file]['practices'][$practice]['path'] = '/' . str_replace('-', '_', $practice)  . '.c';
                    } else if ($file == 'java') {
                        $json_data[$file]['practices'][$practice]['path'] = '/src/main/java/' . str_replace('-', '_', $practice) . '.java';
                    } else if ($file == 'cpp') {
                        $json_data[$file]['practices'][$practice]['path'] = '/' . str_replace('-', '_', $practice) . '.cpp';
                    } else if ($file == 'python') {
                        $json_data[$file]['practices'][$practice]['path'] = '/' . str_replace('-', '_', $practice) . '.py';
                    } else if ($file == 'php') {
                        $json_data[$file]['practices'][$practice]['path'] = '/' . str_replace('-', '_', $practice) . '.php';
                    } else if ($file == 'javascript') {
                        $json_data[$file]['practices'][$practice]['path'] = '/' . str_replace('-', '_', $practice) . '.js';
                    }
                }
                if (!isset($json_data[$file]['practices'][$practice]['rank'])) {
                    $json_data[$file]['practices'][$practice]['rank'] = 99;
                }
                if (!isset($json_data[$file]['practices'][$practice]['difficulty'])) {
                    $json_data[$file]['practices'][$practice]['difficulty'] = 'easy';
                }
                if (!isset($json_data[$file]['practices'][$practice]['description'])) {
                    $json_data[$file]['practices'][$practice]['description'] = '';
                }
                if (!isset($json_data[$file]['practices'][$practice]['image'])) {
                    $json_data[$file]['practices'][$practice]['image'] = '';
                }
                if (!isset($json_data[$file]['practices'][$practice]['name'])) {
                    $json_data[$file]['practices'][$practice]['name'] = '';
                }
                if (!isset($json_data[$file]['practices'][$practice]['status'])) {
                    $json_data[$file]['practices'][$practice]['status'] = 0;
                }
            }
        }

        $myfile = fopen("exam_list.json", "w") or die("Unable to open file!");
        fwrite($myfile, json_encode($json_data, JSON_PRETTY_PRINT));
        fclose($myfile);
    }

    public function getExerciseInfo($language)
    {
        $directory = 'exam_list/';
        $json = file_get_contents('exam_list.json');
        $exercise = json_decode($json, true)[$language];

        uasort($exercise['practices'], function ($a, $b) {
            return $a['rank'] > $b['rank'];
        });

        return view('pages.exam.exercise', compact('exercise'));
    }

    public function getPracticeDetail($language, $practice)
    {
        $directory = 'exam_list/';
        $json = file_get_contents('exam_list.json');
        $exercise = json_decode($json, true)[$language];
        $path = 'concept';
        if (file_exists($directory . $language . '/exercises/practice/' . $practice . $exercise['practices'][$practice]['path'])) {
            $path = 'practice';
        }
        $practice_code = file_get_contents($directory . $language . '/exercises/' . $path . '/' . $practice . $exercise['practices'][$practice]['path']);
        $is_translate = false;
        $practice_html['en'] = Str::markdown(file_get_contents($directory . $language . '/exercises/' . $path . '/' . $practice . '/.docs/instructions.md'));
        if (file_exists($directory . $language . '/exercises/' . $path . '/' . $practice . '/.docs/instructions_tran.html')) {
            $is_translate = true;
            $practice_html['vi'] = Str::markdown(file_get_contents($directory . $language . '/exercises/' . $path . '/' . $practice . '/.docs/instructions_tran.html'));
        }


        return view('pages.exam.practice_detail', compact('exercise', 'practice_code', 'practice_html', 'practice', 'is_translate'));
    }
}
