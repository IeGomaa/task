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

    public function carousels(): HasMany
    {
        return $this->hasMany(Carousel::class, 'post_id', 'id');
    }

    public function getMediaAttribute($value): string
    {
        return 'uploaded/post/' . $value;
    }
}
