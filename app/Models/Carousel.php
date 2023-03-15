<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carousel extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'video',
        'post_id'
    ];

    public function posts(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function getImageAttribute($value): string
    {
        return 'uploaded/carousel/' . $value;
    }

    public function getVideoAttribute($value): string
    {
        return 'uploaded/carousel/' . $value;
    }
}
