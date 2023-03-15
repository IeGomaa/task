<?php

namespace App\Http\Services\Carousel\Video;

class CarouselUploadVideoService
{
    public function uploadVideo($file, $oldVideo = null): string
    {
        $fileName = time() . '_carousel_video.' . $file->extension();

        if (!is_null($oldVideo)) {
            unlink(public_path($oldVideo));
        }
        $file->move(public_path('uploaded/carousel/video'), $fileName);
        return $fileName;
    }
}
