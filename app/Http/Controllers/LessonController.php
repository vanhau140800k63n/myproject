<?php

namespace App\Http\Controllers;

use App\Repositories\PLanguageRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    private $userRepository;
    private $pLanguageRepository;

    public function __construct(UserRepositoryInterface $userRepository, PLanguageRepositoryInterface $pLanguageRepository)
    {
        $this->userRepository = $userRepository;
        $this->pLanguageRepository = $pLanguageRepository;
    }
}
