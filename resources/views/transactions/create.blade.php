@extends('layouts.app')

@section('title', $title)

@section('content')

<x-ui.page-header
    :title="$title"
    subtitle="Point of Sale" />

{{-- Invoice & Search --}}
<x-ui.card>

    <div class="row">

        <div class="col-md-6">

            <label class="form-label">
                Invoice
            </label>

            <input
                type="text"
                class="form-control"
                value="{{ $invoice }}"
                readonly>

        </div>

        <div class="col-md-6">

            <label class="form-label">
                Search Product
            </label>

            <input
                type="text"
                id="search-product"
                class="form-control"
                placeholder="Search product...">

            <div
                id="search-result"
                class="list-group mt-2 shadow-sm">
            </div>

        </div>

    </div>

</x-ui.card>

<div class="row mt-4">

    {{-- Cart --}}
    <div class="col-lg-8">

        <x-ui.card>

            <h5 class="mb-3">
                <i class="bi bi-cart-fill"></i>
                Cart
            </h5>

            <div class="table-responsive">

                <table class="table align-middle" id="cart-table">

                    <thead>

                        <tr>

                            <th>Product</th>
                            <th width="170">Qty</th>
                            <th width="150">Price</th>
                            <th width="150">Total</th>
                            <th width="70">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    </tbody>

                </table>

            </div>

        </x-ui.card>

    </div>

    {{-- Payment --}}
    <div class="col-lg-4">

        <x-ui.card>

            <h5 class="mb-4">

                <i class="bi bi-cash-stack"></i>

                Payment

            </h5>

            <div class="mb-3">

                <label class="form-label">

                    Grand Total

                </label>

                <h2 id="payment-grand-total">

                    Rp 0

                </h2>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Cash

                </label>

                <input
                    type="number"
                    id="cash"
                    class="form-control"
                    placeholder="Input cash">

            </div>

            <div class="mb-4">

                <label class="form-label">

                    Change

                </label>

                <h3 id="change">

                    Rp 0

                </h3>

            </div>

            <button
                class="btn btn-success w-100"
                id="btn-pay"
                disabled>

                <i class="bi bi-credit-card"></i>

                Pay Now

            </button>

        </x-ui.card>

    </div>

</div>

@endsection