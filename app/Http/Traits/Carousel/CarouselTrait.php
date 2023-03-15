<?php

namespace App\Http\Traits\Carousel;

trait CarouselTrait
{
    private function getCarousels()
    {
        return $this->carouselModel::get();
    }

    private function findCarouselById($id)
    {
        return $this->carouselModel::find($id);
    }
}
