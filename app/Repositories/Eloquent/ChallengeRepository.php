<?php

namespace App\Repositories\Eloquent;

use App\Models\Challenge;
use App\Repositories\ChallengeRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class ChallengeRepository extends BaseRepository implements ChallengeRepositoryInterface
{
    private $challenge;

    public function __construct()
    {
        $this->challenge = new Challenge();
    }

    public function getChallengeWeek() {
        return $this->challenge->first();
    }
}
