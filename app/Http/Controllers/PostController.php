<?php

namespace App\Http\Controllers;

use App\Config\AdminConstants;
use App\Config\CommonConstants;
use App\Exceptions\PageException;
use App\Repositories\ActionRepositoryInterface;
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
    private $actionRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        PLanguageRepositoryInterface $pLanguageRepository,
        PostRepositoryInterface $postRepository,
        ContentItemRepositoryInterface $contentItemRepository,
        CategoryRepositoryInterface $categoryRepository,
        CommentRepositoryInterface $commentReprository,
        ContentRepositoryInterface $contentRepository,
        ActionRepositoryInterface $actionRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->pLanguageRepository = $pLanguageRepository;
        $this->postRepository = $postRepository;
        $this->contentItemRepository = $contentItemRepository;
        $this->userRepository = $userRepository;
        $this->commentReprository = $commentReprository;
        $this->contentRepository = $contentRepository;
        $this->actionRepository = $actionRepository;
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
                $checkImage = $this->postRepository->checkImage($post->image);
                if ($post->image != 'img/common.jpg' && $checkImage) {
                    File::delete($post->image);
                }
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
        if ($post == null) {
            $slug_arr = explode('-', $slug);
            $id = $slug_arr[count($slug_arr) - 1];
            $post = $this->postRepository->getPostById(intval($id));

            if ($post != null) {
                return redirect()->route('post.detail', $post->slug);
            } else {
                $post = $this->postRepository->getPostLikeSlug($slug);
                if ($post != null) {
                    return redirect()->route('post.detail', $post->slug);
                }
            }
        }

        if ($post !== null) {
            if (!Auth::check() || Auth::user()->role != 1) {
                $post->view += 1;
                $post->save();
            }

            $post_detail = $this->contentItemRepository->getPostDetail($post->id);
            $theme = 1;
            $auto = 0;
            if ($post->type == 4) {
                $theme = 2;
            }

            if ($post_detail->count() == 1) {
                foreach ($post_detail as $item) {
                    if ($item->title == "Let's get started") {
                        $theme = 2;
                    }
                    break;
                }
            }

            foreach ($post_detail as $item) {
                if ($item->auto == 1) {
                    $auto = 1;
                    break;
                }
            }

            $category_titles = $this->categoryRepository->getCategoryTitle(explode('-', $post->category));
            $author = $this->userRepository->getUserById($post->created_by);
            // $posts = $this->postRepository->getPostList();
            $categories = explode('-', $post->category);
            if (str_contains($post->title, '"')) {
                $raw = "post.title like '%" . $post->title . "%'";
            } else {
                $raw = 'post.title like "%' . $post->title . '%"';
            }
            foreach ($categories as $category) {
                if ($category != '') {
                    $raw .= ' or post.category like "' . $category . '-%"' .  ' or post.category like "%-' . $category . '-%"' . ' or post.category like "%-' . $category . '"';
                }
            }
            $posts_related = $this->postRepository->searchPostRaw($raw, 10);
            $comments = $this->commentReprository->getPostComments($post->id);
            return view('pages.post.detail', compact('post', 'post_detail', 'category_titles', 'author', 'comments', 'posts_related', 'theme', 'auto'));
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
        if (!Auth::check()) {
            return response()->json('login');
        }

        try {
            $data = $req->all();
            $user = Auth::user();
            $image = '';

            if ($user->id == 1) {
                $user = $this->userRepository->getRandomUser();
                $data['user_id'] = $user->id;
                if ($req->image != '' && $user->avata == 'img/no_avata.jpg') {
                    $image = $req->image;
                    $this->userRepository->updateUser($user->id, ['avata' => $image]);
                }
                $rand_time = mt_rand(time() - 5184000, time());
                $data['created_at'] =  date("Y-m-d H:i:s", $rand_time);
            }
            $author_image = $image == '' ? asset($user->avata) : $image;

            $comment = $this->commentReprository->addComment($data);
            $action = $this->actionRepository->addAction([
                'title' => $user->last_name . ' ' . $user->first_name . CommonConstants::ACTION[2],
                'type' => 2,
                'user_id' => $user->id,
                'post_id' => $data['target_id']
            ]);
            $output =   '<div class="comment_item">
                            <a href="' . route('user_detail', ['id' => $user->id]) . '" class="cmt_info">
                                <img class="cmt_info_img" src="' . $author_image . '">
                                <div class="cmt_info_name"> ' . $user->last_name . ' ' . $user->first_name . ' </div>
                                <div class="cmt_info_date"> ' . $comment->created_at . ' </div>
                            </a>
                            <div class="cmt_content"> 
                                <p class="cmt_content_text">' . $comment->message . '</p>
                                <i class="fa-solid fa-ellipsis cmt_content_action"></i>
                            </div>
                            <div class="cmt_action_box">
                                <button action="edit">Sửa</button>
                                <button action="del" uid="' . $user->id . '" tid="' . $data['target_id'] . '" cid="' . $comment->id . '">Xóa</button>
                                <button action="report">Báo cáo</button>
                            </div>
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

    public function autoAddUrl(Request $req)
    {
        $page = $req->page;
        return view('admin.pages.post.auto_add_url', compact('page'));
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
        }
        $id_list = substr($id_list, 0, -1);

        return view('admin.pages.post.auto_update_title', compact('str', 'id_list'));
    }

    public function updateTitlePost(Request $req)
    {
        $data = explode('data', $req->result);
        $str = '';
        foreach ($data as $item) {
            if (strpos($item, '","index"'))
                $str .= substr($item, strpos($item, '[{"text":"') + 10,  strpos($item, '","index"') - strpos($item, '[{"text":"') - 10);
        }

        $title_list = explode('\\n', $str);
        $id_list = explode('-', $req->id_list);

        foreach ($id_list as $key => $id) {
            $data = [
                'id' => $id,
                'title_update' => $title_list[$key]
            ];
            $post_update = $this->postRepository->updatePost($data);
        }

        return response()->json(true);
    }

    public function actionPost(Request $req)
    {
        if (!Auth::check()) {
            return response()->json('login');
        }

        $data = $req->all();
        if (isset($data['type']) && isset($data['post_id'])) {
            $data['user_id'] = Auth::id();
            $check_action = null;
            if (intval($data['type']) == 3 || intval($data['type']) == 4)
                $check_action = $this->actionRepository->checkAction($data);
            if ($check_action->count() > 0) {
                $check_action->delete();
                return response()->json('remove');
            }
            $data['title'] = Auth::user()->last_name . ' ' . Auth::user()->first_name . CommonConstants::ACTION[intval($data['type'])];
            $action = $this->actionRepository->addAction($data);

            return response()->json('add');
        }

        return response()->json(false);
    }

    public function delComment(Request $req)
    {
        if (!Auth::check()) {
            return response()->json('login');
        }

        $data = $req->all();
        if (isset($data['uid']) && isset($data['tid']) && isset($data['cid']) && (Auth::id() == intval($data['uid']) || Auth::id() == 1)) {
            $comment = $this->commentReprository->getDelComment($data);
            if ($comment != null) {
                $comment->delete();
                return response()->json(true);
            }
        }

        return response()->json(false);
    }

    public function compileHtml(Request $req)
    {
        $text = $req->text;
        return view('pages.post.compile_html', compact('text'));
    }

    public function autoHtml()
    {
        $example = '<style>
    /* Your code here */
    .example {
        color: #ed5829;
        background: #000;
        padding: 30px;
    }
</style>
<body>
    /* Your code here */
    <div class="example">Example</div>
</body>';
        return view('pages.post.auto_html', compact('example'));
    }
}
