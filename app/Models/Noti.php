<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noti extends Model
{
    use HasFactory;

    protected $table = 'noti';
    protected $fillable = [
        'title',
        'image',
        'action',
        'index',
        'target_id',
        'type'
    ];
}
