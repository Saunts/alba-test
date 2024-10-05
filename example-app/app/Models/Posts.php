<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

use \App\Models\Post;

class Posts extends Model implements HasMedia
{
    protected $model = Post::class;

    public function repository(): Builder
    {
        return Post::query();
    }

    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'post',
        'categories_id',
    ];
}
