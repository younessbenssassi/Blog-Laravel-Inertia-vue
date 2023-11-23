<?php

namespace App\Services\Blog;


use App\Models\Blog\Post;
use App\Repositories\Blog\PostRepository;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

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
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function store(array $data): Post
    {
        $data['user_id'] = Auth::id();
        $post = $this->postRepository->store($data);
        $post->addMedia($data['image'])->toMediaCollection('images');
        return $post;
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
     * @param array $data
     * @return void
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function updateImage(Post $post, array $data): void
    {
        $post->clearMediaCollection('images');
        $post->addMedia($data['image'])->toMediaCollection('images');
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
