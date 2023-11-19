<?php

namespace App\Services\Blog;


use App\Models\Blog\Post;
use App\Repositories\Blog\PostRepository;
use Illuminate\Support\Facades\Auth;

class PostService
{
    /**
     * @param PostRepository $postRepository
     */
    public function __construct(private readonly PostRepository $postRepository)
    {
    }

    /**
     * @param array $filters
     * @return mixed
     */
    public function all(array $filters = []): mixed
    {
        return $this->postRepository->all($filters);
    }

    /**
     * @param array $filters
     * @return mixed
     */
    public function list(array $filters = []): mixed
    {
        return $this->postRepository->list($filters);
    }

    /**
     * @param int $postId
     * @return Post|null
     */
    public function find(int $postId): ?Post
    {
        return $this->postRepository->find($postId);
    }

    /**
     * @param array $data
     * @return Post
     */
    public function store(array $data): Post
    {
        $data['user_id'] = Auth::id();
        return $this->postRepository->store($data);
    }

    /**
     * @param Post $post
     * @param array $data
     * @return void
     */
    public function update(Post $post, array $data): void
    {
        $this->postRepository->update($post, $data);
    }

    /**
     * @param Post $post
     * @return void
     */
    public function destroy(Post $post): void
    {
        $this->postRepository->destroy($post);
    }
}
