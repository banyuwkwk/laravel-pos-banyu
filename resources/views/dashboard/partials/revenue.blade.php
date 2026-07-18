    <div class="row mt-4">

<div class="col-md-6">

    <x-ui.card>

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <small class="text-muted">
                    Revenue Today
                </small>

                <h3 class="fw-bold mb-0 mt-1">

                    Rp {{ number_format($stats['revenue_today'],0,',','.') }}

                </h3>
                
                @if($revenueGrowth > 0)

                <small class="text-success">

                    <i class="bi bi-arrow-up"></i>

                    {{ $revenueGrowth }}%

                    compared to yesterday

                </small>

            @elseif($revenueGrowth < 0)

                <small class="text-danger">

                    <i class="bi bi-arrow-down"></i>

                    {{ abs($revenueGrowth) }}%

                    compared to yesterday

                </small>

            @else

                <small class="text-muted">

                    No comparison available

                </small>

            @endif

            </div>

            <div
                class="bg-success-subtle rounded-circle
                d-flex align-items-center justify-content-center"
                style="width:70px;height:70px;">

                <i class="bi bi-cash-stack fs-2 text-success"></i>

            </div>

        </div>

    </x-ui.card>

</div>

<div class="col-md-6">

    <x-ui.card>

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <small class="text-muted">
                    Total Transactions
                </small>

                <h3 class="fw-bold mb-0 mt-1">

                    {{ $stats['transactions'] }}

                </h3>

            </div>

            <div
                class="bg-primary-subtle rounded-circle
                d-flex align-items-center justify-content-center"
                style="width:70px;height:70px;">

                <i class="bi bi-receipt-cutoff fs-2 text-primary"></i>

            </div>

        </div>

    </x-ui.card>

</div>

</div>