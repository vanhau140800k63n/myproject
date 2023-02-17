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
        return $this->post->all();
    }

    public function getPostHome()
    {
        return $this->post->selectRaw('post.*, CONCAT(users.last_name, " ", users.first_name) as author_name, users.avata as author_avata')
            ->join('users', 'post.created_by', '=', 'users.id')
            ->take(5)->get();
    }

    public function addPost($data)
    {
        $str = $this->makeSlug($data['title']);

        $data_create = [
            'title' => $data['title'],
            'slug' => $str,
            'type' => $data['type'],
            'created_by' => Auth::id()
        ];

        return $this->post->create($data_create);
    }

    public function updatePost($data)
    {
        $str = $this->makeSlug($data['title']);

        $data_update = [
            'title' => $data['title'],
            'type' => $data['type'],
            'slug' => $str,
            'created_by' => Auth::id()
        ];

        $post_update = $this->post->where('id', $data['id'])->update($data_update);
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

    public function delPostAdmin($id) {
        return $this->post->where('id', $id)->delete();
    }
}
