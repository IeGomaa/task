<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\PostInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Redis\PostRedis;
use App\Models\Post;

class PostRepository implements PostInterface
{
    private $postModel;
    use ApiResponseTrait, PostRedis;
    public function __construct(Post $post)
    {
        $this->postModel = $post;
    }

    public function index()
    {
        $posts = $this->getPostsFromRedis();
        if ($posts->isEmpty()) {
            return $this->apiResponse(404, 'Posts Empty');
        }
        return $this->apiResponse(200, 'Posts Data', null, ['post' => $posts]);
    }

    public function create($request, $service)
    {
        $image = $service->uploadImage($request->media);
        $post = $this->postModel::create([
            'title' => $request->title,
            'media' => $image,
            'content' => $request->body
        ]);
        $this->setPostsIntoRedis();
        return $this->apiResponse(200, 'Post Was Create', null, ['post' => $post]);
    }

    public function delete($request,  $service)
    {
        $post = $this->findPostById($request->id);
        $service->deleteImageInLocal($post->media);
        $post->delete();
        $this->setPostsIntoRedis();
        return $this->apiResponse(200, 'Post Was Delete');
    }

    public function update($request,  $service)
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
