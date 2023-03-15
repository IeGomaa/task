<?php

namespace App\Http\Traits\Redis;

use App\Http\Traits\Post\PostTrait;
use Illuminate\Support\Facades\Redis;

trait PostRedis
{
    use PostTrait;
    private function setPostsIntoRedis()
    {
        $redis = Redis::connection();
        $redis->set('posts', $this->getPosts());
    }

    private function getPostsFromRedis()
    {
        $redis = Redis::connection();
        $data = json_decode($redis->get('posts'));
        if (empty($data)) {
            $data = $this->getPosts();
        }
        return $data;
    }
}
