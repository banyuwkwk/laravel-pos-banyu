<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryService $categoryService
    ) {
        // $this->middleware('permission:view categories')->only('index');
        // $this->middleware('permission:create categories')->only(['create', 'store']);
        // $this->middleware('permission:update categories')->only(['edit', 'update']);
        // $this->middleware('permission:delete categories')->only('destroy');
    }

    public function index(Request $request)
    {
        $categories = $this->categoryService
            ->paginate(
                $request->string('search')->toString()
            );

        return view(
            'categories.index',
            [
                'categories' => $categories,
            ]
        );
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->categoryService->store(
            $request->validated()
        );

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->categoryService->update(
            $category,
            $request->validated()
        );

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $this->categoryService->destroy($category);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}