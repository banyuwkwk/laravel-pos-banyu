<div class="row mt-4">

    {{-- Low Stock --}}
    <div class="col-lg-6">

        <x-ui.card>

            <h5 class="mb-3">
                <i class="bi bi-exclamation-triangle text-warning"></i>
                Low Stock Products
            </h5>

@forelse($lowStocks as $product)

<div class="mb-3">

    <div class="d-flex justify-content-between">

        <strong>

            {{ $product->name }}

        </strong>

        <span class="badge
        {{ $product->stock <= 2
            ? 'bg-danger'
            : 'bg-warning text-dark' }}">

            {{ $product->stock }} pcs

        </span>

    </div>

    <div class="progress mt-2" style="height:8px;">

        <div
            class="progress-bar
            {{ $product->stock <= 2
                ? 'bg-danger'
                : 'bg-warning' }}"
            style="width: {{ min(($product->stock / 20) * 100,100) }}%">

        </div>

    </div>

</div>

@empty

<p class="text-center text-muted py-4">

    <i class="bi bi-check-circle fs-1 text-success"></i>

    <br>

    All products are sufficiently stocked.

</p>

@endforelse

        </x-ui.card>

    </div> {{-- Tutup col pertama --}}

    {{-- Latest Product --}}
    <div class="col-lg-6">

        <x-ui.card>

            <h5 class="mb-3">
                <i class="bi bi-box-seam text-primary"></i>
                Latest Products
            </h5>

@forelse($latestProducts as $product)

<div
class="d-flex align-items-center py-3 border-bottom">

    <div
    class="rounded-circle bg-primary-subtle
    d-flex align-items-center
    justify-content-center me-3"

    style="width:45px;height:45px;">

        <i class="bi bi-box-seam text-primary"></i>

    </div>

    <div class="flex-grow-1">

        <strong>

            {{ $product->name }}

        </strong>

        <br>

        <small class="text-muted">

            {{ $product->created_at->format('d M Y H:i') }}

        </small>

    </div>

</div>

@empty

<p class="text-center text-muted py-4">

<i class="bi bi-box fs-1"></i>

<br>

No products available.

</p>

@endforelse

        </x-ui.card>

    </div>