<?php

namespace App\Repositories\Eloquent;

use App\Models\Transaction;
use App\Repositories\Interfaces\TransactionRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function paginate(?string $search = null): LengthAwarePaginator
    {
        return Transaction::query()

            ->when($search, function ($query) use ($search) {

                $query->where('invoice_number', 'like', "%{$search}%");

            })

            ->latest()

            ->paginate(10)

            ->withQueryString();
    }

    public function store(array $data): Transaction
    {
        return Transaction::create($data);
    }
}