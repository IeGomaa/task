<?php

namespace App\Http\Services\Carousel\Video;

class CarouselCheckVideoService
{
    private $service;
    public function __construct(CarouselUploadVideoService $service)
    {
        $this->service = $service;
    }

    public function checkVideo($video, $carousel): string
    {
        if (!is_null($video)) {
            $video_name = $this->service->uploadVideo($video, $carousel->video);
        } else {
            $video_name = $carousel->getRawOriginal('video');
        }
        return $video_name;
    }
}
