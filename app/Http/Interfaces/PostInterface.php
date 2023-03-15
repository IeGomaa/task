<?php

namespace App\Http\Interfaces;

interface PostInterface
{
    public function index();
    public function create($request, $service);
    public function delete($request, $service);
    public function update($request, $service);
}
