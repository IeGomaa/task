<?php

namespace App\Http\Traits\Carousel;

trait CarouselTrait
{
    private function getCarousels()
    {
        return $this->carouselModel::with('posts')->get();
    }

    private function findCarouselById($id)
    {
        return $this->carouselModel::find($id);
    }
}
