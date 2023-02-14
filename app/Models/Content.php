<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = 'content';
    protected $fillable = [
        'title',
        'sub_title',
        'course_id',
        'slug',
    ];
}
