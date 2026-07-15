<?php

namespace App\Repositories\Interfaces;

use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CategoryRepositoryInterface
{
    public function count();
    
    public function paginate(
        ?string $search = null,
        int $perPage = 10
    ): LengthAwarePaginator;

    public function find(int $id): ?Category;

    public function store(array $data): Category;

    public function update(Category $category, array $data): bool;

    public function destroy(Category $category): bool;

    public function getActive();
}