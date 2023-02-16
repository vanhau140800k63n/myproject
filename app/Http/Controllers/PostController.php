<?php

namespace App\Http\Controllers;

use App\Config\AdminConstants;
use App\Repositories\ContentItemRepositoryInterface;
use App\Repositories\PLanguageRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $userRepository;
    private $pLanguageRepository;
    private $postRepository;
    private $contentItemRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        PLanguageRepositoryInterface $pLanguageRepository,
        PostRepositoryInterface $postRepository,
        ContentItemRepositoryInterface $contentItemRepository
    ) {
        $this->userRepository = $userRepository;
        $this->pLanguageRepository = $pLanguageRepository;
        $this->postRepository = $postRepository;
        $this->contentItemRepository = $contentItemRepository;
    }

    public function getPostListAdmin()
    {
        $post_list = $this->postRepository->getPostList();
        return view('admin.pages.post.list', compact('post_list'));
    }

    public function addPostAdmin()
    {
        $course_list = $this->pLanguageRepository->getPLanguageHome();
        return view('admin.pages.post.add', compact('course_list'));
    }

    public function addPostInfoAdmin(Request $req)
    {
        if (isset($req->type) && $req->type != null && $req->type != '') {
            $post = $this->postRepository->addPost($req->all());

            if ($post !== false) {
                return response()->json($post);
            }
        }

        return response()->json(false);
    }

    public function addPostItemAdmin(Request $req)
    {
        $post_item = $this->contentItemRepository->addItem($req->all());
        if ($post_item !== false) {
            return response()->json($post_item);
        }

        return response()->json(false);
    }

    public function updatePostItemAdmin(Request $req)
    {
        $post_item_update = $this->contentItemRepository->updateItem($req->all());
        if ($post_item_update !== false) {
            return response()->json($post_item_update);
        }

        return response()->json(false);
    }

    public function postDetailAdmin(Request $req)
    {
        if (isset($req->id)) {
            $post = $this->postRepository->getpostAdmin($req->id);
            $course_list = $this->pLanguageRepository->getPLanguageHome();
            $post_detail = $this->contentItemRepository->getPostDetail($req->id);
            $post_types = AdminConstants::POST_TYPE;
            return view('admin.pages.post.detail', compact('post', 'post_detail', 'course_list', 'post_types'));
        }
        return view('admin.pages.error_admin');
    }

    public function updatepostInfoAdmin(Request $req)
    {
        if (isset($req->type) && $req->type != null && $req->type != '') {
            $post = $this->postRepository->updatePost($req->all());

            if ($post !== false) {
                return response()->json($post);
            }
        }

        return response()->json(false);
    }

    public function delpostItemAdmin(Request $req)
    {
        if (isset($req->id)) {
            $del_post_item = $this->contentItemRepository->delItem($req->id);
        }

        return response()->json(true);
    }
}
