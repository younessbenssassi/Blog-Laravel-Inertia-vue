<?php

namespace App\Services\Blog;


use App\Models\Blog\Category;
use App\Repositories\Blog\CategoryRepository;
use Illuminate\Support\Facades\Auth;

class CategoryService
{
    /**
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(private readonly CategoryRepository $categoryRepository)
    {
    }

    /**
     * @return mixed
     */
    public function all(): mixed
    {
        return $this->categoryRepository->all();
    }

    /**
     * @return mixed
     */
    public function list(): mixed
    {
        return $this->categoryRepository->list();
    }

    /**
     * @param int $categoryId
     * @return Category|null
     */
    public function find(int $categoryId): ?Category
    {
        return $this->categoryRepository->find($categoryId);
    }

    /**
     * @param array $data
     * @return Category
     */
    public function store(array $data): Category
    {
        $data['user_id'] = Auth::id();
        return $this->categoryRepository->store($data);
    }

    /**
     * @param Category $category
     * @param array $data
     * @return void
     */
    public function update(Category $category, array $data): void
    {
        $this->categoryRepository->update($category, $data);
    }

    /**
     * @param Category $category
     * @return void
     */
    public function destroy(Category $category): void
    {
        $this->categoryRepository->destroy($category);
    }
}
