<?php

namespace App\Http\Services\Carousel\Video;

class CarouselDeleteVideoService
{
    public function deleteVideoInLocal($video)
    {
        unlink(public_path($video));
    }
}
