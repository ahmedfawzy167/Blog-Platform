<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Post;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use App\Services\Posts\PostService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Posts\PostResource;
use App\Http\Requests\Posts\StorePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;

class PostController extends Controller
{
    use ApiResponder;

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only('category', 'author', 'start_date', 'end_date');
        $posts = $this->postService->getPosts($filters);
        return $this->success(PostResource::collection($posts));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        try {
            $post = $this->postService->createPost($request->validated());
            return $this->created(new PostResource($post), 'Post Created Successfully');
        } catch (\Exception $e) {
            return $this->serverError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $this->success(new PostResource($post));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if (auth()->user()->cannot('update', $post)) {
            return $this->unauthorized('You are Not Authorized to Update this post');
        }

        try {
            $post = $this->postService->updatePost($post, $request->validated());
            return $this->success(new PostResource($post), 'Post Updated Successfully');
        } catch (\Exception $e) {
            return $this->serverError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, Request $request)
    {
        if (auth()->user()->cannot('delete', $post)) {
            return $this->unauthorized('You are Not Authorized to Delete this Post');
        }

        try {
            $this->postService->deletePost($post);
            return $this->success(new PostResource($post), 'Post Deleted Successfully');
        } catch (\Exception $e) {
            return $this->serverError($e->getMessage());
        }
    }
}
