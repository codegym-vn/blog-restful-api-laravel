<?php


namespace App\Repositories\Impl;

use App\Models\Post;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\PostRepositoryImpl;

class PostRepository extends EloquentRepository implements PostRepositoryImpl
{

    public function getModel()
    {
        return Post::class;
    }
}
