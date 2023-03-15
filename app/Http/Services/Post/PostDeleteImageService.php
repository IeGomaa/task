<?php

namespace App\Http\Services\Post;

class PostDeleteImageService
{
    public function deleteImageInLocal($image)
    {
        unlink(public_path($image));
    }
}
