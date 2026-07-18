<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class SalesReportExport implements
    FromCollection,
    WithHeadings,
    WithMapping
{

    public function collection()
    {
        return Transaction::with('user')
            ->latest()
            ->get();
    }


    public function headings(): array
    {
        return [

            'Invoice',
            'Cashier',
            'Total',
            'Status',
            'Date'

        ];
    }


    public function map($transaction): array
    {
        return [

            $transaction->invoice_number,

            $transaction->user->name,

            $transaction->grand_total,

            $transaction->status,

            $transaction->created_at
                ->format('d M Y')

        ];
    }

}