<?php

namespace App\Repositories\Eloquent;

use App\Models\Comment;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    private $comment;

    public function __construct()
    {
        $this->comment = new Comment();
    }
}
