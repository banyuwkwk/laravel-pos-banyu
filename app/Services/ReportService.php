<?php

namespace App\Services;

use App\Repositories\Interfaces\ReportRepositoryInterface;

class ReportService
{

    public function __construct(
        protected ReportRepositoryInterface $reportRepository
    ){}

    public function getSalesReport(
        ?string $startDate = null,
        ?string $endDate = null
    ): array
    {
        $transactions = $this->reportRepository
            ->salesReport(
                $startDate,
                $endDate
            );


        return [

            'title' => 'Sales Report',

            'transactions' => $transactions,

            'summary' => [

                'total_transactions' => $transactions->count(),

                'total_revenue' => $transactions->sum(
                    'grand_total'
                ),

            ],

        ];
    }

    public function getTransactionDetail(
    int $id
    )
    {
        return [

            'title' => 'Transaction Detail',

            'transaction' =>
                $this->reportRepository
                    ->findTransaction($id)

        ];
    }

}