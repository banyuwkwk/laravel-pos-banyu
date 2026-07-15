@props([
    'placeholder' => 'Search...',
])

<form method="GET">

    <div class="input-group">

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="{{ $placeholder }}"
            value="{{ request('search') }}">

        <button
            class="btn btn-primary">

            <i class="bi bi-search"></i>

        </button>

    </div>

</form>