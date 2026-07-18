<div class="row mt-4">

    <div class="col-12">

        <x-ui.card>

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h5 class="mb-1">

                        <i class="bi bi-graph-up-arrow text-success"></i>

                        Sales Analytics

                    </h5>

                    <small class="text-muted">

                        Last 7 Days Revenue

                    </small>

                </div>

            </div>

            <div style="height:350px;">

                <canvas
                    id="salesChart"
                    data-chart='@json($salesChart)'>
                </canvas>

            </div>

        </x-ui.card>

    </div>

</div>