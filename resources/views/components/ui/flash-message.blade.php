@if(session('success'))

<div class="alert alert-success alert-dismissible fade show">

    {{ session('success') }}

    <button
        class="btn-close"
        data-bs-dismiss="alert"></button>

</div>

@endif