<?php

namespace App\Repositories\Interfaces;

use App\Models\Transaction;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface TransactionRepositoryInterface
{
    public function paginate(?string $search = null): LengthAwarePaginator;

    public function store(array $data): Transaction;
}