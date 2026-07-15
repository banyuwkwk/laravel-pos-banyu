@props([
    'edit',
    'delete',
])

<div class="d-flex gap-2">

<a
href="{{ $edit }}"
class="btn btn-warning btn-sm">

<i class="bi bi-pencil"></i>

</a>

<form
action="{{ $delete }}"
method="POST">

@csrf

@method('DELETE')

<button
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this data?')">

<i class="bi bi-trash"></i>

</button>

</form>

</div>