<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TransactionService;
use App\Services\ProductService;
use App\Http\Requests\StoreTransactionRequest;

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

public function store(StoreTransactionRequest $request)
{
    // dd($request->validated());
    try {
        $transaction = $this->transactionService
            ->checkout($request->validated());

        return response()->json([

            'success' => true,

            'message' => 'Transaction successful.',

            'invoice' => $transaction->invoice_number,

        ]);

    } catch (\Throwable $e) {

        return response()->json([

            'success' => false,

            'message' => $e->getMessage(),

            'line' => $e->getLine(),

            'file' => $e->getFile(),

        ], 500);

    }
}

    public function search()
    {
        $keyword = request('search');

        return response()->json(
            $this->productService->search($keyword)
        );
    }
}