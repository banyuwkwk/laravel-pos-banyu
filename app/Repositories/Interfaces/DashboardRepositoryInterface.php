<?php

namespace App\Repositories\Interfaces;

interface DashboardRepositoryInterface
{
    public function getStatistics(): array;

    public function lowStock();

    public function latestProducts();

    public function recentTransactions();

    public function salesChart();

    public function todayRevenue(): int;

    public function yesterdayRevenue(): int;

    public function topSellingProducts();

    public function getSalesByCategory();

    public function lowStockNotifications();
}