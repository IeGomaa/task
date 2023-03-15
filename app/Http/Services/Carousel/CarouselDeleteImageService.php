<?php

namespace App\Http\Services\Carousel;

class CarouselDeleteImageService
{
    public function deleteImageInLocal($image)
    {
        unlink(public_path($image));
    }
}
