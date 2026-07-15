<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductRepository implements ProductRepositoryInterface
{
    public function paginate(
        ?string $search = null,
        int $perPage = 10
    ): LengthAwarePaginator
    {
        return Product::query()
            ->with('category')
            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%")
                    ->orWhereHas('category', function ($category) use ($search) {

                            $category->where(
                                'name',
                                'like',
                                "%{$search}%"
                            );
                    });
                });
            })
            ->latest()
            ->paginate($perPage)
            ->withQueryString();
    }

    public function find(int $id): ?Product
    {
        return Product::find($id);
    }

    public function store(array $data): Product
    {
        return Product::create($data);
    }

    public function update(Product $product, array $data): bool
    {
        return $product->update($data);
    }

    public function destroy(Product $product): bool
    {
        return $product->delete();
    }

    // dashboard
    public function count()
    {
        return Product::count();
    }

    public function lowStock(int $limit = 5)
    {
        return Product::query()
            ->orderBy('stock')
            ->limit($limit)
            ->get();
    }

    public function latest(int $limit = 5)
    {
        return Product::query()
            ->latest()
            ->limit($limit)
            ->get();
    }

    public function search(string $keyword)
    {
        return Product::query()
            ->where('is_active', true)
            ->where(function ($query) use ($keyword) {

                $query->where('name', 'like', "%{$keyword}%")
                    ->orWhere('sku', 'like', "%{$keyword}%");

            })
            ->orderBy('name')
            ->limit(10)
            ->get();
    }
}