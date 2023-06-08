<?php

namespace App\Repositories\Eloquent;

use App\Models\Answer;
use App\Repositories\AnswerRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class AnswerRepository extends BaseRepository implements AnswerRepositoryInterface
{
    private $answer;

    public function __construct()
    {
        $this->answer = new Answer();
    }
}
