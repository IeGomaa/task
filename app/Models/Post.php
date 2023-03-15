<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'media'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function getMediaAttribute($value): string
    {
        return 'uploaded/post/' . $value;
    }
}
