<?php

namespace App\Http\Controllers;

use App\Config\AdminConstants;
use App\Exceptions\PageException;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ContentItemRepositoryInterface;
use App\Repositories\PLanguageRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    private $categoryRepository;
    private $pLanguageRepository;
    private $postRepository;
    private $contentItemRepository;
    private $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        PLanguageRepositoryInterface $pLanguageRepository,
        PostRepositoryInterface $postRepository,
        ContentItemRepositoryInterface $contentItemRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->pLanguageRepository = $pLanguageRepository;
        $this->postRepository = $postRepository;
        $this->contentItemRepository = $contentItemRepository;
        $this->userRepository = $userRepository;
    }

    public function getPostListAdmin()
    {
        $post_list = $this->postRepository->getPostList();
        return view('admin.pages.post.list', compact('post_list'));
    }

    public function addPostAdmin()
    {
        $category_list = $this->categoryRepository->getListCategory();
        $course_list = $this->pLanguageRepository->getPLanguageHome();
        return view('admin.pages.post.add', compact('course_list', 'category_list'));
    }

    public function addPostInfoAdmin(Request $req)
    {
        $data = $req->all();
        if (isset($req->type) && $req->type != null && $req->type != '') {
            $data['slug'] = $this->makeSlug($data['title']);
            $category_list = explode(',', $data['category']);
            $data['category'] = $this->categoryRepository->updateCategory($category_list);
            if (isset($req->image) && $req->image != null && $req->image != '') {
                $data['image'] = $this->saveImage($req->image, $data['slug']);
            }
            $post = $this->postRepository->addPost($data);

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
            $category_list = $this->categoryRepository->getListCategory();
            $category_title = $this->categoryRepository->getCategoryTitle(explode('-', $post->category));
            return view('admin.pages.post.detail', compact('post', 'post_detail', 'course_list', 'post_types', 'category_list', 'category_title'));
        }
        return view('admin.pages.error_admin');
    }

    public function updatepostInfoAdmin(Request $req)
    {
        $data = $req->all();
        $post = $this->postRepository->getpostAdmin($req->id);
        if ($post != null && isset($req->type) && $req->type != null && $req->type != '') {
            $data['slug'] = $this->makeSlug($data['title']) . '-' . $req->id;
            $category_list = explode(',', $data['category']);
            $data['category'] = $this->categoryRepository->updateCategory($category_list);
            if ($data['image'] != $post->image) {
                File::delete($post->image);
                $data['image'] = $this->saveImage($data['image'], $data['slug']);
            }
            $post = $this->postRepository->updatePost($data);

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

    public function getPostDetail($slug)
    {
        $post = $this->postRepository->getPostBySlug($slug);
        if ($post !== null) {
            $post->view += 1;
            $post->save();
            $post_detail = $this->contentItemRepository->getPostDetail($post->id);
            $category_titles = $this->categoryRepository->getCategoryTitle(explode('-', $post->category));
            $author = $this->userRepository->getUserById($post->created_by);
            return view('pages.post.detail', compact('post', 'post_detail', 'category_titles', 'author'));
        }

        throw new PageException();
    }

    public function delPostAdmin(Request $req)
    {
        if (isset($req->id)) {
            $del_post = $this->postRepository->delPostAdmin($req->id);
        }

        return redirect()->back();
    }
}
