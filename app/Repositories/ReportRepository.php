<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\Interfaces\ReportRepositoryInterface;

class ReportRepository implements ReportRepositoryInterface
{
    public function salesReport(
        ?string $startDate = null,
        ?string $endDate = null
    )
    {
        $query = Transaction::with([
            'user',
            'details.product'
        ]);


        if($startDate && $endDate){

            $query->whereBetween(
                'created_at',
                [
                    $startDate,
                    $endDate . ' 23:59:59'
                ]
            );

        }


        return $query
            ->latest()
            ->get();
    }

    public function findTransaction(
    int $id
    )
    {
        return Transaction::with([
            'user',
            'details.product'
        ])
        ->findOrFail($id);
    }
}