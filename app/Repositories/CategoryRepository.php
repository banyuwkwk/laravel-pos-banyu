<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CategoryRepository implements CategoryRepositoryInterface
{

public function paginate(?string $search = null,int $perPage = 10): LengthAwarePaginator
{
    return Category::query()

        ->when($search, function ($query) use ($search) {

            $query->where('name', 'like', "%{$search}%");

        })

        ->latest()

        ->paginate($perPage)

        ->withQueryString();
}

    public function find(int $id): ?Category
    {
        return Category::find($id);
    }

    public function store(array $data): Category
    {
        return Category::create($data);
    }

    public function update(Category $category, array $data): bool
    {
        return $category->update($data);
    }

    public function destroy(Category $category): bool
    {
        return $category->delete();
    }

    public function getActive()
    {
        return Category::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();
    }

    // dashboard
    public function count()
    {
        return Category::count();
    }
}