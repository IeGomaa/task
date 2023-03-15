<?php

namespace App\Http\Traits\Post;

use App\Models\Post;

trait PostTrait
{
    private function getPosts()
    {
        return $this->postModel::get();
    }

    private function findPostById($id)
    {
        return $this->postModel::find($id);
    }
}
