<?php

namespace App\Http\Services\Carousel;

class CarouselUploadImageService
{
    public function uploadImage($file, $oldImage = null): string
    {
        $fileName = time() . '_carousel.' . $file->extension();

        if (!is_null($oldImage)) {
            unlink(public_path($oldImage));
        }
        $file->move(public_path('uploaded/carousel'), $fileName);
        return $fileName;
    }
}
