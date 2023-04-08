<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\PostRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    private $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function getPostList()
    {
        return $this->post->orderBy('updated_at', 'desc')->get();
    }

    public function getPostHome()
    {
        return $this->post->selectRaw('post.*, CONCAT(users.last_name, " ", users.first_name) as author_name, users.avata as author_avata, users.id as author_id')
            ->join('users', 'post.created_by', '=', 'users.id')
            ->where('image', '!=', 'img/common.jpg')
            ->inRandomOrder()
            ->take(30)
            ->get();
    }

    public function addPost($data)
    {
        $data['created_by'] = Auth::id();

        return $this->post->create($data);
    }

    public function updatePost($data)
    {
        $data['created_by'] = Auth::id();

        $post_update = $this->post->where('id', $data['id'])->update($data);
        return true;
    }

    public function getPostAdmin($id)
    {
        return $this->post->find($id);
    }

    public function getPostBySlug($slug)
    {
        return $this->post->where('slug', $slug)->first();
    }

    public function delPostAdmin($id)
    {
        return $this->post->where('id', $id)->delete();
    }

    public function searchPost($key)
    {
        return $this->post->where('title', 'like', '%' . $key . '%')->get();
    }

    public function searchPostRaw($raw, $count)
    {
        return $this->post
            ->selectRaw('post.*, CONCAT(users.last_name, " ", users.first_name) as author_name, users.avata as author_avata, users.id as author_id')
            ->join('users', 'post.created_by', '=', 'users.id')
            ->whereRaw($raw)->inRandomOrder()->take($count)->get();
    }

    public function getPostChangeTitle()
    {
        return $this->post->whereNotNull('title_update')->get();
    }

    public function getPostById($id)
    {
        return $this->post->find($id);
    }

    public function checkImage($image)
    {
        return $this->post->where('image', $image)->get()->count() <= 1;
    }

    public function getPostAction($id)
    {
        return $this->post->whereRaw('id in (select distinct post_id from action where user_id = ' .  $id . ' and (type = 3 or type = 4))')->get();
    }
}
