<div class="card border-0 shadow-sm rounded-4 mb-4">

    <div class="card-body">


        <h5 class="fw-bold mb-4">
            Payment Summary
        </h5>


        <div class="row">


            <div class="col-md-6">


                <p class="mb-2">

                    <span class="text-muted">
                        Subtotal
                    </span>

                    <span class="float-end fw-semibold">

                        Rp {{ number_format(
                            $transaction->subtotal
                        ) }}

                    </span>

                </p>



                <p class="mb-2">

                    <span class="text-muted">
                        Discount
                    </span>

                    <span class="float-end fw-semibold">

                        Rp {{ number_format(
                            $transaction->discount
                        ) }}

                    </span>

                </p>



                <p class="mb-2">

                    <span class="text-muted">
                        Tax
                    </span>

                    <span class="float-end fw-semibold">

                        Rp {{ number_format(
                            $transaction->tax
                        ) }}

                    </span>

                </p>


            </div>


            <div class="col-md-6">


                <p class="mb-2">

                    <span class="text-muted">
                        Grand Total
                    </span>

                    <span class="float-end fw-bold">

                        Rp {{ number_format(
                            $transaction->grand_total
                        ) }}

                    </span>

                </p>



                <p class="mb-2">

                    <span class="text-muted">
                        Paid Amount
                    </span>

                    <span class="float-end fw-semibold">

                        Rp {{ number_format(
                            $transaction->paid_amount
                        ) }}

                    </span>

                </p>



                <p class="mb-2">

                    <span class="text-muted">
                        Change
                    </span>

                    <span class="float-end fw-semibold">

                        Rp {{ number_format(
                            $transaction->change_amount
                        ) }}

                    </span>

                </p>


            </div>


        </div>


    </div>

</div>