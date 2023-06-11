<?php

namespace App\Http\Controllers;

use App\Exceptions\PageException;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ChallengeAnswerRepositoryInterface;
use App\Repositories\ChallengeRepositoryInterface;
use App\Repositories\LessonRepositoryInterface;
use App\Repositories\PLanguageRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    private $userRepository;
    private $pLanguageRepository;
    private $postRepository;
    private $lessonRepository;
    private $categoryRepository;
    private $challengeRepository;
    private $challengeAnswerRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        PLanguageRepositoryInterface $pLanguageRepository,
        PostRepositoryInterface $postRepository,
        LessonRepositoryInterface $lessonRepository,
        CategoryRepositoryInterface $categoryRepository,
        ChallengeRepositoryInterface $challengeRepository,
        ChallengeAnswerRepositoryInterface $challengeAnswerRepository
    ) {
        $this->userRepository = $userRepository;
        $this->pLanguageRepository = $pLanguageRepository;
        $this->postRepository = $postRepository;
        $this->lessonRepository = $lessonRepository;
        $this->categoryRepository = $categoryRepository;
        $this->challengeRepository = $challengeRepository;
        $this->challengeAnswerRepository = $challengeAnswerRepository;
    }

    public function getExamHome()
    {
        $user = null;

        if (Auth::check()) {
            $user = Auth::user();
        }

        return view('pages.exam.home', compact('user'));
    }

    public function getChallengeInfo(Request $req)
    {
        $message = $req->session()->get('message');
        $challenge = $this->challengeRepository->getChallengeWeek();
        // strtotime($challenge->time_start);
        $top_answer = $this->challengeAnswerRepository->getTopAnswer($challenge->id);

        $index = 1;
        foreach ($top_answer as $answer) {
            $user = $this->userRepository->getUserById($answer->user_id);
            $answer->index = $index++;
            $answer->user_name = ($user->first_name == null || $user->first_name == '') && ($user->last_name == null || $user->last_name == '') ? $user->email : $user->last_name . ' ' . $user->first_name;
        }

        return view('pages.exam.challenge_info', compact('challenge', 'top_answer', 'message'));
    }

    public function getChallengeWeek()
    {
        $challenge = $this->challengeRepository->getChallengeWeek();
        $user = Auth::user();

        $check_answer_exist = $this->challengeAnswerRepository->getAnswer($user->id, $challenge->id);
        if ($check_answer_exist != null) {
            return redirect()->route('exam.challenge_weekly')->with('message', 'Hết Lượt Làm Bài');
        }

        $data = [
            'user_id' => $user->id,
            'challenge_id' => $challenge->id
        ];

        $answer = $this->challengeAnswerRepository->createAnswer($data);

        return view('pages.exam.contest_detail', compact('challenge'));
    }

    public function runTestCase(Request $req)
    {
        $challenge = $this->challengeRepository->getChallengeWeek();
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://0e2f-2405-4803-fbab-1660-4833-562a-d293-591.ngrok-free.app/test/test.php',
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

        $res = explode(',', $response);

        $output = '';

        for ($i = 0; $i < count($res); ++$i) {
            if ($res[$i] == 1) {
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
            CURLOPT_URL => 'https://0e2f-2405-4803-fbab-1660-4833-562a-d293-591.ngrok-free.app/test/test.php',
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

        $res = explode(',', $response);
        $answer = $this->challengeAnswerRepository->getAnswer(Auth::id(), $challenge->id);
        $correct_test_case_num = 0;

        foreach ($res as $test_case) {
            if ($test_case == 1) {
                ++$correct_test_case_num;
            }
        }

        $data = [
            'code' => $req->code,
            'time' => $req->time,
            'correct_test_case_num' => $correct_test_case_num
        ];

        $update_answer = $this->challengeAnswerRepository->updateAnswer($answer->id, $data);
    }
}
