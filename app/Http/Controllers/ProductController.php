<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use App\Services\CategoryService;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService,
        protected CategoryService $categoryService
    ) {}

    public function index(Request $request)
    {
        $products = $this->productService
            ->paginate(
                $request->string('search')->toString()
            );

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryService->getActive();

        return view('products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $this->productService->store(
            $request->validated()
        );

        return redirect()
            ->route('products.index')
            ->with(
                'success',
                'Product created successfully.'
            );
    }

    public function edit(Product $product)
    {
        $categories = $this->categoryService->getActive();

        return view(
            'products.edit',
            compact('product', 'categories')
        );
    }

    public function update(
        UpdateProductRequest $request,
        Product $product
    )
    {
        $this->productService->update(
            $product,
            $request->validated()
        );

        return redirect()
            ->route('products.index')
            ->with(
                'success',
                'Product updated successfully.'
            );
    }

    public function destroy(Product $product)
    {
        $this->productService->destroy($product);

        return redirect()
            ->route('products.index')
            ->with(
                'success',
                'Product deleted successfully.'
            );
    }
}