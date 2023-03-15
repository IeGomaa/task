<?php

namespace App\Http\Services\Post;

class PostUploadImageService
{
    public function uploadImage($file, $oldImage = null): string
    {
        $fileName = time() . '_post.' . $file->extension();

        if (!is_null($oldImage)) {
            unlink(public_path($oldImage));
        }
        $file->move(public_path('uploaded/post'), $fileName);
        return $fileName;
    }
}
