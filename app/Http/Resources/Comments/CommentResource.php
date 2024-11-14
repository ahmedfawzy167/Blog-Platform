<?php

namespace App\Http\Resources\Comments;

use Illuminate\Http\Request;
use App\Http\Resources\Posts\PostResource;
use App\Http\Resources\Users\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'post' => new PostResource($this->post),
        ];
    }
}
