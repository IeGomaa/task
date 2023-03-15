<?php

namespace App\Http\Interfaces;

interface CarouselInterface
{
    public function getCarousel($id);

    public function index();

    public function create($request, $imageService, $videoService);

    public function delete($request, $imageService, $videoService);

    public function update($request, $imageService, $videoService);
}
