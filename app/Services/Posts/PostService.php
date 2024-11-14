<?php

namespace App\Services\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PostService
{
    public function getPosts($filters)
    {
        $cacheKey = 'posts';
        return Cache::remember($cacheKey, now()->addMinutes(60), function () use ($filters) {
            $query = Post::query();

            if (isset($filters['category']) && !empty($filters['category'])) {
                $query->where('category', $filters['category']);
            }

            if (isset($filters['author']) && !empty($filters['author'])) {
                $query->where('author_id', $filters['author']);
            }

            if (isset($filters['start_date']) && isset($filters['end_date'])) {
                $query->whereBetween('created_at', [
                    $filters['start_date'],
                    $filters['end_date']
                ]);
            }

            return $query->paginate(10);
        });
    }

    public function createPost(array $data)
    {
        $data['author_id'] = Auth::id();
        return Post::create($data);
    }

    public function updatePost(Post $post, array $data)
    {
        $post->update($data);
        return $post->fresh();
    }

    public function deletePost(Post $post)
    {
        return $post->delete();
    }
}
