@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h3 class="fw-bold">

        Transaction Detail

    </h3>

    <div>

        <button
            onclick="window.print()"
            class="btn btn-success no-print">

            <i class="bi bi-printer"></i>

            Print

        </button>

        <a
            href="{{ route('transactions.index') }}"
            class="btn btn-secondary">

            Back

        </a>

    </div>

</div>

<div class="card shadow-sm border-0 mb-4">

    <div class="card-body">

        <div class="row">

            <div class="col-md-6">

                <p>

                    <strong>Invoice</strong><br>

                    {{ $transaction->invoice_number }}

                </p>

                <p>

                    <strong>Cashier</strong><br>

                    {{ $transaction->user->name }}

                </p>

            </div>

            <div class="col-md-6">

                <p>

                    <strong>Date</strong><br>

                    {{ $transaction->created_at->format('d M Y H:i') }}

                </p>

                <p>

                    <strong>Status</strong><br>

<span class="badge {{ $transaction->status === 'paid' ? 'bg-success' : 'bg-warning' }}">
    {{ ucfirst($transaction->status) }}
</span>

                </p>

            </div>

        </div>

    </div>

</div>
<div class="card shadow-sm border-0">

    <div class="card-header bg-white">

        <h5 class="mb-0">

            Products

        </h5>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th>Product</th>

                        <th width="120">Price</th>

                        <th width="80">Qty</th>

                        <th width="150">Subtotal</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($transaction->details as $detail)

                        <tr>

                            <td>

    <strong>

        {{ $detail->product->name }}

    </strong>

    <br>

    <small class="text-muted">

        {{ $detail->product->sku }}

    </small>

</td>
                            <td>

                                Rp {{ number_format($detail->price,0,',','.') }}

                            </td>

                            <td>

                                {{ $detail->qty }}

                            </td>

                            <td>

                                Rp {{ number_format($detail->subtotal,0,',','.') }}

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

<div class="row mt-4">

    <div class="col-lg-5 ms-auto">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white">

                <h5 class="mb-0">

                    Payment Summary

                </h5>

            </div>

            <div class="card-body">

                <div class="d-flex justify-content-between mb-2">

                    <span>Subtotal</span>

                    <strong>

                        Rp {{ number_format($transaction->subtotal,0,',','.') }}

                    </strong>

                </div>

                <div class="d-flex justify-content-between mb-2">

                    <span>Discount</span>

                    <strong>

                        Rp {{ number_format($transaction->discount,0,',','.') }}

                    </strong>

                </div>

                <div class="d-flex justify-content-between mb-2">

                    <span>Tax</span>

                    <strong>

                        Rp {{ number_format($transaction->tax,0,',','.') }}

                    </strong>

                </div>

                <hr>

                <div class="d-flex justify-content-between mb-3">

                    <span class="fw-bold">

                        Grand Total

                    </span>

                    <h5 class="mb-0">

                        Rp {{ number_format($transaction->grand_total,0,',','.') }}

                    </h5>

                </div>

                <div class="d-flex justify-content-between mb-2">

                    <span>Paid</span>

                    <strong>

                        Rp {{ number_format($transaction->paid_amount,0,',','.') }}

                    </strong>

                </div>

                <div class="d-flex justify-content-between">

                    <span>Change</span>

                    <strong class="text-success">

                        Rp {{ number_format($transaction->change_amount,0,',','.') }}

                    </strong>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection