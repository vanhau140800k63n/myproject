<?php

namespace App\Http\Controllers;

use App\Config\AdminConstants;
use App\Exceptions\PageException;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\ContentItemRepositoryInterface;
use App\Repositories\ContentRepositoryInterface;
use App\Repositories\PLanguageRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Throwable;

class PostController extends Controller
{
    private $categoryRepository;
    private $pLanguageRepository;
    private $postRepository;
    private $contentItemRepository;
    private $userRepository;
    private $commentReprository;
    private $contentRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        PLanguageRepositoryInterface $pLanguageRepository,
        PostRepositoryInterface $postRepository,
        ContentItemRepositoryInterface $contentItemRepository,
        CategoryRepositoryInterface $categoryRepository,
        CommentRepositoryInterface $commentReprository,
        ContentRepositoryInterface $contentRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->pLanguageRepository = $pLanguageRepository;
        $this->postRepository = $postRepository;
        $this->contentItemRepository = $contentItemRepository;
        $this->userRepository = $userRepository;
        $this->commentReprository = $commentReprository;
        $this->contentRepository = $contentRepository;
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
        $post_types = AdminConstants::POST_TYPE;
        return view('admin.pages.post.add', compact('course_list', 'category_list', 'post_types'));
    }

    public function addPostInfoAdmin(Request $req)
    {
        $data = $req->all();
        if (isset($req->type) && $req->type != null && $req->type != '') {
            $data['slug'] = $this->makeSlug($data['title']);
            $category_list = explode(',', $data['category']);
            $data['category'] = $this->categoryRepository->updateCategory($category_list);
            if (isset($req->image) && $req->image != null && $req->image != '' && $req->image != 'img/common.jpg') {
                $data['image'] = $this->saveImage($req->image, $data['slug']);
            }
            $post = $this->postRepository->addPost($data);
            $update_post = $this->postRepository->updatePost(['id' => $post->id, 'slug' => $data['slug'] . '-' . $post->id]);
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
            if ($data['image'] != $post->image && $data['image'] != 'img/common.jpg') {
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
            $posts = $this->postRepository->getPostList();
            $categories = explode('-', $post->category);
            $raw = 'title like "%' . $post->title . '%"';
            foreach ($categories as $category) {
                if ($category != '') {
                    $raw .= ' or category like "' . $category . '-%"' .  ' or category like "%-' . $category . '-%"' . ' or category like "%-' . $category . '"';
                }
            }
            $posts_related = $this->postRepository->searchPostRaw($raw, 10);
            $comments = $this->commentReprository->getPostComments($post->id);
            return view('pages.post.detail', compact('post', 'post_detail', 'category_titles', 'author', 'posts', 'comments', 'posts_related'));
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

    public function duplicatePost($id)
    {
        $post = $this->postRepository->getPostAdmin($id);

        if ($post != null) {
            $dataPost = [
                'title' => $post->title,
                'type' => $post->type,
                'image' => $post->image,
                'slug' => $post->slug,
                'view' => $post->view,
                'category' => $post->category
            ];
            $new_post = $this->postRepository->addPost($dataPost);

            $post_detail = $this->contentItemRepository->getPostDetail($post->id);
            foreach ($post_detail as $item) {
                $dataContent = [
                    'title' => $item->title,
                    'content' => $item->content,
                    'type' => $item->type,
                    'post_id' => $new_post->id,
                    'index' => $item->index,
                    'code' => $item->p_language_id,
                    'compiler' => $item->compiler,
                ];
                $new_content = $this->contentItemRepository->addItem($dataContent);
            }
        }

        return redirect()->back();
    }

    public function addComment(Request $req)
    {
        try {
            $data = $req->all();
            $user = Auth::user();
            $image = '';

            if ($user->id == 1) {
                $user = $this->userRepository->getRandomUser();
                $data['user_id'] = $user->id;
                if ($req->image != '') {
                    $image = $req->image;
                    $this->userRepository->updateUser($user->id, ['avata' => $image]);
                }
                $rand_time = mt_rand(time() - 5184000, time());
                $data['created_at'] =  date("Y-m-d H:i:s", $rand_time);
            }
            $author_image = $image == '' ? asset($user->avata) : $image;

            $comment = $this->commentReprository->addComment($data);
            $output =   '<div class="comment_item">
                            <div class="cmt_info">
                                <img class="cmt_info_img" src="' . $author_image . '">
                                <div class="cmt_info_name"> ' . $user->last_name . ' ' . $user->first_name . ' </div>
                                <div class="cmt_info_date"> ' . $comment->created_at . ' </div>
                            </div>
                            <div class="cmt_content">' . $comment->message . '</div>
                        </div>';

            return response()->json($output);
        } catch (Throwable $ex) {
            return response()->json(false);
        }
    }

    public function getContentUrl(Request $req)
    {
        $content = file_get_contents($req->url);
        return response()->json($content);
    }

    public function autoAddUrl()
    {
        return view('admin.pages.post.auto_add_url');
    }

    public function autoAddPost()
    {
        $content = $this->contentRepository->getContentUnPublicUrl();
        if ($content == null) {
            return 'done';
        }
        $update_content = $this->contentRepository->updateContentUrl(['status' => 1], $content->id);
        return view('admin.pages.post.auto_add_post', compact('content'));
    }

    public function autoUrlToDb(Request $req)
    {
        $content = $this->contentRepository->findContentUrl($req->url);
        if ($content == null) {
            $data = [
                'content' => $req->url,
                'type' => 1,
                'status' => 0,
            ];

            $content = $this->contentRepository->createContentUrl($data);
        }

        return true;
    }

    public function autoUpdateTitlePost(Request $req)
    {
        $str = 'Tìm các tiêu đề thay thế cho các tiêu đề sau:\\n';
        $id_list = '';
        $posts = $this->postRepository->getPostChangeTitle();
        $i = 1;

        foreach ($posts as $post) {
            $str .= $i++ . '. ' . $post->title . '\\n';
            $id_list .= $post->id . '-';
            if ($i == 6) break;
        }
        $id_list = substr($id_list, 0, -1);

        return view('admin.pages.post.auto_update_title', compact('str', 'id_list'));
    }

    public function updateTitlePost(Request $req) {
        $data = explode('data', $req->result);
        $str = '';
        foreach($data as $item) {
            if(strpos($item, '","index"'))
            $str .= substr($item, strpos($item, '[{"text":"') + 10,  strpos($item, '","index"') - strpos($item, '[{"text":"') - 10);
        }

        $title_list = explode('\\n', $str);
        $id_list = explode('-', $req->id_list);

        foreach($id_list as $key => $id) {
            $data = [
                'id' => $id,
                'title_update' => $title_list[$key]
            ];
            $post_update = $this->postRepository->updatePost($data);
        }

        return redirect()->route('admin.post.auto_update_title_post');
    }
}
