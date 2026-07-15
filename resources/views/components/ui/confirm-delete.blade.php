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

            <div class="modal-body">

                {{ $message }}

            </div>

            <div class="modal-footer">

                <button
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Cancel

                </button>

                <form
                    action="{{ $action }}"
                    method="POST">

                    @csrf
                    @method('DELETE')

                    <button
                        class="btn btn-danger">

                        Delete

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>