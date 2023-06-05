<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepositoryInterface;
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

    public function getExamHome()
    {
        $user = null;

        if(Auth::check()) {
            $user = Auth::user();
        }

        return view('pages.exam.home', compact('user'));
    }

    public function getChallengeInfo() {
        return view('pages.exam.contest_detail');
    }
}
