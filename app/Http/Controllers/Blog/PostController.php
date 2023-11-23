<?php

namespace App\Http\Controllers\Blog;

use App\Enums\Blog\PostStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\ListPostRequest;
use App\Http\Requests\Blog\StorePostRequest;
use App\Http\Requests\Blog\UpdatePostImageRequest;
use App\Http\Requests\Blog\UpdatePostRequest;
use App\Models\Blog\Post;
use App\Services\Blog\CategoryService;
use App\Services\Blog\PostService;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class PostController extends Controller
{
    /**
     * @param PostService $postService
     * @param CategoryService $categoryService
     */
    public function __construct(
        private readonly PostService     $postService,
        private readonly CategoryService $categoryService
    )
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @param ListPostRequest $request
     * @return Response
     */
    public function list(ListPostRequest $request): Response
    {
        return Inertia::render('Posts/List/Main', [
            'posts' => $this->postService->list($request->validated())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function new(): Response
    {
        return Inertia::render('Posts/New/Main', [
            'categories' => $this->categoryService->all(),
            'statuses' => PostStatus::getValues(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @return RedirectResponse
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        $this->postService->store($request->validated());
        return to_route('blog.posts.list');
    }

    /**
     * Show the content of the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function show(Post $post): Response
    {
        return Inertia::render('Posts/View/Main', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function edit(Post $post): Response
    {
        return Inertia::render('Posts/Edit/Main', [
            'post' => $post,
            'categories' => $this->categoryService->all(),
            'statuses' => PostStatus::getValues(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $this->postService->update($post, $request->validated());
        return to_route('blog.posts.list');
    }

    /**
     * Update the specified resource image in storage.
     *
     * @param UpdatePostImageRequest $request
     * @param Post $post
     * @return RedirectResponse
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function updateImage(UpdatePostImageRequest $request, Post $post): RedirectResponse
    {
        $this->postService->updateImage($post, $request->validated());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        $this->postService->destroy($post);
        return back();
    }
}
