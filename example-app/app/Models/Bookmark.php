<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $model = Bookmark::class;

    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
    ];
}
