<?php

namespace App\Http\Controllers;

use App\Http\Requests\Carousel\CreateCarouselRequest;
use App\Http\Requests\Carousel\UpdateCarouselRequest;
use App\Http\Services\Carousel\CarouselCheckImageService;
use App\Http\Services\Carousel\CarouselDeleteImageService;
use App\Http\Services\Carousel\CarouselUploadImageService;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Carousel\CarouselTrait;
use App\Models\Carousel;

class CarouselController extends Controller
{
    private $carouselModel;
    use ApiResponseTrait, CarouselTrait;
    public function __construct(Carousel $carousel)
    {
        $this->carouselModel = $carousel;
    }

    public function index()
    {
        return $this->apiResponse(200, 'Carousels Data', null, $this->getCarousels());
    }

    public function create(CreateCarouselRequest $request, CarouselUploadImageService $service)
    {
        $image = $service->uploadImage($request->image);
        $video = $service->uploadImage($request->video);
        $this->carouselModel::create([
            'image' => $image,
            'video' => $video,
            'post_id' => $request->post_id
        ]);
        return $this->apiResponse(200, 'Carousel Was Create');
    }

    public function delete($carousel_id, CarouselDeleteImageService $service)
    {
        $carousel = $this->findCarouselById($carousel_id);
        if ($carousel) {
            $service->deleteImageInLocal($carousel->image);
            $service->deleteImageInLocal($carousel->video);
            $carousel->delete();
            return $this->apiResponse(200, 'Carousel Was Delete');
        }
        return $this->apiResponse(200, 'Carousel Not Found');
    }

    public function update($carousel_id, UpdateCarouselRequest $request, CarouselCheckImageService $service)
    {
        $carousel = $this->findCarouselById($carousel_id);
        if ($carousel) {
            $image = $service->checkImage($request->image, $carousel);
            $video = $service->checkImage($request->video, $carousel);
            $carousel->update([
                'image' => $image,
                'video' => $video,
                'post_id' => $request->post_id
            ]);
            return $this->apiResponse(200, 'Carousel Was Update');
        }
        return $this->apiResponse(200, 'Carousel Not Found');
    }
}
