<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeAnswer extends Model
{
    use HasFactory;

    protected $table = 'challenge_answer';
    protected $fillable = [
        'user_id',
        'time',
        'challenge_id',
        'code',
        'correct_test_case_num',
        'score',
        'exec_time'
    ];
}
