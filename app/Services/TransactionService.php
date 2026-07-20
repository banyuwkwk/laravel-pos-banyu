<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;

use App\Repositories\Interfaces\TransactionRepositoryInterface;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product;
use App\Services\NotificationService;

use App\Notifications\TransactionCreatedNotification;


class TransactionService
{
    public function __construct(
        protected TransactionRepositoryInterface $transactionRepository,
        protected NotificationService $notificationService
    ) {
    }

    public function paginate(?string $search = null)
    {
        return $this->transactionRepository
            ->paginate($search);
    }

    public function createInvoiceNumber(): string
    {
        $lastTransaction = Transaction::orderByDesc('id')->first();

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

                if ($item['qty'] > $product->stock) {

                    throw new \Exception(
                        "Stock {$product->name} is not enough."
                    );

                }

                $subtotal += $product->price * $item['qty'];

            }

            $grandTotal = $subtotal;

            if ($data['cash'] < $grandTotal) {

                throw new \Exception('Cash is not enough.');

            }

            $transaction = $this->transactionRepository->store([

                'invoice_number' => $data['invoice_number'],

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

        foreach ($data['cart'] as $item) {

            $product = Product::findOrFail($item['id']);

            TransactionDetail::create([

                'transaction_id' => $transaction->id,

                'product_id' => $product->id,

                'price' => $product->price,

                'qty' => $item['qty'],

                'subtotal' => $product->price * $item['qty'],

            ]);

            $product->decrement('stock', $item['qty']);

            $product->refresh();

                if ($product->stock <= 3) {

                    $this->notificationService
                        ->notifyLowStock($product);

                }

        }

        $this->notificationService
            ->notifyAdmins(
                new TransactionCreatedNotification($transaction)
            );


        activity()
            ->causedBy(auth()->user())
            ->performedOn($transaction)
            ->withProperties([
                'invoice' => $transaction->invoice_number,
                'total' => $transaction->grand_total,
                'items' => count($data['cart']),
            ])
            ->log("Created transaction {$transaction->invoice_number}");


        return $transaction;

        });
    }

    public function show(int $id): ?Transaction
    {
        return $this->transactionRepository
            ->findWithDetails($id);
    }
}
