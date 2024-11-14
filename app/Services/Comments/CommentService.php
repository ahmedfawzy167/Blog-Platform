<?php

namespace App\Services\Comments;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentService
{
    public function createComment($postId, array $data)
    {
        $data['user_id'] = Auth::id();
        $data['post_id'] = $postId;
        return Comment::create($data);
    }
}
