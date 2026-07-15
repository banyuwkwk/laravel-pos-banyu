<?php

namespace App\Repositories\Interfaces;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductRepositoryInterface
{
    public function count();

    public function lowStock(int $limit = 5);

    public function latest(int $limit = 5);

    public function paginate(
        ?string $search = null,
        int $perPage = 10
    ): LengthAwarePaginator;

    public function find(int $id): ?Product;

    public function store(array $data): Product;

    public function update(Product $product, array $data): bool;

    public function destroy(Product $product): bool;

    public function search(string $keyword);
}