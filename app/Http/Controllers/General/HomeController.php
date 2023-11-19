<?php

namespace App\Http\Controllers\General;

use App\Enums\Blog\PostStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\ListPostRequest;
use App\Services\Blog\CategoryService;
use App\Services\Blog\PostService;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
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
     * @param ListPostRequest $request
     * @return Response
     */
    public function index(ListPostRequest $request): Response
    {
        return Inertia::render('Home/Main',[
            'posts' => $this->postService->list($request->validated()),
            'categories' => $this->categoryService->all(),
            'statuses' => PostStatus::getValues(),
        ]);
    }
}
