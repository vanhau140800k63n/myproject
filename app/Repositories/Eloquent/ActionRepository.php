<?php

namespace App\Repositories\Eloquent;

use App\Models\Action;
use App\Repositories\ActionRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class ActionRepository extends BaseRepository implements ActionRepositoryInterface
{
    private $action;

    public function __construct()
    {
        $this->action = new Action();
    }

    public function addAction($data)
    {
        return $this->action->create($data);
    }

    public function checkAction($data)
    {
        return $this->action->where('user_id', $data['user_id'])->where('type', $data['type'])->where('post_id', $data['post_id'])->first();
    }

    public function getActionUser($id)
    {
        return $this->action
            ->selectRaw('action.*, post.title as post_title, post.slug as post_slug')
            ->join('post', 'post.id', '=', 'action.post_id')
            ->where('user_id', $id)->get();
    }
}
