<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use App\Repositories\Interfaces\DashboardRepositoryInterface;

class DashboardRepository implements DashboardRepositoryInterface
{
    public function getStatistics(): array
    {
        return [

            'products' => Product::count(),

            'categories' => Category::count(),

            'users' => User::count(),

            'transactions' => Transaction::count(),

            'sales_today' => Transaction::whereDate(
                'created_at',
                today()
            )->count(),

            'revenue_today' => Transaction::whereDate(
                'created_at',
                today()
            )->sum('grand_total'),

        ];
    }

    public function lowStock()
    {
        return Product::where('stock', '<=', 10)
            ->latest()
            ->take(5)
            ->get();
    }

    public function latestProducts()
    {
        return Product::latest()
            ->take(5)
            ->get();
    }

    public function recentTransactions()
    {
        return Transaction::with('user')
            ->latest()
            ->take(5)
            ->get();
    }

    public function salesChart()
    {
        return Transaction::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(grand_total) as total')
            )
            ->whereDate('created_at', '>=', now()->subDays(6))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
    }

    public function todayRevenue(): int
    {
        return Transaction::whereDate(
            'created_at',
            today()
        )->sum('grand_total');
    }

    public function yesterdayRevenue(): int
    {
        return Transaction::whereDate(
            'created_at',
            today()->subDay()
        )->sum('grand_total');
    }

    public function topSellingProducts()
    {
        return DB::table('transaction_details')
            ->join(
                'products',
                'transaction_details.product_id',
                '=',
                'products.id'
            )
            ->select(

                'products.name',

                DB::raw('SUM(transaction_details.qty) as total_sold')

            )
            ->groupBy(

                'products.id',
                'products.name'

            )
            ->orderByDesc('total_sold')
            ->take(5)
            ->get();
    }

    public function getSalesByCategory()
    {
        return DB::table('transaction_details')
            ->join(
                'products',
                'transaction_details.product_id',
                '=',
                'products.id'
            )
            ->join(
                'categories',
                'products.category_id',
                '=',
                'categories.id'
            )
            ->select(
                'categories.name',
                DB::raw('SUM(transaction_details.qty) as total_sales')
            )
            ->groupBy('categories.name')
            ->get();
    }
}