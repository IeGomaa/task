<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\CarouselInterface;
use App\Http\Requests\Carousel\CreateCarouselRequest;
use App\Http\Requests\Carousel\DeleteCarouselRequest;
use App\Http\Requests\Carousel\UpdateCarouselRequest;
use App\Http\Services\Carousel\Image\CarouselCheckImageService;
use App\Http\Services\Carousel\Image\CarouselDeleteImageService;
use App\Http\Services\Carousel\Image\CarouselUploadImageService;
use App\Http\Services\Carousel\Video\CarouselCheckVideoService;
use App\Http\Services\Carousel\Video\CarouselDeleteVideoService;
use App\Http\Services\Carousel\Video\CarouselUploadVideoService;

class CarouselController extends Controller
{
    private $carouselInterface;
    public function __construct(CarouselInterface $carousel)
    {
        $this->carouselInterface = $carousel;
    }

    public function getCarousel($id)
    {
        return $this->carouselInterface->getCarousel($id);
    }

    public function index()
    {
        return $this->carouselInterface->index();
    }

    public function create(CreateCarouselRequest $request, CarouselUploadImageService $imageService, CarouselUploadVideoService $videoService)
    {
        return $this->carouselInterface->create($request, $imageService, $videoService);
    }

    public function delete(DeleteCarouselRequest $request, CarouselDeleteImageService $imageService, CarouselDeleteVideoService $videoService)
    {
        return $this->carouselInterface->delete($request, $imageService, $videoService);
    }

    public function update(UpdateCarouselRequest $request, CarouselCheckImageService $imageService, CarouselCheckVideoService $videoService)
    {
        return $this->carouselInterface->update($request, $imageService, $videoService);
    }
}
