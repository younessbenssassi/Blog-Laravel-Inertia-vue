<?php

namespace App\Repositories\Blog;

use App\Models\Blog\Post;

class PostRepository
{
    /**
     * List all posts
     *
     * @param array $filters
     * @return mixed
     */
    public function all(array $filters): mixed
    {
        return Post::filter($filters)
            ->hasAccess()
            ->orderBy('id','DESC')
            ->get();
    }

    /**
     * List paginate posts
     *
     * @param array $filters
     * @return mixed
     */
    public function list(array $filters): mixed
    {
        return Post::filter($filters)
            ->hasAccess()
            ->orderBy('id','DESC')
            ->paginate(20);
    }

    /**
     * Find a post by ID.
     *
     * @param int $id
     * @return Post|null
     */
    public function find(int $id): ?Post
    {
        return Post::find($id);
    }

    /**
     * Create a new post .
     *
     * @param array $data
     * @return Post
     */
    public function store(array $data): Post
    {
        $post = new Post();
        $post->fill($data);
        $post->save();

        return $post;
    }

    /**
     * Update an existing post.
     *
     * @param Post $post
     * @param array $data
     * @return void
     */
    public function update(Post $post, array $data): void
    {
        $post->fill($data);
        $post->save();
    }

    /**
     * Delete an existing post.
     *
     * @param Post $post
     * @return void
     */
    public function destroy(Post $post): void
    {
        $post->delete();
    }
}
