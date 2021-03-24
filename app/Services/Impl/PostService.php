<?php

namespace App\Services\Impl;

use App\Repositories\PostRepositoryImpl;
use App\Services\PostServiceImpl;

class PostService implements PostServiceImpl
{
    protected $postRepository;

    public function __construct(PostRepositoryImpl $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAll()
    {
        return $this->postRepository->getAll();
    }

    public function findById($id)
    {
        $post = $this->postRepository->findById($id);

        $statusCode = 200;
        if (!$post) {
            $statusCode = 404;
        }

        return [
            'statusCode' => $statusCode,
            'posts' => $post
        ];
    }

    public function create($request)
    {
        $post = $this->postRepository->create($request);

        $statusCode = 201;
        if (!$post) {
            $statusCode = 500;
        }

        return [
            'statusCode' => $statusCode,
            'posts' => $post
        ];
    }

    public function update($request, $id)
    {
        $oldPost = $this->postRepository->findById($id);

        if (!$oldPost) {
            $newPost = null;
            $statusCode = 404;
        } else {
            $newPost = $this->postRepository->update($request, $oldPost);
            $statusCode = 200;
        }

        return [
            'statusCode' => $statusCode,
            'posts' => $newPost
        ];
    }

    public function destroy($id)
    {
        $post = $this->postRepository->findById($id);

        $statusCode = 404;
        $message = "User not found";
        if ($post) {
            $this->postRepository->destroy($post);
            $statusCode = 200;
            $message = "Delete success!";
        }

        return [
            'statusCode' => $statusCode,
            'message' => $message
        ];
    }
}
