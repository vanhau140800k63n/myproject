<?php

namespace App\Repositories;

interface SolutionItemRepositoryInterface
{
    public function create($data);
    public function getQuestion($solution_id);
    public function getQuestionComments($solution_id, $solution_item_id);
    public function getAnswers($solution_id);
    public function getAnswerComments($solution_id, $solution_item_id);
}
