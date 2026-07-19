@props([
    'id',
    'title' => 'Delete Data',
    'message',
    'action',
])

<div
    class="modal fade"
    id="{{ $id }}"
    tabindex="-1"
    aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    {{ $title }}

                </h5>

                <button
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

<div class="modal-body text-center py-4">

    <div
        class="bg-danger-subtle rounded-circle
        d-inline-flex align-items-center justify-content-center mb-3"
        style="width:80px;height:80px;">

        <i
            class="bi bi-trash3-fill
            text-danger fs-1">
        </i>

    </div>

    <h5 class="fw-semibold mb-2">

        Are you sure?

    </h5>

    <p class="text-muted mb-2">

        {{ $message }}

    </p>

    <small class="text-danger">

        This action cannot be undone.

    </small>

</div>

            <div class="modal-footer">

                <button
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Cancel

                </button>

<form
    action="{{ $action }}"
    method="POST"
    class="delete-form">

    @csrf
    @method('DELETE')

    <button
        type="submit"
        class="btn btn-danger">

        <i class="bi bi-trash"></i>

        Delete

    </button>

</form>

            </div>

        </div>

    </div>

</div>