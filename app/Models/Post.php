<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'media'
    ];

    public function getMediaAttribute($value): string
    {
        return 'uploaded/post/' . $value;
    }
}
