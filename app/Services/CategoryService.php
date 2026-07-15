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

            return $this->categoryRepository->store($data);

        });
    }

    public function update(Category $category, array $data): bool
    {
        return DB::transaction(function () use ($category, $data) {

            $data['slug'] = Str::slug($data['name']);

            return $this->categoryRepository->update($category, $data);

        });
    }

    public function destroy(Category $category): bool
    {
        return DB::transaction(function () use ($category) {

            return $this->categoryRepository->destroy($category);

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