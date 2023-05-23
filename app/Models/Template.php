<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $table = 'template';
    protected $fillable = [
        'title',
        'iframe',
        'download_url',
        'slug',
        'meta',
        'width',
        'height',
        'auto',
        'source',
        'demo',
        'type',
        'content',
        'view',
        'tag',
        'show'
    ];
}
