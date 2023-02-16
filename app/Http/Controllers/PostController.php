<?php

namespace App\Http\Controllers;

use App\Repositories\PLanguageRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $userRepository;
    private $pLanguageRepository;
    private $postRepository;

    public function __construct(UserRepositoryInterface $userRepository, PLanguageRepositoryInterface $pLanguageRepository, PostRepositoryInterface $postRepository)
    {
        $this->userRepository = $userRepository;
        $this->pLanguageRepository = $pLanguageRepository;
        $this->postRepository = $postRepository;
    }

    public function getPostListAdmin() {
        $post_list = $this->postRepository->getPostList();
        return view('admin.pages.post.list', compact('post_list'));
    }

    public function getPostDetailAdmin(Request $req) {
        
    }
}
