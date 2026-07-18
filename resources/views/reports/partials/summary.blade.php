<div class="row g-4 mb-4">


    <div class="col-md-6">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body">

                <p class="text-muted mb-1">
                    Total Transactions
                </p>


                <h3 class="fw-bold">

                    {{ $summary['total_transactions'] }}

                </h3>

            </div>

        </div>

    </div>



    <div class="col-md-6">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body">

                <p class="text-muted mb-1">
                    Total Revenue
                </p>


                <h3 class="fw-bold">

                    Rp {{ number_format(
                        $summary['total_revenue']
                    ) }}

                </h3>

            </div>

        </div>

    </div>


</div>