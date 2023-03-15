<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\CarouselInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Carousel\CarouselTrait;
use App\Models\Carousel;

class CarouselRepository implements CarouselInterface
{
    private $carouselModel;
    use ApiResponseTrait, CarouselTrait;
    public function __construct(Carousel $carousel)
    {
        $this->carouselModel = $carousel;
    }

    public function getCarousel($id)
    {
        $post = $this->findCarouselById($id);
        if ($post) {
            return $this->apiResponse(200, 'Carousel Data', null, $post);
        }
        return $this->apiResponse(422, 'The Id Not Valid');
    }

    public function index()
    {
        return $this->apiResponse(200, 'Carousels Data', null, $this->getCarousels());
    }

    public function create($request, $imageService, $videoService)
    {
        $image = $imageService->uploadImage($request->image);
        $video = $videoService->uploadVideo($request->video);
        $this->carouselModel::create([
            'image' => $image,
            'video' => $video,
            'post_id' => $request->post_id,
            'pub_num' => $request->pub_num,
            'is_ad' => $request->is_ad,
            'see_more' => $request->see_more,
            'slot_num' => $request->slot_num,
            'ad_script' => $request->ad_script
        ]);
        return $this->apiResponse(200, 'Carousel Was Create');
    }

    public function delete($request, $imageService, $videoService)
    {
        $carousel = $this->findCarouselById($request->id);
        $imageService->deleteImageInLocal($carousel->image);
        $videoService->deleteVideoInLocal($carousel->video);
        $carousel->delete();
        return $this->apiResponse(200, 'Carousel Was Delete');
    }

    public function update($request, $imageService, $videoService)
    {
        $carousel = $this->findCarouselById($request->id);
        $image = $imageService->checkImage($request->image, $carousel);
        $video = $videoService->checkVideo($request->video, $carousel);
        $carousel->update([
            'image' => $image,
            'video' => $video,
            'post_id' => $request->post_id,
            'pub_num' => $request->pub_num ?? $carousel->pub_num,
            'is_ad' => $request->is_ad,
            'see_more' => $request->see_more,
            'slot_num' => $request->slot_num ?? $carousel->slot_num,
            'ad_script' => $request->ad_script ?? $carousel->ad_script
        ]);
        return $this->apiResponse(200, 'Carousel Was Update');
    }
}
