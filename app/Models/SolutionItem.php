<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolutionItem extends Model
{
    use HasFactory;

    protected $table = 'solution_item';
    protected $fillable = [
        'content',
        'solution_id',
        'user_id',
        'type',
        'point',
        'solution_item_id'
    ];
}
