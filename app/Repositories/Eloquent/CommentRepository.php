<?php

namespace App\Repositories\Eloquent;

use App\Config\CommonConstants;
use App\Models\Comment;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Auth;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    private $comment;

    public function __construct()
    {
        $this->comment = new Comment();
    }

    public function getPostComments($id)
    {
        $comments = $this->comment
            ->selectRaw('comment.*, CONCAT(users.last_name, " ", users.first_name) as author_name, users.avata as author_avata, users.id as author_id')
            ->join('users', 'comment.user_id', '=', 'users.id')
            ->where('target_id', $id)->where('type', CommonConstants::POST_TYPE)->orderBy('created_at', 'desc')->get();

        return $comments;
    }

    public function addComment($data) {
        $comment = $this->comment->create($data);
        return $comment;
    }

    public function getDelComment($data) {
        if(Auth::id() == 1) {
            return $this->comment->where('id', $data['cid'])->where('target_id', $data['tid'])->first();
        }
        return $this->comment->where('id', $data['cid'])->where('user_id', $data['uid'])->where('target_id', $data['tid'])->first();
    }
}
