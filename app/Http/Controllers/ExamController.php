<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepositoryInterface;
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

    public function __construct(
        UserRepositoryInterface $userRepository,
        PLanguageRepositoryInterface $pLanguageRepository,
        PostRepositoryInterface $postRepository,
        LessonRepositoryInterface $lessonRepository,
        CategoryRepositoryInterface $categoryRepository,
        ChallengeRepositoryInterface $challengeRepository
    ) {
        $this->userRepository = $userRepository;
        $this->pLanguageRepository = $pLanguageRepository;
        $this->postRepository = $postRepository;
        $this->lessonRepository = $lessonRepository;
        $this->categoryRepository = $categoryRepository;
        $this->challengeRepository = $challengeRepository;
    }

    public function getExamHome()
    {
        $user = null;

        if (Auth::check()) {
            $user = Auth::user();
        }

        return view('pages.exam.home', compact('user'));
    }

    public function getChallengeInfo()
    {
        return view('pages.exam.challenge_info');
    }

    public function getChallengeWeek()
    {
        $challenge = $this->challengeRepository->getChallengeWeek();
        return view('pages.exam.contest_detail', compact('challenge'));
    }

    public function runTestCase(Request $req)
    {
        $challenge = $this->challengeRepository->getChallengeWeek();
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://eace-2405-4803-fbab-1660-397a-b23a-58ec-729f.ngrok-free.app/test/test.php',
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
                'test_case_result' => $challenge->test_case_result
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
}
