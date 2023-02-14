<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentItem extends Model
{
    use HasFactory;

    protected $table = 'content_item';
    protected $fillable = [
        'title',
        'content',
        'lesson_id',
        'index',
        'p_language_id',
        'status',
        'type'
    ];
}
