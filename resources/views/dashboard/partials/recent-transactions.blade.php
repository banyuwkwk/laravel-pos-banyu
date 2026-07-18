<div class="row mt-4">

    <div class="col-12">

        <x-ui.card>

            <h5 class="mb-3">

                <i class="bi bi-clock-history text-success"></i>

                Recent Transactions

            </h5>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th>Invoice</th>

                            <th>Cashier</th>

                            <th>Total</th>

                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($recentTransactions as $transaction)

                            <tr>

                                <td>

                                    {{ $transaction->invoice_number }}

                                </td>

                                <td>

                                    {{ $transaction->user->name }}

                                </td>

                                <td>

                                    Rp {{ number_format($transaction->grand_total,0,',','.') }}

                                </td>

                                <td>

                                    <span class="badge bg-success">

                                        {{ ucfirst($transaction->status) }}

                                    </span>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4"
                                    class="text-center text-muted">

                                    No transaction yet.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </x-ui.card>

    </div>

</div>