<?php

namespace App\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductService
{
    public function __construct(
        protected ProductRepositoryInterface $productRepository
    ) {}

    public function paginate(?string $search = null): LengthAwarePaginator
    {
        return $this->productRepository->paginate($search);
    }

    public function find(int $id): ?Product
    {
        return $this->productRepository->find($id);
    }

    public function store(array $data): Product
    {
        
        return DB::transaction(function () use ($data) {

            $data['slug'] = Str::slug($data['name']);
            $data['sku'] = $this->generateSku();
            if
            (isset($data['image']) && $data['image'] instanceof UploadedFile) {
                $data['image'] = $data['image']->store('products', 'public');
            } 

            return $this->productRepository->store($data);

        });
    }

    public function update(Product $product, array $data): bool
    {
        return DB::transaction(function () use ($product, $data) {

            $data['slug'] = Str::slug($data['name']);

            if (
                isset($data['image']) &&
                $data['image'] instanceof UploadedFile
            ) {

                if ($product->image) {

                    Storage::disk('public')
                        ->delete($product->image);

                }

                $data['image'] = $data['image']
                    ->store('products', 'public');

            } else {

                unset($data['image']);

            }

            return $this->productRepository
                ->update($product, $data);

        });
    }

    public function destroy(Product $product): bool
    {
        return DB::transaction(function () use ($product) {

            if ($product->image) {

                Storage::disk('public')
                    ->delete($product->image);

            }

            return $this->productRepository
                ->destroy($product);

        });
    }

    private function generateSku(): string
    {
        $lastProduct = Product::latest('id')->first();

        $nextNumber = $lastProduct
            ? $lastProduct->id + 1
            : 1;

        return 'PRD-' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
    }

    // dashbard
    public function count()
    {
        return $this->productRepository->count();
    }

    public function lowStock()
    {
        return $this->productRepository->lowStock();
    }

    public function latest()
    {
        return $this->productRepository->latest();
    }

    public function search(string $keyword)
    {
        return $this->productRepository
            ->search($keyword);
    }
}