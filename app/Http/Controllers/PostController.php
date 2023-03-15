<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\PostInterface;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\DeletePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Services\Post\PostCheckImageService;
use App\Http\Services\Post\PostDeleteImageService;
use App\Http\Services\Post\PostUploadImageService;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Post;

class PostController extends Controller
{
    use ApiResponseTrait;
    private $postInterface;
    public function __construct(PostInterface $post)
    {
        $this->postInterface = $post;
    }

    public function index()
    {
        return $this->postInterface->index();
    }

    public function create(CreatePostRequest $request, PostUploadImageService $service)
    {
        return $this->postInterface->create($request, $service);
    }

    public function delete(DeletePostRequest $request, PostDeleteImageService $service)
    {
        return $this->postInterface->delete($request, $service);
    }

    public function update(UpdatePostRequest $request, PostCheckImageService $service)
    {
        return $this->postInterface->update($request, $service);
    }

    public function getPost($id)
    {
        return $this->postInterface->getPost($id);
    }
}
