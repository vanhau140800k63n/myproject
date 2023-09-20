<?php

namespace App\Repositories\Eloquent;

use App\Models\SolutionItem;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\SolutionItemRepositoryInterface;

class SolutionItemRepository extends BaseRepository implements SolutionItemRepositoryInterface
{
    private $solution_item;

    public function __construct()
    {
        $this->solution_item = new SolutionItem();
    }

    public function create($data)
    {
        return $this->solution_item->create($data);
    }

    public function getQuestion($solution_id)
    {
        return $this->solution_item->where('solution_id', $solution_id)->where('type', 1)->first();
    }
    public function getQuestionComments($solution_id, $solution_item_id)
    {
        return $this->solution_item->where('solution_id', $solution_id)->where('solution_item_id', $solution_item_id)->where('type', 3)->get();
    }

    public function getAnswers($solution_id)
    {
        return $this->solution_item->where('solution_id', $solution_id)->where('type', 2)->get();
    }

    public function getAnswerComments($solution_id, $solution_item_id) {
        return $this->solution_item->where('solution_id', $solution_id)->where('solution_item_id', $solution_item_id)->where('type', 3)->get();
    }
}
