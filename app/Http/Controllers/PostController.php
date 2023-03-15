<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\DeletePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Services\PostCheckImageService;
use App\Http\Services\PostDeleteImageService;
use App\Http\Services\PostUploadImageService;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Redis\PostRedis;
use App\Models\Post;

class PostController extends Controller
{
    private $postModel;
    use ApiResponseTrait, PostRedis;
    public function __construct(Post $post)
    {
        $this->postModel = $post;
    }

    public function index()
    {
        return $this->apiResponse(200, 'Posts Data', null, $this->getPostsFromRedis());
    }

    public function create(CreatePostRequest $request, PostUploadImageService $service)
    {
        $image = $service->uploadImage($request->media);
        $post = $this->postModel::create([
            'title' => $request->title,
            'media' => $image,
            'content' => $request->body
        ]);
        $this->setPostsIntoRedis();
        return $this->apiResponse(200, 'Post Was Create', null, $post);
    }

    public function delete(DeletePostRequest $request, PostDeleteImageService $service)
    {
        $post = $this->findPostById($request->id);
        $service->deleteImageInLocal($post->media);
        $post->delete();
        $this->setPostsIntoRedis();
        return $this->apiResponse(200, 'Post Was Delete');
    }

    public function update(UpdatePostRequest $request, PostCheckImageService $service)
    {
        $post = $this->findPostById($request->id);
        $image = $service->checkImage($request->media, $post);
        $post->update([
            'title' => $request->title,
            'media' => $image,
            'content' => $request->body
        ]);
        $this->setPostsIntoRedis();
        return $this->apiResponse(200, 'Post Was Update');
    }
}
