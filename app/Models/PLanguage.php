<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLanguage extends Model
{
    use HasFactory;

    protected $table = 'p_language';
    protected $fillable = [
        'name',
        'full_name',
        'home_content',
    ];
}
