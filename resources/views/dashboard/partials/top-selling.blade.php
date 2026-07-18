<div class="row mt-4">

    <div class="col-12">

        <x-ui.card>

            <h5 class="mb-3">

                <i class="bi bi-trophy-fill text-warning"></i>

                Top Selling Products

            </h5>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th>Product</th>

                            <th class="text-end">
                                Sold
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($topSellingProducts as $product)

                            <tr>

                                <td>

                                    {{ $product->name }}

                                </td>

                                <td class="text-end">

                                    <span class="badge bg-success">

                                        {{ $product->total_sold }} pcs

                                    </span>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="2"
                                    class="text-center text-muted">

                                    No sales yet.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </x-ui.card>

    </div>

</div>