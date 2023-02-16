<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\PostRepositoryInterface;

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
}
