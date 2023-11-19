<?php

namespace App\Repositories\Blog;

use App\Models\Blog\Category;

class CategoryRepository
{
    /**
     * @return mixed
     */
    public function all(): mixed
    {
        return Category::hasAccess()
            ->orderBy('id','DESC')
            ->get();
    }

    /**
     * @return mixed
     */
    public function list(): mixed
    {
        return Category::hasAccess()
            ->orderBy('id','DESC')
            ->paginate(20);
    }

    /**
     * Find a category by ID.
     *
     * @param int $id
     * @return Category|null
     */
    public function find(int $id): ?Category
    {
        return Category::find($id);
    }

    /**
     * Create a new category .
     *
     * @param array $data
     * @return Category
     */
    public function store(array $data): Category
    {
        $category = new Category();
        $category->fill($data);
        $category->save();

        return $category;
    }

    /**
     * Update an existing category.
     *
     * @param Category $category
     * @param array $data
     * @return void
     */
    public function update(Category $category, array $data): void
    {
        $category->fill($data);
        $category->save();
    }

    /**
     * Delete an existing category.
     *
     * @param Category $category
     * @return void
     */
    public function destroy(Category $category): void
    {
        $category->delete();
    }
}
