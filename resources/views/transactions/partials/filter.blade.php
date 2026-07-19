<x-ui.card>

<form
    action="{{ route('transactions.index') }}"
    method="GET">

    <div class="row g-3 align-items-end">

        <div class="col-md-6">

            <label class="form-label">

                Search Transaction

            </label>

            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Invoice or Customer..."
                value="{{ request('search') }}">

        </div>

        <div class="col-auto">

            <button
                type="submit"
                class="btn btn-primary">

                <i class="bi bi-search me-2"></i>

                Search

            </button>

        </div>

        @if(request('search'))

        <div class="col-auto">

            <a
                href="{{ route('transactions.index') }}"
                class="btn btn-outline-secondary">

                Reset

            </a>

        </div>

        @endif

    </div>

</form>

</x-ui.card>