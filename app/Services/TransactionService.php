<?php

namespace App\Services;

use App\Repositories\Interfaces\TransactionRepositoryInterface;
use App\Models\Transaction;

class TransactionService
{
    public function __construct(
        protected TransactionRepositoryInterface $transactionRepository
    ) {
    }

    public function paginate(?string $search = null)
    {
        return $this->transactionRepository
            ->paginate($search);
    }

    public function createInvoiceNumber(): string
    {
        $lastTransaction = Transaction::latest()->first();

        $lastNumber = 0;

        if ($lastTransaction) {

            $lastNumber = (int) substr($lastTransaction->invoice_number, -6);

        }

        $nextNumber = $lastNumber + 1;

        return 'INV-' . date('Ymd') . '-' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
    }
}