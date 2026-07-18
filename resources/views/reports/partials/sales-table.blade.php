<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>
                            Invoice
                        </th>

                        <th>
                            Cashier
                        </th>

                        <th>
                            Total
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Date
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($transactions as $transaction)

                    <tr>

                        <td>
                            {{ $transaction->invoice_number }}
                        </td>


                        <td>
                            {{ $transaction->user->name }}
                        </td>


                        <td>
                            Rp {{ number_format(
                                $transaction->grand_total
                            ) }}
                        </td>


                        <td>

                            <span class="badge bg-success">
                                {{ $transaction->status }}
                            </span>

                        </td>


                        <td>
                            {{ $transaction->created_at->format('d M Y') }}
                        </td>

                    </tr>


                    @empty

                    <tr>

                        <td colspan="5"
                            class="text-center text-muted">

                            No transactions found

                        </td>

                    </tr>

                    @endforelse


                </tbody>


            </table>

        </div>

    </div>

</div>