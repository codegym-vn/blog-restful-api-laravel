<?php

namespace App\Http\Controllers;

use App\Services\PostServiceImpl;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostServiceImpl $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getAll();

        return response()->json($posts, 200);
    }

    public function show($id)
    {
        $dataPost = $this->postService->findById($id);

        return response()->json($dataPost['posts'], $dataPost['statusCode']);
    }

    public function store(Request $request)
    {
        $dataPost = $this->postService->create($request->all());

        return response()->json($dataPost['posts'], $dataPost['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataPost = $this->postService->update($request->all(), $id);

        return response()->json($dataPost['posts'], $dataPost['statusCode']);
    }

    public function destroy($id)
    {
        $dataPost = $this->postService->destroy($id);

        return response()->json($dataPost['message'], $dataPost['statusCode']);
    }
}
