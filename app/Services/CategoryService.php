<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    public function __construct(
        protected CategoryRepositoryInterface $categoryRepository
    ) {}

    public function paginate(?string $search = null)
    {
        return $this->categoryRepository
            ->paginate($search);
    }

    public function store(array $data): Category
    {
        return DB::transaction(function () use ($data) {

            $data['slug'] = Str::slug($data['name']);

            $category = $this->categoryRepository
                ->store($data);


            activity()
                ->causedBy(auth()->user())
                ->performedOn($category)
                ->log("Created category {$category->name}");


            return $category;
        });
    }

    public function update(Category $category, array $data): bool
    {
        return DB::transaction(function () use ($category, $data) {

            $data['slug'] = Str::slug($data['name']);

            $result = $this->categoryRepository
                ->update($category, $data);


            activity()
                ->causedBy(auth()->user())
                ->performedOn($category)
                ->log("Updated category {$category->name}");


            return $result;

        });
    }

    public function destroy(Category $category): bool
    {
        return DB::transaction(function () use ($category) {

            $categoryName = $category->name;

            $result = $this->categoryRepository
                ->destroy($category);


            activity()
                ->causedBy(auth()->user())
                ->log("Deleted category {$categoryName}");


            return $result;

        });
    }

    public function getActive()
    {
        return $this->categoryRepository->getActive();
    }

    public function count()
    {
        return $this->categoryRepository->count();
    }
}