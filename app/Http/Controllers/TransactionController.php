<?php

namespace App\Http\Controllers;

use App\Services\TransactionService;
use App\Services\ProductService;

class TransactionController extends Controller
{
    public function __construct(
        protected TransactionService $transactionService,
        protected ProductService $productService
    ) {}

    public function index()
    {
        return view('transactions.index', [
            'title' => 'Transactions',
            'transactions' => $this->transactionService->paginate(
                request('search')
            ),

        ]);
    }

    public function create()
    {
        return view('transactions.create', [

            'title' => 'Cashier',

            'invoice' => $this->transactionService
                ->createInvoiceNumber(),

        ]);
    }

    public function store()
    {
        //
    }

    public function search()
    {
        $keyword = request('search');

        return response()->json(
            $this->productService->search($keyword)
        );
    }
}