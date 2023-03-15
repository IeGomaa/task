<?php

namespace App\Http\Services\Carousel;

class CarouselCheckImageService
{
    private $service;
    public function __construct(CarouselUploadImageService $service)
    {
        $this->service = $service;
    }

    public function checkImage($image, $carousel): string
    {
        if (!is_null($image)) {
            $imageName = $this->service->uploadImage($image, $carousel->image);
        } else {
            $imageName = $carousel->getRawOriginal('image');
        }
        return $imageName;
    }
}
