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

    protected $startDate;

    protected $endDate;


    public function __construct(
        ?string $startDate = null,
        ?string $endDate = null
    )
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }


    public function collection()
    {
        
        $query = Transaction::with('user');


        if($this->startDate && $this->endDate){

            $query->whereBetween(
                'created_at',
                [
                    $this->startDate,
                    $this->endDate . ' 23:59:59'
                ]
            );

        }


        return $query
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