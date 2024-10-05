<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $model = Categories::class;

    use HasFactory;

    protected $fillable = [
        'name',
    ];
}
