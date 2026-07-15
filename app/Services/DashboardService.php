<?php

namespace App\Services;

use App\Models\User;

class DashboardService
{
    public function __construct(
        protected ProductService $productService,
        protected CategoryService $categoryService
    ) {}

    public function getDashboardData(): array
    {
        return [

            'title' => 'Dashboard',

            'welcome' => 'Welcome back, ' . auth()->user()->name,

            'stats' => [

                'products' => $this->productService->count(),

                'categories' => $this->categoryService->count(),

                'sales_today' => 0,

                'users' => User::count(),

            ],

            'lowStocks' => $this->productService->lowStock(),

            'latestProducts' => $this->productService->latest(),

        ];
    }
}