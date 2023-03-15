<?php

namespace App\Http\Services\Carousel\Image;

class CarouselUploadImageService
{
    public function uploadImage($file, $oldImage = null): string
    {
        $fileName = time() . '_carousel_image.' . $file->extension();

        if (!is_null($oldImage)) {
            unlink(public_path($oldImage));
        }
        $file->move(public_path('uploaded/carousel/image'), $fileName);
        return $fileName;
    }
}
