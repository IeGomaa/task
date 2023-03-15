<?php

namespace App\Http\Services\Carousel\Image;

class CarouselDeleteImageService
{
    public function deleteImageInLocal($image)
    {
        unlink(public_path($image));
    }
}
