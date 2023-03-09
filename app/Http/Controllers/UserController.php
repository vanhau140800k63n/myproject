<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserInfoDetail($id)
    {
        $user = $this->userRepository->getUserById($id);
        return view('pages.user.detail', compact('user'));
    }
}
