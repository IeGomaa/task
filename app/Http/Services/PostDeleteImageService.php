<?php

namespace App\Http\Services;

class PostDeleteImageService
{
    public function deleteImageInLocal($image)
    {
        unlink(public_path($image));
    }
}
