<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;

    protected $table = 'solution';
    protected $fillable = [
        'title',
        'slug',
        'view'
    ];
}