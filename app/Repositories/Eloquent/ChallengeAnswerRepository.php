<?php

namespace App\Repositories\Eloquent;

use App\Models\ChallengeAnswer;
use App\Repositories\ChallengeAnswerRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class ChallengeAnswerRepository extends BaseRepository implements ChallengeAnswerRepositoryInterface
{
    private $challenge_answer;

    public function __construct()
    {
        $this->challenge_answer = new ChallengeAnswer();
    }

    public function createAnswer($data)
    {
        return $this->challenge_answer->create($data);
    }

    public function getAnswer($user_id, $challenge_id)
    {
        return $this->challenge_answer->where('user_id', $user_id)->where('challenge_id', $challenge_id)->first();
    }

    public function updateAnswer($id, $data) {
        return $this->challenge_answer->where('id', $id)->update($data);
    }
}
