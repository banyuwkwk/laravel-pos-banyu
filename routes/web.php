<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;

Route::redirect('/', '/dashboard');

Route::middleware(['auth'])->prefix('dashboard')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::middleware('permission:view categories')
        ->get('/categories', [CategoryController::class, 'index'])
        ->name('categories.index');

    Route::middleware('permission:create categories')
        ->get('/categories/create', [CategoryController::class, 'create'])
        ->name('categories.create');

    Route::middleware('permission:create categories')
        ->post('/categories', [CategoryController::class, 'store'])
        ->name('categories.store');

    Route::middleware('permission:update categories')
        ->get('/categories/{category}/edit', [CategoryController::class, 'edit'])
        ->name('categories.edit');

    Route::middleware('permission:update categories')
        ->put('/categories/{category}', [CategoryController::class, 'update'])
        ->name('categories.update');

    Route::middleware('permission:delete categories')
        ->delete('/categories/{category}', [CategoryController::class, 'destroy'])
        ->name('categories.destroy');

    Route::middleware('permission:view products')
        ->get('/products', [ProductController::class, 'index'])
        ->name('products.index');

    Route::middleware('permission:create products')
        ->get('/products/create', [ProductController::class, 'create'])
        ->name('products.create');

    Route::middleware('permission:create products')
        ->post('/products', [ProductController::class, 'store'])
        ->name('products.store');

    Route::middleware('permission:update products')
        ->get('/products/{product}/edit', [ProductController::class, 'edit'])
        ->name('products.edit');

    Route::middleware('permission:update products')
        ->put('/products/{product}', [ProductController::class, 'update'])
        ->name('products.update');

    Route::middleware('permission:delete products')
        ->delete('/products/{product}', [ProductController::class, 'destroy'])
        ->name('products.destroy');

    Route::middleware('permission:view sales')
        ->get('/transactions', [TransactionController::class, 'index'])
        ->name('transactions.index');

    Route::middleware('permission:view sales')
        ->get('/transactions/{id}', [TransactionController::class, 'show'])
        ->name('transactions.show');

    Route::middleware('permission:create sales')
        ->get('/sales', [TransactionController::class, 'create'])
        ->name('sales.create');

    Route::middleware('permission:create sales')
        ->post('/sales', [TransactionController::class, 'store'])
        ->name('sales.store');

    Route::middleware('permission:create sales')
        ->get('/sales/search', [TransactionController::class, 'search'])
        ->name('sales.search');

    Route::middleware('permission:view reports')
        ->get('/reports/sales', [ReportController::class, 'sales'])
        ->name('reports.sales');

    Route::middleware('permission:view reports')
        ->get('/reports/sales/{id}', [ReportController::class, 'show'])
        ->name('reports.sales.show');

    Route::middleware('permission:view reports')
        ->get(
            '/reports/sales/export/excel',
            [ReportController::class, 'exportExcel']
        )
        ->name('reports.sales.export.excel');

});

require __DIR__.'/auth.php';