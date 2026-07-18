<div class="row g-4">

    <div class="col-md-3">

    <x-ui.card>

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <small class="text-muted">
                    Total Products
                </small>

                <h2 class="fw-bold mb-0 mt-1">
                    {{ $stats['products'] }}
                </h2>

            </div>

            <div
                class="bg-primary-subtle rounded-circle
                d-flex align-items-center justify-content-center"
                style="width:60px;height:60px;">

                <i class="bi bi-box-seam fs-3 text-primary"></i>

            </div>

        </div>

    </x-ui.card>

</div>

<div class="col-md-3">

    <x-ui.card>

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <small class="text-muted">
                    Categories
                </small>

                <h2 class="fw-bold mb-0 mt-1">
                    {{ $stats['categories'] }}
                </h2>

            </div>

            <div
                class="bg-success-subtle rounded-circle
                d-flex align-items-center justify-content-center"
                style="width:60px;height:60px;">

                <i class="bi bi-tags fs-3 text-success"></i>

            </div>

        </div>

    </x-ui.card>

</div>

<div class="col-md-3">

    <x-ui.card>

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <small class="text-muted">
                    Today's Sales
                </small>

                <h2 class="fw-bold mb-0 mt-1">
                    {{ $stats['sales_today'] }}
                </h2>

            </div>

            <div
                class="bg-warning-subtle rounded-circle
                d-flex align-items-center justify-content-center"
                style="width:60px;height:60px;">

                <i class="bi bi-cart-check fs-3 text-warning"></i>

            </div>

        </div>

    </x-ui.card>

</div>

<div class="col-md-3">

    <x-ui.card>

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <small class="text-muted">
                    Users
                </small>

                <h2 class="fw-bold mb-0 mt-1">
                    {{ $stats['users'] }}
                </h2>

            </div>

            <div
                class="bg-info-subtle rounded-circle
                d-flex align-items-center justify-content-center"
                style="width:60px;height:60px;">

                <i class="bi bi-people fs-3 text-info"></i>

            </div>

        </div>

    </x-ui.card>

</div>