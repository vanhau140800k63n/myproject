<?php

namespace App\Repositories;

interface ChallengeAnswerRepositoryInterface
{
    public function createAnswer($data);
    public function getAnswer($user_id, $challenge_id);
    public function updateAnswer($id, $data);
    public function getTopAnswer($challenge_id);
}
