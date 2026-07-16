<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;

use App\Repositories\Interfaces\TransactionRepositoryInterface;

use App\Models\Transaction;
use App\Models\Product;

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

    public function checkout(array $data)
    {
        return DB::transaction(function () use ($data) {

            $subtotal = 0;

            foreach ($data['cart'] as $item) {

                $product = Product::findOrFail($item['id']);

                $subtotal += $product->price * $item['qty'];

            }

            $grandTotal = $subtotal;

            if ($data['cash'] < $grandTotal) {

                throw new \Exception('Cash is not enough.');

            }

            $transaction = $this->transactionRepository->store([

                'invoice_number' => $this->createInvoiceNumber(),

                'user_id' => auth()->id(),

                'customer_name' => null,

                'subtotal' => $subtotal,

                'discount' => 0,

                'tax' => 0,

                'grand_total' => $grandTotal,

                'paid_amount' => $data['cash'],

                'change_amount' => $data['cash'] - $grandTotal,

                'status' => 'paid',

            ]);

            return $transaction;

        });
    }
}