<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Comment;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Comments\CommentResource;
use App\Services\Comments\CommentService;

class CommentController extends Controller
{
    use ApiResponder;

    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $postId)
    {
        try {
            $comment =  $this->commentService->createComment($postId, $request->all());
            return $this->created(new CommentResource($comment), 'Comment Added Successfully');
        } catch (\Exception $e) {
            return $this->serverError($e->getMessage());
        }
    }
}
