<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Interfaces\DashboardRepositoryInterface;

class DashboardService
{
    public function __construct(
        // protected ProductService $productService,
        // protected CategoryService $categoryService
        protected DashboardRepositoryInterface $dashboardRepository
    ) {}

    public function getDashboardData(): array
    {
        $todayRevenue = $this->dashboardRepository
            ->todayRevenue();

        $yesterdayRevenue = $this->dashboardRepository
            ->yesterdayRevenue();

        if ($yesterdayRevenue > 0) {

            $revenueGrowth =
                (($todayRevenue - $yesterdayRevenue)
                / $yesterdayRevenue) * 100;

        } else {

            $revenueGrowth = 0;

        }

        return [

            'title' => 'Dashboard',

            'welcome' => 'Welcome back, ' . auth()->user()->name,

            'stats' => $this->dashboardRepository
                ->getStatistics(),

            'lowStocks' => $this->dashboardRepository
                ->lowStock(),

            'latestProducts' => $this->dashboardRepository
                ->latestProducts(),

            'recentTransactions' => $this->dashboardRepository
                ->recentTransactions(),

            'salesChart' => $this->dashboardRepository
                ->salesChart(),

            'revenueGrowth' => round($revenueGrowth, 1),

            'topSellingProducts' => $this->dashboardRepository
                ->topSellingProducts(),

            'salesByCategory'=>$this->dashboardRepository
                ->getSalesByCategory(),

            'notifications' => $this->dashboardRepository
                ->lowStockNotifications(),

        ];
    }

    public function getStatistics(): array
    {
        return $this->dashboardRepository
            ->getStatistics();
    }
}