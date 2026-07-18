<div class="card border-0 shadow-sm rounded-4 mb-4">

    <div class="card-body">


        <div class="row g-4">


            <div class="col-md-6">

                <p class="text-muted mb-1">
                    Invoice Number
                </p>

                <h5 class="fw-bold">
                    {{ $transaction->invoice_number }}
                </h5>

            </div>



            <div class="col-md-6">

                <p class="text-muted mb-1">
                    Cashier
                </p>

                <h5 class="fw-bold">
                    {{ $transaction->user->name }}
                </h5>

            </div>



            <div class="col-md-6">

                <p class="text-muted mb-1">
                    Transaction Date
                </p>

                <h5 class="fw-bold">

                    {{ $transaction->created_at
                        ->format('d M Y H:i')
                    }}

                </h5>

            </div>



            <div class="col-md-6">

                <p class="text-muted mb-1">
                    Status
                </p>

                <span class="badge bg-success">

                    {{ $transaction->status }}

                </span>

            </div>


        </div>


    </div>

</div>