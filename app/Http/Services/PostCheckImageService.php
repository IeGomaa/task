<?php

namespace App\Http\Services;

class PostCheckImageService
{
    private $service;
    public function __construct(PostUploadImageService $service)
    {
        $this->service = $service;
    }

    public function checkImage($image, $post): string
    {
        if (!is_null($image)) {
            $imageName = $this->service->uploadImage($image, $post->image);
        } else {
            $imageName = $post->getRawOriginal('media');
        }
        return $imageName;
    }
}
