<?php

namespace App\Repositories\Eloquent;

use App\Config\ExamConstants;
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

    public function getChallengeWeek()
    {
        return $this->challenge->where('type', ExamConstants::WEEKLY_C_TYPE)->where('status', ExamConstants::C_CURRENT)->first();
    }

    public function getChallengeRanking()
    {
        return $this->challenge->where('type', ExamConstants::WEEKLY_C_TYPE)->where('status', ExamConstants::C_RANKING)->first();
    }
}
