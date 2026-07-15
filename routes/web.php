<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

Route::redirect('/', '/dashboard');

Route::middleware(['auth'])->prefix('dashboard')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('categories', CategoryController::class);

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

    Route::middleware('permission:create sales')
        ->get('/sales', [TransactionController::class, 'create'])
        ->name('sales.create');

    Route::middleware('permission:create sales')
        ->post('/sales', [TransactionController::class, 'store'])
        ->name('sales.store');

    Route::middleware('permission:create sales')
        ->get('/sales/search', [TransactionController::class, 'search'])
        ->name('sales.search');

});

require __DIR__.'/auth.php';

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
